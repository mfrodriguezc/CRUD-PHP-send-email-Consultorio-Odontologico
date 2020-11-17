<?php

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'plantillas/panel_control_declaracion.inc.php';

include_once 'app/config.inc.php';

// activar gestor actual

$total_pacientes = RepositorioPaciente :: obtener_numero_pacientes(Conexion::obtener_conexion());

include_once 'plantillas/vistapublicidadgenerica.inc.php';



include_once 'plantillas/panel_control_cierre.inc.php';


