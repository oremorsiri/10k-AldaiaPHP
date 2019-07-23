<?php
namespace Geeks\model;
use Geeks\model\DB as DB;

class Usuario extends DB
{
    private $id;
    private $email;
    private $pass;
    private $role;

    public function __construct($email=null,$pass=null){
        $this->setEmail($email);
        $this->setPass($pass);
    }

    public function nuevoUsuario(){
        $this->conectar();
        return $this->consulta("INSERT INTO usuario (email, pass, role) VALUES (:email, :pass, :role)",[":email"=>$this->email,":pass"=>$this->pass,":role"=>"USER"]);
    }
    public function comprobarUsuario(){
        $this->conectar();
        $resultado=$this->consulta("SELECT id,role FROM usuario WHERE email = :email AND pass = :pass",[":email"=>$this->email,":pass"=>$this->pass]);
        if($resultado==true){
            $usuario = $this->resultado->fetch();
            if($usuario==false){
                return false;
            }else{
                $this->setId($usuario["id"]);
                $this->setRole($usuario["role"]);
                return true;
            }
        }else{
            return "Error en la consulta";
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}