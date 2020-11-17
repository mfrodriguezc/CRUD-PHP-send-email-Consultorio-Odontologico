
<input type="hidden" name="correo-paciente" value="<?php echo $correo_paciente; ?>"   >

<div class="form-group">
    <label>Titulo del Mensaje</label>
    <input type="text" class="form-control" name="titulo" placeholder="Titulo del correo">
</div>
<div class="form-group">
    <label>Cuerpo del mensaje </label>
    <textarea  class="form-control" rows="5" name="cuerpo" placeholder="Cuerpo del mensaje"></textarea>
</div>

<button type="submit" class="btn btn-default btn-primary" name="enviar_publicidad" ><i class="fa fa-envelope-o" aria-hidden="true"></i> Enviar Publicidad</button>
