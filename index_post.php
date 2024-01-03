<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal"></div>
<div class="post_process">
  <h2 class="post_title">投稿</h2>
  <form method="post" action="../post/post_add_done.php" enctype="multipart/form-data">
  <textarea class="textarea form-control" placeholder="投稿内容を入力ください" name="text"></textarea>
  <div class="post_btn">
  <button class="btn btn-outline-danger" type="submit" name="post" value="post" id="post">投稿</button>
  <button class="btn btn-outline-primary modal_close" type="button">キャンセル</button>
  </div>
  </form>
</div>
</body>
</html>