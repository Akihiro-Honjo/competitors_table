<?php
// var_dump($_POST);
// exit();
include('functions.php');

$pdo = connect_to_db();


$sql = 'SELECT * FROM  competitors_table';

$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
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
  <title>DB連携型todoリスト（一覧画面）</title>
  <link rel="stylesheet" href="style.css">
</head>
<style>
  .post {
    background-color: #e6e6e6;
    border: 1.5px solid #000;
    padding: 20px;
    margin-bottom: 10px;
    border-radius: 10px;
    width: auto;
}
.a {
  text-decoration: none;
}

</style>

<body>
<fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="index_input.php">入力画面</a>
    <div class="post">
        <?= $output ?>
    </div>
  </fieldset>
<script>
   
    let postList = <?= json_encode($result) ?>;

        function renderPosts(posts) {
        return posts.map(function(post) {
            return `
                <div class='post'>
                    <p>他社名：${post.competitors}</p>
                    <p>商品名：${post.product}</p>
                    <p>他社売価：${post.t_price}</p>
                    <p>自社原価：${post.cost}</p>
                    <button><a href='index_edit.php?id=${post.id}'>編集</a></button>
                    <button onclick="return deleteCheck('${post.id}')"><a href='index_delete.php?id=${post.id}'>削除</a></button>
                </div>
            `;
        }).join('');
    }
    function deleteCheck() {
   var ret=confirm("本当に削除しますか？");
   if(!ret);
   return ret;
}

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.post').innerHTML = renderPosts(postList);
    });
</script>


</body>

</html>