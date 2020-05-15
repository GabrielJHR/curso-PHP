<?php
    $titulo = "Paso 3";
    include_once ('includes/php/cabecera.php');

    session_start();
    if(isset($_POST['enviar'])){
        $_SESSION['paso2'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['telefono'] = $_POST['telefono'];
        $_SESSION['celular'] = $_POST['celular'];
        $_SESSION['domicilio'] = $_POST['domicilio'];
        $_SESSION['provincia'] = $_POST['provincia'];
        $_SESSION['localidad'] = $_POST['localidad'];
    }
?>

<div class="container p-5">
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h1>Información</h1>
        </div>
        <div class="card-body p-4">
            <h2 class="mb-4">Información personal</h2>
            <p class="mb-5"><b>Nombre de usuario: </b><?= $_SESSION['username'] ?></br>
            <b>Nombre: </b><?= ucwords($_SESSION['firstname']) ?></br>
            <b>Apellido: </b><?= ucwords($_SESSION['lastname']) ?></br>
            <b>Documento: </b><?= $_SESSION['documento'] ?> (<?= $_SESSION['tipo_doc'] ?>)</br>
            <b>Sexo: </b><?= ucwords($_SESSION['sexo']) ?></br>
            <b>Nacionalidad: </b><?= $_SESSION['nacionalidad'] ?></br>
            </p>
            <h2 class="mb-4">Información de contacto</h2>
            <p class="mb-5"><b>Correo electrónico: </b><?= $_SESSION['email'] ?></br>
            <b>Telefono: </b><?= $_SESSION['telefono'] ?></br>
            <b>Celular: </b><?= $_SESSION['celular'] ?></br>
            <b>Domicilio: </b><?= $_SESSION['domicilio'] ?></br>
            <b>Provincia: </b><?= $_SESSION['provincia'] ?></br>
            <b>Localidad: </b><?= $_SESSION['localidad'] ?></br>
            </p>
            <a href="paso2.php" class="btn btn-outline-primary btn-lg">Paso anterior</a>
            <a href="finalizar.php" class="btn btn-outline-danger btn-lg">Cerrar sesión</a>
            
        </div>
    </div>
</div>