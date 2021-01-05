<?php
require __DIR__."/config.php";

if(!isset($_POST['long_name_regex'])){
    die("long_name_regex isn't set!");
}

if(empty($_POST['long_name_regex'])) {
    die("long_name_regex can't be empty string!");
}

$regex = $_POST['long_name_regex'];
$sql = "SELECT * FROM `Players` WHERE long_name REGEXP '$regex'";

$res = $conn->query($sql);
$json = $res->fetch_all(MYSQLI_ASSOC);

echo json_encode($json);
