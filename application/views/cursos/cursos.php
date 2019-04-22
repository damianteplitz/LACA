    <head>
        <title>Cursos</title>
    </head>
    
    <body>
    
        <div class="modal" id="modal_nuevo_curso">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo curso</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <?php echo form_open('index.php/cursos/nuevo_Curso'); ?>

                            <div class="input-group mb-3 input-group-lg" for="nombre">
                                <input type="input" class="form-control" name="nombre" placeholder="Nombre del curso">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="profesor">Profesor</span>
                                </div>
                                <input type="text" class="form-control" name="profesor">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="detalles">Detalles</span>
                                </div>
                                <input type="text" class="form-control" name="detalles">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="duracion">Duracion</span>
                                </div>
                                <input type="number" class="form-control" name="duracion">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="modalidad">Modalidad</span>
                                </div>
                                <input type="text" class="form-control" name="modalidad">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="objetivo">Objetivo</span>
                                </div>
                                <input type="text" class="form-control" name="objetivo">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="programa">Programa</span>
                                </div>
                                <input type="text" class="form-control" name="programa">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="materiales">Materiales</span>
                                </div>
                                <input type="text" class="form-control" name="materiales">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="requisitos">Requisitos</span>
                                </div>
                                <input type="text" class="form-control" name="requisitos">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="kit_inicio">Kit de inicio</span>
                                </div>
                                <input type="text" class="form-control" name="kit_inicio">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="minimo">Minimo</span>
                                </div>
                                <input type="number" class="form-control" name="minimo">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="maximo">Maximo</span>
                                </div>
                                <input type="number" class="form-control" name="maximo">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                            </div>
                            
                        <?php echo form_close(); ?>

                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>
        <?php $w = 0; ?>        
        <?php foreach ($c_cerrados as $course): ?>
        <?php $mod = "modal_editar_curso_cerrado".$w; ?>
            <div class="modal" id="<?php echo $mod;?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Detalles del curso</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">

                            <?php echo form_open('index.php/cursos/editar_Curso'); ?>
                                <input type="hidden" name="id" value = "<?php echo $c_cerrados[$w]['id']; ?>">
                                <div class="input-group mb-3 input-group-lg" for="nombre">
                                    <input type="input" class="form-control" name="nombre" value="<?php echo $c_cerrados[$w]['nombre']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="detalles">Detalles</span>
                                    </div>
                                    <input type="text" class="form-control" name="detalles"  value = "<?php echo $c_cerrados[$w]['detalles']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="duracion" >Duracion</span>
                                    </div>
                                    <input type="text" class="form-control" name="duracion" value = "<?php echo $c_cerrados[$w]['duracion']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="minimo" >Minimo</span>
                                    </div>
                                    <input type="text" class="form-control" name="minimo" value = "<?php echo $c_cerrados[$w]['minimo']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="maximo" >Maximo</span>
                                    </div>
                                    <input type="text" class="form-control" name="maximo" value = "<?php echo $c_cerrados[$w]['maximo']; ?>">
                                </div>
                                
                                <div class="modal-footer">
                                    <div class="checkbox">
                                            <label><input name="checked" type="checkbox" value="<?php echo $c_cerrados[$w]['id']; ?>" id="checkboxx">Abierto</label>
                                    </div>
                                    <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- Modal footer -->
                    </div>
                </div>
            </div>
            <?php $w++; ?>        
        <?php endforeach; ?>


        <?php $w = 0; ?>        
        <?php foreach ($c_abiertos as $course): ?>
        <?php $mod = "modal_editar_curso_abierto".$w; ?>
            <div class="modal" id="<?php echo $mod;?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Detalles del curso</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">

                            <?php echo form_open('index.php/cursos/editar_Curso'); ?>
                                <input type="hidden" name="id" value = "<?php echo $c_abiertos[$w]['id']; ?>">
                                <div class="input-group mb-3 input-group-lg" for="nombre">
                                    <input type="input" class="form-control" name="nombre" value="<?php echo $c_abiertos[$w]['nombre']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="profesor">Profesor</span>
                                    </div>
                                    <input type="text" class="form-control" name="profesor"  value = "<?php echo $c_abiertos[$w]['profesor']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="detalles">Detalles</span>
                                    </div>
                                    <input type="text" class="form-control" name="detalles"  value = "<?php echo $c_abiertos[$w]['detalles']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="modalidad">Modalidad</span>
                                    </div>
                                    <input type="text" class="form-control" name="modalidad"  value = "<?php echo $c_abiertos[$w]['modalidad']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="objetivo">Objetivo</span>
                                    </div>
                                    <input type="text" class="form-control" name="objetivo"  value = "<?php echo $c_abiertos[$w]['objetivo']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="programa">Programa</span>
                                    </div>
                                    <input type="text" class="form-control" name="programa"  value = "<?php echo $c_abiertos[$w]['programa']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="materiales">Materiales</span>
                                    </div>
                                    <input type="text" class="form-control" name="materiales"  value = "<?php echo $c_abiertos[$w]['materiales']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="requisitos">Requisitos</span>
                                    </div>
                                    <input type="text" class="form-control" name="requisitos"  value = "<?php echo $c_abiertos[$w]['requisitos']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="kit_inicio">Kit de inicio</span>
                                    </div>
                                    <input type="text" class="form-control" name="kit_inicio"  value = "<?php echo $c_abiertos[$w]['kit_inicio']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="duracion" >Duracion</span>
                                    </div>
                                    <input type="text" class="form-control" name="duracion" value = "<?php echo $c_abiertos[$w]['duracion']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="minimo" >Minimo</span>
                                    </div>
                                    <input type="text" class="form-control" name="minimo" value = "<?php echo $c_abiertos[$w]['minimo']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="maximo" >Maximo</span>
                                    </div>
                                    <input type="text" class="form-control" name="maximo" value = "<?php echo $c_abiertos[$w]['maximo']; ?>">
                                </div>
                                
                                <div class="modal-footer">
                                    <div class="checkbox">
                                            <label><input name="checked" type="checkbox" value="<?php echo $c_abiertos[$w]['id']; ?>" id="checkboxx">Abierto</label>
                                    </div>
                                    <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- Modal footer -->
                    </div>
                </div>
            </div>
            <?php $w++; ?>        
        <?php endforeach; ?>

        
        <div class="row justify-content-md-center mt-5">
            <h1>Cargar cursos</h1>
        </div>
        <div class="row justify-content-md-center mt-2">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#modal_nuevo_curso">Nuevo</button>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-9 m-2 text border">
                <h4 class="font-weight-light text-center">Cursos abiertos</h4>
            
            <?php $q = 0;?>
            <?php foreach ($c_abiertos as $course): ?>
            <?php $mod = "#modal_editar_curso_abierto".$q;?>
                    <div id="box" class="m-2 border border-secondary">    
                        <div class="m-2">
                            <h1><?php echo $course['nombre']; ?></h1>
                            <p><?php echo $course['detalles']; ?></p>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="<?php echo $mod ;?>" id="button_edit">Ver detalles</button>
                        </div>
                    </div>
            <?php $q++;?>
            <?php endforeach; ?>
            </div>
            <div class="col-sm-9 m-2 text border">
                <h4 class="font-weight-light text-center">Cursos cerrados</h4>
            <?php $q = 0;?>
            <?php foreach ($c_cerrados as $course): ?>
            <?php $mod = "#modal_editar_curso_cerrado".$q;?>
                    <div id="box" class="m-2 border border-secondary">    
                        <div class="m-2">
                            <h1><?php echo $course['nombre']; ?></h1>
                            <p><?php echo $course['detalles']; ?></p>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="<?php echo $mod ;?>" id="button_edit">Ver detalles</button>
                        </div>
                    </div>
            <?php $q++;?>
            <?php endforeach; ?>
            </div>
        </div>
        
    </body>
</html>

<script>
$(document).ready(function(){

    //hacer una funcion que me cargue los detalles de todas los cursos y despues con el index cambio el valor de cada modal (ver como hacer)
    //Basicamente la variable dinamica NO TIENE QUE SER EN PHP
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

var box = document.querySelectorAll("#box");
for (i = 0; i < box.length; i++) {
  box[i].style.backgroundColor = "rgb("+(220-i*15)+","+(200-i*5)+","+242+")";
  box[i].id = i;
}

var materia = <?php echo json_encode($materia); ?>;
var abiertos = <?php echo json_encode($abiertos); ?>;
var c_abiertos = <?php echo json_encode($c_abiertos); ?>;
console.log (c_abiertos);



var ch = document.querySelectorAll("#checkboxx");

for (i = 0; i < ch.length; i++) {
    for (j = 0; j < materia.length; j++){
        if (materia[j]['id']==ch[i].value){
            for (h = 0; h < abiertos.length; h++){
                if (abiertos[h]['id_curso'] == ch[i].value){
                    if (abiertos[h]['estado']==1){
                        ch[i].checked = true;
                    }
                    else{
                        ch[i].checked = false;
                    }
                }
            }
        }
    }
}


</script>
