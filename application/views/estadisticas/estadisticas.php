
<head>
        <title>Estadisticas</title>
</head>

<body>
    <div class="modal bg-secondary" id="modal_est_abiertos">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Estadisticas cursos abiertos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
    <div class="modal bg-secondary" id="modal_est_gral">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Estadisticas generales</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
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
</body>

<script>
var c_abiertos = <?php echo json_encode($c_abiertos); ?>;
var personas = <?php echo json_encode($persona); ?>;
var interesadas = <?php echo json_encode($interesadas); ?>;
var curso_abierto_seleccionado_id;

var table_interesadas_body = document.getElementById("table_interesadas_body");
var table_confirmadas_body = document.getElementById("table_confirmadas_body");
var table_rechazadas_body = document.getElementById("table_rechazadas_body");
var select_cursos_abiertos = document.getElementById("select_cursos_abiertos");

for (i=0;i<c_abiertos.length;i++){
    var option = document.createElement("option");
    option.text = c_abiertos[i]['nombre'];
    option.value = c_abiertos[i]['id'];
    select_cursos_abiertos.add(option);
}

select_cursos_abiertos.onchange = function(e){
    tdd = document.querySelectorAll("td");
    tdd.forEach(function(e) {
        e.remove();
    }); 
   // curso_abierto_seleccionado_id=this.value;
    for (i=0;i<interesadas.length;i++){
        if (interesadas[i]['id_cabierto'] == this.value){
            if (interesadas[i]['estado'] == 1){
                var nombre_tabla;
                var apellido_tabla;
                var mail_tabla;
                for (j=0;j<personas.length;j++){
                    if(personas[j]['id'] == interesadas[i]['id_cliente']){
                        nombre_tabla = personas[j]['nombre'];
                        //console.log(nombre_tabla);
                    }
                }
                var row = table_interesadas_body.insertRow(0);
                var cell1 = row.insertCell(0);
                cell1.innerHTML = nombre_tabla;
            }
            if (interesadas[i]['estado'] == 2){
                var nombre_tabla;
                for (j=0;j<personas.length;j++){
                    if(personas[j]['id'] == interesadas[i]['id_cliente']){
                        nombre_tabla = personas[j]['nombre'];
                        //console.log(nombre_tabla);
                    }
                }
                var row = table_confirmadas_body.insertRow(0);
                var cell1 = row.insertCell(0);
                cell1.innerHTML = nombre_tabla;
            }
            if (interesadas[i]['estado'] == 3){
                var nombre_tabla;
                for (j=0;j<personas.length;j++){
                    if(personas[j]['id'] == interesadas[i]['id_cliente']){
                        nombre_tabla = personas[j]['nombre'];
                        //console.log(nombre_tabla);
                    }
                }
                var row = table_rechazadas_body.insertRow(0);
                var cell1 = row.insertCell(0);
                cell1.innerHTML = nombre_tabla;
            }
        }
    }
}


</script>