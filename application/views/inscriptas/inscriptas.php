
<head>
    <title>Inscriptas</title>
</head>
       
<body>
    <!-- The Modal -->
    <div class="modal" id="modal_buscar_persona">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Buscar por persona</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                        <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido">
                        <button type="submit" class="btn btn-primary  ml-2" id="btn_buscar_nombre_apellido">Buscar</button>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="DNI" name="dni" id="documento">
                        <button type="submit" class="btn btn-primary  ml-2" id="btn_buscar_dni">Buscar</button>
                    </div>

                    <h5 id="h_nombre"></h5>
                    <ul class="list-group" id="lista_cursos"></ul>
                    <div class="container" id="select_box">
                        <div class="row" id="cursos" style = "display:none;">
                            <h2 id="sel cursos">Seleccione curso</h2>
                            <select class="form-control" id="sel_curso">
                                <option disabled selected value> -- Seleccione un curso -- </option>
                            </select>
                        </div>
                        <div class="float-center mt-5" id="sel_interesada" style = "display:none;">
                            <div class="form-check">
                                <label class="checkbox-inline mr-4">
                                    <input type="checkbox" name="interesada" id="interesada">Interesada 
                                </label>
                                <label class="checkbox-inline mr-4">
                                    <input type="checkbox" name="rechazada" id="rechazada">Rechazada
                                </label>
                                <label class="checkbox-inline mr-4">
                                    <input type="checkbox" name="confirmada" id="confirmada">Confirmada
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">  
                    <input type="hidden" name="id_curso" id= "id_curso" value = "">
                    <input type="hidden" name="id_cliente" id= "id_cliente" value = "">
                    <button type="submit" id="btn_persona_buscar" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal_buscar_curso">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Buscar por curso</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <select class="form-control mt-2" id="select_buscar_curso">
                            <option disabled selected value> -- Seleccione un curso -- </option>
                        </select>
                    </div>
                    <div class="row">
                        <select class="form-control mt-2" id="select_buscar_persona" style = "display:none;">
                            <option disabled selected value> -- Seleccione persona -- </option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="float-center mt-5" id="ch_buscar_interesada" style = "display:none;">
                            <div class="form-check">
                                <label class="checkbox-inline mr-4">
                                    <input type="checkbox" name="interesada" id="interesada_buscar">Interesada 
                                </label>
                                <label class="checkbox-inline mr-4">
                                    <input type="checkbox" name="rechazada" id="rechazada_buscar">Rechazada
                                </label>
                                <label class="checkbox-inline mr-4">
                                    <input type="checkbox" name="confirmada" id="confirmada_buscar">Confirmada
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" name="id_curso" id= "id_curso_buscar" value = "">
                    <input type="hidden" name="id_cliente" id= "id_cliente_buscar" value = "">
                    <button type="submit" class="btn btn-primary" id="btn_curso_buscar">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center mt-5">
        <h1>Cargar inscriptas</h1>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="btn-group">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_buscar_persona">Buscar por persona</button>
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_buscar_curso" id="btn_buscar_curso">Buscar por curso</button>
        </div>
    </div>
    <input type="hidden" id="token" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
</body>

<script>
$(document).ready(function(){
    get_cursos_abiertos();
    get_cursos_personas();
    get_personas();
    $("#btn_buscar_curso").click(function()
    { 
        cargar_select_cursos();
    });
    $("#select_buscar_curso").on('change', function(e) {
        id_curso_seleccionado = this.value;
        completar_cursos_cliente();
    });
    $("#select_buscar_persona").on('change', function(e) {
        cargar_checkbox(this.value);
    });
    $("#btn_curso_buscar").click(function()
    {
            $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Inscriptas/actualizar_Inscripta', 
            data: {
                    'id_cabierto' : id_curso_seleccionado,
                    'id_cliente'  : id_cliente_seleccionado,
                    'interesada'   :  $('#interesada_buscar').is(':checked'),
                    'rechazada'   :  $('#rechazada_buscar').is(':checked'),
                    'confirmada'   :  $('#confirmada_buscar').is(':checked'),
                    'rca_token' : $("#token").val()
            },
            dataType: 'json',  
            cache: false,
            async: true,
            success: function(data){
                    //pedir_cursos_disponibles(cliente_seleccionado['id']);
                    alert("Cliente actualizada correctamente!"); 
                    //$("#modal_detalle_curso").modal('hide');*/
                    },
            error: function (xhr, ajaxOptions, thrownError) {
                    //onsole.log("algo malo")
                    console.log(xhr);
                    
                    }
            });
            return false;
    });
    $("#btn_persona_buscar").click(function()
    {
            $.ajax({
            type: 'POST',
            url: '<?=base_url()?>index.php/Inscriptas/actualizar_Inscripta', 
            data: {
                    'id_cabierto' : id_curso_seleccionado,
                    'id_cliente'  : id_cliente_seleccionado,
                    'interesada'   :  $('#interesada').is(':checked'),
                    'rechazada'   :  $('#rechazada').is(':checked'),
                    'confirmada'   :  $('#confirmada').is(':checked'),
                    'rca_token' : $("#token").val()
            },
            dataType: 'json',  
            cache: false,
            async: true,
            success: function(data){
                    //pedir_cursos_disponibles(cliente_seleccionado['id']);
                    alert("Cliente actualizada correctamente!"); 
                    //$("#modal_detalle_curso").modal('hide');*/
                    },
            error: function (xhr, ajaxOptions, thrownError) {
                    //onsole.log("algo malo")
                    console.log(xhr);
                    
                    }
            });
            return false;
    });
    $("#interesada_buscar").click(function(){
        if ($("#interesada_buscar").is(':checked')){
            $('#rechazada_buscar').prop('checked',false);
            $('#confirmada_buscar').prop('checked',false);
        }
        else{
            $('#interesada_buscar').prop('checked',true);
        }
    });
    $("#rechazada_buscar").click(function(){
        if ($("#rechazada_buscar").is(':checked')){
            $('#interesada_buscar').prop('checked',false);
            $('#confirmada_buscar').prop('checked',false);
        }
        else{
            $('#rechazada_buscar').prop('checked',true);
        }
    });
    $("#confirmada_buscar").click(function(){
        if ($("#confirmada_buscar").is(':checked')){
            $('#rechazada_buscar').prop('checked',false);
            $('#interesada_buscar').prop('checked',false);
        }
        else{
            $('#confirmada_buscar').prop('checked',true);
        }
    });
    $("#interesada").click(function(){
        if ($("#interesada").is(':checked')){
            $('#rechazada').prop('checked',false);
            $('#confirmada').prop('checked',false);
        }
        else{
            $('#interesada').prop('checked',true);
        }
    });
    $("#rechazada").click(function(){
        if ($("#rechazada").is(':checked')){
            $('#interesada').prop('checked',false);
            $('#confirmada').prop('checked',false);
        }
        else{
            $('#rechazada').prop('checked',true);
        }
    });
    $("#confirmada").click(function(){
        if ($("#confirmada").is(':checked')){
            $('#rechazada').prop('checked',false);
            $('#interesada').prop('checked',false);
        }
        else{
            $('#confirmada').prop('checked',true);
        }
    });
    $("#btn_buscar_dni").click(function()
    {       
        cargar_select_cursos_dni();
        cargar_nombre();
        //si existe mostrar info basica y mostrar select de cursos
        //comparar con cursos_personas
        //cargar select con cursos correspondientes     
    });
    $("#btn_buscar_nombre_apellido").click(function()
    {       
        cargar_select_cursos_nombre();
        cargar_nombre();
        //si existe mostrar info basica y mostrar select de cursos
        //comparar con cursos_personas
        //cargar select con cursos correspondientes     
    });
    $("#sel_curso").on('change', function(e) {
        cargar_checkbox_persona(this.value);
    });
    
    
    
});

var personas;
var cursos_personas;
var cursos_abiertos;
var id_curso_seleccionado;
var id_cliente_seleccionado;

function get_personas (){
    $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Inscriptas/get_clientes', 
                data: {
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        personas = data;
                        console.log (personas);
                        },
                error: function () {
			            console.log("Error en busqueda de cursos abiertos");
                        }
                });
    return false;
}
function get_cursos_abiertos (){
    $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Inscriptas/get_cursos_abiertos', 
                data: {
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        cursos_abiertos = data;
                        console.log (cursos_abiertos);
                        },
                error: function () {
			            console.log("Error en busqueda de cursos abiertos");
                        }
                });
    return false;
}
function get_cursos_personas (){
    $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Inscriptas/get_cursos_personas', 
                data: {
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        cursos_personas = data;
                        console.log (cursos_personas);
                        },
                error: function () {
			            console.log("Error en busqueda de cursos abiertos");
                        }
                });
    return false;
}

function cargar_select_cursos (){
    $('#select_buscar_curso')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un curso -- </option>')
    ;
    cursos_abiertos.forEach(function(e){
        $('#select_buscar_curso').append($('<option>', {
            value: e['id'],
            text: e['nombre']
        }));
    });
}

function completar_cursos_cliente(){
    $('#ch_buscar_interesada').css('display','none');
    $('#select_buscar_persona').css('display','');
    $('#select_buscar_persona')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un cliente -- </option>')
    ;
    cursos_personas.forEach(function(e){
        if (id_curso_seleccionado == e['id_cabierto']){
            $('#select_buscar_persona').append($('<option>', {
                value: e['id_cliente'],
                text: e['nombre']+" "+e['apellido']
            }));
        }
    });
}
function cargar_checkbox(id_cliente){
    $('#ch_buscar_interesada').css('display','none');
    id_cliente_seleccionado = id_cliente;
    cursos_personas.forEach(function(e){
        if (id_curso_seleccionado == e['id_cabierto'] && id_cliente == e['id_cliente']){
            $('#ch_buscar_interesada').css('display','');
            if (e['estado']==1){
                $("#interesada_buscar").prop("checked",true);
                $("#rechazada_buscar").prop("checked",false);
                $("#confirmada_buscar").prop("checked",false);
            }
            if (e['estado']==2){
                $("#interesada_buscar").prop("checked",false);
                $("#rechazada_buscar").prop("checked",true);
                $("#confirmada_buscar").prop("checked",false);
            }
            if (e['estado']==3){
                $("#interesada_buscar").prop("checked",false);
                $("#rechazada_buscar").prop("checked",false);
                $("#confirmada_buscar").prop("checked",true);
            }
        }
    });
}
function cargar_checkbox_persona(id_curso){
    $('#sel_interesada').css('display','none');
    id_curso_seleccionado = id_curso;
    cursos_personas.forEach(function(e){
        if (id_curso == e['id_cabierto'] && id_cliente_seleccionado == e['id_cliente']){
            $('#sel_interesada').css('display','');
            if (e['estado']==1){
                $("#interesada").prop("checked",true);
                $("#rechazada").prop("checked",false);
                $("#confirmada").prop("checked",false);
            }
            if (e['estado']==2){
                $("#interesada").prop("checked",false);
                $("#rechazada").prop("checked",true);
                $("#confirmada").prop("checked",false);
            }
            if (e['estado']==3){
                $("#interesada").prop("checked",false);
                $("#rechazada").prop("checked",false);
                $("#confirmada").prop("checked",true);
            }
        }
    });
}

function cargar_select_cursos_dni(){
    $('#sel_interesada').css('display','none');
    $('#sel_curso')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un Curso -- </option>')
    ;
    cursos_personas.forEach(function(e){
        if ($('#documento').val() == e['documento']){
            $('#cursos').css('display','');
            $('#sel_curso').append($('<option>', {
                value: e['id_cabierto'],
                text: e['curso']
            }));
            id_cliente_seleccionado = e['id_cliente'];
        }
    });
}

function cargar_select_cursos_nombre(){
    $('#sel_interesada').css('display','none');
    $('#sel_curso')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un Curso -- </option>')
    ;
    if($('#nombre').val().length != 0 && $('#apellido').val().length != 0){
        buscar_nombre_apellido($('#nombre').val(),$('#apellido').val());
    }
    else if ($('#nombre').val().length == 0 && $('#apellido').val().length != 0){
        buscar_apellido($('#apellido').val());
    }
    else if($('#nombre').val().length != 0 && $('#apellido').val().length == 0)
    {
        buscar_nombre($('#nombre').val());
    }
    /*
    
    */
}

function buscar_nombre_apellido (nombre,apellido){
    var a = 0;
    personas.forEach(function(e){
        if (nombre == e['nombre'] && apellido == e['apellido']){
            $('#cursos').css('display','');
            a++;
            id_cliente_seleccionado = e['id'];
        }
    });
    cursos_personas.forEach(function(e){
        if (nombre == e['nombre'] && apellido == e['apellido']){
            $('#sel_curso').append($('<option>', {
                value: e['id_cabierto'],
                text: e['curso']
            }));
        }
    });
    if(a>1){
        $('#cursos').css('display','none');
        $('#sel_curso')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un Curso -- </option>')
        ;
        alert("Existen varios clientes con ese nombre, porfavor ingrese mas datos o busque por dni");
        console.log(a);
    }
    if(a==0){
        $('#cursos').css('display','none');
        alert("No existen clientes con ese nombre, porfavor busque por dni");
    }
}

function buscar_nombre (nombre){
    var a = 0;
    personas.forEach(function(e){
        if (nombre == e['nombre']){
            $('#cursos').css('display','');
            a++;
            id_cliente_seleccionado = e['id'];
        }
    });
    cursos_personas.forEach(function(e){
        if (nombre == e['nombre']){
            $('#cursos').css('display','');
            $('#sel_curso').append($('<option>', {
                value: e['id_cabierto'],
                text: e['curso']
            }));
        }
    });
    if(a>1){
        $('#cursos').css('display','none');
        $('#sel_curso')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un Curso -- </option>')
        ;
        alert("Existen varios clientes con ese nombre, porfavor ingrese mas datos o busque por dni");
        console.log(a);
    }
    if(a==0){
        $('#cursos').css('display','none');
        alert("No existen clientes con ese nombre, porfavor busque por dni");
    }
}

function buscar_apellido (apellido){
    var a = 0;
    personas.forEach(function(e){
        if (apellido == e['apellido']){
            $('#cursos').css('display','');
            a++;
            id_cliente_seleccionado = e['id'];
        }
    });
    cursos_personas.forEach(function(e){
        if (apellido == e['apellido']){
            $('#sel_curso').append($('<option>', {
                value: e['id_cabierto'],
                text: e['curso']
            }));
        }
    });
    if(a>1){
        $('#cursos').css('display','none');
        $('#sel_curso')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un Curso -- </option>')
        ;
        alert("Existen varios clientes con ese nombre, porfavor ingrese mas datos o busque por dni");
        console.log(a);
    }
    if(a==0){
        $('#cursos').css('display','none');
        alert("No existen clientes con ese nombre, porfavor busque por dni");
    }
}
function cargar_nombre(){
    personas.forEach(function(e){
        if (id_cliente_seleccionado == e['id']){
            $("#h_nombre").html(e['nombre']+" "+e['apellido']+" "+e['documento']);
        }
    });
}
</script>