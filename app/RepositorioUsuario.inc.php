<?php

class RepositorioUsuario {

    public static function obtener_usuario_por_id($conexion, $id, $clave) {
        $usuario = null;
        if(isset($conexion)){
            try{
                include_once 'app/Usuario.inc.php';
              $sql = "SELECT * FROM basedatos.usuario WHERE id = :id  AND clave = :clave" ;
              $sentencia = $conexion -> prepare($sql);
              
              $sentencia -> bindParam(':id', $id , PDO::PARAM_STR);
              $sentencia -> bindParam(':clave', $clave , PDO::PARAM_STR);
              $sentencia -> execute();
              $resultado = $sentencia -> fetch();
              
              if(!empty($resultado)){
                  $usuario = new Usuario(
                          $resultado['tipo'],
                          $resultado['nombre'],
                          $resultado['apellido'],
                          $resultado['id'],
                          $resultado['telefono'],
                          $resultado['correoelectronico'],
                          $resultado['clave']);
              }
              
            } catch (PDOException $ex) {
                print 'Error: ' .$ex -> getMessage();
            }
        }
        return $usuario;
    }

}
