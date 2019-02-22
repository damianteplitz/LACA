<style>
        body  { 
                background-image: url('../../assets/img/papel.jpg');
                font-family : "Palatino Linotype", "Book Antiqua", Palatino, serif ; 
        }
        #navbar     {color: rgb(0, 0, 0); background-color: rgb(249, 182, 236);}
        #curso_box1 {color: rgb(0, 0, 0); background-color: rgb(220, 200, 242);}
        #curso_box2 {color: rgb(0, 0, 0); background-color: rgb(190, 190, 242);}
        #curso_box3 {color: rgb(0, 0, 0); background-color: rgb(160, 180, 242);}
        #curso_box4 {color: rgb(0, 0, 0); background-color: rgb(130, 170, 242);}
        #curso_box5 {color: rgb(0, 0, 0); background-color: rgb(100, 160, 242);}
        #curso_box6 {color: rgb(0, 0, 0); background-color: rgb(70, 150, 242);}
</style>
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

                    
                        <form>
                        <div class="input-group mb-3 input-group-lg" for="nombre">
                            <input type="input" class="form-control" placeholder="Nombre del curso">
                        </div>
                        <label for="detalles">Detalles</label>
                        <textarea name="detalles"></textarea><br />
                        <label for="duracion">Duracion</label>
                        <input type="number" name="duracion" /><br />
                        <label for="minimo">Minimo</label>
                        <input type="number" name="minimo" /><br />
                        <label for="maximo">Maximo</label>
                        <input type="number" name="maximo" /><br />
                        <input type="submit" name="submit" value="Guardar" />
                        </form>

                        <form>
                            
                                
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Profe</span>
                            </div>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Duracion</span>
                            </div>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                <span class="input-group-text ">Modalidad</span>
                            </div>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Objetivo</span>
                            </div>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Requisitos</span>
                                </div>
                                <input type="text" class="form-control">
                            </div>
                            <div class="input-group m-1 input-group-md ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Materiales</span>
                                </div>
                                <input type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modal_editar_curso">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Detalles del curso</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body 
                    
                    -->
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" form="submit" value="Guardar">Submit</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center mt-5">
            <h1>Cargar cursos</h1>
        </div>
        <div class="row justify-content-md-center mt-2">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#modal_nuevo_curso">Nuevo</button>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-9">
            
            <?php foreach ($materia as $course): ?>
                
                <div id="box" class="m-2 border border-secondary">    
                    <div class="m-2">
                        <h1><?php echo $course['nombre']; ?></h1>
                        <p>Resumen del curso</p>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_editar_curso">Ver detalles</button>
                    </div>
                </div>
                

            <?php endforeach; ?>
            </div>
        </div>
        
    </body>


<script>






$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    var box = document.querySelectorAll("#box");
    for (i = 0; i < box.length; i++) {
        box[i].style.backgroundColor = "rgb("+(220-i*15)+","+(200-i*5)+","+242+")";
    }
});

</script>

<!--
<div class="cities">

</div>