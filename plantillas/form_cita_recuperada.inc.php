
<input type="hidden" id="ncita-cita" name="ncita-cita" value="<?php echo $ncita_cita; ?>"   >
<div class="form-group">
    <label for="start">Fecha </label>
    <input type="datetime-local" id="start" name="fecha" placeholder="Fecha de la cita"
            value="<?php echo $cita_recuperada -> getFecha(); ?>">
    <input type="hidden"  name="fecha-original" value="<?php echo $cita_recuperada -> getFecha(); ?>">
</div>


<div class="form-group">
    <label>Identificacion del Paciente </label>
    <input type="text" class="form-control" name="id_paciente" placeholder="Identificacion del Paciente" 
           value="<?php echo $cita_recuperada -> getId_paciente();  ?>">
    <input type="hidden" name="id_paciente-original" value="<?php echo $cita_recuperada -> getId_paciente(); ?>">
</div>

<div class="form-group">
    <label>Valoracion del Paciente </label>
    <textarea class="form-control" rows="5" name="valoracion" placeholder="Valoracion del Paciente"><?php echo $cita_recuperada -> getValoracion();  ?></textarea>
    <input type="hidden"  name="valoracion-original" value="<?php echo $cita_recuperada -> getValoracion(); ?>">
</div>
<br> 
<button type="submit" class="btn btn-default btn-primary" name="modificar_cita" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar Cita </button>