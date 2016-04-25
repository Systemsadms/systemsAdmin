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

		.boton2{
			height: 50px;
			width: 200px;
			border-radius: 5px;
			background-color: #8A0829;
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
		<a href="../home.php">Home</a> / <a href="index.php">Facturas</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
<section>








<?php

if(isset($_POST['ticket']) or ($_POST['proyecto']) or ($_POST['cargarFactura']))//IF de mensaje si se recarga
{


		if(isset($_POST['cargarFactura']))///If se cargo una nueva factura
		{


		
			$extension= $_FILES["factura"]["type"];

			if($extension == "application/pdf")
				{

					$query= mysql_query("SELECT MAX(idFactura) AS id FROM facturas");
					 if ($row = mysql_fetch_row($query)) 
						{
					  		 $numFactura = trim($row[0]);
					  		 $numFactura++;
					 	}

					$archivoRecibido= $_FILES['factura']['tmp_name'];
					$destino="../facturasPDF/" . $numFactura.".pdf";
					move_uploaded_file($archivoRecibido, $destino);

					$tipo 		= $_POST['tipo'];
					$idTipo 	= $_POST['idTipo'];
					$cliente 	= $_POST['cliente'];
					$emision	= $_POST['emision'];
					$vence 		= $_POST['vence'];
					$monto 		= $_POST['monto']." ".$_POST['moneda'];
					$control 	= $_POST['control'];
					$estatus 	= "Facturado";
				

					require ("../cnx.php");
					mysql_query ("INSERT INTO facturas VALUES 
						('', '$tipo','$idTipo','$cliente','$emision','$vence','$monto','$control','$estatus')");
					mysql_close ($conexion);

					$archivoRecibido= $_FILES['factura']['tmp_name'];
					$destino="../facturasPDF/" . $numFactura.".pdf";
					move_uploaded_file($archivoRecibido, $destino);


					if($tipo=="Servicio")
						{
							require ("../cnx.php");	
							$consultaUpdate = "UPDATE tickets  SET estatus='Facturado' WHERE ticket='$idTipo'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
						}
						elseif ($tipo=="Proyecto") 
						{
							require ("../cnx.php");	
							$consultaUpdate = "UPDATE proyectos  SET estatus='Facturado' WHERE id='$idTipo'";	
							$hacerconsulta  = mysql_query ($consultaUpdate);
						}

					?>
						<div id="cajaJs">
						<br>
						<font color="green">						
								<b>La Factura ha sido Generada con Exito<b>
								<br><br>
								<a href="index.php">ACTUALIZAR</a>	 
						</font>
						</div>
					<?php

					

				}
			else
				{
					?>
						<div id="cajaJs">
						<br>
						<font color="red">						
								El archivo cargado no es un Fromato Pdf o no se cargo ningun Archivo
								<br><br>
								<a href="index.php">ACTUALIZAR</a>	 
						</font>
						</div>
					<?php					
				}	



		}
		else
		{

					if(isset($_POST['ticket']))////If si lo que se abrio para facturar es un ticket
					{

								$ticket=$_POST['ticket'];
								$idServicio = $ticket;
								$tipo="Servicio";
								date_default_timezone_set('America/La_Paz');
								$fecha 			= date("j-n-y");

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

								?>
									<aside>
										<h2>Datos del Servicio</h2>

										<div><strong>Ticket:</strong> <?php echo $ticket; ?></div>
										<div><strong>Asignado:</strong> <?php echo $asignado; ?></div>					
										<div><strong>ID Cliente:</strong> <?php echo $idCliente; ?></div>
										<div><strong>Cliente:</strong> <?php echo $nombres . " ". $apellido; ?></div>
										<div><strong>Area:</strong> <?php echo $area; ?></div>
										<div><strong>Asunto:</strong> <?php echo $asunto; ?></div>
										<div><strong>rAdmin:</strong> <?php echo $rAdmin; ?></div>
										<div><strong>rClient:</strong> <?php echo $rClient; ?></div>
										<br>
										<font color="white">Localizacion de Cliente</font>
										<hr>
										<div><strong>Pais:</strong> <?php echo $pais; ?></div>
										<div><strong>Estado:</strong> <?php echo $estado; ?></div>
										<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
										<div><strong>Dir:</strong> <?php echo $dir; ?></div>
									</aside>
								<?php



					}
					elseif (isset($_POST['proyecto']))///If si lo que se abrio para facturar es un proyecto
					{

								$idProyecto=$_POST['proyecto'];
								date_default_timezone_set('America/La_Paz');
								$fecha = date("j-n-y");
								$tipo="Proyecto";

								$idServicio=$idProyecto;

								$ssql 		= mysql_query("SELECT * FROM proyectos WHERE id='$idProyecto'");			
								$idCliente	= mysql_result($ssql,0,"cliente");			
								$area		= mysql_result($ssql,0,"area");
								$titulo		= mysql_result($ssql,0,"titulo");			
								$monto		= mysql_result($ssql,0,"monto");
								$pagos		= mysql_result($ssql,0,"pagos");
								$resumen	= mysql_result($ssql,0,"resumen");
								$vence		= mysql_result($ssql,0,"vence");
								$inicio		= mysql_result($ssql,0,"inicio");
								$estatus	= mysql_result($ssql,0,"estatus");



								$ssql 		= mysql_query("SELECT * FROM usuarios WHERE id='$idCliente'");			
								$nombres	= mysql_result($ssql,0,"nombres");
								$apellido	= mysql_result($ssql,0,"apellidos");
								$pais		= mysql_result($ssql,0,"pais");
								$estado		= mysql_result($ssql,0,"estado");
								$ciudad		= mysql_result($ssql,0,"ciudad");
								$dir		= mysql_result($ssql,0,"dir");

								?>
									<aside>
										<h2>Datos del Proyecto</h2>
										<div><strong>ID Proyecto:</strong> <?php echo $idProyecto; ?></div>
										<div><strong>Estatus:</strong> <?php echo $estatus; ?></div>
										<div><strong>Cliente:</strong> <?php echo $nombres . " ". $apellido; ?></div>
										<div><strong>Area:</strong> <?php echo $area; ?></div>
										<div><strong>Enunciado:</strong> <?php echo $titulo; ?></div>					
										<div><strong>Inicio:</strong> <?php echo $inicio; ?></div>
										<div><strong>Vence:</strong> <?php echo $vence; ?></div>					
										<div><strong>Monto:</strong> <?php echo $monto; ?></div>
										<div><strong>Pagos:</strong> <?php echo $pagos; ?></div>
										<div><strong>Descripcion:</strong> <?php echo $resumen; ?></div>

										<br>
										<font color="white">Localizacion de Cliente</font>
										<hr>
										<div><strong>Pais:</strong> <?php echo $pais; ?></div>
										<div><strong>Estado:</strong> <?php echo $estado; ?></div>
										<div><strong>Ciudad:</strong> <?php echo $ciudad; ?></div>
										<div><strong>Dir:</strong> <?php echo $dir; ?></div>
									</aside>

								<?php
					}



		?>


				<div id="botonera">
							<form method="post" action="#"  id="crearNuevoT" enctype="multipart/form-data">

								<h4>Tipo: Servicio por Ticket</h4>
								
								<h5>Factura N°:</h5>
								
								<div style="text-align: left; padding-left: 20px; background-color: grey; ">							
								


								<label id="validarMonto">Monto:</label><br>
								<input type="text" name="monto"  size="3"></input>
								<select name="moneda" >
									<option>BsF</option>
									<option>$(usd)</option>
								</select><br>

								<label id="validarEmision">Emision:</label><br>
								<input type="text" name="emision"  size="5" placeholder="dd-mm-yy" value="<?php  echo $fecha;?>"></input><br>

								<label id="validarVence">Vence:</label><br>
								<input type="text" name="vence"  size="5" placeholder="dd-mm-yy"></input><br>

								<label>N° Control:</label><br>
								<input type="text" name="control" placeholder="Opcional" size="4"></input><br>
								
								<label>Factura PDF:</label><br>
								<input type="file" name="factura" id="factura" /><br><br>
								</div>


								<input type="hidden" name="tipo"   value="<?php echo $tipo; ?>"></input>
								<input type="hidden" name="idTipo" value="<?php echo $idServicio; ?>"></input>
								<input type="hidden" name="cliente" value="<?php echo $idCliente; ?>"></input>
								<input type="hidden" name="cargarFactura" value="holamundo"></input>
							
								<!--<input type="submit" name="cargarFactura" class="boton2" value="Facturar Servicio"  />-->
								<a href="javascript: validarCampos()" name="test">Facturar Servicio</a>
										
							</form>
						</div>	
			
	<?php
	}//Fin del si se cargo una factura
}
else//else del if de mensaje en caso de que se refresque la pagina  

{
	?>
		<div id="cajaJs">
			<br>
				Por seguridad se ha cerrado esta seccion, vuelva a Facturas y realice nuevamente la gestion.
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






<script>
function validarCampos(){

    var text=document.forms['crearNuevoT'].monto.value.length;

    var text2=document.forms['crearNuevoT'].emision.value.length;

    var text3=document.forms['crearNuevoT'].vence.value.length;

    if(text==0) {
        document.forms['crearNuevoT'].monto.focus();   
        document.getElementById("validarMonto").innerHTML = "*Monto*";
        document.getElementById("validarMonto").style.color = "white";
        return false;
    }
    else if(text2==0) 
    {
        document.forms['crearNuevoT'].emision.focus();   
        document.getElementById("validarEmision").innerHTML = "*Emision*";
        document.getElementById("validarEmision").style.color = "white";
        return false;
    }
    else if(text3==0) 
    {
        document.forms['crearNuevoT'].vence.focus();   
        document.getElementById("validarVence").innerHTML = "*Vence*";
        document.getElementById("validarVence").style.color = "white";
        return false;
    }
    else
    {
    	document.forms['crearNuevoT'].submit();
    }

}

</script>
</body>
</html>
<?php			
	}else	
	{			
		session_destroy();		
		header("location:../index.php");	
	}
?>	