<?php 
//建立pdo連線
$dsn="mysql:host=localhost;charset=utf8;dbname=ticket";
$pdo=new PDO($dsn ,'root','');

//判斷$_GET是否有資料，有的話就執行取得指定id資料的動作，沒有的話就代表沒有表單送出
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $row=$pdo->query("select * from records where id='$id'")->fetch(PDO::FETCH_ASSOC);
}

//判斷$_POST是否有資料，有的話就執行編輯指定id資料的動作，沒有的話就代表沒有表單送出
if(!empty($_POST)){
    //建立編輯資料的SQL語法
    $sql="update records set firstname='{$_POST['firstname']}',
                             lastname='{$_POST['lastname']}',
                             ordertime='{$_POST['ordertime']}',
                             num='{$_POST['num']}',
                             price='{$_POST['price']}' where id='{$_POST['id']}'";
   
    //使用變數$pdo->exec()執行編輯語法
    $pdo->exec($sql);

   //編輯完成後，導回db.php
   header("location:db.php");
}



?>
<h1>編輯資料</h1>
<form action="?" method="post">
    <div>
        <label for="firstname">姓:</label>
        <!--input標籤中的name屬性必需填寫，$_POST或$_GET中才會有對應的key值-->
        <input type="text" name="firstname" value="<?=$row['firstname'];?>">
    </div>
    <div>
        <label for="lastname">名:</label>
        <input type="text" name="lastname" value="<?=$row['lastname'];?>">
    </div>
    <div>
        <label for="ordertime">訂票時間:</label>
        <input type="text" name="ordertime" value="<?=$row['ordertime'];?>">
    </div>
    <div>
        <label for="num">張數:</label>
        <input type="text" name="num" value="<?=$row['num'];?>">
    </div>
    <div>
        <label for="price">總價:</label>
        <input type="text" name="price" value="<?=$row['price'];?>">
    </div>
    <!-- div>input:submit+input:reset -->
    <div>
        <!--建立一個隱藏的資料欄位，value值為網址傳來的id-->
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="確認編輯">
        <input type="reset" value="清空重置">
    </div>
</form>