
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
                                                        <label for="dni">DNI: </label>
                                                        <input type="dni" class="form-control ml-2" id="dni">
                                                        <button type="submit" class="btn btn-primary  ml-2" id="btn_buscar_dni">Buscar</button>
                                                </div>
                                                
                                                <div class="form-group ml-5">
                                                        <label for="apellido">Apellido: </label>
                                                        <input type="apellido" class="form-control ml-2" id="apellido">
                                                        <button type="submit" class="btn btn-primary ml-2" id="btn_buscar_apellido">Buscar</button>
                                                </div>
                                        </form>
                                        <h2 id="h nombre"></h2>
                                        <ul class="list-group" id="info_cliente">
                                                
                                        </ul>
                                        

                                </div>
                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_nuevo_cliente">Nuevo</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_editar_cliente">Editar</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Confirmar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>
        <?php $w = 0; ?>        
        <?php foreach ($materia as $course): ?>
        <?php $mod = "modal_detalle_curso".$w; ?>
        <?php $id_c = "id".$w; ?>
        <?php $btn_c = "btn_id".$w; ?>
        <?php $inters = "interesada".$w; ?>
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
                                <ul class="list-group">
                                        <li class="list-group-item" id="curso_det_box">Nombre: <?php echo $materia[$w]['nombre']; ?></li>
                                        <li class="list-group-item" id="curso_det_box">Detalles: <?php echo $materia[$w]['detalles']; ?></li>
                                        <li class="list-group-item" id="curso_det_box">Duracion: <?php echo $materia[$w]['duracion']; ?></li>
                                        <li class="list-group-item" id="curso_det_box">Minimo: <?php echo $materia[$w]['minimo']; ?></li>
                                        <li class="list-group-item" id="curso_det_box">Maximo: <?php echo $materia[$w]['maximo']; ?></li>
                                </ul>
                                <div class="modal-footer">
                                        <input type="hidden" id="<?php echo $id_c;?>" value = "<?php echo $materia[$w]['id']; ?>">
                                        <div class="checkbox">
                                                <label><input type="checkbox" value="" id="<?php echo $inters;?>">Interesada</label>
                                        </div>
                                        <button type="button" class="btn btn-success" data-dismiss="modal" name="btn_interesada" id=<?php echo $btn_c;?> >Confirmar</button>
                                </div>
                        </div>
                        <!-- Modal footer -->
                    </div>
                </div>
            </div>
            <?php $w++; ?>        
        <?php endforeach; ?>
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
                                                <span class="input-group-text" for="dni">DNI</span>
                                                </div>
                                                <input type="number" class="form-control" name="dni">
                                        </div>
                                        <div class="input-group m-1 input-group-md">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" for="direccion">Direccion</span>
                                                </div>
                                                <input type="text" class="form-control" name="direccion">
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

        


        <div class="row justify-content-md-center mt-5">
                <h1>Clientes interesadas</h1>
        </div>
        <div class="row justify-content-md-center mt-2">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_buscar_cliente" id="buscar_cliente">Buscar</button>
        </div>

        
        <div class="row justify-content-md-center mt-5" >
                <div class="col-sm-3" id="cliente_grande">
                
                </div>
        </div>
        <div class="row justify-content-md-center ">
                <div class="col-sm-9 ">
                        <?php $q = 0;?>
                        <?php foreach ($materia as $course): ?>
                        
                        <?php $mod = "#modal_detalle_curso".$q;?>
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

<script>

$(document).ready(function(){
        //hacer una funcion que me cargue los detalles de todas los cursos y despues con el index cambio el valor de cada modal (ver como hacer)
        //Basicamente la variable dinamica NO TIENE QUE SER EN PHP
      
      
});

var box = document.querySelectorAll("#box");
for (i = 0; i < box.length; i++) {
  box[i].style.backgroundColor = "rgb("+(210-i*15)+","+(190-i*5)+","+242+")";
  box[i].id = i;
}

r=180;
g=150;
b=242;
r1=2;
g1=5;
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
}

var btn_dni = document.getElementById('btn_buscar_dni');

btn_dni.onclick = function (){

        var cli_grande = document.getElementById ("cliente_grande");
        var dni_val = document.getElementById("dni");
        //console.log (dni_val.value);
        var e_h2 = document.getElementById("h nombre");
        var e_info = document.getElementById("info_cliente");
        e_h2.innerHTML = "Detalles del cliente";
        e_info.innerHTML = "";
        cli_grande.innerHTML = "";

        var data = <?php echo json_encode($persona, JSON_HEX_TAG); ?>;
        var ok = false;
        data.forEach(function(e){
                
                if(e['documento'] == dni_val.value){
                        var no = document.createElement("li");
                        var ap = document.createElement("li");
                        var doa = document.createElement("li");
                        var di = document.createElement("li");
                        var ma = document.createElement("li");
                        var cli_g = document.createElement("h4");
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
                        cli_g.innerHTML = (e['nombre']+" "+e['apellido']+" "+e['documento']);
                        cli_grande.appendChild(cli_g);
                        ok = true;
                }
        });
        if(ok == false){
                e_info.innerHTML = "El cliente no existe, debe crear uno nuevo";
        }
        var box = document.querySelectorAll("#box_cliente");
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(180+i*5)+","+(100+i*15)+","+222+")";
                box[i].id = i;
        }
}


var btn_apellido = document.getElementById('btn_buscar_apellido');

btn_apellido.onclick = function (){
        var cli_grande = document.getElementById ("cliente_grande");
        var apellido_val = document.getElementById("apellido");
        var e_h2 = document.getElementById("h nombre");
        var e_info = document.getElementById("info_cliente");
        e_h2.innerHTML = "Detalles del cliente";
        e_info.innerHTML = "";
        cli_grande.innerHTML = "";

        var data = <?php echo json_encode($persona, JSON_HEX_TAG); ?>;
        var ok = false;
        var repeat = 0;
        data.forEach(function(e){
                
                if(e['apellido'] == apellido_val.value){
                        //console.log (apellido_val.value);
                        repeat ++;
                        var no = document.createElement("li");
                        var ap = document.createElement("li");
                        var doa = document.createElement("li");
                        var di = document.createElement("li");
                        var ma = document.createElement("li");
                        var cli_g = document.createElement("h4");
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
                        cli_g.innerHTML = (e['nombre']+" "+e['apellido']+" "+e['documento']);
                        cli_grande.appendChild(cli_g);
                        ok = true;
                }
        });
        var box = document.querySelectorAll("#box_cliente");
        for (i = 0; i < box.length; i++) {
                box[i].style.backgroundColor = "rgb("+(180+i*5)+","+(100+i*15)+","+222+")";
                box[i].id = i;
        }
        if (repeat > 1){
                e_h2.innerHTML = "Ups";
                e_info.innerHTML = "Existen varios clientes con ese apellido, buscar por dni porfavor";
                cli_grande.innerHTML = ""; 
        }
        if(ok == false){
                e_info.innerHTML = "El cliente no existe, debe crear uno nuevo";
        }
}

       
var box = document.querySelectorAll("#box");

for (i = 0; i < box.length; i++) {
        box[i].style.backgroundColor = "rgb("+(210-i*15)+","+(190-i*5)+","+242+")";
        box[i].id = i;
}



var boton_interesada = document.querySelectorAll('[name="btn_interesada"]');
var u = 0;
boton_interesada.forEach (function(e){
        var id_id = "id"+u;
        var inter_inter = "interesada"+u;
        var btn_id = "btn_id"+u;
        //console.log(boton_interesada[i]);
        var btn = document.getElementById(btn_id);
        //console.log (btn);
        btn.onclick = function (h){
               // console.log(h);
                var interested = document.getElementById(inter_inter);
                var id_cl = document.getElementById(id_id);
                
                console.log (id_cl.value);
                console.log (interested.checked);
               // set_updateinteresada();
                //console.log(id_id+"__"+inter_inter);
                
        }
        u++;
}); 
                //console.log ("a");
                

/*

function set_updateinteresada(){
               
        $.ajax({
                        url: '<?=base_url()?>Interesadas/updateInteresada',
                        type: 'POST',
                        dataType: 'json',
                        data: {},
                        cache: false,
                        async: true,
                        success: function(data){

                                console.log(data);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                                
                        }
                });
};*/

</script>