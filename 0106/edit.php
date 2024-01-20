<?php 
$dsn="mysql:host=localhost;charset=utf8;dbname=ticket";
$pdo=new PDO($dsn ,'root','');

$id=$_GET['id'];
$row=$pdo->query("select * from records where id='$id'")->fetch(PDO::FETCH_ASSOC);


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
        <input type="text" name="ordertime" id="">
    </div>
    <div>
        <label for="num">張數:</label>
        <input type="text" name="num" id="">
    </div>
    <div>
        <label for="price">總價:</label>
        <input type="text" name="price" id="">
    </div>
    <!-- div>input:submit+input:reset -->
    <div>
        <input type="submit" value="確認編輯">
        <input type="reset" value="清空重置">
    </div>
</form>