<?php
require __DIR__."/config.php";

if(!isset($_POST['nationality'])){
    die("nationality isn't set!");
}

if(!isset($_POST['club'])){
    die("club isn't set!");
}

if(!isset($_POST['overall'])){
    die("overall isn't set!");
}

if(!isset($_POST['age'])){
    die("age isn't set!");
}

$indexCols = [];

if(!empty($_POST['nationality'])) {
    $indexCols['nationality'] = $_POST['nationality'];
}

if(!empty($_POST['club'])) {
    $indexCols['club'] = $_POST['club'];
}

if(!empty($_POST['overall'])) {
    $indexCols['overall'] = $_POST['overall'];
}

if(!empty($_POST['age'])) {
    $indexCols['age'] = $_POST['age'];
}

$where = [];

foreach($indexCols as $key => $col) {
    if(is_numeric($col)) {
        $where[] = "$key = $col";
    } else {
        $where[] = "$key = '$col'";
    }
}

$where = implode(' AND ', $where);

$sql = "SELECT * FROM `Players` WHERE $where";
$res = $conn->query($sql);
$json = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($json);

