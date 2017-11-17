<?php
include_once("config.php");

//$_POST["id_event"] = 2;
$id = $_POST["id"];

$result = mysqli_query($mysqli, "DELETE FROM evento WHERE evento.id = $id;");
$r=[];
$r["msg"] = "OK";

echo json_encode($r);

 ?>
