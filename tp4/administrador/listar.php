<?php
	$tituloPagina = "SGU | Listado de usuarios";

	require_once '../includes/php/conexion.php';

	$db = conectarDB(DNS, USUARIO, CONTRASENIA);

	//Listar usuarios
	$sql = "SELECT p.idpersona, u.idusuario, u.nombre as username, p.apellido, p.nombre, td.descripcion as tipodocumento, p.numerodocumento, p.email
		FROM persona p, usuario u, tipodocumento td
		WHERE p.idpersona = u.idpersona
		AND p.idtipodocumento = td.idtipodocumento
		AND u.idtipousuario <> 1";

	$stmtLista = $db->prepare($sql);

	$stmtLista->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Listado</title>
	<link type="text/css" rel="stylesheet" href="../includes/css/estilos.css">
</head>

<style type="text/css">
	table{
		border: 1px solid grey;
	}

	td, th{
		padding: 0.5em 0.7em;
		border: none;
		margin: 0;
		text-align: center;
	}

	thead tr{
		background: darkslategray;
		color: whitesmoke;
	}

	tbody tr{
		border-bottom: 1px solid dimgray;
	}

	tbody tr:hover{
		background: #f1f1f1;
	}
</style>

<body>
	<?php require_once '../includes/php/header.php'; ?>
	<div class="wraper">
		<h1>Listado de usuarios</h1>

		<table>
			<thead>
				<tr>
					<th>Id Usuario</th>
					<th>Username</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Tipo documento</th>
					<th>Nro documento</th>
					<th>Email</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php while($unaFila = $stmtLista->fetch()){?>
				<tr>
					<td><?= $unaFila['idusuario'] ?></td>
					<td><?= $unaFila['username'] ?></td>
					<td><?= $unaFila['apellido'] ?></td>
					<td><?= $unaFila['nombre'] ?></td>
					<td><?= $unaFila['tipodocumento'] ?></td>
					<td><?= $unaFila['numerodocumento'] ?></td>
					<td><?= $unaFila['email'] ?></td>
					<td><a href="eliminar.php?id=<?= $unaFila['idpersona'] ?>">del</a> <a href="editar.php?id=<?= $unaFila['idpersona'] ?>">edit</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php 
		require_once '../includes/php/footer.php'; 
		$stmtLista = null;
		$db = null;
	?>
</body>
</html>