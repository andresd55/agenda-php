<?php
include_once("config.php");
include_once("encript.php");

    for($i=20; $i < 23; $i++){
        $email = mysqli_real_escape_string($mysqli, "user".$i."@domain.com");
        $nombre = mysqli_real_escape_string($mysqli, "user".$i);
        $apellido = mysqli_real_escape_string($mysqli, "lastname".$i);
        $hashed_password = $_POST['pass'] = encrypt_decrypt("encrypt",'user'.$i."123");
        $password = mysqli_real_escape_string($mysqli, $hashed_password);

        $datetime = "01/02/2017" . ' ' . "05:00";
        $datetime = mysqli_real_escape_string($mysqli,$datetime);
        $datetime = strtotime($datetime);
        $datetime = date('Y-m-d H:i:s',$datetime);
        $result = mysqli_query($mysqli, "INSERT INTO usuario(correo,nombre,apellido,password,fecha_nacimiento) VALUES('$email','$nombre','$apellido','$password','$datetime');");
    }
    if($result){
        echo "usuarios creados correctamente";
    }else
    {
        $r=[];
        $r["msg"] = "error";
        $r["error"] =mysqli_error($mysqli);

        echo json_encode($r);
    }

 ?>
