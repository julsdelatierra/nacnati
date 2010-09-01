<?php
    if($_POST){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $pais = $_POST['pais'];
        if($_POST['estado']){
            $estado = $_POST['estado'];
        }
        else{
            $estado = NULL;
        }
        $comentario = $_POST['comentario'];
        echo $nombre;
        echo $correo;
        echo $pais;
        echo $estado;
        echo $comentario;
        require_once('lib/recaptchalib.php');
        $private_key = '6LemkLwSAAAAAHOXuLgiVPrsVVXg8jqk2JZ8yMy3';
        $catpchaResponse = recaptcha_check_answer($private_key,
                                                  $_SERVER['REMOTE_ADDR'],
                                                  $_POST['recaptcha_challenge_field'],
                                                  $_POST['recaptcha_response_field']);
        if($catpchaResponse->is_valid){
            echo $nombre;
            echo $correo;
            echo $pais;
            echo $estado;
            echo $comentario;
            include('./lib/connection.php');
            $conexion = mysql_connect($hostname,$username,$password);
            mysql_select_db($database);
            $query = mysql_query("insert into opiniones(nombre,correo,pais,estado,comentario)
                        values('$nombre','$correo','$pais','$estado','$comentario');",$conexion);
            mysql_close($conexion);
        }
        else{
            die('El captcha fue introducido incorrectamente');
        }
    }
?>