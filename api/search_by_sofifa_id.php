<?php

require __DIR__."/config.php";

if(!isset($_POST['sofifa_id'])){
    die("sofifa_id isn't set!");
}

if(empty($_POST['sofifa_id'])) {
    die("sofifa_id can't be empty string!");
}


$sofifa_id = $_POST['sofifa_id'];

$sql = "SELECT * FROM `Players` WHERE sofifa_id = $sofifa_id";
$res = $conn->query($sql);
$json = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($json);
