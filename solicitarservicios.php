<?php
session_start();
if(isset($_POST['cerrar']))
{
	session_destroy();
		?>	 
	  <script type="text/javascript">
	window.location="index.php";
	</script>    
    <?php	
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
	<script src="style/ventanas.js"></script>
</head>
<body>

<!----------------------------------------------HEADER---------------------------------->
<header>
	<a href="#" onclick="menu()">
		<div id="contenedorbottonMenu">
			<div id="bottonMenu"></div>
			<div id="systemsAdms">
				<div id="systems">Systems</div>
				<div id="adms">Admins C.A</div>
				<div id="rifMenu">Rif:J-29952662-2</div>
			</div>
		</div>
		</a>
		
	<a href="#" onclick="clientes()">
		<div id="contenedorbottonClientes">
			<div id="cliente"></div>
			<div id="areadeCliente">Clientes</div>
		</div>
	</a>
</header>
<!----------------------------------------------FIN HEADER---------------------------------->

<div id="contenidoGeneral">
	<div id="contenidoDesarrolloWeb">
		<div class="escrituraContenidoDerecha"><h3 style="text-align: center;"><em>Web Development</em></h3>
		Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoDominioyHosting">
		<div class="escrituraContenidoIzquierda"><h3 style="text-align: center;"><em>Domains and Hosting</em></h3>Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoMercadeoSocial">
		<div class="escrituraContenidoDerecha"><h3 style="text-align: center;"><em>Social Marketing</em></h3>Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoSoporteTecnico">
		<div class="escrituraContenidoIzquierda"><h3 style="text-align: center;"><em>Technical Support</em></h3>Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidoCCTV">
		<div class="escrituraContenidoDerecha"><h3 style="text-align: center;"><em>CCTV<br><font style="font-size: 13px;">(Cervicio cerrado de Television)</font></em></h3>Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
	<div id="contenidonetwork">
		<div class="escrituraContenidoIzquierda"><h3 style="text-align: center;"><em>Network</em></h3>Si ya sabes que tu empresa necesita un sitio web para promover sus servicios, aqui estamos nosotros para diseñarlo de forma que sea visualmente atractivo y garantice el exito de su negocio
		<a href="#"><div class="bottonSolicitarServicio">Solicitar Servicio</div></a>
		</div>
	</div>
</div>


<!----------------------------------------------FOOTER---------------------------------->
	<footer>
		<a href="#" onclick="servicios()">
			<div id="bottonServicios">		
				<div id="servicios">
					<div id="imgServicios"></div>
					<div class="textFooter1">SERVICIOS</div>
				</div>
			</div>
		</a>
		
		<a href="planes">
		<div id="bottonPlanesdepago">	
			<div id="planesdepago">
				<div id="imgPlanesdepago"></div>
				<div class="textFooter2">PLANES DE SERVICIO</div>
			</div>
		</div>
		</a>

		<a href="#" onclick="contacto()">
			<div id="bottonContactenos">
				<div id="contactenos">
					<div id="imgContactenos"></div>
					<div class="textFooter1">CONTACTENOS</div>
				</div>	
			</div>
		</a>
	</footer>
<!----------------------------------------------FIN FOOTER---------------------------------->
</body>
</html>
