<html>
    <head>
        <style>
        .cities {
            background-color: lightblue;
            color: orange;
            margin: 30px;
            padding: 20px;
        } 
        </style>
    </head>
    
    <body>
        <div class="cities">
            <h2><?php echo 'Cursos'; ?></h2>
            <?php echo validation_errors(); ?>
            <?php echo form_open('index.php/cursos/cursos'); ?>
                <label for="nombre">Nombre</label>
                <input type="input" name="nombre" /><br />
                <label for="detalles">Detalles</label>
                <textarea name="detalles"></textarea><br />
                <label for="duracion">Duracion</label>
                <input type="number" name="duracion" /><br />
                <label for="minimo">Minimo</label>
                <input type="number" name="minimo" /><br />
                <label for="maximo">Maximo</label>
                <input type="number" name="maximo" /><br />
                <input type="submit" name="submit" value="Guardar" />
            </form>
        </div>
    </body>
</html>

