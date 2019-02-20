<html>
    <head>
    <h2><?php echo 'Generar nuevo cliente'; ?></h2>
        <div id="ElegirCliente" class="modal">
                <!-- Modal content -->
                <div class="table-responsive">
                        <div id="table_clientes"></div>
                </div>
                <div class="modal-content">
                        <span class="close">&times;</span>
                        <label for="sel1">Select list (select one):</label>
                        <select class="form-control" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                        </select>
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">Seleccionar cliente</label>
                                        <select class="form-control" id="clientes" name="clientes">
                                        </select>
                                </div>
                        </div>
                </div>
        </div>
        <style>
                .cities {
                background-color: lightblue;
                color: orange;
                margin: 30px;
                padding: 20px;
                } 
                .cities1 {
                background-color: green;
                color: black;
                margin: 30px;
                padding: 20px;
                } 
                .cities2 {
                background-color: white;
                color: black;
                margin: 30px;
                padding: 20px;
                } 
                .modal {
                        display: none; /* Hidden by default */
                        position: fixed; /* Stay in place */
                        z-index: 1; /* Sit on top */
                        left: 0;
                        top: 0;
                        width: 100%; /* Full width */
                        height: 100%; /* Full height */
                        overflow: auto; /* Enable scroll if needed */
                        background-color: rgb(0,0,0); /* Fallback color */
                        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                }

                /* Modal Content/Box */
                .modal-content {
                        background-color: #fefefe;
                        margin: 15% auto; /* 15% from the top and centered */
                        padding: 20px;
                        border: 1px solid #888;
                        width: 80%; /* Could be more or less, depending on screen size */
                }

                /* The Close Button */
                .close {
                        color: #aaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                }

                .close:hover,
                .close:focus {
                        color: black;
                        text-decoration: none;
                        cursor: pointer;
                }
        </style>
    </head>
    <body>

        <button id="elegircliente">Seleccionar cliente</button>

        <div class="cities">
                <?php echo validation_errors(); ?>
                <?php echo form_open('index.php/interesadas/interesadas'); ?>
                <label for="nombre">Nombre</label>
                <input type="input" name="nombre" /><br />
                <label for="apellido">Apellido</label>
                <input type="input" name="apellido" /><br />
                <label for="documento">Documento</label>
                <input type="number" name="documento" /><br />
                <label for="direccion">Direccion</label>
                <input type="input" name="direccion" /><br />
                <label for="mail">Mail</label>
                <input type="input" name="mail" /><br />
                <input type="date" name="f_alta" value="<?php date("Y-m-d");?>"/><br />
                <input type="submit" name="submit" value="Guardar" />
                </form>
        </div>
        <div class="cities1">
        <h2><?php echo $title; ?></h2>
        <?php foreach ($materia as $course): ?>
                <div class="cities2">
                        <h3><?php echo $course['nombre']; ?></h3>
                        <div class="main">
                                <?php echo $course['detalles']; ?>
                        </div>
                </div>
        <?php endforeach; ?>
        </div>
    </body>
</html>

<script>
// Get the modal
        var modal = document.getElementById('ElegirCliente');

        // Get the button that opens the modal
        var btn = document.getElementById("elegircliente");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal 
        btn.onclick = function() {
                console.log(window);
                modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
                modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
                if (event.target == modal) {
                        modal.style.display = "none";
                }       
        }

        
       
</script>