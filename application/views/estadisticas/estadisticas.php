
<head>
        <title>Estadisticas</title>
</head>

<body>
    <div class="modal bg-secondary " id="modal_est_abiertos">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Estadisticas cursos abiertos</h4>
                    <button type="button" class="close" data-dismiss="modal" id="btn_cursos_abiertos">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <select class="form-control mt-2" id="select_cursos_abiertos">
                            <option disabled selected value> -- Seleccione un curso -- </option>
                        </select>
                    </div>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <h4 class="p-3 mb-2 mt-2 bg-info text-white">Interesadas</h4>
                                </tr>
                            </thead>
                            <tbody id="table_interesadas_body">
                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <h4 class="p-3 mb-2 mt-2 bg-success text-white">Confirmadas</h4>
                                </tr>
                            </thead>
                            <tbody id="table_confirmadas_body">
                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <h4 class="p-3 mb-2 mt-2 bg-warning text-dark">Rechazadas</h4>
                                </tr>
                            </thead>
                            <tbody id="table_rechazadas_body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center mt-5" >
                <h1>Estadisticas</h1>
    </div>
    <div class="row justify-content-md-center mt-2">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#modal_est_abiertos" id="btn_cursos_abiertos">Cursos abiertos</button>
        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#" id="">Historial x curso (proximamente)</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_est_gral" id="btn_gral">General</button>
    </div>
    <input type="hidden" id="token" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
</body>

<script>


$(document).ready(function(){
    
    get_cursos_abiertos();
    get_clientes_cursos();
    $("#select_cursos_abiertos").on('change', function(e) {
        completar_estadistica_abiertos(this.value);
    });


});
var cursos_abiertos;
var clientes_cursos;

function get_cursos_abiertos (){
    $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Estadisticas/get_cursos_abiertos', 
                data: {
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        cursos_abiertos = data;
                        cargar_select_abiertos(data);
                        //cargar el select

                        },
                error: function () {
			            console.log("Error en busqueda de cursos abiertos");
                        }
                });
    return false;
}
function get_clientes_cursos (){
    $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/Estadisticas/get_clientes_cursos', 
                data: {
                        'rca_token' : $("#token").val()
                },
                dataType: 'json',  
                cache: false,
                async: true,
                success: function(data){
                        clientes_cursos = data;
                        
                        },
                error: function () {
			            console.log("Error en busqueda de clientes_cursos");
                        }
                });
    return false;
}

function cargar_select_abiertos (cursos){
    //cargar select
    $('#select_cursos_abiertos')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- Seleccione un curso -- </option>')
    ;
    cursos.forEach(function(e){
        $('#select_cursos_abiertos').append($('<option>', {
            value: e['id'],
            text: e['nombre']
        }));
    });
}

function completar_estadistica_abiertos (id){
    tdd = document.querySelectorAll("td");
    tdd.forEach(function(e) {
        e.remove();
    });  
    clientes_cursos.forEach(function(e){
        if (e['id_cabierto']==id){
            if (e['estado']==1){
                agregar_a_tabla(e,"#table_interesadas_body");
            }
            if (e['estado']==2){
                agregar_a_tabla(e,"#table_confirmadas_body");
            }
            if (e['estado']==3){
                agregar_a_tabla(e,"#table_rechazadas_body");
            }
        }
    });
}

function agregar_a_tabla (datos,tabla){
    var row = ($(tabla)[0]).insertRow(0);
    var tm;
    var tt;
    var tn;
    if(datos['t_m']){
        tm = "Mañana";
    }
    else{
        tm = "";
    }
    if(datos['t_t']){
        tt = "Tarde";
    }
    else{
        tt = "";
    }
    if(datos['t_n']){
        tn = "Noche";
    }
    else{
        tn = "";
    }
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    cell1.innerHTML = datos['nombre'];
    cell2.innerHTML = datos['apellido'];
    cell3.innerHTML = datos['telefono'];
    cell4.innerHTML = datos['mail'];
    cell5.innerHTML = tm;
    cell6.innerHTML = tt;
    cell7.innerHTML = tn;
}

</script>