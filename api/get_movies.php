<?php include_once "../base.php";

$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));
$movies=$Movie->all(" where `sh`=1 && `ondate` BETWEEN '$ondate' AND '$today'");

foreach ($movies as $key => $movie) {
    $selected=($_GET['id']==$movie['id'])?"selected":"";
    echo "<option value='{$movie['id']}' $selected>";
    echo $movie['name'];
    echo "</option>";
}