<!DOCTYPE html>
<html lang="es">
<?php 
    include_once('scripts/head.php')
?>
<body>
    <?php
        require_once('scripts/ej3.php')
    ?>

    <div class="card col-md-5 m-4 p-md-5">
        <h4 class="pb-4">Formulario</h4>
        <form action="pagina.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="web">Pagina web:</label>
                <input type="text" class="form-control" name="web" id="web">
            </div>
            <div class="mb-3">
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" name="comentario" id="comentario"></textarea>
            </div>
            <input type="submit" value="Enviar" name="enviar" class="btn btn-lg btn-primary">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>