<?php

class Usuario {

    private $tipo;
    private $nombre;
    private $apellido;
    private $id;
    private $telefono;
    private $correoelectronico;
    private $clave;
    
    public function __construct ($tipo, $nombre, $apellido,$id, $telefono, $correoelectronico, $clave){
    
        $this -> tipo = $tipo;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> id = $id;
        $this -> telefono = $telefono;
        $this -> correo = $correoelectronico;
        $this -> descripcion = $clave;
    }
    
    function getTipo() {
        return $this->tipo;
    }

        function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getId() {
        return $this->id;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreoelectronico() {
        return $this->correoelectronico;
    }

    function getClave() {
        return $this->clave;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

        
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreoelectronico($correoelectronico) {
        $this->correoelectronico = $correoelectronico;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }


}
