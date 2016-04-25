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


		section{
			height: auto;
			min-height: 60%;
			text-align: center;
			background-color:#D8D8D8;			
			margin: 0;
			padding: 0;			
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

		.margen{margin-left: 5px;}

		aside{			
			min-width: 250px;
			width: auto;
			height: auto;
			padding-left: 20px;			
			text-align: left;
			display: inline-block;
			border-radius: 5px;
			padding-bottom:20px; 
			background-color: green;
		}

		aside div{
			margin-top: 20px;
		}

		#botonera{
			width: 250px;
			height: auto;			
			display: inline-block;
			background-color: none;
			vertical-align: top;
		}

		
		#boton{
			height: 50px;
			width: 200px;
			border-radius: 5px;
			background-color: blue;
			color: white;			
			margin: 3px;
			vertical-align: top;
			padding-top: 10px;
		}

		.boton{
			height: 50px;
			width: 200px;
			border-radius: 5px;
			background-color: blue;
			color: white;
			font-size: 0.9em;
			margin-top: 5px;
			padding: 0;
			cursor: pointer;
		}

		#boton a{
			color: white;
			text-decoration: none;
		}

		#cajaJs{
			width: 100%;
			height: auto;
			background-color: none;			
		}


    </style>  
<body>


<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="../img/logoSA.png" height="100%" width="100%"></article>
		<a href="../home.php">Home</a> / <a href="index.php">Clientes</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
<section>


		
					<?php
						if(isset($_POST['confimar']))							
						{
							require ("../cnx.php");
							$ssql 		= mysql_query("SELECT * FROM sessiones WHERE idSession='1'");
							$usuario	= mysql_result($ssql,0,"usuario");

							$consultaUpdate = "UPDATE usuarios  SET estatus='confirmado' WHERE id='$usuario'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>


								<div id="cajaJs">
									<br>
									<font color="red">
									El Usuario ahora esta confirmado y sus datos de acceso fueron enviados a su direccion de correo electronico
									</font>
									<br><br>
								</div>
							<?php							
						}
						elseif(isset($_POST['email']))
						{
							?>
								<div id="cajaJs">
								<br><br>
									<form method="post" action="#">
										<label>Asunto:</label>
										<input type="text" name="asunto"/>
										<br>
										<label>Mensaje:</label>
										<textarea name="mensaje"></textarea> 
										<br>
										<input type="submit" name="enviarEmail" value="Enviar Correo"/>
									</form>
								</div>
								<br><br>
							<?php
						}
						elseif(isset($_POST['editar']))
						{
							?>
								<div id="cajaJs">
									Editar Usuario
								</div>
							<?php							
						}
						elseif(isset($_POST['desactivar']))
						{
							require ("../cnx.php");
							$ssql 		= mysql_query("SELECT * FROM sessiones WHERE idSession='1'");
							$usuario	= mysql_result($ssql,0,"usuario");

							$consultaUpdate = "UPDATE usuarios  SET estatus='desactivado' WHERE id='$usuario'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>


								<div id="cajaJs">
									<br>
									<font color="red">
									El Usuario ahora esta desactivado y fue enviado un correo electronico para su notificacion.
									</font>
									<br><br>
								</div>
							<?php							
						}
						elseif(isset($_POST['enviarEmail']))
						{
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										Se ha enviado correo al usuario.. Fatlta configurar Mailing
									</font>	
									<br><br>
								</div>
							<?php
						}
					?>
				



<?php
	$IdUser = $_POST['id'];
	require ("../cnx.php");

	$ssql = "SELECT * FROM usuarios WHERE id='$IdUser'";
	$rs = mysql_query($ssql,$conexion);			
		if (mysql_num_rows($rs)>0)
		{


			$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$IdUser'");
			$usuario	= mysql_result($ssql,0,"id");
			$tipo		= mysql_result($ssql,0,"tipo");
			$nombres	= mysql_result($ssql,0,"nombres");
			$apellidos	= mysql_result($ssql,0,"apellidos");
			$rif		= mysql_result($ssql,0,"rif");			
			$email		= mysql_result($ssql,0,"email");
			$pass		= mysql_result($ssql,0,"pass");
			$telefono	= mysql_result($ssql,0,"telefono");
			$celular	= mysql_result($ssql,0,"celular");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			$zipcode	= mysql_result($ssql,0,"zipcode");
			$encargado	= mysql_result($ssql,0,"encargado");
			$cargo		= mysql_result($ssql,0,"cargo");
			$como		= mysql_result($ssql,0,"como");
			$fecha		= mysql_result($ssql,0,"fecha");
			$estatus	= mysql_result($ssql,0,"estatus");

			//Guarda el ID de usuario para manener datos entre ventanas
			$consultaUpdate = "UPDATE sessiones SET usuario='$IdUser'";	
			$hacerconsulta  = mysql_query ($consultaUpdate);


			?>
				<aside>
					<h2>Datos del Cliente</h2>

					<div><strong>ID:</strong> <?php echo $usuario; ?></div>
					<div><strong>Tipo:</strong> <?php echo $tipo; ?></div>
					<div><strong>Nombres:</strong> <?php echo $nombres; ?></div>
					<div><strong>Apellidos:</strong> <?php echo $apellidos; ?></div>
					<div><strong>Rif:</strong> <?php echo $rif; ?></div>
					<div><strong>Email:</strong> <?php echo $email; ?></div>
					<div><strong>Password:</strong> <?php echo $pass; ?></div>
					<div><strong>Telefono:</strong> <?php echo $telefono; ?></div>
					<div><strong>Celular:</strong> <?php echo $celular; ?></div>
					<div><strong>Pais:</strong> <?php echo $pais; ?></div>
					<div><strong>Estado:</strong> <?php echo $estado; ?></div>
					<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
					<div><strong>Direccion:</strong> <?php echo $dir; ?></div>
					<div><strong>Zip:</strong> <?php echo $zipcode; ?></div>
					<div><strong>Encargado:</strong> <?php echo $encargado; ?></div>
					<div><strong>Cargo:</strong> <?php echo $cargo; ?></div>
					<div><strong>Ref:</strong> <?php echo $como; ?></div>
					<div><strong>Fecha de Reg:</strong> <?php echo $fecha; ?></div>
					<div><strong>Estatus:</strong> <?php echo $estatus; ?></div>

				</aside>
				
				<div id="botonera">
					<form method="post" action="#">
						<input type="submit" name="confimar" class="boton" value="Confirmar/Activar"  />
						<input type="submit" name="email" class="boton" value="Enviar Email"  />
						<input type="submit" name="editar" class="boton" value="Editar Cliente"  />
						<input type="submit" name="desactivar" class="boton" value="Desactivar Cliene"  />			
					</form>
				</div>
			<?php

		}
		else
		{


			require ("../cnx.php");
			$ssql 		= mysql_query("SELECT * FROM sessiones WHERE idSession='1'");
			$usuario	= mysql_result($ssql,0,"usuario");

			$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$usuario'");
			$tipo		= mysql_result($ssql,0,"tipo");
			$nombres	= mysql_result($ssql,0,"nombres");
			$apellidos	= mysql_result($ssql,0,"apellidos");
			$rif		= mysql_result($ssql,0,"rif");			
			$email		= mysql_result($ssql,0,"email");
			$pass		= mysql_result($ssql,0,"pass");
			$telefono	= mysql_result($ssql,0,"telefono");
			$celular	= mysql_result($ssql,0,"celular");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			$zipcode	= mysql_result($ssql,0,"zipcode");
			$encargado	= mysql_result($ssql,0,"encargado");
			$cargo		= mysql_result($ssql,0,"cargo");
			$como		= mysql_result($ssql,0,"como");
			$fecha		= mysql_result($ssql,0,"fecha");
			$estatus	= mysql_result($ssql,0,"estatus");

			?>
				<aside>
					<h2>Datos del Cliente</h2>

					<div><strong>ID:</strong> <?php echo $usuario; ?></div>
					<div><strong>Tipo:</strong> <?php echo $tipo; ?></div>
					<div><strong>Nombres:</strong> <?php echo $nombres; ?></div>
					<div><strong>Apellidos:</strong> <?php echo $apellidos; ?></div>
					<div><strong>Rif:</strong> <?php echo $rif; ?></div>
					<div><strong>Email:</strong> <?php echo $email; ?></div>
					<div><strong>Password:</strong> <?php echo $pass; ?></div>
					<div><strong>Telefono:</strong> <?php echo $telefono; ?></div>
					<div><strong>Celular:</strong> <?php echo $celular; ?></div>
					<div><strong>Pais:</strong> <?php echo $pais; ?></div>
					<div><strong>Estado:</strong> <?php echo $estado; ?></div>
					<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
					<div><strong>Direccion:</strong> <?php echo $dir; ?></div>
					<div><strong>Zip:</strong> <?php echo $zipcode; ?></div>
					<div><strong>Encargado:</strong> <?php echo $encargado; ?></div>
					<div><strong>Cargo:</strong> <?php echo $cargo; ?></div>
					<div><strong>Ref:</strong> <?php echo $como; ?></div>
					<div><strong>Fecha de Reg:</strong> <?php echo $fecha; ?></div>
					<div><strong>Estatus:</strong> <?php echo $estatus; ?></div>

				</aside>
				
				<div id="botonera">
					<form method="post" action="#">
						<input type="submit" name="confimar" class="boton" value="Confirmar/Activar"  />
						<input type="submit" name="email" class="boton" value="Enviar Email"  />
						<input type="submit" name="editar" class="boton" value="Editar Cliente"  />
						<input type="submit" name="desactivar" class="boton" value="Desactivar Cliene"  />			
					</form>
				</div>

			<?php
		
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