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
			max-width: 400px;
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
		<a href="../home.php">Home</a> / <a href="index.php">Administradores</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
<section>


		
					<?php
						if(isset($_POST['activar']))							
						{
							require ("../cnx.php");
							$idAdmin = $_POST['idAdmin'];

							$consultaUpdate = "UPDATE administradores  SET estatus='Activo' WHERE idAdmin='$idAdmin'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El administrador ha sido activado.
									</font>
									<br><br>
								</div>
							<?php							
						}						
						elseif(isset($_POST['desactivar']))							
						{
							require ("../cnx.php");
							$idAdmin = $_POST['idAdmin'];

							$consultaUpdate = "UPDATE administradores  SET estatus='Inactivo' WHERE idAdmin='$idAdmin'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
							?>
								<div id="cajaJs">
									<br>
									<font color="red">
										El administrador ha sido desactivado.
									</font>
									<br><br>
								</div>
							<?php							
						}			
						elseif(isset($_POST['editar']))
						{
															?>
								<div id="cajaJs">
									<br>
									<font color="red">
										Instalar Funcion Editar Perfil
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
										Instalar Funcion Enviar Email
									</font>
									<br><br>
								</div>
							<?php	
						
						}						
						elseif(isset($_POST['tickets']))
						{
							require ("../cnx.php");
							$idAdmin = $_POST['idAdmin'];

							$ssql 		= mysql_query("SELECT * FROM administradores WHERE idAdmin='$idAdmin'");			
							$nombres	= mysql_result($ssql,0,"nombres");			
							$apellidos	= mysql_result($ssql,0,"apellidos");
							
							$administrador= $nombres . " ". $apellidos;


							
				
						echo "<div id='cajaJs'><hr>";

							echo "Tickets Asignados";

							$consulta = "SELECT * FROM tickets WHERE admin='$administrador';";
							$hacerconsulta=mysql_query ($consulta,$conexion);

							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Hora</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Asunto</b></td>";						
							echo "<td align='center' bgcolor='#58ACFA'><b>Client</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>News</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
							echo "<td align='center' style='border: inset 0pt'></td>";
							echo "</tr>";
						
						
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center'>".$reg[0]."</td>";
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[4]."</td>";
							echo "<td align='center'>".$reg[5]."</td>";
							
							if ($reg[8]>0)
								{
									echo "<td align='center'><font color='#8A0829'>".$reg[8]."</font></td>";
								}
								else
								{
									echo "<td align='center'><font color='green'>".$reg[8]."</font></td>";
								}	
							if ($reg[9]>0)
								{
									echo "<td align='center'><font color='#8A0829'>".$reg[9]."</font></td>";
								}
								else
								{
									echo "<td align='center'><font color='green'>".$reg[9]."</font></td>";
								}	
							if ($reg[10]>0)
								{
									echo "<td align='center'><font color='#8A0829'>".$reg[10]."</font></td>";
								}
								else
								{
									echo "<td align='center'><font color='green'>".$reg[10]."</font></td>";
								}
							echo "<td align='center'>".$reg[7]."</td>";		
							echo "<td align='center'>".$reg[12]."</td>";						
							echo "<td align='center' style='border: inset 0pt'>				
									<form action='../tickets/tickets.php' method='post'>								
										<input type='hidden' name='ticket' value=".$reg[0].">
										<input type='submit' name='ver' value='Ver Ticket'>
									</form>				
							</td>";//FIN DEL echo

						
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);
				

							echo "<hr></div>";


								
						
						}						
						elseif(isset($_POST['atras']))
						{
							?>
								<script type="text/javascript">							    
							      	document.location = 'index.php';
							  	</script>
							<?php
						}

					
					?>
				

<!------------------------------------------------------------------------------------------------------------------------>

<?php	
	$idAdmin = $_POST['idAdmin'];
	require ("../cnx.php");



	$ssql = "SELECT * FROM administradores WHERE idAdmin='$idAdmin'";
	$rs = mysql_query($ssql,$conexion);			
		if (mysql_num_rows($rs)>0)
		{

			$ssql 		= mysql_query("SELECT * FROM administradores WHERE idAdmin='$idAdmin'");			
			$nombres	= mysql_result($ssql,0,"nombres");			
			$apellidos	= mysql_result($ssql,0,"apellidos");
			$email		= mysql_result($ssql,0,"email");			
			$pass		= mysql_result($ssql,0,"pass");
			$ci			= mysql_result($ssql,0,"ci");
			$fecha		= mysql_result($ssql,0,"fechaNacimiento");
			$telefono	= mysql_result($ssql,0,"telefono");
			$celular	= mysql_result($ssql,0,"celular");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			$especialidad1	= mysql_result($ssql,0,"especialidad1");
			$especialidad2	= mysql_result($ssql,0,"especialidad2");
			$estatus	= mysql_result($ssql,0,"estatus");
			$descripcion	= mysql_result($ssql,0,"descripcion");


/*
			$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$idCliente'");			
			$nombres	= mysql_result($ssql,0,"nombres");
			$apellido	= mysql_result($ssql,0,"apellidos");
			$pais		= mysql_result($ssql,0,"pais");
			$estado		= mysql_result($ssql,0,"estado");
			$ciudad		= mysql_result($ssql,0,"ciudad");
			$dir		= mysql_result($ssql,0,"dir");
			*/
			?>

				<aside>
					<h2>Datos del Tickets</h2>

					<div><strong>ID Admin:</strong> <?php echo $idAdmin; ?></div>
					<div><strong>Estatus:</strong> <?php echo $estatus; ?></div>
					<div><strong>Email:</strong> <?php echo $email; ?></div>
					<div><strong>Password:</strong> <?php echo $pass; ?></div>	
					<div><strong>Nombres:</strong> <?php echo $nombres; ?></div>
					<div><strong>Apellidos:</strong> <?php echo $apellidos ?></div>
					<div><strong>Especialidad1:</strong> <?php echo $especialidad1; ?></div>
					<div><strong>Especialidad2:</strong> <?php echo $especialidad2; ?></div>
					<div><strong>Descripcion:</strong> <?php echo $descripcion; ?></div>									
					<div><strong>Ci:</strong> <?php echo $ci; ?></div>
					<div><strong>Nacimiento:</strong> <?php echo $fecha; ?></div>					
					<div><strong>Telefono:</strong> <?php echo $telefono; ?></div>
					<div><strong>Celular:</strong> <?php echo $celular; ?></div>
					<div><strong>Pais:</strong> <?php echo $pais; ?></div>
					<div><strong>Estado:</strong> <?php echo $estado; ?></div>
					<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
					<div><strong>Direccion:</strong> <?php echo $dir; ?></div>
				
					



				</aside>
				
				<div id="botonera">
					<form method="post" action="#">
						<input type="hidden" name="idAdmin" value="<?php echo $idAdmin; ?>"></input>
						<input type="submit" name="tickets" class="boton" value="Tickets Asignados"  />
						<?php
							if($estatus=="Activo")
							{
								echo "<input type='submit' name='desactivar' class='boton' value='Deactivar Admin'/>";
							}else{
								echo "<input type='submit' name='activar' class='boton' value='Activar Admin'/>";
							}

						?>
						<input type="submit" name="editar" class="boton" value="Editar"  />
						<input type="submit" name="enviarEmail" class="boton" value="Enviar Email"  />
						<input type="submit" name="atras" class="boton" value="Volver"  />			
					</form>
				</div>
			<?php

		}
		else
		{
			echo "Lo lamentamos por seguridad, la ventana ha sido cerrarda, vuelva  a abrir el administrador y realice la gestion deseada";
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