<?php
include("conexion.php");

	function validoDatos(){		//---valido que no llegue ningun campo vacio
		$datosBien=true;
		foreach ($_POST as $key=>$valor){
			if ($valor==""){
				$datosBien=false;
			}
		}
		return $datosBien;
	}


if ($_POST['bt_enviar']){
	$datosBien=validoDatos();
	if ($datosBien==true){
		
		$id				=$_POST['id'];
		$tipo_documento	=$_POST['tipo_documento'];
		$nro_documento	=$_POST['nro_documento'];
		$apellido		=$_POST['apellido'];
		$nombres		=$_POST['nombres'];
		$domicilio		=$_POST['domicilio'];
		$telefono		=$_POST['telefono'];
		$email			=$_POST['email'];
		$SQL="UPDATE personas ";
		$SQL.="SET tipo_documento='$tipo_documento',nro_documento=$nro_documento,apellidos='$apellido',";
		$SQL.="nombres='$nombres',domicilio='$domicilio',email='$email'";
		$SQL.=" WHERE id=$id";
		$conn=_conectar();
			mysql_select_db("sgp",$conn);
			mysql_query($SQL,$conn);
		mysql_close();
		$msj="Los datos se modificaron bien.";
	}else{
		$msj="Faltan ingresar datos.";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>SGP</title>
	<meta http-equiv="Content-Language" content="es-ar">
	<title>SGP</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
<center>

<div align="center" style="width:400px">
	<table width="100%" cellpadding="0" cellspacing="0" >
		<tr>
			<td align="left"><img src="../imgs/estudiando1.jpg"  border="0" /></td>
		</tr>
	</table>
<?php
	include("header.html");
?>

		<table align="center" width="400px" border="0">
		
			<tr>
				<td>
					<fieldset>
						<legend><b>Mensaje</b></legend>
						<br />
						<form action="include/agregoPersona.php" method="post">
								<table width="100%" cellspacing="0" cellpadding="5" border="0">
									<tr>
										<td align="center"><?php echo $msj;?></td>
									</tr>
									<tr>
										<td align="center">
											<a href="../index.php">Continuar</a>
										</td>
									</tr>
								</table>
						</form>
					</fieldset>
				</td>			
			</tr>		
		</table>
<div class="text10"><b>SGP - Sistema de Gestión de Personas</b></div>
</div></center>
</body>
</html>
