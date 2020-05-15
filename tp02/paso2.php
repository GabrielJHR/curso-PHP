<?php
    $titulo = "Paso 2";
    include_once ('includes/php/cabecera.php');

    session_start();
    if(isset($_POST['enviar'])){
        $_SESSION['paso1'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['tipo_doc'] = $_POST['tipo_doc'];
        $_SESSION['documento'] = $_POST['documento'];
        $_SESSION['sexo'] = $_POST['sexo'];
        $_SESSION['nacionalidad'] = $_POST['nacionalidad'];
    }
?>

<?php 

    if(isset($_SESSION['paso2'])){
        ?>

<div class="container p-5">
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h1>Registro</h1>
        </div>
        <div class="card-body p-4">
            <h2 class="mb-4">Información de contacto</h2>
            <form action="paso3.php" method="POST">
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $_SESSION['email'] ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="<?= $_SESSION['telefono'] ?>">
                    </div>
                    <div class="form-group col-md">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" id="celular" class="form-control" value="<?= $_SESSION['celular'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control" value="<?= $_SESSION['domicilio'] ?>">
                </div>
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <?php 
                        switch ($_SESSION['provincia']){
                            case "Entre Rios" : echo '<select name="provincia" id="provincia" class="form-control col-md-4">
                            <option value="">Elegir provincia</option>
                            <option value="Entre Rios" selected>Entre Ríos</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Cordoba">Córdoba</option>
                            <option value="Santa Fe">Santa Fé</option>
                            </select>';
                            break;

                            case "Buenos Aires" : echo '<select name="provincia" id="provincia" class="form-control col-md-4">
                            <option value="">Elegir provincia</option>
                            <option value="Entre Rios">Entre Ríos</option>
                            <option value="Buenos Aires" selected>Buenos Aires</option>
                            <option value="Cordoba">Córdoba</option>
                            <option value="Santa Fe">Santa Fé</option>
                            </select>';
                            break;

                            case "Cordoba" : echo '<select name="provincia" id="provincia" class="form-control col-md-4">
                            <option value="">Elegir provincia</option>
                            <option value="Entre Rios">Entre Ríos</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Cordoba" selected>Córdoba</option>
                            <option value="Santa Fe">Santa Fé</option>
                            </select>';
                            break;

                            case "Santa Fe" : echo '<select name="provincia" id="provincia" class="form-control col-md-4">
                            <option value="">Elegir provincia</option>
                            <option value="Entre Rios">Entre Ríos</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Cordoba">Córdoba</option>
                            <option value="Santa Fe" selected>Santa Fé</option>
                            </select>';
                            break;

                            default : echo '<select name="provincia" id="provincia" class="form-control col-md-4">
                            <option value="" selected>Elegir provincia</option>
                            <option value="Entre Rios">Entre Ríos</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Cordoba">Córdoba</option>
                            <option value="Santa Fe">Santa Fé</option>
                            </select>';
                            break;
                        }    
                    ?>
                    
                </div>
                <div class="form-group">
                    <label for="localidad">Localidad:</label>
                    <input type="text" name="localidad" id="localidad" class="form-control col-md-6" value="<?= $_SESSION['localidad'] ?>">
                </div>
                <a href="paso1.php" class="btn btn-outline-primary btn-lg">Paso anterior</a>
                <input type="submit" value="Siguiente" name="enviar" class="btn btn-primary btn-lg">
            </form>
        </div>
    </div>
</div>

        <?php
    }else{

        ?>
        
        <div class="container p-5">
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h1>Registro</h1>
        </div>
        <div class="card-body p-4">
            <h2 class="mb-4">Información de contacto</h2>
            <form action="paso3.php" method="POST">
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" id="celular" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control">
                </div>
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <select name="provincia" id="provincia" class="form-control col-md-4">
                        <option value="" selected>Elegir provincia</option>
                        <option value="Entre Rios">Entre Ríos</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Cordoba">Córdoba</option>
                        <option value="Santa Fe">Santa Fé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="localidad">Localidad:</label>
                    <input type="text" name="localidad" id="localidad" class="form-control col-md-6">
                </div>
                <a href="paso1.php" class="btn btn-outline-primary btn-lg">Paso anterior</a>
                <input type="submit" value="Siguiente" name="enviar" class="btn btn-primary btn-lg">
            </form>
        </div>
    </div>
</div>

        
        <?php

    }

?>


<?php 
    include_once ('includes/php/pie.php')
?>