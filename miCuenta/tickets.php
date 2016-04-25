<?php
  session_start();
  if ($_SESSION['login'])
    {
      include ("../cnx.php");          
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" type="text/css" href="style/menu.css">
	<link rel="stylesheet" type="text/css" href="style/registro.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastylemenu.css">
  <script src="style/ventanas.js"></script>

	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  	<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
  	<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
  	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  	<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
  	<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
 
 <style type="text/css">

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

<!----------------------------------------------JS HEADER---------------------------------->
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
            <div id="iramiCuenta"><a href="#">Ir a mi cuenta</a><br><br><a href="../destruir.php">Cerrar Session</a></div>
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
<!----------------------------------------------FIN JS HEADER---------------------------------->


<div id="menuMiCuenta" class="show2">
  <div id="logoDeSA"></div>
  <a href="index.php"><div id="misProyectos">Mis Proyectos</div></a>
  <a href="solicitarServicio.php"><div id="solicitudDeServicios">Solicitud de Servicios</div></a>
  <a href="pagosFacturas.php"><div id="pagosYFacturas">Pagos y Facturas</div></a>
  <a href="index.php"><div id="ticketsDeServicios">Tickets de Servicios (0)</div></a>
  <div id="guiasYTutoriales">Guias y Tutoriales</div>
</div>

<a href="#" onclick="menuOpciones()">
<div id="menuOpciones" class="hidden2">
<strong><em>OPCIONES</em></strong>  
</div>
</a>



<div id="contenedorInformacion">

    <h3 style="width: 100%; text-align: center;">Tickets de Servicios</h3>





<!------------------------------------------CUERPO CLIENTE-------------------------------------------------->
<div id="cuerpocliente">




<?php


require ("../mostrar.php");
require ("../cnx.php");
$nick = $_SESSION["login"]; 

          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idCliente    =  mysql_result($ssql,0,"id");
          $hacerconsulta=mysql_query ($consulta,$conexion); 
              





$consulta = "SELECT * FROM tickets WHERE estatus='Abierto' AND cliente='$idCliente';";

        $hacerconsulta=mysql_query ($consulta,$conexion);       
        echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
        echo "<tr>";
        echo "<td align='center' class='letratitulo'><b>Ticket Nº</b></td>";
        echo "<td align='center' class='letratitulo'><b>Fecha</b></td>";
        echo "<td align='center' class='letratitulo'><b>Hora</b></td>";
        echo "<td align='center' class='letratitulo'><b>Area</b></td>";
        echo "<td align='center' class='letratitulo'><b>Asunto</b></td>";
        echo "<td align='center' class='letratitulo'><b>Estatus</b></td>";
        echo "<td align='center' class='letratitulo'><b>Nuevos</b></td>";
        echo "<td align='center' class='letratitulo'><b></b></td>";
        echo "</tr>";
        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
        while ($reg)
        {
        echo "<tr>";
        echo "<td align='center' bgcolor='#CCCCCC'>".$reg[0]."</td>";
        echo "<td align='center' bgcolor='#CCCCCC'>".$reg[3]."</td>";
        echo "<td align='center' bgcolor='#CCCCCC'>".$reg[2]."</td>";
        echo "<td align='center' bgcolor='#CCCCCC'>".$reg[4]."</td>";
        echo "<td align='center' bgcolor='#CCCCCC'>".$reg[5]."</td>";           

        
            if ($reg[7]="Abierto")
          {
            echo "<td align='center' bgcolor='#CCCCCC'><font color='#f60'>".$reg[7]."</font></td>";
          }
          else
          {
            echo "<td align='center' bgcolor='#CCCCCC'><font color='green'>".$reg[7]."</font></td>";
          }
          
          
          
          if ($reg[8]>0)
          {
            echo "<td align='center' bgcolor='#CCCCCC'><font color='red'>".$reg[8]."</font></td>";
          }
          else
          {
            echo "<td align='center' bgcolor='#CCCCCC'><font color='green'>".$reg[8]."</font></td>";
          }
          
        echo "<td align='center' bgcolor='#CCCCCC'>       
        <form action='#modal' method='post'>
          <input type='hidden' name='cliente' value=".$reg[1].">
          <input type='hidden' name='ticket' value=".$reg[0].">
          <input type='submit' name='ver' value=' Ver Seguimiento'>
        </form>
        
        </td>";
        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
        echo "</tr>";
        }
        echo "</table>";
        mysql_close($conexion);

      
?>









<!---------------------------------BLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO-------------------------------------------------------------->
<?php
 if(isset($_POST['seguir']))
 {
  
  $ticket3    = $_POST['ticket2'];
  $cliente3   = $_POST['cliente2'];
  $contenido3   = "<b>CLIENTE:</b> ".$_POST['contenido2'];
  $seguimiento3 = $_POST['seguimiento2'];
  $fecha3     = $_POST['fecha2'];
  $hora3      = $_POST['hora2'];  
  
  require("../cnx.php");
  mysql_query ("INSERT INTO seguimientos VALUES 
  ('', '$ticket3','$cliente3','$contenido3','$seguimiento3','$fecha3','$hora3')");
       
  $consulta = "UPDATE tickets SET 
  seguimientos ='$seguimiento3' WHERE ticket=$ticket3";     
  $hacerconsulta = mysql_query ($consulta);

  
  //Bloque de comando para incrementar el ra y rs cuando se realiza el seguimiento

    $ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket3'");           
    $rc  =  mysql_result($ssql,0,"rc");
    $rs  =  mysql_result($ssql,0,"rs");
    $rcnew = $rc+1;
    $rsnew = $rs+1;
    
    $consulta4 = "UPDATE tickets SET 
    rc ='$rcnew', rs='$rsnew' WHERE ticket=$ticket3" ;
    $hacerconsulta = mysql_query ($consulta4);
    mysql_close($conexion);   
  
  ?>
  <table width="" border="0" align="center">
  <tr>
    <td><font color="green">El nuevo seguimiento ha sido reportado con exito...</font></td>
  </tr>
</table>

  <?php
  
}
?>

<!---------------------------------FINBLOQUE DE GUARDADO DE SEGUIMIENTO, MENSAJE Y CORREO-------------------------------------------------------------->














<!---------------------------------------------VENTA MODAL ---------------------------------------------------->
<div id="modal">
          
              <?php       
          $ticket = $_POST["ticket"];   
                
          require("../cnx.php");
          $ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket'");            
          $cliente    =  mysql_result($ssql,0,"cliente");
          $hora       =  mysql_result($ssql,0,"hora");
          $fecha      =  mysql_result($ssql,0,"fecha");
          $area       =  mysql_result($ssql,0,"area");
          $asunto     =  mysql_result($ssql,0,"asunto");
          $mensaje    =  mysql_result($ssql,0,"mensaje");
          $estatus    =  mysql_result($ssql,0,"estatus");
          $seguimientos =  mysql_result($ssql,0,"seguimientos");        
         
          
          //Bloque de comando para resetear el rc cuando se revise el seguimiento
          $ra = "0";        
          $consulta3 = "UPDATE tickets SET 
          ra ='$ra' WHERE ticket=$ticket" ; ;
          $hacerconsulta3 = mysql_query ($consulta3);       
          ?>


          
 <div class="modal-content"> 
         <div class="header">
          <h2>
      <?php 
            
          $ssql15 = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");      
          $client =  mysql_result($ssql15,0,"nombres");       
          mysql_close($conexion);
        
                    
               ?>              
               <table width="100%" border="0">
                  <tr>
                      <td align="center"><?php echo $client; ?></td>
                    </tr>
               </table>
          </h2> 
      </div> 
          
          
          
                  
  
      

  
   <div class="copy"> 
      
    <h4 align="center"><?php echo $asunto; ?></h4>    
                   
       <table width="80%" border="0" align="center">
          <tr>
            <td>

        
         <?php
         
     echo "<b>Area:</b><br>" . $area;
     echo "<br>";
     echo "<br>";
     echo "<b>Solicitud de Servicio::</b><br><font color='red'>-</font>".$mensaje;
     echo "<br>";

  

     ?>
         
         <br />
         
         <?php
    
    

          require ("../cnx.php");  
      
        
          $consulta = "SELECT * FROM seguimientos WHERE ticket='$ticket'";
  
          $hacerconsulta=mysql_query ($consulta,$conexion);       
          echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";              
          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#CCCCCC'>".$reg[3]."<br><br><div style='text-align:right;'>".$reg[5]."<br>".$reg[6]."</div></td>";                  
        
        
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          mysql_close($conexion);
  ?>
         <br /><br />
       
           <form action="#" method="post">
                <table width="200" border="0">
                      <tr>
                        <td valign="top"><b>Nuevo Seguimiento:</b></td>
                        <td>
                        
                        
                        
                        <?php
            date_default_timezone_set('America/La_Paz');
                        $hora       = date("G:H:s");
            $fecha      = date("j-n-y"); 
            $seguimiento = $seguimientos+1;           
            ?>
                        
                        
                            <span id="sprytextarea1">
                            
                                  <input type="hidden" name="ticket2" value="<?php echo $ticket; ?>"/>
                                  <input type="hidden" name="cliente2" value="<?php echo $cliente; ?>"/>
                                  <textarea name="contenido2" id="textarea1" cols="80" rows="10"></textarea>
                                   
                                  <input type="hidden" name="seguimiento2" value="<?php echo $seguimiento; ?>"/>
                                  <!--Aqui obtener el numero de seguimiento anterior para sumarle uno y guardar en la tabla de seguimiento como referencia para ordenarlos-->
                                  <input type="hidden" name="fecha2" value="<?php echo $fecha; ?>"/>
                                  <input type="hidden" name="hora2" value="<?php echo $hora; ?>"/>
                                
                                  
                            <span class="textareaRequiredMsg">Es necesario describir el servicios para enviar la solicitud.</span></span>
                            
                            
                            
                            
                        </td>
                      </tr>
                    </table>
    <br /><br />
        <table border="0" align="center">
          <tr>
              <td><input type="submit" name="seguir" value="Reportar Seguimiento"/></td>
            </tr>
        </table>
             
        </form>
        
      </td>
          </tr>
      </table>
    </div> <!--FIN DE COPY-->  
     <div class="cf footer"> <a href="#"><font color="#0000FF">Cerrar Historial</font></a> </div> </div> <div class="overlay"></div> </div>
     
<!---------------------------------------------- FIN DE VENTA MODAL--------------------------------------------------->





















</div><!---------------------------------------------------------FIN DE CUERPO CLIENTES-------------------------------------------------------->





</div>
<!---------------------------------------------------------fin de DIV DE CUERPO PARA TODO------------------------------------------------------------->


    

</div><!-------FIN contenedorInformacion-------------->
</body>
</html>
<?php     
  }else 
  {     
    session_destroy();    
    header("location:../index.php"); 
  }
?>  