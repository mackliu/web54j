<link rel="stylesheet" href="./bootstrap.css">
<h1>連線資料庫</h1>
<?php
//建立mysql連線設定
$dsn="mysql:host=localhost;charset=utf8;dbname=ticket";
//建立PDO物件
$pdo=new PDO($dsn,'root','');

//判斷$_POST是否有資料，有的話就執行新增的動作，沒有的話就代表沒有表單送出
if(!empty($_POST)){
    //建立新增資料的SQL語法
    /**SQL語法撰寫順序建議
     * 1.先寫新增語法格式
     * insert into `資料表` () values()
     * 2.再寫欄位名稱，並用``包起來
     * insert into `資料表` (`欄位1`,`欄位2`,`欄位3`,`欄位4`,`欄位5`) values('','','','','')
     * 3.最後寫入要新增的值，並用''包起來
     * insert into `資料表` (`欄位1`,`欄位2`,`欄位3`,`欄位4`,`欄位5`) values('值1','值2','值3','值4','值5')
     */
    $sql="insert into `records` (`firstname`,`lastname`,`ordertime`,`num`,`price`) 
                          values('{$_POST['firstname']}',
                                 '{$_POST['lastname']}',
                                 '{$_POST['ordertime']}',
                                 '{$_POST['num']}',
                                 '{$_POST['price']}')";

    //使用變數$pdo->exec()執行新增語法
    $pdo->exec($sql);
}

?>
<h1>新增資料(insert)</h1>
<!--emmet快速語法 form:post>div*5>input:text -->
<!--action 使用?代表將表單資料傳送到本頁，
    如果action中是其他檔名，代表將表單資料傳送到其他檔案-->
<form action="?" method="post">
    <div>
        <label for="firstname">姓:</label>
        <!--input標籤中的name屬性必需填寫，$_POST或$_GET中才會有對應的key值-->
        <input type="text" name="firstname" id="">
    </div>
    <div>
        <label for="lastname">名:</label>
        <input type="text" name="lastname" id="">
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
        <input type="submit" value="確認送出">
        <input type="reset" value="清空重置">
    </div>
</form>
<style>
    table{
        text-align: center;/* table中的文字都置中對齊 */
        border-collapse:collapse;/* 設定表格中的框線 */
    }
    td{
        padding:5px 10px; /* 設定表格內的內距 */
        border:1px solid black;/* 設定表格中的框線顏色 */
    }
</style>
<h1>資料清單(select)</h1>
<!--emmet快速語法，用來產生2x5表格 table>tr*2>td*5 -->
<table>
    <tr>
        <td>姓</td>
        <td>名</td>
        <td>時間</td>
        <td>張數</td>
        <td>總價</td>
        <td>操作</td>
    </tr>
    <?php
        //建立查詢資料的SQL語法，並用變數$sql儲存
        $sql="select * from `records` ";

        //使用變數$pdo->query()執行查詢語法，並用變數$rows儲存查詢結果
        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        //使用迴圈來檢視查詢結果
        foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['firstname'];?></td>
        <td><?=$row['lastname'];?></td>
        <td><?=$row['ordertime'];?></td>
        <td><?=$row['num'];?></td>
        <td><?=$row['price'];?></td>
        <td>
                <!-- 透過網址傳送id值到edit.php -->
            <a class='btn btn-primary' href="edit.php?id=<?=$row['id'];?>">編輯</a>
                <!-- 透過網址傳送id值到del.php -->
            <a class='btn btn-danger' href='del.php?id=<?=$row['id'];?>'>刪除</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script src="jquery.js"></script>
<script src="bootstrap.js"></script>