<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>会員登録</title>
    </head>


    <h1 style="text-align:center;margin-top: 2em;margin-bottom: 1em;" class="h1_log">会員登録</h1>
<form action="/user/signup_complete.php" method="post" class="form_log">
     <input type="username" name="username" class="textbox un" placeholder="User Name"><br>
     <input type="email" name="email" class="textbox un" placeholder="Email"><br>
     <input type="password" name="password" class="textbox pass" placeholder="Password"><br>
     <input type="password" name="password_check" class="textbox pass" placeholder="Password確認"><br>
     <button type="submit" class="log_button">アカウント作成</button> 
</form>
    <p><a href="/user/signin.php">ログイン画面へ</a></p>
    
    
    <?php if (!empty($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p><?php echo $error . "\n"; ?></p> 
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['errors2'])): ?>
        <?php foreach ($_SESSION['errors2'] as $error2): ?>
            <p><?php echo $error2 . "\n"; ?></p> 
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['errors3'])): ?>
        <?php foreach ($_SESSION['errors3'] as $error3): ?>
            <p><?php echo $error3 . "\n"; ?></p> 
        <?php endforeach; ?>
    <?php endif; ?>

    <?php unset($_SESSION); ?>


</html>