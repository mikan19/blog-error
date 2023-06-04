<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ログイン</title>
    </head>


    <h1 style="text-align:center;margin-top: 2em;margin-bottom: 1em;" class="h1_log">ログイン</h1>
<form action="/user/signin_complete.php" method="post" class="form_log">
     <input type="email" name="email" class="textbox un" placeholder="Email"><br>
     <input type="password" name="password" class="textbox pass" placeholder="Password"><br>
     <button type="submit" class="log_button">ログイン</button> 
</form>
    <p><a href="/user/signup.php">アカウントを作る</a></p>
    
    
    <?php if (!empty($_SESSION['errors_signin'])): ?>
        <?php foreach ($_SESSION['errors_signin'] as $error_signin): ?>
            <p><?php echo $error_signin . "\n"; ?></p> 
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['errors2_signin'])): ?>
        <?php foreach ($_SESSION['errors2_signin'] as $error2_signin): ?>
            <p><?php echo $error2_signin . "\n"; ?></p> 
        <?php endforeach; ?>
    <?php endif; ?>

    <?php unset($_SESSION); ?>


</html>