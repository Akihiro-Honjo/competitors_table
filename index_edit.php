<?php

// var_dump($_GET);
// exit();

include('functions.php');

// id受け取り
$id = $_GET['id'];
// DB接続
$pdo = connect_to_db();
// SQL実行
$sql = 'SELECT * FROM competitors_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

// var_dump($record);
// exit();


?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head>

<body>
  <form action="index_update.php" method="POST">
    <fieldset>
      <legend>編集画面</legend>
      <a href="index_read.php">一覧画面</a>
      <div>
      competitors:  <input type="text" name="competitors" value="<?= $record['competitors'] ?>">
      </div>
      <div>
      product: <input type="text" name="product" value="<?= $record['product'] ?>">
      </div>
      <div>
      t_price: <input type="text" name="t_price" value="<?= $record['t_price'] ?>">
      </div>
      <div>
      cost: <input type="text" name="cost" value="<?= $record['cost'] ?>">
      </div>
      <div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
