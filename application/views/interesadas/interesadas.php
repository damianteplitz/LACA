
<head>
        <title>Interesadas</title>
</head>
<body>
        <div class="modal" id="modal_buscar_cliente">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                        <h4 class="modal-title">Buscar cliente</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">

                                        <form class="form-inline mb-4" action="#">
                                                <div class="form-group ml-2">
                                                        <label for="documento">DNI: </label>
                                                        <input type="number" class="form-control ml-2" id="documento">
                                                        <button type="submit" class="btn btn-primary  ml-2" id="btn_buscar_dni">Buscar</button>
                                                </div>
                                                
                                                <div class="form-group ml-5">
                                                        <label for="apellido">Apellido: </label>
                                                        <input type="apellido" class="form-control ml-2" id="apellido">
                                                        <button type="submit" class="btn btn-primary ml-2" id="btn_buscar_apellido">Buscar</button>
                                                </div>
                                        </form>
                                        <ul class="list-group" id="info_cliente">
                                                <li class="list-group-item" id="curso_det_box" name="cli_nombre"></li>
                                                <li class="list-group-item" id="curso_det_box" name="cli_apellido"></li>
                                                <li class="list-group-item" id="curso_det_box" name="cli_documento"></li>
                                                <li class="list-group-item" id="curso_det_box" name="cli_telefono"></li>
                                                <li class="list-group-item" id="curso_det_box" name="cli_direccion"></li>
                                                <li class="list-group-item" id="curso_det_box" name="cli_localidad"></li>
                                                <li class="list-group-item" id="curso_det_box" name="cli_mail"></li>
                                        </ul>
                                        

                                </div>
                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_nuevo_cliente">Nuevo</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_editar_cliente" id="editar_cliente" disabled="true">Editar</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirmar">Confirmar</button>
                                </div>
                        </div>
                </div>
        </div>
        <div class="modal" id="modal_detalle_curso">
                <div class="modal-dialog">
                        <div class="modal-content">
                        <!-- Modal Header -->
                                <div class="modal-header">
                                        <h4 class="modal-title">Detalles del curso</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                        <ul class="list-group">
                                                <li class="list-group-item" id="curso_det_box" name="det_nombre"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_profesor"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_detalles"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_duracion"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_modalidad"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_objetivo"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_programa"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_materiales"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_requisitos"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_kit_inicio"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_minimo"></li>
                                                <li class="list-group-item" id="curso_det_box" name="det_maximo"></li>
                                        </ul>
                                        <form action="#">
                                                
                                        <div class="row justify-content-end">
                                                <input name="id_cabierto" type="hidden" id="id_cabierto" value = "">
                                                <input name="id_cliente" type="hidden" id="id_cliente_form" value = "">
                                                <input name="estado" type="hidden" id="estado" value = "">
                                                <div class="col-4">
                                                        <label><input name="interesada"  type="checkbox" value=""  id="interesada">Interesada</label>
                                                </div>
                                                <div class="col-4">
                                                        <div class="checkbox">
                                                                <label><input type="checkbox" value="" id="t_mañana" disabled="disabled">Mañana</label>
                                                        </div>
                                                        <div class="checkbox">
                                                                <label><input type="checkbox" value="" id="t_tarde" disabled="disabled">Tarde</label>
                                                        </div>
                                                        <div class="checkbox">
                                                                <label><input type="checkbox" value="" id="t_noche" disabled="disabled">Noche</label>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="submit" id="btn_actualizar_interesada" class="btn btn-primary">Guardar</button>
                                        </div>
                                        </form>
                                </div>
                                <!-- Modal footer -->
                        </div>
                </div>
        </div>
        <div class="modal bg-secondary" id="modal_nuevo_cliente">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                        <h4 class="modal-title">Nuevo Cliente</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                        <?php echo form_open('index.php/interesadas/nuevo_Cliente'); ?>
                                        
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="nombre">Nombre</span>
                                                </div>
                                                <input type="text" class="form-control" name="nombre">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="apellido">Apellido</span>
                                                </div>
                                                <input type="text" class="form-control" name="apellido">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="telefono">Telefono</span>
                                                </div>
                                                <input type="number" class="form-control" name="telefono">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="documento">DNI</span>
                                                </div>
                                                <input type="number" class="form-control" name="documento">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="direccion">Direccion</span>
                                                </div>
                                                <input type="text" class="form-control" name="direccion">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="localidad">Localidad</span>
                                                </div>
                                                <input type="text" class="form-control" name="localidad">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="mail">Mail</span>
                                                </div>
                                                <input type="text" class="form-control" name="mail">
                                        </div>
                                        <div class="modal-footer">
                                                <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                                        </div>
                                        
                                        <?php echo form_close(); ?>
                                </div>
                        </div>
                </div>
        </div>
        <div class="modal bg-secondary" id="modal_editar_cliente">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                        <h4 class="modal-title">Editar Cliente</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                        <?php echo form_open('index.php/interesadas/editar_Cliente'); ?>
                                        <input type="hidden" name="id" id= "e_id" value = "">
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="nombre">Nombre</span>
                                                </div>
                                                <input type="text" class="form-control" id="e_nombre" name="nombre" >
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="apellido">Apellido</span>
                                                </div>
                                                <input type="text" class="form-control" name="apellido" id="e_apellido" value = "">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="telefono">Telefono</span>
                                                </div>
                                                <input type="number" class="form-control" name="telefono" id="e_telefono" value = "">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="documento">DNI</span>
                                                </div>
                                                <input type="number" class="form-control" name="documento" id="e_documento" value = "">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="direccion">Direccion</span>
                                                </div>
                                                <input type="text" class="form-control" id="e_direccion" name="direccion" value = "">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="localidad">Localidad</span>
                                                </div>
                                                <input type="text" class="form-control" id="e_localidad" name="localidad" value = "">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" for="mail">Mail</span>
                                                </div>
                                                <input type="text" class="form-control" name="mail" id="e_mail" value = "">
                                        </div>
                                        <div class="modal-footer">
                                                <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                                        </div>
                                        
                                        <?php echo form_close(); ?>
                                </div>
                        </div>
                </div>
        </div>
        


        <div class="row justify-content-md-center mt-5" >
                <h1>Clientes interesadas</h1>
        </div>
        <div class="row justify-content-md-center mt-2">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_buscar_cliente" id="buscar_cliente">Buscar</button>
        </div>

        
        <div class="row justify-content-md-center mt-5">
                <div class="col-sm-3" id="cliente_grande" style="display:none;">
                        <h4 id="cliente_grande_h"></h4>
                </div>
        </div>
        <div class="row justify-content-md-center " id="row_cursos_abiertos"  style="display:none;">
                
        </div>
        <input type="hidden" id="token" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
</body>
<script>

$(document).ready(function(){
        $("#info_cliente").css('display','none');
        $("#btn_buscar_dni").click(function()
        {       
                $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Interesadas/get_cliente_dni', 
                data: {
                        'documento' : $("#documento").val(),
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        //console.log (data.length);
                        id_cliente = null;
                        if (data.length == 1){
                                $('#editar_cliente').attr('disabled', false);
                                cargar_detalle_cliente (data[0]);
                                pedir_cursos_disponibles(cliente_seleccionado['id']);
                                //console.log("datos cliente buscado");
                                //console.log(data[0]);
                        }
                        else if (data.length == 0){
                                borrar_cursos_disponibles();
                                $('#editar_cliente').attr('disabled', true);
                                borrar_id ();
                                $("#info_cliente").css('display','none');
                                alert("Cliente no existe");
                        }
                        else{
                                borrar_cursos_disponibles();
                                $('#editar_cliente').attr('disabled', true);
                                borrar_id ();
                                $("#info_cliente").css('display','none');
                                alert("Ups ha ocurrido un error, intente mas tarde");
                        }

                        },
                error: function () {
			console.log("Error en busqueda de cliente");
                        }
                });
                return false;
        });
        
        $("#btn_buscar_apellido").click(function()
        {       
                $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Interesadas/get_cliente_apellido', 
                data: {
                        'apellido' : $("#apellido").val(),
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        //console.log (data.length);
                        id_cliente = null;
                        if (data.length == 1){
                                $('#editar_cliente').attr('disabled', false);
                                cargar_detalle_cliente (data[0]);
                                pedir_cursos_disponibles(cliente_seleccionado['id']);
                                //console.log("datos cliente buscado");
                                //console.log(data[0]);
                        }
                        else if (data.length == 0){
                                borrar_cursos_disponibles();
                                $('#editar_cliente').attr('disabled', true);
                                borrar_id ();
                                $("#info_cliente").css('display','none');
                                alert("Cliente no existe");
                        }
                        else{
                                borrar_cursos_disponibles();
                                borrar_id ();
                                $('#editar_cliente').attr('disabled', true);
                                $("#info_cliente").css('display','none');
                                alert("Existen varios clientes con ese nombre, por favor busque por numero de documento");
                        }

                        },
                error: function () {
			console.log("Error en busqueda de cliente");
                        }
                });
                return false;
        });
        

        $("#btn_actualizar_interesada").click(function()
        {
                $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Interesadas/actualizar_Interesada', 
                data: {
                        'estado' : $("#estado").val(),
                        'id_cabierto' : $("#id_cabierto").val(),
                        'id_cliente'  : $("#id_cliente_form").val(),
                        'checked'   :  $('#interesada').is(':checked'),
                        't_mañana'   :  $('#t_mañana').is(':checked'),
                        't_tarde'   :  $('#t_tarde').is(':checked'),
                        't_noche'   :  $('#t_noche').is(':checked'),
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        pedir_cursos_disponibles(cliente_seleccionado['id']);
                        alert("Cliente actualizada correctamente!"); 
                        $("#modal_detalle_curso").modal('hide');
                        },
                error: function (xhr, ajaxOptions, thrownError) {
                        //onsole.log("algo malo")
                        console.log(xhr);
                        
                        }
                });
                return false;
        });
        
        $("#editar_cliente").click(function()
        {       
                console.log(cliente_seleccionado)
                $("#e_nombre").val(cliente_seleccionado['nombre']);
                $("#e_apellido").val(cliente_seleccionado['apellido']);
                $("#e_documento").val(cliente_seleccionado['documento']);
                $("#e_direccion").val(cliente_seleccionado['direccion']);
                $("#e_localidad").val(cliente_seleccionado['localidad']);
                $("#e_telefono").val(cliente_seleccionado['telefono']);
                $("#e_mail").val(cliente_seleccionado['mail']);
                $("#e_id").val(cliente_seleccionado['id']);
                
        });

        $("#confirmar").click(function()
        {       
                //console.log("cursos disponibles confirmar");
                //console.log (cursos_disponibles);
                $("#row_cursos_abiertos").empty();
                cargar_nombre_principal();
                cargar_cursos_disponibles();
        });

        $("#interesada").click(function(){
                if($('#interesada').is(':checked')){
                        $("#t_mañana").attr('disabled',false);
                        $("#t_tarde").attr('disabled',false);
                        $("#t_noche").attr('disabled',false);
                }
                else{
                        $("#t_mañana").prop("checked", false);
                        $("#t_tarde").prop("checked", false);
                        $("#t_noche").prop("checked", false);
                        $("#t_mañana").attr('disabled',true);
                        $("#t_tarde").attr('disabled',true);
                        $("#t_noche").attr('disabled',true);
                }
               
        });

});

//variables globales
var cliente_seleccionado = {};
var cursos_disponibles = {};

///colores degrade
function pintar (id){
        var box = document.querySelectorAll(id);
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(210-i*15)+","+(190-i*5)+","+242+")";
                box[i].id = i;
        }
}


r=180;
g=150;
b=242;
r1=7;
g1=10;
var box = document.querySelectorAll("#curso_det_box");
for (i = 0; i < box.length; i++) {
  box[i].style.backgroundColor = "rgb("+r+","+g+","+b+")";
  box[i].id = i;
  r=r+r1;
  g=g+g1;
  if(g>200){
          r1=r1*-1;
          g1=g1*-1;
  }
  if(g<150){
          r1=r1*-1;
          g1=g1*-1;
  }
}

function cargar_lista_curso (id){
        cursos_disponibles.forEach(function(e) {
                if(e['id']==id){
                        $('li[name=det_nombre]').html("Nombre: "+e['nombre']);
                        $('li[name=det_profesor]').html("Profesor: "+e['profesor']);
                        $('li[name=det_detalles]').html("Detalles: "+e['detalles']);
                        $('li[name=det_duracion]').html("Duracion: "+e['duracion']);
                        $('li[name=det_modalidad]').html("Modalidad: "+e['modalidad']);
                        $('li[name=det_objetivo]').html("Objetivo: "+e['objetivo']);
                        $('li[name=det_programa]').html("Programa: "+e['programa']);
                        $('li[name=det_materiales]').html("Materiales: "+e['materiales']);
                        $('li[name=det_requisitos]').html("Requisitos: "+e['requisitos']);
                        $('li[name=det_kit_inicio]').html("Kit de inicio: "+e['kit_inicio']);
                        $('li[name=det_minimo]').html("Minimo: "+e['minimo']);
                        $('li[name=det_maximo]').html("Maximo: "+e['maximo']);
                        $("#id_cabierto").val(id);
                        $("#estado").val(e['estado']);
                        $("#id_cliente_form").val(cliente_seleccionado['id']);
                        if (e['estado']==1){
                                $("#t_mañana").attr('disabled',false);
                                $("#t_tarde").attr('disabled',false);
                                $("#t_noche").attr('disabled',false);
                                $("#interesada").prop("checked", true);
                        }
                        else{
                                $("#t_mañana").attr('disabled',true);
                                $("#t_tarde").attr('disabled',true);
                                $("#t_noche").attr('disabled',true);
                                $("#interesada").prop("checked", false);
                        }
                        if (e['t_m']==1){
                                $("#t_mañana").prop("checked", true);
                        }
                        else{
                                $("#t_mañana").prop("checked", false);
                        }
                        if (e['t_t']==1){
                                $("#t_tarde").prop("checked", true);
                        }
                        else{
                                $("#t_tarde").prop("checked", false);
                        }
                        if (e['t_n']==1){
                                $("#t_noche").prop("checked", true);
                        }
                        else{
                                $("#t_noche").prop("checked", false);
                        }
                }
        });
}

function cargar_detalle_cliente (cliente){
        $("#info_cliente").css('display','');
        $('li[name=cli_nombre]').html("Nombre: "+cliente['nombre']);
        $('li[name=cli_apellido]').html("Apellido: "+cliente['apellido']);
        $('li[name=cli_documento]').html("DNI: "+cliente['documento']);
        $('li[name=cli_direccion]').html("Direccion: "+cliente['direccion']);
        $('li[name=cli_mail]').html("Mail: "+cliente['mail']);
        $('li[name=cli_telefono]').html("Telefono: "+cliente['telefono']);
        $('li[name=cli_localidad]').html("Localidad: "+cliente['localidad']);
        
        cliente_seleccionado = cliente;
}

function borrar_id (){
        cliente_seleccionado = {};
}

function cargar_cursos_disponibles (s){

        console.log("cursos a imprimir")
        console.log(cursos_disponibles)
        
        if (cursos_disponibles.length){
                $("#row_cursos_abiertos").css('display','');
        }
        else {
                $("#row_cursos_abiertos").css('display','none');
        }

        cursos_disponibles.forEach(function(e) {
                console.log(e);
                var elm = '<div class="col-sm-9"> ' +
                                '<div id="div_cursos"> '+
                                        '<div id="box" class="m-2 border border-secondary"> '+
                                                '<div class="m-2"> '+
                                                        '<h1>'+e['nombre']+'</h1> '+
                                                        '<p>'+e['detalles']+'</p> '+
                                                '</div> '+
                                                '<div class="text-right">'+
                                                        '<button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_detalle_curso" id="button_detalles" onclick="cargar_lista_curso('+e['id']+')">Ver detalles</button>'+
                                                '</div>'+
                                        '</div> '+
                                '</div> '+
                         '</div> ';
                $(elm).appendTo($("#row_cursos_abiertos"));

        });
        pintar ("#box");
}

function cargar_nombre_principal (){
        if (cliente_seleccionado['id']){
                $("#cliente_grande").css('display','');
                $("#cliente_grande_h").text(cliente_seleccionado['nombre']+" "+cliente_seleccionado['apellido']+" "+cliente_seleccionado['documento']);
        }
        else{
                $("#cliente_grande").css('display','none');
        }
}

function pedir_cursos_disponibles (id){
        $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Interesadas/get_cursos_disponibles', 
                data: {
                        'id' : id,
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        cursos_disponibles = data;
                        //console.log("cursos disponibles");
                        //console.log (cursos_disponibles);
                        },
                error: function () {
			console.log("Error en busqueda de cliente");
                        }
                });
        return 1;
}

function borrar_cursos_disponibles (){
        cursos_disponibles = [];
}

</script>