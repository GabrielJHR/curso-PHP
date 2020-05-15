<?php
    $titulo = "Paso 1";
    include_once ('includes/php/cabecera.php');

    session_start();
?>
<?php
    //Si el paso 1 fue establecido
    if (isset($_SESSION['paso1'])){?>

<div class="container p-5">
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h1>Registro</h1>
        </div>
        <div class="card-body p-4">
            <h2 class="mb-4">Información personal</h2>
            <form action="paso2.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $_SESSION['username'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?= $_SESSION['password'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="firstname">Nombre:</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $_SESSION['firstname'] ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="lastname">Apellido:</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $_SESSION['lastname'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-2">
                        <label for="tipo_doc">Tipo de documento:</label>
                        <?php
                            switch ($_SESSION['tipo_doc']){
                                case "DNI" : echo '<select id="tipo_doc" name="tipo_doc" class="form-control">
                                    <option selected="DNI">DNI</option>
                                    <option value="LC">LC</option>
                                    <option value="LE">LE</option>
                                </select>';
                                break;

                                case "LC" : echo '<select id="tipo_doc" name="tipo_doc" class="form-control">
                                    <option value="DNI">DNI</option>
                                    <option value="LC" selected>LC</option>
                                    <option value="LE">LE</option>
                                </select>';
                                break;

                                case "LE" : echo '<select id="tipo_doc" name="tipo_doc" class="form-control">
                                    <option value="DNI">DNI</option>
                                    <option value="LC">LC</option>
                                    <option value="LE" selected>LE</option>
                                </select>';
                                break;
                            }
                        ?>
                        
                    </div>
                    <div class="form-group col-md-5">
                        <label for="documento">Numero de documento:</label>
                        <input type="text" name="documento" id="documento" class="form-control" value="<?= $_SESSION['documento'] ?>">
                    </div>
                </div>
                Sexo:
                <?php 
                 if ($_SESSION['sexo'] == "masculino") {
                    echo '
                    <div class="form-check">
                        <input checked type="radio" name="sexo" id="masculino" class="form-check-input" value="masculino">
                        <label for="masculino">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sexo" id="femenino" class="form-check-input" value="femenino">
                        <label for="femenino">Femenino</label>
                    </div>
                    ' ;  
                 }else{
                    echo '
                    <div class="form-check">
                        <input type="radio" name="sexo" id="masculino" class="form-check-input" value="masculino">
                        <label for="masculino">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input checked type="radio" name="sexo" id="femenino" class="form-check-input" value="femenino">
                        <label for="femenino">Femenino</label>
                    </div>
                    '; 
                 }
                ?>
                
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" name="nacionalidad" id="nacionalidad" class="form-control col-md-4" value="<?= $_SESSION['nacionalidad'] ?>">
                </div>
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
            <h2 class="mb-4">Información personal</h2>
            <form action="paso2.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="firstname">Nombre:</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="lastname">Apellido:</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-2">
                        <label for="tipo_doc">Tipo de documento:</label>
                        <select id="tipo_doc" name="tipo_doc" class="form-control">
                            <option value="DNI" selected>DNI</option>
                            <option value="LC">LC</option>
                            <option value="LE">LE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="documento">Numero de documento:</label>
                        <input type="text" name="documento" id="documento" class="form-control">
                    </div>
                </div>
                Sexo:
                <div class="form-check">
                    <input checked type="radio" name="sexo" id="masculino" class="form-check-input" value="masculino">
                    <label for="masculino">Masculino</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="sexo" id="femenino" class="form-check-input" value="femenino">
                    <label for="femenino">Femenino</label>
                </div>
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" name="nacionalidad" id="nacionalidad" class="form-control col-md-4">
                </div>
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