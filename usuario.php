<?php


class Usuario {

    // Atributos

    public $usuario;

    public $clave;

    public $role;

    //Constructor de Usuario

    public function __construct($usuario, $clave, $role){
        $this -> usuario = $usuario;
        $this -> clave = $clave;
        $this -> role = $role;
    }


    //Getters y Setters

    public function getUsuario(){

        return $this -> usuario;
    }

    public function setUsuario($nuevoUsuario){
        
        $this -> usuario =$nuevoUsuario;
    }

    public function getClave(){

        return $this -> clave;
    }

    public function setClave($nuevaClave){
        
        $this -> usuario =$nuevaClave;
    }

    public function getRole(){

        return $this -> role;
    }

    public function setRole($nuevoRole){
        
        $this -> role =$nuevoRole;
    }


}



?>