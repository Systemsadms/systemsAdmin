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
        <li><a href="../index.php">Home</a></li>
        <li><a href="../regisro.php">Registrate</a></li>
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







<?php
     
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
      
          $consulta = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus='Facturado';";
          $hacerconsulta=mysql_query ($consulta,$conexion);   
          $generadas =(mysql_num_rows($hacerconsulta));           
          
          
          $consulta2 = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus='Vencida';";
          $hacerconsulta2=mysql_query ($consulta2,$conexion);     
          $vencidas =(mysql_num_rows($hacerconsulta2));
          
          
          $factura = $vencidas + $generadas;
          

        //Codigo para hacer conteo de cantiodad de ticket con respuesta de administrador

          $consulta10 = "SELECT * FROM tickets WHERE cliente='$idcliente' AND estatus='Abierto';";
          $hacerconsulta10=mysql_query ($consulta10,$conexion);         
          $seguimientos =(mysql_num_rows($hacerconsulta10));            
          mysql_close($conexion);     
?>  







<div id="contenedorInformacion">

    <h3 style="width: 100%; text-align: center;">Area de Clientes</h3>
    <div id="nuevasFT">
      <a href="pagosFacturas.php"><div id="nuevasFacturas"><div id="facturas">Nuevas Facturas</div><div style="float: left">
        <?php 
          if($factura > "0"){
            echo "<font color='red'>(".$factura.")</font>";
          }else{
             echo "<font color='green'>(".$factura.")</font>";
          }
        ?>
      </div></div></a>
      <a href="tickets.php"><div id="nuevosTickets"><div id="tickets">Tickets Abiertos</div><div>
       <?php 
          if($seguimientos > "0"){
            echo "<font color='red'>(".$seguimientos.")</font>";
          }else{
             echo "<font color='green'>(".$seguimientos.")</font>";
          }
        ?>
      </div style="float: left"></div></a>
    </div>
    <div id="dominios">
      <div style="width: 100%; height: auto; background-color:#f5f5f5;">
        <div id="divDeDominios">
          <strong>DOMINIOS</strong>
        </div>
      </div>
      <div id="contenidoDeDominios">
          <table border="0" width="260">
<?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Dominios';";
          $hacerconsulta=mysql_query ($consulta,$conexion);
                  
            if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
            if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>

    <div id="soportes">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeSoportes">
          <strong>SOPORTES</strong>
        </div>
      </div>
      <div id="contenidoDeSoportes">
          <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Soporte';";
          $hacerconsulta=mysql_query ($consulta,$conexion);
                
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>

    <div id="camaras">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeCamaras">
          <strong>CAMARAS</strong>
        </div>
      </div>
      <div id="contenidoDeCamaras">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Camaras';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>



    <div id="hosting">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeHosting">
          <strong>HOSTING</strong>
        </div>
      </div>
      <div id="contenidoDeHosting">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Hosting';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>

    <div id="sistemas">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeSistemas">
          <strong>SISTEMAS</strong>
        </div>
      </div>
      <div id="contenidoDeSistemas">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Sistemas';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>

    <div id="redes">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeRedes">
          <strong>REDES</strong>
        </div>
      </div>
      <div id="contenidoDeRedes">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Redes';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>





    <div id="proyectosWeb">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeProyectosWeb">
          <strong>PROYECTOS WEB</strong>
        </div>
      </div>
      <div id="contenidoDeProyectosWeb">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Proyecto Web';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>

    <div id="socialMarketing">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeSocialMarketing">
          <strong>MARKETING</strong>
        </div>
      </div>
      <div id="contenidoDeSocialMarketing">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Social';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>
    </div>

    <div id="disenos">
      <div style="width: 100%; height: auto; background-color: #f5f5f5;">
        <div id="divDeDisenos">
          <strong>DISEÑOS</strong>
        </div>
      </div>
      <div id="contenidoDeDisenos">
        <?php       
          require ("../cnx.php");
          $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
                    
          
          $consulta = "SELECT * FROM proyectos WHERE cliente='$idcliente' AND area='Diseno';";
          $hacerconsulta=mysql_query ($consulta,$conexion);     
          
          if (mysql_num_rows($hacerconsulta)>=1)
          {     
          echo "<table width='90%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:70%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Vence</b></font></td>";
          echo "<td align='right' class='letratitulo'><font size='1px'><b>Estatus</b></font></td>";

          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='left' bgcolor='#FFF'>".$reg[3]."</td>";
          echo "<td align='right' bgcolor='#FFF'>".$reg[6]."</td>";
          if(($reg[9])=="Activo")
              {
              echo "<td align='right' bgcolor='#FFF'><font color='green'><b>".$reg[9]."</b></font></td>";
              }
              else
              {
              echo "<td align='right' bgcolor='#FFF'><font color='red'><b>".$reg[9]."</b></font></td>";
              }

          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          
          }
          else
          {
            echo "<font color='grey'>Servicio no contratado...</font>"; 
          }
          mysql_close($conexion);
     ?>
      </div>

</div>
</body>
</html>
<?php     
  }else 
  {     
    session_destroy();    
    header("location:../index.php"); 
  }
?>  