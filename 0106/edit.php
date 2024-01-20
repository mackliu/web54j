<?php 
$dsn="mysql:host=localhost;charset=utf8;dbname=ticket";
$pdo=new PDO($dsn ,'root','');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $row=$pdo->query("select * from records where id='$id'")->fetch(PDO::FETCH_ASSOC);
}

if(!empty($_POST)){
    $sql="update records set firstname='{$_POST['firstname']}',
                             lastname='{$_POST['lastname']}',
                             ordertime='{$_POST['ordertime']}',
                             num='{$_POST['num']}',
                             price='{$_POST['price']}' where id='{$_POST['id']}'";
   $pdo->exec($sql);
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
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="確認編輯">
        <input type="reset" value="清空重置">
    </div>
</form>