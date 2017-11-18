<?php
include_once("config.php");

    $id = $_POST["id"];

    $result = mysqli_query($mysqli, "DELETE FROM evento WHERE evento.id = $id;");


    if($result){
        $r=[];
        $r["msg"] = "OK";
        echo json_encode($r);
    }else
    {
        $r=[];
        $r["msg"] = "error";
        $r["error"] =mysqli_error($mysqli);

        echo json_encode($r);
    }

 ?>
