<?php 

$name="mary";
$age=20;

echo "我家的" . $name;
echo "<br>";
echo $age + 3;
?>
<h1>判斷式</h1>
<?php
$score=50;
echo "你的成績為:".$score . "<br>";
if($score>=60){
    echo "你及格了!";
}else{
    echo "你不及格!";
}

?>
<h1>迴圈(loop)</h1>
<?php
for($i=0;$i<10;$i=$i+1){
    echo "<span style='color:red'>";
    echo "我是第".($i*10)."號的學生";
    echo "</span>";
    echo "<br>";
}

?>
<h1>switch...case</h1>
<?php
$level="C";
echo "你的等級是".$level;
echo "<br>";
switch($level){
    case "A":
        echo "你很棒";
    break;
    case "B":
        echo "表現不錯,繼續加油";
    break;
    case "C":
        echo "需要更努力";
    break;
}
?>
<h1>foreach</h1>
<?php
$array=[1,10,23,66,88,24,20,54,29,13,23.232];
foreach($array as $key => $item){
    echo "陣列中第".$key."的值是".$item."<br>";    
}

?>
