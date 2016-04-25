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
		<a href="../home.php">Home</a> / <a href="index.php">Tickets</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
<section>


		
					<?php
						if(isset($_POST['facturar']))							
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];

							$consultaUpdate = "UPDATE tickets  SET estatus='Por facturar' WHERE ticket='$ticket'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Ticket ha sido facturado.
									</font>
									<br><br>
								</div>
							<?php							
						}						
						elseif(isset($_POST['abrir']))
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];

							$consultaUpdate = "UPDATE tickets  SET estatus='Abierto' WHERE ticket='$ticket'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Ticket se ha Abierto nuevamente.
									</font>
									<br><br>
								</div>
							<?php								
						}
						elseif(isset($_POST['cerrar']))
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];

							$consultaUpdate = "UPDATE tickets  SET estatus='Cerrado' WHERE ticket='$ticket'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Ticket se ha Cerrado.
									</font>
									<br><br>
								</div>
							<?php								
						}
						elseif(isset($_POST['atras']))
						{
							?>
								<script type="text/javascript">							    
							      	document.location = 'index.php';
							  	</script>
							<?php
						}
						elseif(isset($_POST['asignarTicket']))
						{
							require ("../cnx.php");
							$ticket = $_POST['ticket'];
							$admin 	= $_POST['admin'];

							$consultaUpdate = "UPDATE tickets  SET admin='$admin' WHERE ticket='$ticket'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El Ticket a sido Asignado a: <?php echo $admin?>
									</font>
									<br><br>
								</div>
							<?php	
						}
						elseif(isset($_POST['asignar']))
						{
							$ticket = $_POST['ticket'];
							require ("../cnx.php");

							$consulta_mysql='select * from administradores where estatus="Activo"';
							$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
							  
							
							?>
								<div id="cajaJs">
								<br><br>
									<form method="post" action="#">
										<label>Administradores:</label>

										<?php
										echo "<select name='admin'>";
											?><option>Systems Admins</option><?php											
											while($fila=mysql_fetch_array($resultado_consulta_mysql))
											{												
										    	echo "<option>".$fila['nombres']." ".$fila['apellidos']."</option>";
											}
										echo "</select>";
										?>										
										
										<input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
										<input type="submit" name="asignarTicket" value="Asignar Ticket"/>
									</form>

									<hr>
										<?php
										$consulta = "SELECT * FROM administradores WHERE estatus='Activo';";
										$hacerconsulta=mysql_query ($consulta,$conexion);
										//$hacerconsulta=mysql_query ($consulta,$conexion);
										

										echo "<table border='1' bordercolor='#3ADF00' align='center'>";
										echo "<tr>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Ciudad</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad1</b></td>";
										echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad2</b></td>";						
										echo "</tr>";
										
										
										$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
										
										while ($reg)
										{
										echo "<tr>";
										echo "<td align='center'>".$reg[3]."</td>";
										echo "<td align='center'>".$reg[4]."</td>";
										echo "<td align='center'>".$reg[7]."</td>";
										echo "<td align='center'>".$reg[8]."</td>";
										echo "<td align='center'>".$reg[9]."</td>";
										echo "<td align='center'>".$reg[11]."</td>";				
										echo "<td align='center'>".$reg[13]."</td>";
										echo "<td align='center'>".$reg[14]."</td>";


										$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
										echo "</tr>";
										}
										echo "</table>";
										mysql_close($conexion);
										
										
										?>
									<hr>
								</div>
								<br><br>
							<?php
						}
					?>
				



<?php	
	$ticket = $_POST['ticket'];
	require ("../cnx.php");

	$ssql = "SELECT * FROM tickets WHERE ticket='$ticket'";
	$rs = mysql_query($ssql,$conexion);			
		if (mysql_num_rows($rs)>0)
		{

			$ssql 		= mysql_query("SELECT * FROM tickets WHERE ticket='$ticket'");			
			$idCliente	= mysql_result($ssql,0,"cliente");
			$hora		= mysql_result($ssql,0,"hora");
			$fecha		= mysql_result($ssql,0,"fecha");
			$area		= mysql_result($ssql,0,"area");			
			$asunto		= mysql_result($ssql,0,"asunto");
			$mensaje	= mysql_result($ssql,0,"mensaje");
			$estatus	= mysql_result($ssql,0,"estatus");
			$rClient	= mysql_result($ssql,0,"ra");
			$rAdmin		= mysql_result($ssql,0,"rc");
			$rSystems	= mysql_result($ssql,0,"rs");
			$seguimientos= mysql_result($ssql,0,"seguimientos");
			$asignado	= mysql_result($ssql,0,"admin");


			$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$idCliente'");			
			$nombres	= mysql_result($ssql,0,"nombres");
			$apellido	= mysql_result($ssql,0,"apellidos");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			
			//Guarda el ID de usuario para manener datos entre ventanas
			//$consultaUpdate = "UPDATE sessiones SET usuario='$IdUser'";	
			//$hacerconsulta  = mysql_query ($consultaUpdate);


			?>
				<aside>
					<h2>Datos del Tickets</h2>

					<div><strong>Ticket:</strong> <?php echo $ticket; ?></div>
					<div><strong>Asignado:</strong> <?php echo $asignado; ?></div>
					<div><strong>Estatus:</strong> <?php echo $estatus; ?></div>
					<div><strong>ID Cliente:</strong> <?php echo $idCliente; ?></div>
					<div><strong>Cliente:</strong> <?php echo $nombres . " ". $apellido; ?></div>
					<div><strong>Area:</strong> <?php echo $area; ?></div>
					<div><strong>Asunto:</strong> <?php echo $asunto; ?></div>
					<div><strong>Mensaje:</strong> <?php echo $mensaje; ?></div>
					<div><strong>Hora:</strong> <?php echo $hora; ?></div>
					<div><strong>Fecha:</strong> <?php echo $fecha; ?></div>
					<div><strong>rAdmin:</strong> <?php echo $rAdmin; ?></div>
					<div><strong>rClient:</strong> <?php echo $rClient; ?></div>
					<div><strong>rSystems:</strong> <?php echo $rSystems; ?></div>
					<div><strong>Seguimientos:</strong> <?php echo $seguimientos; ?></div>
					<br>
					<font color="white">Localizacion de Cliente</font>
					<hr>
					<div><strong>Pais:</strong> <?php echo $pais; ?></div>
					<div><strong>Estado:</strong> <?php echo $estado; ?></div>
					<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
					<div><strong>Dir:</strong> <?php echo $dir; ?></div>
										
					
					
					
					

				</aside>
				
				<div id="botonera">
					<form method="post" action="#">
						<input type="hidden" name="ticket" value="<?php echo $ticket; ?>"></input>
						<input type="submit" name="asignar" class="boton" value="Asignar Ticket"  />
						<input type="submit" name="facturar" class="boton" value="Facturar Ticket"  />
						<input type="submit" name="abrir" class="boton" value="ReAbrir Ticket"  />
						<input type="submit" name="cerrar" class="boton" value="Cerrar Ticket"  />
						<input type="submit" name="atras" class="boton" value="Volver"  />			
					</form>
				</div>
			<?php

		}
		else
		{
			echo "Lo lamentamos por seguridad, la ventana ha sido cerrarda, vuelva  a abrir el ticket y realice la gestion deseada";
			echo "<br><br>";	
			echo "<a href='index.php'>VOLVER A TICKETS</a>";		
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