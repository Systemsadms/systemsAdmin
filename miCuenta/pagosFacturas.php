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


<?php
require ("menuPrincipal.php");
?>



<?php
require ("areaClientes.php");
?>

</div>
<!----------------------------------------------FIN JS HEADER---------------------------------->



<?php
require ("menuOpciones.php");
?>






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
          
          
          

          $ssql = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus !='Pagada'";
          $rs = mysql_query($ssql,$conexion);     
          if (mysql_num_rows($rs)>0)
          {
             
          
            
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

          }
       else
          {

          echo "<div style='text-align:center;'>No hay Servicios por pagar</div>";
          }
  ?>
    
</div>
<!----------FIN DE DIV DE FACTURAS---------->




















<!--COMIENZO DIV REPORTAR PAGOS-->
<div id="reportarPagosYFacturas">
    <div id="reportaTusPagos">

 
               
<?php 
          if(isset($_POST['reportar']))
          {
            $nick = $_SESSION["login"];
        
              require ("../cnx.php");
              
                $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
                $cliente    =  mysql_result($ssql,0,"nombres");
                $medio      =$_POST['medio'];
                $fecha      =$_POST['fecha'];
                $deposito   =$_POST['deposito'];
                $banco      =$_POST['banco'];
                $monto      =$_POST['monto']." ". $_POST['moneda'];
                $factura    =$_POST['factura'];               
                $estatus    ="Reportado";
                $comentario =$_POST['comentario'];
                
               
                mysql_query ("INSERT INTO pagos VALUES 
                ('', '$cliente','$medio','$fecha','$deposito','$banco','$monto','$factura','$estatus','$comentario')");
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

            require ("../cnx.php");
            $ssql = "SELECT * FROM facturas WHERE cliente='$idcliente' AND estatus !='Pagada'";
            $rs = mysql_query($ssql,$conexion);     
            if (mysql_num_rows($rs)>0)
            {
            ?>


                      
                <form method="post" action="#" >

                <h4>Reportar Pagos</h4>

                <label>Factura Nº:</label><br>
                <?php 
              
                  require ("../cnx.php");
                  $ssql = mysql_query("SELECT * FROM usuarios WHERE email='$nick'");
                  $idCliente    =  mysql_result($ssql,0,"id");          
                  $consulta_mysql="select * from facturas where cliente='$idCliente'";
                  $resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);

                  echo "<select name='factura'>";                   
                    while($fila=mysql_fetch_array($resultado_consulta_mysql))
                    {                       
                      echo "<option>".$fila['idFactura']."</option>";
                    }
                  echo "</select>";
                    
                ?>                

                <br>

                <label>Medio:</label><br>
                <select name="medio" id="medio">
                    <option>Deposito</option>
                    <option>Transferencia</option>
                </select>

                <br>

                <label>Banco:</label><br>
                <select name="banco" id="banco">
                    <option selected="selected">Banesco</option>
                    <option>Mercantil</option>
                    <option>PayPal</option>                    
                </select>

                <br>

                <label>N° Dep/Transf:</label><br>
                <input type="text" name="deposito" size="14" />

                <br>

                <label>Monto:</label><br>
                <input type="text" name="monto" size="3" />
                <select name="moneda">
                    <option>BsF</option>
                    <option>$(usd)</option>                    
                </select>

                <br>

                <label>Fecha</label><br>
                <input type="text" name="fecha" size="6" placeholder="dd-mm-yy" />

                 <br>

                <label>Comentario</label><br>
                <textarea name="comentario"></textarea>
                <br><br>
                <input type="submit" name="reportar" value="Reportar Pago"/>
            </form>
            
        <?php
               }
             else
                {
                echo "<h4>Reportar Pagos</h4>";
                echo "<p align='center'>No hay Servicios por pagar</p";
                echo "<br><br>";
                echo "<br>";
                }
          }       
        ?>
            
         </div> <!------------fin de reportaTusPagos-------->
            
            
          <div id="pagosReportados">
            <h4>Pagos Reportados</h4>
              
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
                  echo "<td align='center'>".$reg[8]."</td>";
                  
                  
                  $reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
                  echo "</tr>";
                  }
                  echo "</table>";
                  mysql_close($conexion);
                  }
                  else
                  {
                    echo "<p align='center'>No hay pagos por confirmar</p>";
                    echo "<br>";
                  }
                ?>   
          </div> <!--FIN DE pagosReportados-->
            
            
          

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