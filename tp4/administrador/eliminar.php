<?php 
	require_once '../includes/php/conexion.php';

	$db = conectarDB(DNS, USUARIO, CONTRASENIA);

	$sql = "SELECT p.idpersona, u.nombre as username, p.nombre, p.apellido
		FROM usuario u, persona p
		WHERE p.idpersona = u.idpersona
		AND p.idpersona = ?";

	$stmtInfo = $db->prepare($sql);

	$stmtInfo->execute(array($_GET['id']));

	$info = $stmtInfo->fetch();
?>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Listado</title>
	<link type="text/css" rel="stylesheet" href="../includes/css/estilos.css">
</head>
<style type="text/css">
	.card{
		padding: 1em;
		border: 1px solid #dddddd;
		width: 300px;
		box-shadow: 5px 5px 20px rgba(0,0,0,0.15);
	}
	.card-footer{
		padding-top: 1em
	}
</style>
<body>
	<div class="wraper">
		<h1>Eliminar usuario</h1>
		<div class="card">
			<div class="card-body">¿Realmente desea eliminar el usuario <b><?= $info['username'] ?></b> perteneciente a <b><?= $info['apellido'] ?>, <?= $info['nombre'] ?></b>?
			</div>
			<div class="card-footer">
				<a href="eliminar_usuario.php?id=<?= $info['idpersona'] ?>"><button>Aceptar</button></a>
				<a href="listar.php"><button>Cancelar</button></a>
			</div>
		</div>
	</div>

	<?php 
		require_once '../includes/php/footer.php'; 
		$stmtInfo = null;
		$db = null;
	?>
</body>