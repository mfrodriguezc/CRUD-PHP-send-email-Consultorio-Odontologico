
    <div class ="col-md-4">
        <button class="btn btn-primary form-control" data-toggle="collapse" data-target="#citas">
            
            <?php 
            echo "Total Citas (". count($citas)  .")"
            ?>
        </button>
        <br>
        <br>
        <div id="citas" class="collapsed">
            <?php
            for($i=0; $i < count($citas); $i++){
                $cita = $citas[$i];
                ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <label>Fecha:</label>
                            <?php  
                            echo $cita -> getFecha();
                            ?>
                        </div>
                        <div class=" panel-body">
                            <div class="col-md-12">
                                
                                <p><label>N° de cita:</label>
                                <?php echo $cita -> getNcita(); ?>
                                </p>
                                
                                <p><label>Id del Paciente:</label>
                                    <?php echo $cita -> getId_paciente(); ?>
                                </p>
                                <p><label>Valoracion:</label>
                                    <?php  echo nl2br($cita -> getValoracion()); ?>
                                </p>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <?php
                
                
            }
            ?>
            
        </div>
        
    </div>
    
