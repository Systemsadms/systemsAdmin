<?php
	session_start();
	if ($_SESSION['admin'] == 'saadmin')
		{
			include ("cnx.php");					
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SystemsAdmins C.A</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
</head>

	<style>
		#cajaClientes{
			height: 200px;
			width: 200px;
			border-radius: 20px;
			padding-top: 10px;
			vertical-align:top;
			background-color: #E6E6E6;
			background-image: url(img/usuario.png);
			background-repeat: no-repeat;
			background-position: center;
			display: inline-block;
			margin: 3px;		
		}

		#cajaFacturas{
			height: 200px;
			width: 200px;
			padding-top: 10px;
			border-radius: 20px;
			background-color: #E6E6E6;
			background-image: url(img/contenido.png);
			background-repeat: no-repeat;
			background-position: center;
			display: inline-block;
			margin: 3px;		
		}


		#cajaPagos{
			height: 200px;
			width: 200px;
			border-radius: 20px;
			background-color: #E6E6E6;
			background-image: url(img/e-commers.png);
			background-repeat: no-repeat;
			background-position: center;
			display: inline-block;
			padding-top: 10px;
			vertical-align:top;
			margin: 3px;		
		}

		#cajaTickets{
			height: 200px;
			width: 200px;
			border-radius: 20px;
			background-color: #E6E6E6;
			background-image: url(img/soporte.png);
			background-repeat: no-repeat;
			background-position: center;
			padding-top: 10px;
			vertical-align:top;
			display: inline-block;
			margin: 3px;		
		}

		#cajaProyectos{
			height: 200px;
			width: 200px;
			border-radius: 20px;
			background-color: #E6E6E6;
			background-image: url(img/proyectos.png);
			background-repeat: no-repeat;
			background-position: center;
			display: inline-block;
			padding-top: 10px;
			vertical-align:top;
			margin: 3px;		
		}

		#cajaAdmins{
			height: 200px;
			width: 200px;
			border-radius: 20px;
			background-color: #E6E6E6;
			background-image: url(img/administrador.png);
			background-repeat: no-repeat;
			background-position: center;
			padding-top: 10px;
			vertical-align:top;
			display: inline-block;
			margin: 3px;		
		}

		#cajaCerrar{
			height: 200px;
			width: 200px;
			border-radius: 20px;
			background-color: #E6E6E6;
			background-image: url(img/cerrar.png);
			background-repeat: no-repeat;
			background-position: center;
			display: inline-block;
			padding-top: 10px;
			vertical-align:top;
			margin: 3px;		
		}


		section{
			height: auto;
			min-height: 60%;
			text-align: center;
			font-size: 18px;
		}

		section a{
			color: black;
		}
    </style>  
<body>


<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="img/logoSA.png" width="100%" height="100%"></article>
		<a href="destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
	<section>
		
		<a href="usuarios"><div id='cajaClientes'>Clientes</div></a>
		<a href="tickets"><div id='cajaTickets'>Tickets</div></a>
		<a href="proyectos"><div id='cajaProyectos'>Proyectos</div></a>
		<a href="admins"><div id='cajaAdmins'>Administradores</div></a>
		<a href="facturas"><div id='cajaFacturas'>Facturas</div></a>		
		<a href="pagos"><div id='cajaPagos'>Pagos</div></a>		
		<a href="destruir.php"><div id='cajaCerrar'>Cerrar Session</div></a>
		
	</section>
<!-------------------------------//SECTION-------------------------------->



<!---------------------------------FOOTER-------------------------------->
	<footer>
		<article><!--<img src="img/logoSA.png" width="100%" height="100%"></article>-->
	</footer>
<!--------------------------------//FOOTER-------------------------------->

	
</body>
</html>
<?php			
	}else	
	{			
		session_destroy();		
		header("location:index.php");	
	}
?>	