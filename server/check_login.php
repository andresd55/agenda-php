<?php
session_start();
include_once("config.php");
include_once("encript.php");

//$_POST['correo'] = "andresd55@hotmail.com";
//$_POST['pass'] = "123";

//$_POST['correo'] = "user20@domain.com";
//$_POST['pass'] = encrypt_decrypt("encrypt","user20123");

$correo = $_POST['username'];
$pass = encrypt_decrypt("encrypt",$_POST['password']);

$result = mysqli_query($mysqli, "select * from usuario where correo = '$correo' and `password` = '$pass'");

$user = mysqli_fetch_array($result);

if(count($user) == 0){
    $user["msg"] = "usuario o contraseña incorrecto";
}
else{
    $_SESSION["usuario"] = $user["correo"];
    $user["msg"] = "OK";
}
echo json_encode($user);

 ?>
