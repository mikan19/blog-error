<?php
//require_once __DIR__ . '/../vendor/autoload.php';
// use App\Memos;

$title = $_POST['title'];
$content = $_POST['content'];

$errors = [];
if (empty($title) || empty($content)) {
    $errors[] =
        'タイトルまたは本文が入力されていません';
}

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=memo; charset=utf8',
  $dbUserName, 
  $dbPassword
);

$stmt = $pdo->prepare("INSERT INTO pages(
	title, content
) VALUES (
	:title, :content
)");

$stmt->bindParam( ':title', $title, PDO::PARAM_STR);
$stmt->bindParam( ':content', $content, PDO::PARAM_STR);
$res = $stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メモ登録中</title>
</head>
 
<body>
  <div>
   <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p><?php echo $error . "\n"; ?></p> 
      <?php endforeach; ?>
      <a href="index.php">トップページへ</a> 
   <?php endif; ?>

   <?php if (empty($errors)): ?>
      <meta http-equiv="refresh" content="1;URL=http://localhost:8080/index.php">
   <?php endif; ?>
  </div>
</body> 
</html>
