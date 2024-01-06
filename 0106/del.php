<?php
// 建立與資料庫的連線
$dsn = "mysql:host=localhost;charset=utf8;dbname=ticket";
// 建立 PDO 物件
$pdo = new PDO($dsn, 'root', '');

// 從 GET 參數中取得要刪除的記錄的 ID
$id = $_GET['id'];

// 建立 SQL 刪除語句
$sql = "delete from `records` where `id`='$id'";

// 執行 SQL 刪除語句
$pdo->exec($sql);

// 重新導向到 db.php 頁面
header("location:db.php");
?>