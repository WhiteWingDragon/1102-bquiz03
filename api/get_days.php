<?php include_once "../base.php";

$id=$_GET['id'];
$movie=$Movie->find($id);
$ondate=strtotime("+2 days",strtotime($movie['ondate']));
$gap=($ondate-strtotime(date("Y-m-d")))/(60*60*24);

for($i=0;$i<$gap;$i++){
    $dateValue=date("Y-m-d",strtotime("+$i days"));
    $dateStr=date("m月d日 l",strtotime("+$i days"));
    echo "<option value='$dateValue'>";
    echo $dateStr;
    echo "</option>";
}