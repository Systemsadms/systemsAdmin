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
<div style="text-align: center;">
    <h3 style="width: 100%; text-align: center;">Solicitar Servicio</h3>






    <?php 
  if(isset($_POST['solicitud']))  
  {
  ?>
    
    
         <form method="post" action="#">


 <label>Area de Servicios</label>

 <select name="area" id="area">
      <option>Sistemas Administrativos</option>
      <option>Camaras (CCTV)</option>
      <option>Redes</option>
      <option>Diseno Web</option>
      <option>Disno Grafico</option>
      <option>Soporte Tecnico</option>
      <option>Hosting y Dominios</option>
      <option>Nuevo Proyecto</option>
      <option>Falla Tecnica</option>
      <option>Consulta y Asesorias</option>
</select>



             
<br><br>


 <label>Enunciado de Servicio</label>
 <input name="asunto" type="text" id="asunto"  />


   

<br><br>


 <label>Describe el Servicio</label>
 <br>
 <textarea name="mensaje" id="mensaje" class="textAreaLabel"></textarea>

             
<br><br>
                
<input name="crear" type="hidden" />
 <input type="submit" value="Enviar Soliciud" />
        </form>
    <?php 
  }
  else
  {
  ?>  

                <br /><br />
                <form method="POST" action="#">
                    <table width="100%" border="0" align="center">
                    <tr>
                        <td align="center"> 
                        <input name="solicitud" type="hidden" />             
                        <input type="submit" name="solicitud" value="Solicitar Servicio" />
                        </td>
                      </tr>
                    </table>                
                </form>                
                <br />
                
      <?php
    }// FIN DE CREAR NUEVO TICKET
   ?>         













<?php
if(isset($_POST['crear']))
{
    date_default_timezone_set('America/La_Paz');
    require ("../cnx.php");  
            
            
          $nick = $_SESSION["login"];         
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");
            
            
            $cliente    =$idcliente;
            $hora       = date("G:H:s");
            $fecha      = date("j-n-y"); 
            $area       =$_POST['area'];
            $asunto     =$_POST['asunto'];            
            $estatus    ="Abierto";
            $mensaje    =$_POST['mensaje']; 
            $ra       ="0"; 
            $rc       ="1";
            $rs       ="1";            
            $seguimientos   ="0";
            $admin      ="Systems Admins";
            

                        
            mysql_query ("INSERT INTO tickets VALUES 
            ('', '$cliente','$hora','$fecha','$area','$asunto','$mensaje','$estatus','$ra','$rc','$rs','$seguimientos','$admin')");
            mysql_close ($conexion);
            
            
            
          //------ENVIAR EMAIL-------------   
      
      
      
              $to = "systemsadms@hotmail.com";
              $subject = $_POST['asunto'];          
              $from = 'systemsadms@hotmail.com';
              $headers = "From:" . $from; 
              $message ='
              Consulta enviada por:
              
              Cliente: '.$cliente.'
                  
              Fecha: '.$fecha.'
    
              Hora: '.$hora.'
              
              Area: '.$_POST['area'].'
    
              Asunto: '.$_POST['asunto'].'
              
              Mensaje: '.$_POST['mensaje'].'
                  ';     
                        
              mail($to,$subject,$message,$headers);
          
                
        echo "<br>";
        echo "<h3 align='center'><font color='green'>Se ha creado un nuevo ticket de solicitud de servicio. <br>Uno de nuestros analistas tomara el caso para realizar su gestion.</font></h1>";
        
      
          
}
?>
    
</div>
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