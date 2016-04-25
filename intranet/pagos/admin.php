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
			width: 435px;
			min-height: 40px;
			background-color: grey;
			padding-top: 8px;
			border: 1px solid black;
			border-top:none ;
			text-align: left;
			padding-left: 5px;
			display: inline-block;
		}

		#crearTicket{
			height: auto;
			width: 118px;
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


#modal 
	{ 
		font-size:14px; 
		left:50%; 
		margin:-250px 0 0 -40%; 
		opacity: 0; 
		position:absolute; 
		top:-50%; visibility: 
		hidden; width:80%; 
		box-shadow:0 3px 7px rgba(0,0,0,.25); 
		box-sizing:border-box; transition: all 0.4s ease-in-out;
		 -moz-transition: all 0.4s ease-in-out; 
		 -webkit-transition: all 0.4s ease-in-out; 
		 overflow:scroll; 
	 } 

/* Make the modal appear when targeted */ 
#modal:target { opacity: 1; top:50%; visibility: visible; } 
#modal .header,#modal .footer { border-bottom: 1px solid #e7e7e7; border-radius: 5px 5px 0 0; } 
#modal .footer { border:none; border-top: 1px solid #e7e7e7; border-radius: 0 0 5px 5px; }
#modal h2 { margin:0; } 
#modal .btn { float:right; } 
#modal .copy,#modal .header, #modal .footer { padding:15px; } 
.modal-content { background: #f7f7f7; position: relative; z-index: 20; border-radius:5px; } 
#modal .copy { background: #fff; } 
#modal .overlay { background-color: #000; background: rgba(0,0,0,.5); height: 100%; left: 0; position: fixed; top: 0; width: 100%; z-index: 10; }	


    </style>  
<body>

<!---------------------------------HEADER-------------------------------->
	<header>
		<article><img src="../img/logoSA.png" width="100%" height="100%"></article>
		<a href="../home.php">Home</a> / <a href="index.php"> Pagos </a> /<a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
	<section>
		<div id="filtroUsuarios">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Buscar Pagos por:</label>
					<select name="filtro" id="filtro">				
						<option>ID</option>
						<option>Realizados</option>
						<option>Solicitados</option>				
						<option>Admin</option>
					</select>
				</div>
				<div style="display: inline-block;">
					<label class="margen">Dato:</label>
					<input name="dato" type="text" id="dato" size="7" />
				</div>
				<div style="display: inline-block;">
					<input name="buscar" type="submit" id="dato" value="Buscar"/>
				</div>					
				</div>
			</form>

		<div id="crearTicket">
			<form method="post" action="#">
				<div style="display: inline-block;">					
					<input type="submit" name="crear" id="crear" value="NUEVO PAGO"/>					
				</div>
			</form>
		</div>





	<?php 
	
			if(isset($_POST['id']))
			{

				
					$cliente =$_POST['id'];

						require("../cnx.php");
						$ssql = "SELECT * FROM usuarios WHERE id='$cliente'";
						$rs = mysql_query($ssql,$conexion);			
								if (mysql_num_rows($rs)>0)
									{
										
										 $admin 		=$_POST['admin'];								
										 $fecha 		= $_POST['fecha']; 
										 $banco 		=$_POST['banco'];
										 $medio 		=$_POST['medio'];
										 $monto 		=$_POST['monto'].$_POST['moneda'];
										 $ticket		="n/a";
										 $idCliente		=$_POST['id'];
										 $area			=$_POST['area'];	
										 $comentario 	=$_POST['comentario'];
										 $estatus 		="Pagado";
										

										require ("../cnx.php");
										mysql_query ("INSERT INTO pagosadmins VALUES 
										('', '$admin','$fecha','$banco','$medio','$monto','$ticket','$idCliente','$area','$comentario','$estatus')");
										mysql_close ($conexion);

										echo "<br><br>";
										echo "El pago ha sido reportado con Exito";
										echo "<br><br>";
										echo "<a href='admin.php'>ACTUALIZAR</a>";
									}else
									{
										echo "<br><br>";
										echo "<b><font color='red'>***El ID de USUARIO ingresado no existe en nuestra base de datos <br>(IMPORTANTE) verifique que el ID Cliente ingresado sea el mismo que el expuesta en la lista cliente segun su seleccion***</font></b>";
										
									}	

			}					
			else
			{
					require("filtrosAdmin.php");
					
			}

		
	?>
		





	






<script>
function validarCampos(){

    var text=document.forms['crearNuevoT'].id.value.length;

    var text2=document.forms['crearNuevoT'].fecha.value.length;

    var text3=document.forms['crearNuevoT'].monto.value.length;

    var text4=document.forms['crearNuevoT'].comentario.value.length;

    if(text==0) {
        document.forms['crearNuevoT'].id.focus();   
        document.getElementById("validarId").innerHTML = "*ID*";
        document.getElementById("validarId").style.color = "white";
        return false;
    }
    else if(text2==0) 
    {
        document.forms['crearNuevoT'].fecha.focus();   
        document.getElementById("validarFecha").innerHTML = "*Fecha*";
        document.getElementById("validarFecha").style.color = "white";
        return false;
    }
    else if(text3==0) 
    {
        document.forms['crearNuevoT'].monto.focus();   
        document.getElementById("validarMonto").innerHTML = "*Monto*";
        document.getElementById("validarMonto").style.color = "white";
        return false;
    }
    else if(text4==0) 
    {
        document.forms['crearNuevoT'].comentario.focus();   
        document.getElementById("validarComentario").innerHTML = "*Comentario*";
        document.getElementById("validarComentario").style.color = "white";
        return false;
    }
    else
    {
    	document.forms['crearNuevoT'].submit();
    }

}

</script>







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