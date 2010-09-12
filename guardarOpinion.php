<?php
    if($_POST){
        $nombre = utf8_decode($_POST['nombre']);
        $correo = $_POST['correo'];
        $pais = utf8_decode($_POST['pais']);
        if($_POST['estado']){
            $estado = utf8_decode($_POST['estado']);
        }
        else{
            $estado = NULL;
        }
        $comentario = utf8_decode($_POST['comentario']);
        require_once('lib/recaptchalib.php');
        $private_key = '6LemkLwSAAAAAHOXuLgiVPrsVVXg8jqk2JZ8yMy3';
        $catpchaResponse = recaptcha_check_answer($private_key,
                                                  $_SERVER['REMOTE_ADDR'],
                                                  $_POST['recaptcha_challenge_field'],
                                                  $_POST['recaptcha_response_field']);
        if($catpchaResponse->is_valid){
            include('./lib/connection.php');
            $conexion = mysql_connect($hostname,$username,$password);
            mysql_select_db($database);
            $query = "insert into opiniones(nombre,correo,pais,estado,comentario)
                        values('$nombre','$correo','$pais','$estado','$comentario');";
            echo $query;
            $query = mysql_query($query,$conexion);
            mysql_close($conexion);
        }
        else{
            die('El captcha fue introducido incorrectamente');
        }
    }
?>