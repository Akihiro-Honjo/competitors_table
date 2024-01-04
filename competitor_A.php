<?php
include('functions.php');

$pdo = connect_to_db();

$sql = "SELECT * FROM competitors_table WHERE competitors = 'A'";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A社のデータ</title>
</head>
<body>
<fieldset>
    <legend>A社のデータ一覧</legend>
    <a href="index_read.php">一覧に戻る</a>
    <a href="A_price.php">A社詳細データ</a>
    <div>
        <?php foreach ($result as $row): ?>
            <div>
                <p>商品名：<?= ($row['product']) ?></p>
                <p>他社売価：<?= ($row['t_price']) ?></p>
                <p>自社原価：<?= ($row['cost']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
  </fieldset>
</body>
</html>
