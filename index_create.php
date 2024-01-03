<?php

// var_dump($_POST);
// exit();

include('functions.php');
$pdo = connect_to_db();



if (
  !isset($_POST['competitors']) || $_POST['competitors'] === '' ||
  !isset($_POST['product']) || $_POST['product'] === '' ||
  !isset($_POST['t_price']) || $_POST['t_price'] === '' ||
  !isset($_POST['cost']) || $_POST['cost'] === ''
) {
  exit('paramError');
}


$competitors = $_POST['competitors'];
$product = $_POST['product'];
$t_price = $_POST['t_price'];
$cost = $_POST['cost'];

$sql = 'INSERT INTO competitors_table (id, competitors, product, t_price, cost) VALUES(NULL, :competitors, :product, :t_price ,:cost )';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':competitors', $competitors, PDO::PARAM_STR);
$stmt->bindValue(':product', $product, PDO::PARAM_STR);
$stmt->bindValue(':t_price', $t_price, PDO::PARAM_STR);
$stmt->bindValue(':cost', $cost, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:index_input.php");
exit();