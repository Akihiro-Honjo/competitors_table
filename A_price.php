<?php
include('functions.php');
$pdo = connect_to_db();

// A社abc商品の平均価格、最安値、最高値を取得
$sql = "SELECT AVG(t_price) AS average_price, MIN(t_price) AS min_price, MAX(t_price) AS max_price FROM competitors_table WHERE competitors = 'A' AND product = 'abc'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// var_dump($result);
// exit();

// フォームから原価を受け取り利益率を計算
$profit_margin = 0; // 初期値
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['cost'])) {
    $cost = $_POST['cost'];
    $profit_margin = (($result['average_price'] - $cost) / $result['average_price']) * 100;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>A社abc商品のデータ分析</title>
</head>
<body>
    <header>
        <a href="index_input.php">トップページ</a>
        <a href="index_read.php">一覧に戻る</a>
    </header>
  <h3>A社abc商品のデータ分析</h3>
  <p>平均価格: <?= ($result['average_price']) ?>円</p>
  <p>最安値: <?= ($result['min_price']) ?>円</p>
  <p>最高値: <?= ($result['max_price']) ?>円</p>

  <p>平均価格からの粗利率計算</p>
  <!-- フォーム -->
  <form method="post">
    <label for="cost">自社原価:</label>
    <input type="text" id="cost" name="cost" required>
    <input type="submit" value="計算">
  </form>

  <!-- 利益率の表示 -->
  <?php if ($profit_margin > 0): ?>
    <p>利益率: <?= (number_format($profit_margin, 2)) ?>%</p>
  <?php endif; ?>
</body>
</html>

