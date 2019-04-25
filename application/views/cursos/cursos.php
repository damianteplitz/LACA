    <head>
        <title>Cursos</title>
    </head>
    
    <body>
        <div class="modal" id="modal_detalle_curso">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Curso</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="#">
                            <div class="input-group mb-3 input-group-lg" for="nombre">
                                <input type="input" class="form-control" name="nombre" value="" id="det_nombre">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="profesor">Profesor</span>
                                </div>
                                <input type="text" class="form-control" name="profesor"  value = "" id="det_profesor">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="detalles">Detalles</span>
                                </div>
                                <input type="text" class="form-control" name="detalles"  value = "" id="det_detalles">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="objetivo">Objetivo</span>
                                </div>
                                <input type="text" class="form-control" name="objetivo"  value = "" id="det_objetivo">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="programa">Programa</span>
                                </div>
                                <input type="text" class="form-control" name="programa"  value = "" id="det_programa" >
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="materiales">Materiales</span>
                                </div>
                                <input type="text" class="form-control" name="materiales"  value = ""id="det_materiales">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="requisitos">Requisitos</span>
                                </div>
                                <input type="text" class="form-control" name="requisitos"  value = "" id="det_requisitos">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="kit_inicio">Kit de inicio</span>
                                </div>
                                <input type="text" class="form-control" name="kit_inicio"  value = "" id="det_kit_inicio">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="duracion" >Duracion</span>
                                </div>
                                <input type="number" class="form-control" name="duracion" value = "" id="det_duracion">
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="minimo" >Minimo</span>
                                </div>
                                <input type="number" class="form-control" name="minimo" value = "" id="det_minimo"> 
                            </div>
                            <div class="input-group m-1 input-group-md">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="maximo" >Maximo</span>
                                </div>
                                <input type="number" class="form-control" name="maximo" value = "" id="det_maximo">
                            </div>
                            <div class="container">
                                <label class="radio-inline">
                                    <input type="radio" name="taller" id="det_taller" value="">Taller
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="curso" id="det_curso" value="">Curso
                                </label>
                            </div>
                            <div class="row justify-content-end">
                                <input name="id_cabierto" type="hidden" id="id_cabierto" value = "">
                                <input name="actualizar" type="hidden" id="actualizar" value = "">
                            </div>
                            
                            <div class="modal-footer">
                                <div class="checkbox">
                                        <label><input name="abierto" type="checkbox" value="" id="det_abierto">Abierto</label>
                                </div>
                                <button type="submit" id="btn_actualizar_curso" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                        <!-- Modal footer -->
                </div>
            </div>
        </div>
        
        <div class="row justify-content-md-center mt-5">
            <h1>Cargar cursos</h1>
        </div>
        <div class="row justify-content-md-center mt-2">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#modal_detalle_curso">Nuevo</button>
        </div>
        <div class="row justify-content-md-center" >
            <div class="col-sm-9 m-2 text border" style="display:none;" id="row_cursos_abiertos">
                <h4 class="font-weight-light text-center" >Cursos abiertos</h4>
            </div>
            <div class="col-sm-9 m-2 text border" style="display:none;" id="row_cursos_cerrados">
                <h4 class="font-weight-light text-center" >Cursos cerrados</h4>
            </div>
        </div>
        <input type="hidden" id="token" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
    </body>
</html>

<script>
$(document).ready(function(){
    get_cursos();
    $("#det_taller").click(function(){
        if ($("#det_taller").is(':checked')){
            $("#det_curso").prop('checked',false);
        }
    });
    $("#det_curso").click(function(){
        if ($("#det_curso").is(':checked')){
            $("#det_taller").prop('checked',false);
        }
    });
    $("#btn_actualizar_curso").click(function(){
        var es_curso;
        if ($('#det_curso').is(':checked')==true){
            es_curso = 1;
        }
        else{
            es_curso = 0;
        }
        
        $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Cursos/actualizar_Curso', 
                data: {
                        'id'        : $("#id_cabierto").val(),
                        'nombre'        : $("#det_nombre").val(),
                        'profesor'      : $("#det_profesor").val(),
                        'detalles'      : $("#det_detalles").val(),
                        'objetivo'      : $("#det_objetivo").val(),
                        'programa'      : $("#det_programa").val(),
                        'materiales'    : $("#det_materiales").val(),
                        'requisitos'    : $("#det_requisitos").val(),
                        'kit_inicio'    : $("#det_kit_inicio").val(),
                        'duracion'      : $("#det_duracion").val(),
                        'minimo'        : $("#det_minimo").val(),
                        'maximo'        : $("#det_maximo").val(),
                        'curso'         : es_curso,
                        'abierto'       :  $('#det_abierto').is(':checked'),
                        'actualizar'         : $("#actualizar").val(),
                        'rca_token'     : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        //pedir_cursos_disponibles(cliente_seleccionado['id']);
                        alert("Curso actualizado correctamente!"); 
                        $("#row_cursos_abiertos").empty();
                        $("#row_cursos_cerrados").empty();
                        get_cursos();
                        $("#modal_detalle_curso").modal('hide');
                        },
                error: function (xhr, ajaxOptions, thrownError) {
                        //onsole.log("algo malo")
                        console.log(xhr);
                        
                        }
                });
                return false;
    });
    


});

var cursos = {};

function get_cursos (){
        $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Cursos/get_cursos', 
                data: {
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        cursos = data;
                        //console.log("aa")
                        //console.log(data);
                        mostrar_cursos();
                        //console.log("cursos disponibles");
                        //console.log (cursos_disponibles);
                        },
                error: function () {
			console.log("Error en busqueda de cliente");
                        }
                });
        return 1;
}

function mostrar_cursos () {

    $("#row_cursos_abiertos").css('display','none');
    $("#row_cursos_cerrados").css('display','none');

    cursos.forEach(function(e){
        var modalidad;
        if(e['estado']==1){
            $("#row_cursos_abiertos").css('display','');
            if (e['modalidad'] == 1){
                modalidad = "Curso";
            }
            else{
                modalidad = "Taller"
            }
            var elm =   '<div id="box" class="m-2 border border-secondary"> ' +
                            '<div class="m-2"> '+
                                '<h1>'+e['nombre']+'</h1> '+
                                '<h5>Modalidad: '+modalidad+'</h5> '+
                                '<p>'+e['detalles']+'</p> '+
                            '</div> '+
                            '<div class="text-right">'+
                                '<button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_detalle_curso" id="button_detalles" onclick="cargar_lista_curso('+e['id']+')">Ver detalles</button>'+
                            '</div>'+
                        '</div> ';
            $(elm).appendTo($("#row_cursos_abiertos"));
        }
        if(e['estado']==0){
            $("#row_cursos_cerrados").css('display','');
            if (e['modalidad'] == 1){
                modalidad = "Curso";
            }
            else{
                modalidad = "Taller"
            }
            var elm =   '<div id="box" class="m-2 border border-secondary"> ' +
                            '<div class="m-2"> '+
                                '<h1>'+e['nombre']+'</h1> '+
                                '<h5>Modalidad: '+modalidad+'</h5> '+
                                '<p>'+e['detalles']+'</p> '+
                            '</div> '+
                            '<div class="text-right">'+
                                '<button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_detalle_curso" id="button_detalles" onclick="cargar_lista_curso('+e['id']+')">Ver detalles</button>'+
                            '</div>'+
                        '</div> ';
            $(elm).appendTo($("#row_cursos_cerrados"));
        }
    });
    pintar ("#box");
}

//colores degrade
function pintar (id){
        var box = document.querySelectorAll(id);
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(210-i*10)+","+(190-i*5)+","+242+")";
                box[i].id = i;
        }
}

function cargar_lista_curso (id){
        cursos.forEach(function(e) {
                if(e['id']==id){
                    //console.log(e)
                        var modalidad;
                        if (e['modalidad']==1){
                            modalidad = "Curso"
                        }
                        else{
                            modalidad = "Taller"
                        }
                        
                        $('#actualizar').val(true);
                        $('#det_nombre').val(e['nombre']);
                        $('#det_profesor').val(e['profesor']);
                        $('#det_detalles').val(e['detalles']);
                        $('#det_duracion').val(e['duracion']);
                        $('#det_modalidad').val(modalidad);
                        $('#det_objetivo').val(e['objetivo']);
                        $('#det_programa').val(e['programa']);
                        $('#det_materiales').val(e['materiales']);
                        $('#det_requisitos').val(e['requisitos']);
                        $('#det_kit_inicio').val(e['kit_inicio']);
                        $('#det_minimo').val(e['minimo']);
                        $('#det_maximo').val(e['maximo']);
                        $("#id_cabierto").val(id);
                        if (e['estado']==1){
                            $("#det_abierto").prop('checked',true);
                        }
                        else{
                            $("#det_abierto").prop('checked',false);
                        }
                        if(e['modalidad'] == 1){
                            $("#det_taller").prop('checked',false);
                            $("#det_curso").prop('checked',true);
                        }
                        else{
                            $("#det_taller").prop('checked',true);
                            $("#det_curso").prop('checked',false);
                        }
                        
                }
        });
        pintar ("#curso_det_box");
}

</script>
