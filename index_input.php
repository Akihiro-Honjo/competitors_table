<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>

  <form action="index_create.php" method="POST">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>
      <a href="index_read.php">一覧画面</a>
      <div>
      competitors: <input type="text" name="competitors">
      </div>
      <div>
      product: <input type="text" name="product">
      </div>
      <div>
      t_price: <input type="text" name="t_price">
      </div>
      <div>
      cost: <input type="text" name="cost">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>


</body>

</html>