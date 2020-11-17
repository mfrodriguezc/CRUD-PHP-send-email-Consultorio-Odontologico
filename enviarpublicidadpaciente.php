<?php

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'plantillas/panel_control_declaracion.inc.php';

include_once 'app/config.inc.php';

// activar gestor actual
$array_pacientes = RepositorioPaciente :: obtener_paciente_y_citas(Conexion :: obtener_conexion());

include_once 'plantillas/vistapublicidadpaciente.inc.php';

include_once 'plantillas/panel_control_cierre.inc.php';

