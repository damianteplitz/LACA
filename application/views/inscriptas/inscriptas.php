
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
                    <?php echo form_open('index.php/inscriptas/update_inscriptas'); ?>
                        <h2 id="h nombre"></h2>
                        <ul class="list-group" id="info_cliente"></ul>

                        <h2 id="h cursos"></h2>
                        <ul class="list-group" id="lista_cursos"></ul>
                        <div class="container" id="select_box">
                            <div class="row">
                                <h2 id="sel cursos">Seleccione curso</h2>
                            </div>
                            <div class="row">
                                <select class="form-control" id="sel_curso">
                                    <option disabled selected value> -- Seleccione un curso -- </option>
                                </select>
                            </div>
                            <div class="float-center mt-5" id="sel_interesada">
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
                        <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="modal" id="modal_buscar_curso">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open('index.php/inscriptas/update_inscriptas'); ?>
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
                            <select class="form-control mt-2" id="select_buscar_persona">
                                <option disabled selected value> -- Seleccione persona -- </option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="float-center mt-5" id="sel_buscar_interesada">
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
                        <button type="submit" id="register" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                <?php echo form_close(); ?> 
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

var curso_buscado_id;
var cliente_buscado_nombre;
var cliente_buscado_dni;
var cliente_buscado_apellido;
var cliente_buscado_id;
var personas = <?php echo json_encode($persona, JSON_HEX_TAG); ?>;
var interesadas = <?php echo json_encode($interesadas, JSON_HEX_TAG); ?>;
var c_abiertos = <?php echo json_encode($c_abiertos, JSON_HEX_TAG); ?>;

var btn_nombre_apellido = document.getElementById('btn_buscar_nombre_apellido');
var btn_buscar_dni = document.getElementById('btn_buscar_dni');
var sel_cursos = document.getElementById("select_box");
var sel_interesada = document.getElementById("sel_interesada");
var ch_interesada = document.getElementById("interesada");
var ch_rechazada = document.getElementById("rechazada");
var ch_confirmada = document.getElementById("confirmada");
var id_curso_form = document.getElementById("id_curso");
var id_cliente_form = document.getElementById("id_cliente");
var id_curso_form_buscar = document.getElementById("id_curso_buscar");
var id_cliente_form_buscar = document.getElementById("id_cliente_buscar");
var select_buscar_persona = document.getElementById("select_buscar_persona");
var sel_buscar_curso = document.getElementById("select_buscar_curso");
var select_buscar_interesada = document.getElementById("sel_buscar_interesada");
var ch_interesada_buscar = document.getElementById("interesada_buscar");
var ch_rechazada_buscar = document.getElementById("rechazada_buscar");
var ch_confirmada_buscar = document.getElementById("confirmada_buscar");


sel_cursos.style = "display:none;";
sel_interesada.style = "display:none;";
select_buscar_persona.style = "display:none;";
select_buscar_interesada.style = "display:none;";

btn_nombre_apellido.onclick = function (a){
        a.preventDefault();
        var sel = document.getElementById("sel_interesada");
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
        sel_cursos.style = "display:none;";
        sel.style = "display:none;";
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
                        cliente_buscado_id = e['id'];
                        id_cliente_form.value = e['id'];
                        cant_nombre++;
                        sel_cursos.style = "";
                        info_cliente.style = "";
                        e_nombre.innerHTML = e['documento']+" "+e['nombre']+" "+e['apellido'];            
                        ok = true;
                        cargar_select_cursos();
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
            
        }
        if(cant_nombre > 1){
            cliente_buscado_id = "";
            id_cliente_form.value = -1;
            sel_cursos.style = "display:none;";
            info_cliente.style = "";
            e_nombre.innerHTML = "Hay varios clientes con ese nombre, busque por dni porfavor";
            
        }
        var box = document.querySelectorAll("#box_cliente");
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(180+i*5)+","+(100+i*15)+","+222+")";
                box[i].id = i;
        }
}

btn_buscar_dni.onclick = function (a){
        a.preventDefault();

        var sel = document.getElementById("sel_interesada");
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
        sel_cursos.style = "display:none;";
        sel.style = "display:none;";

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
                        cliente_buscado_id = e['id'];
                        id_cliente_form.value = e['id'];
                        cant_nombre++;
                        sel_cursos.style = "";
                        info_cliente.style = "";
                        e_nombre.innerHTML = e['documento']+" "+e['nombre']+" "+e['apellido'];             
                        ok = true;
                        cargar_select_cursos();
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
        }
        if(cant_nombre > 1){
            cliente_buscado_id = "";
            id_cliente_form.value = -1;
            sel_cursos.style = "display:none;";
            info_cliente.style = "";
            e_nombre.innerHTML = "Error en la busqueda, disculpe las molestias";
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

function cargar_select_cursos (){
    var sel_curso = document.getElementById("sel_curso");
    var init = sel_curso.options.length - 1; 
    for(i = init ; i >= 0 ; i--){
        sel_curso.remove(i);
    }
    var option = document.createElement("option");
    option.text = "-- Seleccione un curso --";
    option.disabled = true;
    option.selected = "selected";
    sel_curso.add(option);


    console.log (sel_curso.options);
    for (i=0;i<c_abiertos.length;i++){
        for(j=0;j<interesadas.length;j++){
            /*console.log("a");
            console.log("id cliente interesada: "+interesadas[j]['id_cliente']);
            console.log ("id cliente buscado: "+cliente_buscado_id);
            console.log ("id interesada cabierto: "+interesadas[j]['id_cabierto']);
            console.log ("id c_abierto: "+c_abiertos[i]['id']);
            *///console.log(c_abiertos[i]);
            if(interesadas[j]['id_cliente'] == cliente_buscado_id && interesadas[j]['id_cabierto'] == c_abiertos[i]['id']){
                //console.log("q");
                if(interesadas[j]['estado'] != 0){
                    var option = document.createElement("option");
                    option.text = c_abiertos[i]['nombre'];
                    option.value = c_abiertos[i]['id'];
                    sel_curso.add(option);
                }
            }
        }
    }
}


function cargar_select_personas (id_curso){
        var init = select_buscar_persona.options.length - 1; 
        for(i = init ; i >= 0 ; i--){
            select_buscar_persona.remove(i);
        }
        var option = document.createElement("option");
        option.text = "-- Seleccione una persona --";
        option.disabled = true;
        option.selected = "selected";
        select_buscar_persona.add(option);
        for(j=0;j<interesadas.length;j++){
           // console.log("interesada_cabierto "+interesadas[j]['id_cabierto'] );
           // console.log("id_curso "+id_curso);
           // console.log("estado_interesada "+interesadas[j]['estado'])

            if(interesadas[j]['id_cabierto'] == id_curso && interesadas[j]['estado'] != 0){
                console.log("interesada_cabierto "+interesadas[j]['id_cabierto'] );
                console.log("id_curso "+id_curso);
                console.log("estado_interesada "+interesadas[j]['estado']);
                console.log("id_persona_interesada "+interesadas[j]['id_cliente'])
                var text;
                var text_val;
                for (i=0;i<personas.length;i++){
                    if(personas[i]['id'] == interesadas[j]['id_cliente']){
                        text = personas[i]['nombre']+" "+personas[i]['apellido'];
                        text_val = personas[i]['id'];
                    }
                }
                var option = document.createElement("option");
                option.text = text;
                option.value = text_val;
                select_buscar_persona.add(option);
            }  
    }
}


sel_curso.onchange = function(e){
    sel_interesada.style = "";
    id_curso_form.value = this.value;
    console.log("id_curso: "+this.value);
    console.log("cargar cual esta seleccionado");
    for(i=0;i<interesadas.length;i++){
        if (interesadas[i]['id_cabierto'] == this.value && interesadas[i]['id_cliente'] == cliente_buscado_id){
          
            if (interesadas[i]['estado'] == 1){
                console.log("a");
                ch_interesada.checked = true;
                ch_confirmada.checked = false;
                ch_rechazada.checked = false;
            }
            if (interesadas[i]['estado'] == 2){
                ch_confirmada.checked = true;
                ch_interesada.checked = false;
                ch_rechazada.checked = false;
            }
            if (interesadas[i]['estado'] == 3){
                ch_rechazada.checked = true;
                ch_interesada.checked = false;
                ch_confirmada.checked = false;
            }
        }
    }
   
}

ch_interesada.onclick = function(){
    if (ch_interesada.checked == true){
        ch_rechazada.checked = false;
        ch_confirmada.checked = false;
        console.log(ch_interesada.checked);
    }
    else{
        console.log(ch_interesada.checked);
    }
}
ch_rechazada.onclick = function(){
    if (ch_rechazada.checked == true){
        ch_interesada.checked = false;
        ch_confirmada.checked = false;
        console.log(ch_rechazada.checked);
    }
    else{
        console.log(ch_rechazada.checked);
    }
}
ch_confirmada.onclick = function(){
    if (ch_confirmada.checked == true){
        ch_rechazada.checked = false;
        ch_interesada.checked = false;
        console.log(ch_confirmada.checked);
    }
    else{
        console.log(ch_confirmada.checked);
    }
}

for (i=0;i<c_abiertos.length;i++){
    var option = document.createElement("option");
    option.text = c_abiertos[i]['nombre'];
    option.value = c_abiertos[i]['id'];
    sel_buscar_curso.add(option);
}

sel_buscar_curso.onchange = function(e){
    select_buscar_interesada.style = "display:none;";
    select_buscar_persona.style = "";
    //console.log(this.value);
    id_curso_form_buscar.value = this.value;
    cargar_select_personas(this.value);
    curso_buscado_id = (this.value);
    //hacer con personas inscriptas no todas
}

select_buscar_persona.onchange = function(e){
    select_buscar_interesada.style = "";
    id_cliente_form_buscar.value = this.value;
    //console.log("cabierto "+curso_buscado_id);
    console.log("idcli "+this.value);
    for(i=0;i<interesadas.length;i++){
        
        if (interesadas[i]['id_cabierto'] == curso_buscado_id && interesadas[i]['id_cliente'] == this.value){
            console.log("s");
            console.log(interesadas[i]['estado'])
            if (interesadas[i]['estado'] == 1){
                //console.log("a");
                ch_interesada_buscar.checked = true;
                ch_confirmada_buscar.checked = false;
                ch_rechazada_buscar.checked = false;
            }
            if (interesadas[i]['estado'] == 2){
                ch_confirmada_buscar.checked = true;
                ch_interesada_buscar.checked = false;
                ch_rechazada_buscar.checked = false;
            }
            if (interesadas[i]['estado'] == 3){
                ch_rechazada_buscar.checked = true;
                ch_interesada_buscar.checked = false;
                ch_confirmada_buscar.checked = false;
            }
        }
    }

}

ch_interesada_buscar.onclick = function(){
    if (ch_interesada_buscar.checked == true){
        ch_rechazada_buscar.checked = false;
        ch_confirmada_buscar.checked = false;
        console.log(ch_interesada_buscar.checked);
    }
    else{
        console.log(ch_interesada_buscar.checked);
    }
}
ch_rechazada_buscar.onclick = function(){
    if (ch_rechazada_buscar.checked == true){
        ch_interesada_buscar.checked = false;
        ch_confirmada_buscar.checked = false;
        console.log(ch_rechazada_buscar.checked);
    }
    else{
        console.log(ch_rechazada_buscar.checked);
    }
}
ch_confirmada_buscar.onclick = function(){
    if (ch_confirmada_buscar.checked == true){
        ch_rechazada_buscar.checked = false;
        ch_interesada_buscar.checked = false;
        console.log(ch_confirmada_buscar.checked);
    }
    else{
        console.log(ch_confirmada_buscar.checked);
    }
}

</script>