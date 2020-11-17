<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Cita.inc.php';
include_once 'app/RepositorioCita.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ValidadorCitaModificada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/RepositorioPaciente.inc.php';

Conexion :: abrir_conexion();

if(isset($_POST['modificar_cita'])){
    $validador = new ValidadorCitaModificada($_POST['fecha'],$_POST['fecha-original'],
            '','', $_POST['id_paciente'], $_POST['id_paciente-original'],
            htmlspecialchars($_POST['valoracion']),$_POST['valoracion-original'], Conexion ::obtener_conexion());
    
    //editar cambios en la base de datos.
    if(!$validador -> hay_cambios()){
        Redireccion :: redirigir(RUTA_INICIO);
    }else{
        if($validador -> agendar_valido()){
            $cambio_efectuado = RepositorioCita :: modificar_cita(Conexion::obtener_conexion(),
                    $_POST['ncita-cita'], $validador -> getFecha(), $validador -> getId_paciente(),
                    $validador -> getValoracion());
            
            if($cambio_efectuado){
                
               Redireccion :: redirigir(RUTA_CONSULTAR_CITA);
            }
        }
    }
    
}

$titulo = "Modificar Cita";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 



<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">MODIFICAR CITA</h1>
    </div>
</div>


<div class =" container">
    <div class="row">
        <div class=" col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       Modifica los datos de la Cita.
                    </h3>
                </div>
                <div class="panel-body">

            <form role="form" method="post" action="<?php echo RUTA_MODIFICAR_CITA ?>">
                <?php
                if(isset($_POST['modificar'])){
                    $ncita_cita = $_POST['ncita_editar'];
                    
                    
                    
                    $cita_recuperada = RepositorioCita :: obtener_cita_por_ncita(
                            Conexion :: obtener_conexion(),$ncita_cita);
                    
            include_once 'plantillas/form_cita_recuperada.inc.php';
                    
                    
                    
                } else if(isset($_POST['modificar_cita'])){
                    $ncita_cita = $_POST['ncita-cita'];
                    
                    $cita_recuperada = RepositorioCita :: obtener_cita_por_ncita(
                            Conexion :: obtener_conexion(),$ncita_cita);
                    
                    include_once 'plantillas/form_cita_recuperada_validada.inc.php';
                  
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