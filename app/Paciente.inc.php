<?php

class Paciente{
    
    private $nombre;
    private $apellido;
    private $id;
    private $direccion;
    private $telefono;
    private $correo;
    private $descripcion;
    
    public function __construct ($nombre, $apellido,$id, $direccion, $telefono, $correo, $descripcion){
    
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> id = $id;
        $this -> direccion = $direccion;
        $this -> telefono = $telefono;
        $this -> correo = $correo;
        $this -> descripcion = $descripcion;
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

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreo() {
        return $this->correo;
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

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }
    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }





}