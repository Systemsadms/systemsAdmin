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
			width: 265px;
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
			width: 142px;
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
		<a href="../home.php">Home</a> / <a href="../destruir.php">Cerrar Session</a>
	</header>
<!-------------------------------//HEADER-------------------------------->


<!---------------------------------SECTION-------------------------------->
	<section>
		<div id="filtroUsuarios">
			<form method="post" action="#">
				<div style="display: inline-block;">
					<label>Por Facturar:</label>
					<select name="filtro" id="filtro">				
						<option>Por Facturar</option>
						<option>Facturado</option>						
						<option>Pagada</option>
					</select>
				</div>
				<!--
				<div style="display: inline-block;">
					<label class="margen">ID:</label>
					<input name="dato" type="text" id="dato" size="1" />
				</div>
					-->
				<div style="display: inline-block;">
					<input name="buscar" type="submit" id="dato" value="Buscar"/>
				</div>					
				</div>
			</form>


		<div id="crearTicket">
			<form method="post" action="#">
				<div style="display: inline-block;">					
					<input type="submit" name="crear" id="crear" value="CREAR FACTURA"/>					
				</div>
			</form>
		</div>

	<?php 






if(isset($_POST['id']))
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



			$idCliente	=$_POST['id'];									
			$tipo 		=$_POST['tipo']; 
			$diTipo		="0";
			$emision	=$_POST['emision'];
			$vence		=$_POST['vence'];
			$monto 		=$_POST['monto'] . $_POST['moneda'];
			$control	=$_POST['control'];
			$estatus	="Facturado";

			require ("../cnx.php");
			mysql_query ("INSERT INTO facturas VALUES 
				('', '$tipo','$idTipo','$idCliente','$emision','$vence','$monto','$control','$estatus')");
			mysql_close ($conexion);	

			echo "<br><br>";
			echo "La factura ha sido cargada con exito.";	


		}
	else
		{
			echo "El archivo cargado no es un Fromato Pdf o no se cargo ningun Archivo.";
		}	

													


}					
else
{



	require("filtros.php");
	require("ventanaModal.php");



			
}

?>
		





	






<script>
function validarCampos(){

    var text=document.forms['crearNuevoT'].id.value.length;

    var text2=document.forms['crearNuevoT'].emision.value.length;

    var text3=document.forms['crearNuevoT'].vence.value.length;

    var text4=document.forms['crearNuevoT'].monto.value.length;

   



    if(text==0) {
        document.forms['crearNuevoT'].id.focus();   
        document.getElementById("validar1").innerHTML = "*ID*";
        document.getElementById("validar1").style.color = "white";
        return false;
    }
    else if(text2==0) 
    {
        document.forms['crearNuevoT'].emision.focus();   
        document.getElementById("validar2").innerHTML = "*Emision*";
        document.getElementById("validar2").style.color = "white";
        return false;
    }
    else if(text3==0) 
    {
        document.forms['crearNuevoT'].vence.focus();   
        document.getElementById("validar3").innerHTML = "*Vence*";
        document.getElementById("validar3").style.color = "white";
        return false;
    }
    else if(text4==0) 
    {
        document.forms['crearNuevoT'].documento.focus();   
        document.getElementById("validar4").innerHTML = "*Monto*";
        document.getElementById("validar4").style.color = "white";
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