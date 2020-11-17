<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Cita.inc.php';
include_once 'app/RepositorioPaciente.inc.php';
include_once 'app/RepositorioCita.inc.php';
//include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/ValidadorCita.inc.php';
include_once 'app/Redireccion.inc.php';


include_once 'app/ControlSesion.inc.php';




if (ControlSesion :: sesion_iniciada()){
    
}else {
    Redireccion::redirigir(RUTA_LOGIN);
}


if (isset($_POST ['enviar2'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorCita(
            $_POST['fecha'], $_POST['ncita'], $_POST['id_paciente'], htmlspecialchars($_POST['valoracion']), Conexion :: obtener_conexion());


    if ($validador->agendar_valido()) {
        $cita = new Cita(
                $validador->getFecha(), $validador->getNcita(), $validador->getId_paciente(), $validador->getValoracion());
        $paciente = RepositorioPaciente :: obtener_paciente_por_id(Conexion::obtener_conexion(), $validador->getId_paciente());
        $cita_agendada = RepositorioCita ::agendarcita(Conexion :: obtener_conexion(), $cita);

        if ($cita_agendada) {
            $correo_enviado = RepositorioPaciente :: enviarcorreo($paciente -> getCorreo(),'Cita Asignada Correctamente','Usted Tiene una cita asignada, no olvide asistir');
            Redireccion::redirigir(RUTA_CITA_AGENDADA_CORRECTAMENTE);
        }
    }
    Conexion :: cerrar_conexion();
}

$titulo = 'AGENDAR CITA';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 

<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">AGENDAR CITA</h1>
    </div>
</div>

<div class =" container">
    <div class="row">
        <div class=" col-md-3">
           
        </div>
        <div class=" col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        AGENDA LA CITA.
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER ['PHP_SELF'] ?>">

                        <?php
                        if (isset($_POST['enviar2'])) {
                            include_once 'plantillas/agendarvalidado.inc.php';
                        } else {
                            include_once 'plantillas/agendarvacio.inc.php';
                        }
                        ?>    



                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>