<?php
$id = $_GET['id'];

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=memo; charset=utf8',
  $dbUserName, 
  $dbPassword
);

$stmt = $pdo->prepare("DELETE FROM pages WHERE id = :id");
$stmt->bindParam( ':id', $id, PDO::PARAM_INT);
$res = $stmt->execute();

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メモ削除</title>
</head>
 
<body>
  <div>
      <meta http-equiv="refresh" content="1;URL=http://localhost:8080/index.php">
  </div>
</body> 
</html>