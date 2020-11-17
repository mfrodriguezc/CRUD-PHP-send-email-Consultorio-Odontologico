<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Cita.inc.php';
include_once 'app/RepositorioPaciente.inc.php';
include_once 'app/RepositorioCita.inc.php';

include_once 'app/ValidadorCita.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/ControlSesion.inc.php';




if (ControlSesion :: sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(RUTA_LOGIN);
}


if (isset($_POST ['consultar'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorCita(
            '', $_POST['ncita'], '', '', Conexion :: obtener_conexion());

    $cita = RepositorioCita :: obtener_cita_por_ncita(Conexion::obtener_conexion(), $validador->getNcita());
}

if (isset($_POST ['eliminar'])) {

    Conexion :: abrir_conexion();

    $validador = new ValidadorCita(
            '', $_POST['ncita'], '', '', Conexion :: obtener_conexion());

    $cita = RepositorioCita :: obtener_cita_por_ncita(Conexion::obtener_conexion(), $validador->getNcita());

    $cita_eliminada = RepositorioCita :: eliminar_cita(Conexion :: obtener_conexion(), $validador->getNcita());

    if ($cita) {
        Redireccion::redirigir(RUTA_CITA_ELIMINADA);
    }
}


$titulo = 'CONSULTAR CITA';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 

<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">CONSULTAR CITA</h1>
    </div>
</div>

<div class =" container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        CONSULTA LA CITA A TRAVES DE SU NUMERO DE CITA.
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER ['PHP_SELF'] ?>">

                        <?php
                        if (isset($_POST['consultar'])) {
                            include_once 'plantillas/consultarvalidado.inc.php';
                        } else if (isset($_POST['eliminar'])) {
                            include_once 'plantillas/consultarvalidado.inc.php';
                        } else {
                            include_once 'plantillas/consultarvacio.inc.php';
                        }
                        ?>    



                    </form>
                </div>
<?php
if (isset($_POST ['consultar'])) {
    if ($cita) {
        ?>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <label>Fecha:</label>
        <?php
        echo $cita->getFecha();
        ?>
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            <strong>
                                                <label>N° de cita:</label>
        <?php
        echo $cita->getNcita();
        ?>
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                <label>Id del Paciente:</label>
        <?php
        echo $cita->getId_paciente();
        ?>
                                            </strong>
                                        </p>

                                        <p>
                                            <strong>
                                                <label>Valoracion del Paciente:</label>
        <?php
        echo nl2br($cita->getValoracion());
        ?>
                                            </strong>
                                        </p>

                                        <td>
                                            <form method="post" action="<?php echo RUTA_MODIFICAR_CITA ?>">
                                                <input type="hidden" name="ncita_editar"
                                                       value="<?php echo $cita->getNcita(); ?>">
                                                <button type="submit" class="btn btn-default btn-primary" 
                                                        name="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar Cita</button>


                                            </form>


                                        </td>


                                    </div>
                                </div>
                            </div>


                        </div>
                        <br>

                        <br>

        <?php
    }
}
?>
            </div>            
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>