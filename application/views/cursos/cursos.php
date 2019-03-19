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
        <?php foreach ($materia as $course): ?>
        <?php $mod = "modal_editar_curso".$w; ?>
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
                                <input type="hidden" name="id" value = "<?php echo $materia[$w]['id']; ?>">
                                <div class="input-group mb-3 input-group-lg" for="nombre">
                                    <input type="input" class="form-control" name="nombre" value="<?php echo $materia[$w]['nombre']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="detalles">Detalles</span>
                                    </div>
                                    <input type="text" class="form-control" name="detalles"  value = "<?php echo $materia[$w]['detalles']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="duracion" >Duracion</span>
                                    </div>
                                    <input type="text" class="form-control" name="duracion" value = "<?php echo $materia[$w]['duracion']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="minimo" >Minimo</span>
                                    </div>
                                    <input type="text" class="form-control" name="minimo" value = "<?php echo $materia[$w]['minimo']; ?>">
                                </div>
                                <div class="input-group m-1 input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="maximo" >Maximo</span>
                                    </div>
                                    <input type="text" class="form-control" name="maximo" value = "<?php echo $materia[$w]['maximo']; ?>">
                                </div>
                                
                                <div class="modal-footer">
                                    <div class="checkbox">
                                            <label><input type="checkbox" value="" id="<?php// echo $inters;?>">Abierto</label>
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
            <div class="col-sm-9">
            
            <?php $q = 0;?>
            <?php foreach ($materia as $course): ?>
            
            <?php $mod = "#modal_editar_curso".$q;?>
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






</script>
