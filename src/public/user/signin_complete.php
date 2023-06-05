<?php
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (empty($email) || empty($password)) {
    $errors[] = 'EmailかPasswordの入力がありません';
}

if (empty($errors)) {
    $dbUserName = 'root';
    $dbPassword = 'password';
    $pdo = new PDO(
        'mysql:host=mysql; dbname=memo; charset=utf8',
        $dbUserName,
        $dbPassword
    );

    //dbにuserテーブルを追加
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ユーザーが存在するか確認するコード
    if (count($users) > 0) {
        $singin_password = $users[0]['password'];
        if (!password_verify($password, $singin_password)) {
            $errors[] = 'メールアドレスまたはパスワードが違います';
        }
    } else {
        // ユーザーが存在しない場合のエラーメッセージ
        $errors[] = 'メールアドレスまたはパスワードが違います';
    }
}
?>




<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>送信完了ページ</title>
  </head>
  <body>
    <div>
      <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $error): ?>
          <p><?php echo $error; ?></p>
          <a href="../index.php">送信画面へ</a>
          <?php endforeach; ?>
        <?php else: ?>
          <h2>送信完了！！！</h2>
          <a href="../history.php">送信履歴をみる</a><br>
          <a href="../index.php">送信画面へ</a>
      <?php endif; ?>
    </div>
  </body>
</html>
