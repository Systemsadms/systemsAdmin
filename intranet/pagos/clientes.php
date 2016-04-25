<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("../cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SystemsAdmins C.A</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="../style/mediastyle.css">
</head>

	<style>
		#cajaImagenHome{
			height: 200px;
			width: 200px;
			border-radius: 5px;
			background-color: red;
			display: inline-block;
			margin: 3px;		
		}

		section{
			height: auto;
			min-height: 60%;
			text-align: center;
			background-color:#D8D8D8;
			margin: 0;
			padding:0;			
		}

		#filtroUsuarios{
			height: auto;
			width: 310px;
			min-height: 40px;
			background-color: grey;
			padding-top: 8px;
			border: 1px solid black;
			border-top:none ;
			text-align: left;
			padding-left: 5px;
			display: inline-block;
		}

		#abrirUsuario{
			height: auto;
			width: 230px;
			min-height: 40px;
			background-color: grey;
			padding-top: 8px;
			border: 1px solid black;
			border-top:none ;
			text-align: left;
			padding-left: 5px;
			display: inline-block;
		}

		.margen{margin-left: 5px;}
    </style>  
<body>

<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="../img/logoSA.png" width="100%" height="100%"></article>
		<a href="../home.php">Home</a> /<a href="index.php"> Pagos </a>/ <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
	<section>


	<?php
		if(isset($_POST['confirmar']))
		{


			require ("../cnx.php");

			$id = $_POST['id'];

			$consultaUpdate = "UPDATE pagos  SET estatus='Confirmado' WHERE id='$id'";	
			$hacerconsulta  = mysql_query ($consultaUpdate);


			echo $id;

			echo "<br><br>";
			echo "El pago ha sido confirmado";
			echo "<br><br>";
			echo "<a href='clientes.php'>Actualizar</a>";

		}
		else
		{
				?>
		<div id="filtroUsuarios">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar Pagos por:</label>
					<select name="filtro" id="filtro">						
						<option>Reportados</option>
						<option>Confirmados</option>					
					</select>
				</div>
				
				<div style="display: inline-block;">
					<input name="buscar" type="submit" id="dato" value="Buscar"/>
				</div>					
				</div>
			</form>



	<?php 


		

		require("filtros.php");

		}
	?>


</section>
<!-------------------------------//SECTION-------------------------------->



<!---------------------------------FOOTER-------------------------------->
	<footer>
		<!--<article><img src="../img/logoSA.png" width="100%" height="100%"></article>-->
	</footer>
<!--------------------------------//FOOTER-------------------------------->	
</body>
</html>
<?php			
	}else	
	{			
		session_destroy();		
		header("location:../index.php");	
	}
?>	