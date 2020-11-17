<div class="row parte-publicidad-paciente">
    <div class="col-md-12">
        <h2>Lista de Pacientes</h2>
        <br>
        <br>

    </div>
</div>

<div class="row parte-publicidad-paciente">

    <div class="col-md-12">
        <?php
        if (count($array_pacientes) > 0) {
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Identificacion</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Descripcion</th>
                        <th>Citas</th>
                        <th>Enviar Publicidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($array_pacientes); $i++) {
                        $paciente_actual = $array_pacientes[$i][0];
                        $citas_paciente_actual = $array_pacientes[$i][1];
                        ?>
                        <tr>
                            <td><?php echo $paciente_actual->getNombre(); ?></td>
                            <td><?php echo $paciente_actual->getApellido(); ?></td>
                            <td><?php echo $paciente_actual->getId(); ?></td>
                            <td><?php echo $paciente_actual->getDireccion(); ?></td>
                            <td><?php echo $paciente_actual->getTelefono(); ?></td>
                            <td><?php echo $paciente_actual->getCorreo(); ?></td>
                            <td><?php echo $paciente_actual->getDescripcion(); ?></td>
                            <td><?php echo $citas_paciente_actual; ?></td>
                            <td>
                                <form method="post" action="<?php echo RUTA_MANDAR_PUBLICIDAD ?>">
                                    <input type="hidden" name="correo_paciente"
                                           value="<?php echo $paciente_actual->getCorreo(); ?>">
                                    <button type="submit" class="btn btn-default btn-primary" 
                                            name="enviarpublicidad"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>

            <?php
        } else {
            ?>
            <h3 class="text-center">Todavia no hay ningun paciente Registrado</h3>
            <br>
            <br>


            <?php
        }
        ?>
    </div>
</div>