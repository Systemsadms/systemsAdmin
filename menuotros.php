<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/menu.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
	<link rel="stylesheet" type="text/css" media="all" href="style/mediastylemenu.css">
	<script src="style/ventanas.js"></script>
</head>
<body>

<!----------------------------------------------HEADER---------------------------------->

<header>
	<a href="#" onclick="menu2()">
		<div id="contenedorbottonMenu">
			<div id="bottonMenu"></div>
			<div id="systemsAdms">
				<div id="systems">Systems</div>
				<div id="adms">Admins C.A</div>
				<div id="rifMenu">Rif:J-29952662-2</div>
			</div>
		</div>
		</a>
		
	<a href="#" onclick="clientes2()">
		<div id="contenedorbottonClientes">
			<div id="cliente"></div>
			<div id="areadeCliente">Clientes</div>
		</div>
	</a>
</header>
<!----------------------------------------------FIN HEADER---------------------------------->
<div id="contenidoDelBody">
		<nav id="navMenuOtro" class="hidden">	
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Registrate</a></li>
				<li><a href="#">Portafolio</a></li>
				<li><a href="#">Servicios</a></li>
				<li><a href="#">Planes de Pago</a></li>
				<li><a href="#">Aplicaciones</a></li>
				<li><a href="#">FAQS</a></li>
				<li><a href="#">Tutoriales</a></li>
				<li><a href="#">Nosotros</a></li>
				<li><a href="#">Contactenos</a></li>
			</ul>
		</nav>







		<div id="loginmodalMenuOtro" class="hidden">

	 	<?php   
	  	if (isset($_SESSION["login"]))
		{
			$micuenta=$_SESSION["login"];	
			?>        	
		      	<div id="iramiCuenta"><a href="#">Ir a mi cuenta</a><br><br><a href="#">Cerrar Session</a></div>
		     	<div id="social">
			         <a href=""><img src="iconos/twit.png" width="50" height="43" /></a>
			         <a href=""><img src="iconos/face.png" width="50" height="43" /></a>
			         <a href=""><img src="iconos/google.png" width="50" height="43" /></a>
		     	</div>    
		<?php
	        }
			else
	        {  
	      ?>
			    <form method="post" action="#" >
			     <br>
			           		<div id="tipo">
			                    <input type="radio" name="logindeusuario" value="1" checked />
			                    <label>Cliente</label>
			                    <input type="radio" name="logindeusuario" value="2"/>    
			                    <label>Administrador</label>
			                </div>                
			              <br>
			                    
			           		<div id="camposlogin">
			                    <label>Usuario</label><br> 
			                    <input class="inputareadeClientes" type="text" class="textbox" name="nick"/> 
			                    <br>              
			                    <label>Password</label><br> 
			                    <input class="inputareadeClientes" type="password" class="textbox" name="pass"/>
			                    <br><br>
			                    <input type="submit" class="textbox" name="entrar" size="35" value="Iniciar Session"/>  
			                </div>
				 </form>		     
			     
			     <div id="registro">
			         <em><a href="registro.php">Registrate</a>         
			         <em><a style="cursor:pointer;"><p onClick="recuperar()">Recuperar Contraseña</p></a></em>
			     </div>

			     <div id="social">
			         <a href=""><img src="iconos/twit.png" width="45" height="43" /></a>
			         <a href=""><img src="iconos/face.png" width="45" height="43" /></a>
			         <a href=""><img src="iconos/google.png" width="45" height="43" /></a>
			     </div>  
	    <?php
		}
		?>
	</div>
</div>
</body>
</html>