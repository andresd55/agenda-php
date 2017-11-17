<?php
include_once("config.php");
session_start();
$_POST['correo'] = $_SESSION["usuario"];

$correo = $_POST['correo'];
$result = mysqli_query($mysqli, "SELECT evento.* FROM usuario INNER JOIN evento ON evento.usuario = usuario.correo where usuario.correo='$correo'");
//while($res = mysqli_fetch_array($result)) {
//    echo json_encode($res['correo']);
//}
//$result = mysqli_fetch_array($result);
$r = [];

while($res = mysqli_fetch_array($result)) {
    $evento = [
        "title" => $res["titulo"],
        "start" => substr($res["fecha_inicio"],0,10),
        "end" => substr($res["fecha_fin"],0,10),
    ];
    array_push($r, $evento);
}
$r["eventos"] = json_encode($r);

if(count($r) == 0){
    $r["msg"] = "usuario o contraseña incorrecto";
}
else{
    $r["msg"] = "OK";
}
echo json_encode($r);

 ?>
