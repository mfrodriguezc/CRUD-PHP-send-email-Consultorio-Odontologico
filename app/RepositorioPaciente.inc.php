<?php

class RepositorioPaciente {

   
    

    public static function guardarpaciente($conexion, $paciente) {

        $paciente_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO basedatos.paciente(nombre, apellido, id, direccion, telefono, correo, descripcion) "
                        . "VALUES (:nombre, :apellido, :id , :direccion , :telefono, :correo , :descripcion)";

                $nombretemp = $paciente->getNombre();
                $apellidotemp = $paciente->getApellido();
                $idtemp = $paciente->getId();
                $direcciontemp = $paciente->getDireccion();
                $telefonotemp = $paciente->getTelefono();
                $correotemp = $paciente->getCorreo();
                $descripciontemp = $paciente->getDescripcion();



                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido', $apellidotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':id', $idtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direcciontemp, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $telefonotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripciontemp, PDO::PARAM_STR);

                $paciente_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERRORR: ' . $ex->getMessage();
            }
        }
        return $paciente_insertado;
    }

    public static function id_existe($conexion, $id) {
        $id_existe = true;
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM basedatos.paciente WHERE id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    $id_existe = true;
                } else {
                    $id_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR:' . $ex->getMessage();
            }
        }
        return $id_existe;
    }
    
    public static function obtener_numero_pacientes($conexion) {
        $total_pacientes = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total from basedatos.paciente";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                $total_pacientes = $resultado['total'];
            } catch (PDOException $ex) {
                print "Error" . $ex->getMessage();
            }
        }
        return $total_pacientes;
    }

    public static function correo_existe($conexion, $correo) {
        $correo_existe = true;
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM basedatos.paciente WHERE correo = :correo";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    $correo_existe = true;
                } else {
                    $correo_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $correo_existe;
    }

    public static function obtener_pacientes($conexion) {
        $pacientes = [];
        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM basedatos.paciente ORDER BY nombre ASC  ";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $pacientes[] = new Paciente(
                                $fila['nombre'], $fila['apellido'], $fila['id'], $fila['direccion'], $fila['telefono'], $fila['correo'], $fila['descripcion']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR:" . $ex . getMessage();
            }
        }

        return $pacientes;
    }

    public static function obtener_paciente_por_id($conexion, $id) {
        $paciente = null;
        if (isset($conexion)) {
            try {
                include_once 'app/Paciente.inc.php';
                $sql = "SELECT * FROM basedatos.paciente WHERE id = :id ";
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $paciente = new Paciente(
                            $resultado['nombre'], $resultado['apellido'], $resultado['id'], $resultado['direccion'], $resultado['telefono'], $resultado['correo'], $resultado['descripcion']);
                }
            } catch (PDOException $ex) {
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $paciente;
    }

    public static function obtener_paciente_y_citas($conexion) {
        $paciente_citas = [];
        if (isset($conexion)) {
            try {

                $sql = "SELECT nombre, apellido, id, direccion, telefono, correo, descripcion, "
                        . "COUNT(b.ncita) AS 'cantidad_citas' FROM basedatos.paciente a "
                        . "LEFT JOIN basedatos.cita b ON id = b.id_paciente GROUP BY id ORDER BY nombre DESC";

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    include_once 'Paciente.inc.php';
                    foreach ($resultado as $fila) {

                        $paciente_citas[] = array(
                            new Paciente(
                                    $fila['nombre'], $fila['apellido'], $fila['id'], $fila['direccion'], $fila['telefono'], $fila['correo'], $fila['descripcion']
                            ),
                            $fila['cantidad_citas']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $paciente_citas;
    }

    public static function eliminar_paciente($conexion, $id) {
        $paciente_eliminado = false;
        if (isset($conexion)) {

            try {
                include_once 'Paciente.inc.php';
                include_once 'Cita.inc.php';



                $sql = " DELETE FROM basedatos.cita WHERE id_paciente=:id";


                $sentencia = $conexion->prepare($sql);



                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);


                $paciente_eliminado = $sentencia->execute();


                $sql = " DELETE FROM basedatos.paciente WHERE id=:id";
                $sentencia = $conexion->prepare($sql);



                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);


                $paciente_eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR:' . $ex->getMessage();
            }
        }

        return $paciente_eliminado;
    }

    public static function actualizar_paciente($conexion, $id, $nombre, $apellido
    , $direccion, $telefono, $correo, $descripcion) {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE basedatos.paciente SET nombre = :nombre ,"
                        . "apellido = :apellido, id = :id, direccion = :direccion,"
                        . "telefono = :telefono, correo = :correo, descripcion = :descripcion WHERE id = :id ";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direccion, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);


                $actualizacion_correcta = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
        }

        return $actualizacion_correcta;
    }

    public function enviarcorreo($destinatario, $titulo, $cuerpo) {

        include_once 'PHPMailer-master/src/PHPMailer.php';
        include_once 'PHPMailer-master/src/SMTP.php';

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';

        //$body = 'Cuerpo del correo de prueba';

        $mail->IsSMTP();
        $mail->Host = 'smtp.live.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Username = 'sigeodont@hotmail.com';
        $mail->Password = 'CLAVECORREO'; // Se debe introducir la clave del correo de arriba o cambiar el correo
        $mail->SetFrom('sigeodont@hotmail.com', "SIGEODONT");
        $mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
        $mail->Subject = $titulo;
        $mail->MsgHTML($cuerpo);

        $mail->AddAddress($destinatario, 'PACIENTE SIGEODONT');
        $mail->send();
    }

}
