<?php
//DB接続
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=memo; charset=utf8',
  $dbUserName, 
  $dbPassword
);

//pagesテーブル取得
$stmt =" SELECT
    *
FROM pages";

$statement = $pdo->prepare($stmt);
$statement->execute();
$pages = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>メモ一覧</title>
    </head>
    
    <form action="http://localhost:8080/index.php" method="get">
    <input type="search" name="search" style="width:250px;" placeholder="検索キーワードを入力してください" >
    <input type="submit" name="submit" value="検索" >
    </form>
    
    <font size="5">メモ一覧</font><br />

    <body>

    <div>
      <a href="create.php">メモを追加</a>
    </div>
    
    <div class="background right">
     <form action="index.php" method="POST">
        <input type="submit" name="昇順" value="新しい順">
        <input type="submit" name="降順" value="古い順">
     </form>

      <?php if("新しい順" === $_POST['昇順']){ ?>
      <?php array_multisort(array_column($pages,'created_at'),SORT_ASC, $pages);}?>
      <?php if("古い順" === $_POST['降順']){ ?>
      <?php array_multisort(array_column($pages,'created_at'),SORT_DESC, $pages);}?>
    </div>   

      <table border="1" width="800" bgcolor= #EEEEEE>
       <tr>
         <th>タイトル</th>
         <th>内容</th>
         <th>作成日時</th>
         <th>編集</th>
         <th>削除</th>
       </tr>

      <?php foreach ($pages as $page): ?> 
       <tr>       
         <td><?php echo $page['title']. "\n"; ?></td>
         <td><?php echo $page['content']. "\n"; ?></td>
         <td><?php echo $page['created_at']. "\n"; ?></td>
         <td><a style="text-align: right" href="edit.php?id=<?php echo $page['id']; ?>">編集</a></td>
         <td><a style="text-align: right" href="delete.php?id=<?php echo $page['id']; ?>">削除</a></td>
       </tr>
      <?php endforeach; ?>
      </table>

    </body>

</html>