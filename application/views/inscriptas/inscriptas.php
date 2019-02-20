
<html>
    <head>
        <style>
        .cities {
            background-color: lightblue;
            color: orange;
            margin: 30px;
        } 
        #myHeader {
            background-color: lightblue;
            color: black;
            padding: 40px;
            text-align: center;
        } 
        </style>
    </head>
    <body>
        <h2><?php echo 'Historial'; ?></h2>
        <div class="cities">
            <h1 id="myHeader">Inscriptas:</h1>
            <select>
                <option value="" disabled selected>Seleccionar cliente</option>
                <option value="hurr">opcion 1</option>
                <option value="hurr">opcion 2</option>
            </select>
            <div class="cities">
                <ul>
                    <li><a href="#">Curso 1</a><button type="button">Señado</button><button type="button">No Señado</button></li>
                    <li><a href="#">Curso 2</a><button type="button">Señado</button><button type="button">No Señado</button></li>
                    <li><a href="#">Curso 3</a><button type="button">Señado</button><button type="button">No Señado</button></li>
                </ul>
            </div>
        </div>
    </body>
</html>


