<?php
require_once("models/contacto.php");
class contacto_controller
{
    public static function crear()
    {
        if(isset($_SESSION["usuario"])){
            $titulo = "Creacion de comentario de Contacto";
        require_once("views/template/header.php");
        require_once("views/template/navbar.php");
        require_once("views/contacto/crear.php");
        require_once("views/template/footer.php");

        }else{
            header("location:index.php?c=".seg::codificar("principal")."&m=".seg::codificar("error"));
        }
        
    }

    public static function mostrar()
    {
        if ($_POST) {

            if(!isset($_POST["token"]) || !seg::validasession($_POST["token"])){
                echo "acceso restringido";
                exit();
            }

            empty($_POST["txtnombre_contacto"]) ? $error[0] = "El nombre de contacto es necesario" : $nombre = $_POST["txtnombre_contacto"];
            empty($_POST["txtcorreo_contacto"]) ? $error[1] = "El correo de contacto es necesario" : $correo = $_POST["txtcorreo_contacto"];
            empty($_POST["txtcomentario_contacto"]) ? $error[2] = "El comentario de contacto es necesario" : $comentario = $_POST["txtcomentario_contacto"];
           
            if (isset($error)) {
                $titulo = "Creacion de comentario de Contacto";
                require_once("views/template/header.php");
                require_once("views/template/navbar.php");
                require_once("views/contacto/crear.php");
                require_once("views/template/footer.php");
            } else {
                $nombre=filter_var($nombre,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $correo=filter_var($correo,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $comentario=filter_var($comentario,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $contacto = new contacto($nombre, $correo, $comentario);
                $resultados = $contacto->getdatos();
                $titulo = "Mostrar datos de Contacto";
                require_once("views/template/header.php");
                require_once("views/template/navbar.php");
                require_once("views/contacto/mostrar.php");
                require_once("views/template/footer.php");
            }
        }
    }
}
