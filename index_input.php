<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>
<style>
  /* モーダルの基本スタイル */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  padding-top: 60px;
}

.modal-content {
  background-color: #fefefe;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>

<body>

 <!-- モーダルを開くためのボタン -->
 <button id="openModal">投稿する</button>
 <button><a href="index_read.php">一覧を見る</a></button>


<!-- モーダルウィンドウ -->
<div id="modal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>

  <form action="index_create.php" method="POST">
    <fieldset>
      <legend>他社情報入力画面</legend>
      
      <div>
      competitors:<select name="competitors">
                   <option value=""></option>
                   <option value="A">A社</option>
                   <option value="B">B社</option>
                   <option value="C">C社</option>
                   <option value="D">D社</option>
                   <option value="E">E社</option>
                   </select>
      </div>
      <div>
      product: <select name="product">
                   <option value=""></option>
                   <option value="abc">abc</option>
                   <option value="def">def</option>
                   <option value="ghi">ghi</option>
                   </select>
      </div>
      <div>
      t_price: <input type="number" name="t_price">
      </div>
      <div>
      cost: <input type="number" name="cost">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
// モーダルの状態を管理するJSONオブジェクト
var modalState = {
  isOpen: false
};

// モーダルを開く
document.getElementById('openModal').onclick = function() {
  modalState.isOpen = true;
  updateModalDisplay();
}

// モーダルを閉じる
document.getElementById('closeModal').onclick = function() {
  modalState.isOpen = false;
  updateModalDisplay();
}

// 他の場所をクリックしたとき
window.onclick = function(event) {
  if (event.target == document.getElementById('modal')) {
    modalState.isOpen = false;
    updateModalDisplay();
  }
}

// モーダルの表示を更新する関数
function updateModalDisplay() {
  document.getElementById('modal').style.display = modalState.isOpen ? 'block' : 'none';
}

</script>

</body>

</html>