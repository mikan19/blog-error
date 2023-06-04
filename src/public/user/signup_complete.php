<?php
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$password_check = $_POST['password_check'];

$errors = [];
if (empty($email) || empty($password)) {
  $errors[] = 'パスワードとメールアドレスを入力してください';
  $_SESSION['errors'] = $errors;
}

$errors2 = [];
if ($password != $password_check) {
    $errors2[] = 'パスワードが一致しません';
    $_SESSION['errors2'] = $errors2;
}

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=memo; charset=utf8',
  $dbUserName, 
  $dbPassword
);

$stmt =" SELECT
    email
FROM users";
$statement = $pdo->prepare($stmt);
$statement->execute();
$emails = $statement->fetchAll(PDO::FETCH_ASSOC);

$errors3 = [];
$value_count = array_count_values(array_column($emails,'email'));
$max = max($value_count); 
if ($max != 1) {
  $errors3[] = 'すでに保存されているメールアドレスです';
  $_SESSION['errors3'] = $errors3;
} 


if(isset($_POST['username'])) {
  $dbUserName = 'root';
  $dbPassword = 'password';
  $pdo = new PDO(
      'mysql:host=mysql; dbname=memo; charset=utf8',
      $dbUserName,
      $dbPassword
  );

$stmt = $pdo->prepare("INSERT INTO users(
	username, email, password
) VALUES (
	:username, :email, :password
)");

$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
$res = $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会員登録</title>
</head>
 
<body>
  <div>

   <?php if (!empty($_SESSION['errors'] ) || !empty($_SESSION['errors2'])|| !empty($_SESSION['errors3'] )): ?>
      <meta http-equiv="refresh" content="1;URL=http://localhost:8080/user/signup.php">
   <?php endif; ?>
  </div>
</body> 
</html>
