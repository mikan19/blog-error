<?php

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>メモ更新</title>
    </head>

    <font size="5">編集</font><br />
    <body>
        <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>" >
            title<br />
            <input type="text" name="title" style="width:200px;height:50px;" value="" /><br />
            本文<br />
            <input type="text" name="content" style="width:200px;height:100px;" value=""/><br />
     
            <input type="submit" value="更新" />

        </form>
    </body>

</html>