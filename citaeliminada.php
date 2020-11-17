<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioPaciente.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/ControlSesion.inc.php';

if (ControlSesion :: sesion_iniciada()){
    
}else {
    Redireccion::redirigir(RUTA_LOGIN);
}

$titulo = '¡Cita Eliminado!';

include_once 'plantillas/documento-declaracion.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true">
                        CITA ELIMINADA
                    </span>
                </div>
                <div class="panel-body text-center">
                    <p>¡Cita Eliminada Correctamente! </p>
                    <br>
                    <p><a href="<?php echo RUTA_INICIO ?>">Ir a Inicio </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>