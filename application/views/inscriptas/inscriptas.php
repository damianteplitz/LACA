
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

                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido">
                            <button type="submit" class="btn btn-primary  ml-2" id="btn_buscar_nombre_apellido">Buscar</button>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="DNI" name="dni" id="dni">
                            <button type="submit" class="btn btn-primary  ml-2" id="btn_buscar_dni">Buscar</button>
                        </div>
                    </form>
                    
                    <h2 id="h nombre"></h2>
                    <ul class="list-group" id="info_cliente"></ul>

                    <h2 id="h cursos"></h2>
                    <ul class="list-group" id="lista_cursos"></ul>

                    <h2 id="sel cursos">Seleccione curso</h2>
                    <div class="row" id="select_curso">
                        <select class="form-control" id="sel_curso">
                           
                        </select>
                    </div>

                    <?php $w = 0; ?> 
                    <?php foreach ($c_abiertos as $course): ?>
                        <?php echo form_open('index.php/inscriptas/actualizar_inscriptas'); ?>
                            <ul class="list-group" id="lista_cursos_abiertos">
                                <li class="list-group-item">
                                    <div class="row"><?php echo $c_abiertos[$w]['nombre']; ?></div>
                                    <div class="float-right">
                                    <input name="id_cabierto" type="hidden" id="id_cabierto" value = "<?php echo $c_abiertos[$w]['id']; ?>">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input " name="interesada" id="interesada">Interesada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="rechazada" id="rechazada">Rechazada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="reservada" id="reservada">Reservada
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Modal footer -->
                            <div class="modal-footer">   
                                <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        <?php echo form_close(); ?>
                    <?php $w++; ?>    
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal_buscar_curso">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detalles del curso</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <label for="sel1">Seleccione curso</label>
                    <form action="#">
                        <select class="form-control" id="sel1">
                            <option>Curso 1</option>
                            <option>Curso 2</option>
                            <option>Curso 3</option>
                            <option>Curso 4</option>
                        </select>
                        <div class="text-right">
                                <button type="submit" class="btn btn-primary  mt-2 mb-3">Buscar (sacar)</button>
                        </div>
                    </form>
                    <ul class="list-group">
                        <li class="list-group-item " id="curso_box3">
                            <div class="row">Persona 1</div>
                            <div class="float-right">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input " name="optradio">Option 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Option 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" >Option 3
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" id="curso_box2">
                            <div class="row">Persona 2</div>
                            <div class="float-right">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input " name="optradio">Option 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Option 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" >Option 3
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item " id="curso_box1">
                            <div class="row">Persona 3</div>
                            <div class="float-right">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input " name="optradio">Option 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Option 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" >Option 3
                                    </label>
                                </div>
                            </div>    
                        </li>
                    </ul>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_buscar_curso">Buscar por curso</button>
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
});

var cliente_buscado_nombre;
var cliente_buscado_dni;
var cliente_buscado_apellido;
var cliente_buscado_id;
var personas = <?php echo json_encode($persona, JSON_HEX_TAG); ?>;
var interesadas = <?php echo json_encode($interesadas, JSON_HEX_TAG); ?>;
var c_abiertos = <?php echo json_encode($c_abiertos, JSON_HEX_TAG); ?>;

var btn_nombre_apellido = document.getElementById('btn_buscar_nombre_apellido');
var btn_buscar_dni = document.getElementById('btn_buscar_dni');

var lista_cursos_abiertos = document.querySelectorAll("#lista_cursos_abiertos");
for(i=0;i<lista_cursos_abiertos.length;i++){
    lista_cursos_abiertos[i].style = "display:none;";
}


btn_nombre_apellido.onclick = function (a){
        a.preventDefault();

        var info_cliente = document.getElementById("info_cliente");
        var nombre = document.getElementById("nombre");
        var apellido = document.getElementById("apellido");
        var e_nombre = document.getElementById("h nombre");
        var e_lista = document.getElementById("h cursos");
        var ok = false;
        var cant_nombre =0;

        cliente_buscado_id = "";
        cliente_buscado_nombre = "";
        cliente_buscado_dni = "";
        cliente_buscado_apellido = "";
        info_cliente.style = "display:none;";
        
        e_nombre.innerHTML = "Detalles del cliente";
        e_lista.innerHTML = "";

        personas.forEach(function(e){
                
                if(e['nombre'] == nombre.value || e['apellido'] == apellido.value){
                        /*var no = document.createElement("li");
                        var ap = document.createElement("li");
                        var doa = document.createElement("li");
                        var di = document.createElement("li");
                        var ma = document.createElement("li");
                        
                        id_edit = dni_val.value;
                        btn_edit.disabled = false;
                        */
                        cant_nombre++;
                        info_cliente.style = "";
                        e_nombre.innerHTML = "El cliente existe y se llama "+e['nombre']+" "+e['apellido'];            
                        ok = true;
                        for(i=0;i<lista_cursos_abiertos.length;i++){
                            lista_cursos_abiertos[i].style = "";
                        }
                        /*
                        cliente_buscado_nombre = e['nombre'];
                        cliente_buscado_dni = e['documento'];
                        cliente_buscado_apellido = e['apellido'];
                        cliente_buscado_id = e['id'];                        
                        
                        no.textContent = "Nombre: "+e['nombre'];
                        no.classList.add("list-group-item");
                        no.id="box_cliente";
                        e_info.appendChild(no);
                        ap.textContent = "Apellido: "+e['apellido'];
                        ap.classList.add("list-group-item");
                        ap.id="box_cliente";
                        e_info.appendChild(ap);
                        doa.textContent = "DNI: "+e['documento'];
                        doa.classList.add("list-group-item");
                        doa.id="box_cliente";
                        e_info.appendChild(doa);
                        di.textContent = "Direccion: "+e['direccion'];
                        di.classList.add("list-group-item");
                        di.id="box_cliente";
                        e_info.appendChild(di);
                        ma.textContent = "Mail: "+e['mail'];
                        ma.classList.add("list-group-item");
                        ma.id="box_cliente";
                        e_info.appendChild(ma);
                        id_cliente = e['id'];*/
                        
                }
        });
        if(ok == false){
            info_cliente.style = "";
            e_nombre.innerHTML = "El cliente no existe, debe crear uno nuevo";
            for(i=0;i<lista_cursos_abiertos.length;i++){
                lista_cursos_abiertos[i].style = "display:none;";
            }
        }
        if(cant_nombre > 1){
            info_cliente.style = "";
            e_nombre.innerHTML = "Hay varios clientes con ese nombre, busque por dni porfavor";
            for(i=0;i<lista_cursos_abiertos.length;i++){
                lista_cursos_abiertos[i].style = "display:none;";
            }
        }
        var box = document.querySelectorAll("#box_cliente");
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(180+i*5)+","+(100+i*15)+","+222+")";
                box[i].id = i;
        }
}

btn_buscar_dni.onclick = function (a){
        a.preventDefault();

        var info_cliente = document.getElementById("info_cliente");
        var nombre = document.getElementById("nombre");
        var apellido = document.getElementById("apellido");
        var e_nombre = document.getElementById("h nombre");
        var e_lista = document.getElementById("h cursos");
        var ok = false;
        var cant_nombre =0;

        cliente_buscado_id = "";
        cliente_buscado_nombre = "";
        cliente_buscado_dni = "";
        cliente_buscado_apellido = "";
        info_cliente.style = "display:none;";
        
        e_nombre.innerHTML = "Detalles del cliente";
        e_lista.innerHTML = "";

        personas.forEach(function(e){
                
                if(e['documento'] == dni.value){
                        /*var no = document.createElement("li");
                        var ap = document.createElement("li");
                        var doa = document.createElement("li");
                        var di = document.createElement("li");
                        var ma = document.createElement("li");
                        
                        id_edit = dni_val.value;
                        btn_edit.disabled = false;
                        */
                        cant_nombre++;
                        info_cliente.style = "";
                        e_nombre.innerHTML = "El cliente existe y se llama "+e['nombre']+" "+e['apellido'];            
                        ok = true;
                        for(i=0;i<lista_cursos_abiertos.length;i++){
                            lista_cursos_abiertos[i].style = "";
                        }
                        /*
                        cliente_buscado_nombre = e['nombre'];
                        cliente_buscado_dni = e['documento'];
                        cliente_buscado_apellido = e['apellido'];
                        cliente_buscado_id = e['id'];                        
                        
                        no.textContent = "Nombre: "+e['nombre'];
                        no.classList.add("list-group-item");
                        no.id="box_cliente";
                        e_info.appendChild(no);
                        ap.textContent = "Apellido: "+e['apellido'];
                        ap.classList.add("list-group-item");
                        ap.id="box_cliente";
                        e_info.appendChild(ap);
                        doa.textContent = "DNI: "+e['documento'];
                        doa.classList.add("list-group-item");
                        doa.id="box_cliente";
                        e_info.appendChild(doa);
                        di.textContent = "Direccion: "+e['direccion'];
                        di.classList.add("list-group-item");
                        di.id="box_cliente";
                        e_info.appendChild(di);
                        ma.textContent = "Mail: "+e['mail'];
                        ma.classList.add("list-group-item");
                        ma.id="box_cliente";
                        e_info.appendChild(ma);
                        id_cliente = e['id'];*/
                        
                }
        });
        if(ok == false){
            info_cliente.style = "";
            e_nombre.innerHTML = "El cliente no existe, debe crear uno nuevo";
            for(i=0;i<lista_cursos_abiertos.length;i++){
                lista_cursos_abiertos[i].style = "display:none;";
            }
        }
        if(cant_nombre > 1){
            info_cliente.style = "";
            e_nombre.innerHTML = "Hay varios clientes con ese nombre, busque por dni porfavor";
            for(i=0;i<lista_cursos_abiertos.length;i++){
                lista_cursos_abiertos[i].style = "display:none;";
            }
        }
        var box = document.querySelectorAll("#box_cliente");
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(180+i*5)+","+(100+i*15)+","+222+")";
                box[i].id = i;
        }
}

var box = document.querySelectorAll("#box_curso");
for (i = 0; i < box.length; i++) {
        box[i].style.backgroundColor = "rgb("+(180+i*10)+","+(100+i*30)+","+222+")";
        box[i].id = i;
}

var sel_curso = document.getElementById("sel_curso");
for (i=0;i<c_abiertos.length;i++){
    var option = document.createElement("option");
    option.text = c_abiertos[i]['nombre'];
    option.value = c_abiertos[i]['id'];
    sel_curso.add(option);
}


sel_curso.onchange = function(e){
    console.log(this.value);
}


</script>