<?php
include_once("config.php");

$_POST["id_event"] = 2;
$id = $_POST["id_event"];

$result = mysqli_query($mysqli, "DELETE FROM evento WHERE evento.id = $id;");

 ?>
