<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioPaciente.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';


if (ControlSesion :: sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(RUTA_LOGIN);
}



if(isset($_POST['enviar_publicidad'])){
    

        $correo_enviado = RepositorioPaciente :: enviarcorreo($_POST['correo-paciente'],
                $_POST['titulo'],$_POST['cuerpo']);
          
               Redireccion :: redirigir(RUTA_INICIO);
           
        
    }
    




$titulo = 'REGISTRAR PACIENTE';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 




<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">ENVIAR PUBLICIDAD AL CORREO DEL PACIENTE</h1>
    </div>
</div>

<div class =" container">
    <div class="row">
         <div class=" col-md-3 text-center">
         </div>
        <div class=" col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Ingrese las promociones que desee que le lleguen al paciente.
                    </h3>
                </div>
                <div class="panel-body">

                    <form role="form" method="post" action="<?php echo RUTA_MANDAR_PUBLICIDAD ?>">
                        <?php
                        if (isset($_POST['enviarpublicidad'])) {
                            $correo_paciente = $_POST['correo_paciente'];

                            
                            include_once 'plantillas/formenviarcorreo.inc.php';
                            
                        }
                        ?>
                    </form>

                </div>
            </div>            
        </div>
        <div class=" col-md-6 text-center"></div>
    </div>
</div>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>