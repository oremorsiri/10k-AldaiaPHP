<?php
namespace Geeks\controller;
use Geeks\model\Usuario as Usuario;

class Autenticacion{
    private $salt = "StringAModificarParaHacerSeguro";
    private $u;

    function __construct (){
        session_start();
        if(!isset($_SESSION["id"])&&(basename($_SERVER["REQUEST_URI"])!="index.php")) header('Location: index.php');
    }

    public function checkLogin($user=null,$pass=null){
        $error=null;
        if($user==null||!isset($user)||strlen($user)==0){
            $error="No se ha introducido el usuario";
        }elseif($pass==null||!isset($pass)||strlen($pass)==0){
            $error="No se ha introducido el password";
        }else{
            $error=$this->registrarDB($datos["email"],$datos["passwordField"]);
            if($error==true) $error=null;
        }
        return $error;
    }


    public function logar($datos=null){
        $error=null;
        if(!isset($datos["email"])||!isset($datos["passwordField"])){
            $error="No se ha introducido algún campo en el logado";
        }elseif($datos["email"]==null||strlen($datos["email"])==0){
            $error="No se ha introducido el email";
        }elseif($datos["passwordField"]==null||strlen($datos["passwordField"])==0){
            $error="No se ha introducido el password";
        }else{
                $resultado=$this->comprobarUsuario($datos["email"],$datos["passwordField"]);
                if($resultado==false){
                    return "El usuario no existe";
                }else{
                    $_SESSION["id"]=$this->u->getId();
                    $_SESSION["role"]=$this->u->getRole();
                    header('Location: reto1.php');
                    return null;
                }
        }
        return $error;
    }

    private function registrarDB($user=null,$pass=null){
        //Creamos el usuario
        $u=new Usuario($user,crypt($pass,$this->salt));
        //Registramos en la base de datos
        return $u->nuevoUsuario();
    }

    private function comprobarUsuario($user=null,$pass=null){
            //Creamos el usuario
            $u=new Usuario($user,crypt($pass,$this->salt));
            $this->u=$u;
            //Registramos en la base de datos
            return $this->u->comprobarUsuario();

    }

}