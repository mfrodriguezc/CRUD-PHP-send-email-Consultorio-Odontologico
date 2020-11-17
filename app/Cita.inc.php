<?php
 class Cita{
     
     private $fecha;
     private $ncita;
     private $id_paciente;
     private $valoracion;
     
     public function __construct ($fecha , $ncita, $id_paciente , $valoracion){
         
         $this -> fecha = $fecha;
         $this -> ncita = $ncita;
         $this -> id_paciente = $id_paciente;
         $this -> valoracion = $valoracion;
         
     }
     
     function getFecha() {
         return $this->fecha;
     }

     function getNcita() {
         return $this->ncita;
     }

     function getId_paciente() {
         return $this->id_paciente;
     }

     function getValoracion() {
         return $this->valoracion;
     }

     function setFecha($fecha) {
         $this->fecha = $fecha;
     }

     function setNcita($ncita) {
         $this->ncita = $ncita;
     }

     function setId_paciente($id_paciente) {
         $this->id_paciente = $id_paciente;
     }

     function setValoracion($valoracion) {
         $this->valoracion = $valoracion;
     }


     
 }