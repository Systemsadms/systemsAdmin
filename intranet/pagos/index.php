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
			width: 600px;
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

		.botonPagos{
			height: 50px;
			width: 200px;
			border-radius: 5px;
			background-color: blue;
			color: white;
			font-size: 0.9em;
			display: inline-block;			
			padding: 0;
			cursor: pointer;
			padding-top: 17px;
			margin-left: 10px;
			margin-top: 50px;
		}

		.margen{margin-left: 5px;}
    </style>  
<body>

<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="../img/logoSA.png" width="100%" height="100%"></article>
		<a href="../home.php">Home</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
	<section>


<a href="clientes.php"><div class="botonPagos">Pagos Recibidos</div></a>

<a href="admin.php"><div class="botonPagos">Pagos Admins</div></a>

<a href=""><div class="botonPagos">Pagos a Terceros</div></a>


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