<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioPaciente.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ListaPacientes.inc.php';

include_once 'app/ControlSesion.inc.php';




if (ControlSesion :: sesion_iniciada()){
    
}else {
    Redireccion::redirigir(RUTA_LOGIN);
}

$titulo = 'Busqueda de Pacientes';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <?php
           ListaPacientes :: listar_pacientes();
           
           ?>
            
            
        </div>
    </div>
</div>
<?php
Conexion :: cerrar_conexion();
        ?>