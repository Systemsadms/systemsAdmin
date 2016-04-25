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

    <h3 style="width: 100%; text-align: center;">Pagos Y Facturas</h3>








<!----------COMIENZO DE DIV DE FACTURAS---------->
<div style="
  background-color:#EFEFEF; 
    height:30%;
    padding-top: 1%;
    padding-left: 1%;
    ">
    <?php
    
    require ("../cnx.php");
    $nick = $_SESSION["login"];
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $idcliente    =  mysql_result($ssql,0,"id");  
          $cliente    =  mysql_result($ssql,0,"nombres");           
          
          
          

         
      
        
          $consulta = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus !='Pagada'";
  
          $hacerconsulta=mysql_query ($consulta,$conexion);       
          echo "<table width='95%' border='0' align='center' style='font-family:Verdana, Geneva, sans-serif; font-size:90%; color:#000'>";
          echo "<tr>";
          echo "<td align='center' class='letratitulo'>Factura N°</td>";     
          echo "<td align='center' class='letratitulo'>Tipo</td>";
          echo "<td align='center' class='letratitulo'>ID</td>";
          echo "<td align='center' class='letratitulo'>Emision</td>";
          echo "<td align='center' class='letratitulo'>Vence</td>";
          echo "<td align='center' class='letratitulo'>Monto</td>";
          echo "<td align='center' class='letratitulo'>Estatus</td>";
          echo "<td align='center' class='letratitulo'></td>";
          echo "</tr>";
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);        
          while ($reg)
          {
          echo "<tr>";
          echo "<td align='center' bgcolor='#CCCCCC'>".$reg[0]."</td>";         
          echo "<td align='center' bgcolor='#CCCCCC'>".$reg[1]."</td>";
          echo "<td align='center' bgcolor='#CCCCCC'>".$reg[2]."</td>";           
          echo "<td align='center' bgcolor='#CCCCCC'>".$reg[4]."</td>";
          echo "<td align='center' bgcolor='#CCCCCC'>".$reg[5]."</td>";
          echo "<td align='center' bgcolor='#CCCCCC'>".$reg[6]." BsF.</td>";

            if($reg[8]=="Facturado")
            {
            echo "<td align='center' bgcolor='#CCCCCC'><font color='#f60'>".$reg[8]."</font></td>";         
            }
            else if($reg[8]=="Vencida")
            {
              echo "<td align='center' bgcolor='#CCCCCC'><font color='red'>".$reg[8]."</font></td>";
            }
            
                      
          echo "<td align='center' >
          <a href='../intranet/facturasPDF/".$reg[0].".pdf' target='_blank'>Ver Factura</a>  
          </td>";
        
          $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
          echo "</tr>";
          }
          echo "</table>";
          mysql_close($conexion);
  ?>
    
</div>
<!----------FIN DE DIV DE FACTURAS---------->




















<!--COMIENZO DIV REPORTAR PAGOS-->
<div id="reportarPagosYFacturas">
    <div id="reportaTusPagos"><table width="90%" border="0" align="center">
  <tr>
    <td align="center" width="50%">
    
          <b>REPORTA TUS PAGOS</b>
                <br /><br />
                
                
                
                <?php 
          if(isset($_POST['reportar']))
          {
            $nick = $_SESSION["login"];
        
          require ("../cnx.php");
          
          $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
          $cliente    =  mysql_result($ssql,0,"nombres");
         
    
    
          
          $medio    =$_POST['medio'];
          $fecha    =$_POST['fecha'];
          $deposito   =$_POST['deposito'];
          $banco    =$_POST['banco'];
          $monto    =$_POST['monto'];
          $factura  =$_POST['factura'];
          $depositante=$_POST['depositante'];
          $estatus  ="Reportado";
          $comentario =$_POST['comentario'];
          
         
          mysql_query ("INSERT INTO pagos VALUES 
          ('', '$cliente','$medio','$fecha','$deposito','$banco','$monto','$factura','$depositante','$estatus','$comentario')");
          mysql_close ($conexion);  
          
          
          
          
                    //------ENVIAR EMAIL-------------   
      
      
      
              $to = "systemsadms@hotmail.com";
              $subject = 'Reporte de Pago';         
              $from = 'systemsadms@hotmail.com';
              $headers = "From:" . $from; 
              $message='Se ha reportado un nuevo pago de servicios
      
                Cliente:    '.$cliente.'
                Numero de Deposito o Transferencia:   '.$_POST['deposito'].'
                Banco:    '.$banco.'
                Monto:    '.$monto.'
                Fecha:    '.$fecha.'
                Nombre del Depositante:   '.$depositante.'                
                ';
                        
              mail($to,$subject,$message,$headers);
                    

            echo "Se ha reportado el pago con exito.. <a href='pagosFacturas.php'><font color='green'><b>....Actualizar</b></font></a>";
          }
          else
          {
          ?>
                      
          
        
                <form method="post" action="#">
                  <table width="289" border="0" align="left">
                    <tr>
                      <td width="129">Factura Nº:</td>
                      <td width="144"><input name="factura" type="text" id="factura" size="5" /></td>
                    </tr>
                    <tr>
                      <td>Medio</td>
                      <td><select name="medio" id="medio">
                        <option>Deposito</option>
                        <option>Transferencia</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td>Banco</td>
                      <td><select name="banco" id="banco">
                        <option selected="selected">Banesco</option>
                        <option>Venezuela</option>
                        <option>Mercantil</option>
                        <option>Caroni</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td>Nº Dep/Transf</td>
                      <td><span id="sprytextfield2">
                        <input type="text" name="deposito" id="deposito" />
                      <span class="textfieldRequiredMsg">*Necesario.</span></span></td>
                    </tr>
                    <tr>
                      <td>Fecha</td>
                        <td><span id="sprytextfield4">
                          <input type="text" name="fecha" id="fecha" />
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                    </tr>
                    <tr>
                      <td>Monto</td>
                      <td><span id="sprytextfield3">
                        <input type="text" name="monto" id="monto" />
                      <span class="textfieldRequiredMsg">*Necesario.</span></span></td>
                    </tr>
                    <tr>
                      <td>Depositante</td>
                      <td><input type="text" name="depositante" id="depositante" /></td>
                    </tr>
                    <tr>
                      <td>Comentario</td>
                      <td><input type="text" name="comentario" id="comentario" /></td>
                    </tr>
                  </table>
                  <br /><br /><br /><br /><br />
                  
                  <table border="0">
                  <tr>
                    <td><input type="submit" name="reportar" value="Reportar Pago"/></td>
                  </tr>
                </table>                
            </form>
            
            <?php
            }       
        ?>
            
         </div> <!------------fin de reportaTusPagos-------->
            
            
            
            
            
          </td>
          <td>&nbsp;</td>
                <td align="center" valign="top">
                <b>PAGOS REPORTADOS</b>
                <br /><br />
               
               
               
                <?php
        require("../cnx.php");
        //$cas2 = "1";
        $consulta = "SELECT * FROM pagos WHERE cliente='$cliente' AND estatus='Reportado';";
        $hacerconsulta=mysql_query ($consulta,$conexion);


        if (mysql_num_rows($hacerconsulta)>=1)
        {
        echo "<table width='100%'   align='center' cellspacing='0' cellpadding='3'>";
        echo "<tr>";
        echo "<td align='center'><b>Pago N°</b></td>";
        echo "<td align='center'><b>Medio</b></td>";
        echo "<td align='center'><b>Fecha</b></td>";
        echo "<td align='center'><b>Banco</b></td>";
        echo "<td align='center'><b>Monto</b></td>";
        echo "<td align='center'><b>Factura N°</b></td>";
        echo "<td align='center'><b>Estatus</b></td>";
        echo "</tr>";
        
        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
        
        while ($reg)
        {
        echo "<tr>";
        echo "<td align='center'>".$reg[0]."</td>";
        echo "<td align='center'>".$reg[2]."</td>";
        echo "<td align='center'>".$reg[3]."</td>";
        echo "<td align='center'>".$reg[5]."</td>";
        echo "<td align='center'>".$reg[6]."</td>";
        echo "<td align='center'>".$reg[7]."</td>";
        echo "<td align='center'>".$reg[9]."</td>";
        
        
        $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
        echo "</tr>";
        }
        echo "</table>";
        mysql_close($conexion);
        }
        else
        {
          echo "<font color='#FFF'><p align='center'>Actualmente usted no posee articulos en nuestros almacenes</p></font>";
          echo "<br>";
        }
      ?>   

       </td>
        </tr>
      </table>

    </div>
    <!----------------------------------------------FIN DE DIV REPORTAR PAGOS----------------------------------------------------->


































   

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