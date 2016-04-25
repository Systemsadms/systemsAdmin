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


<div id="banner">

<!-------------------------------------------CUERPO PARA EL CONTENIDO-------------------------------------------------------------->


<?php
  include ("cnx.php");
  
  
  $tipo = $_POST ['tipo'];
  
  
    $largo=5;
    $str = "abcdefghijklmnopqrstuvwxyz";
    $may = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $num = "1234567890";
    $cad = "";
    # Comienzo de la generacion de clave.
    $cad = substr($may ,rand(0,24),1);
    $cad .= substr($num ,rand(0,10),1);
    $cad .= substr($num ,rand(0,10),1);
    for($i=0; $i<$largo; $i++) {
    $cad .= substr($str,rand(0,24),1);
    }
    ;
    
    
  
  if ($tipo == "Personas")
  {


              $tipo     = 1;
              $nombres  = $_POST['nombres'];
              $apellidos  = $_POST['apellidos'];
              $rif    = "No aplica";
              $email    = $_POST['emailPersonas'];
              $pass   = $cad;
              $celular  = $_POST['celularPersonas'];
              $telefono = $_POST['telefonoPersonas'];
              $pais   = $_POST['paisPersonas'];
              $estado   = $_POST['estadoPersonas'];
              $ciudad   = $_POST['ciudadPersonas'];
              $dir    = $_POST['dirPersonas'];
              $zipcode  = $_POST['zipCodePersonas'];
              $encargado  = "No aplica";
              $cargo    = "No aplica";
              $como   = $_POST['comoPersonas'];
              $fecha    = date("y-n-j");
              
              mysql_select_db ($baseDeDatos, $conexion);
              $consulta   = "SELECT * FROM usuarios WHERE email='$email'";
              $hconsulta  = mysql_query ($consulta, $conexion);
              
              if (mysql_num_rows($hconsulta)>0)
              {
                ?>
                                  <h4>
                                  <br><br>
                                    La cuenta de correo que ingreso ya esta registrada.Por favor intente con otra cuenta de correo. Si ya posee una cuenta creada y no recuerda su contraseña puede recuperarla haciendo click en Recuperar Contraseña.
                                    </h4>


                                    <div style="text-align: center;">
                                      <a href="registro.php"> Intentar de Nuevo</a>
                                      <br /><br />
                                      <a href="recuperar.php"> Recuperar contrasena</a>
                                    </div>
                                <?php 
              }
              else
              {
                mysql_query ("INSERT INTO usuarios VALUES ('','$tipo','$nombres','$apellidos','$rif','$email','$pass','$telefono','$celular','$pais','$estado','$ciudad','$dir','$zipcode','$encargado','$cargo','$como','$fecha','noConfirmado')");
                
                mysql_close ($conexion);
                
                
                
                
                
                  //Enviar email a correo
                  
              
                
                $body='Se ha registrado un Nuevo Usuario (Persona Natural)                
                Nombres:  '.$_POST['nombres'].'
                Apellidos:  '.$_POST['apellidos'].'
                Pais:     '.$_POST['paisPersonas'].'
                Estado:   '.$_POST['estadoPersonas'].'
                Ciudad:   '.$_POST['ciudadPersonas'].'
                E-Mail:   '.$_POST['emailPersonas'].'
                Celular:  '.$_POST['celularPersonas'].'
                Telefono:   '.$_POST['telefonoPersonas'].'
                Direccion:  '.$_POST['dirPersonas'].'
                
                ';

                $body2 = 'Saludos Cordiales:
              
                Sr(a). '.$_POST['nombres'].', es un gusto para nosotros que usted forme parte de nuestra cartera de clientes. Su usuario y su password para acceer a su cuenta son los siguientes:
                
                    Usuario:  '.$_POST['emailPersonas'].'
                    Password: '.$cad.'
                  
                 Usted puede cambiar su contraseña cuando guste desde su cuenta en la pestaña editar perfil.        
                  
                  De igual forma lo invitamos a visitar nuestra pagina web www.systemsadms.com donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="systemsadms@hotmail.com";
                    $para2= $_POST['emailPersonas'];
              
                  
                    
                      $asunto = "Nuevo Registro de Usuario";
                      $desde = $_POST["emailPersonas"];
                      $mensaje = $body;
                      
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["nombres"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailPersonas"] . "\r\n";  
              
              
                      $asunto2  = "Bienvenido a Systems Admins C.A";
                      $desde2   = $_POST["emailPersonas"];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST ["emailPersonas"] . "\r\n";
                      $cabeceras2 = "From: " . "systemsadms@hotmail.com" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);   
              
                            
                      mail ($para, $asunto, $mensaje, $cabeceras);
                        
                      
                        echo "Se ha registrado Exitosamente, en breve nuestro Equipo Tecnico validara los datos ingresados para confirmar su cuenta. Luego Recibira un email con los datos de acceso a su cuenta y podra acceder al aerea de clientes, desde donde pordra Solicitar Servicios y hacer seguimiento de los mismos."; 
                
                
                
                
                
                
                
                
                
              }//FIN DE IF NUM ROWS DE PERSONA NATURAL
        
    
  }//FIN DEL IF PERSONA NATURAL
  
  
  elseif ($tipo == "Empresas")
  {


              $tipo     = 2;
              $nombre   = $_POST['empresa'];
              $apellido   = "(empresa)";
              $rif    = $_POST['rif'];
              $email    = $_POST['emailEmpresas'];
              $pass   = $cad;
              $telefono1  = $_POST['telefono1Empresas'];
              $telefono2  = $_POST['telefono2Empresas'];
              $pais   = $_POST['paisEmpresas'];
              $estado   = $_POST['estadoEmpresas'];
              $ciudad   = $_POST['ciudadEmpresas'];
              $dir    = $_POST['dirEmpresas'];
              $zipcode  = $_POST['zipCodeEmpresas'];
              $encargado  = $_POST['encargado'];
              $cargo    = $_POST['cargo'];
              $como   = $_POST['comoEmpresas'];
              $fecha    = date("y-n-j");
              
              
              mysql_select_db ($baseDeDatos, $conexion);
              $consulta   = "SELECT * FROM usuarios WHERE email='$email'";
              $hconsulta  = mysql_query ($consulta, $conexion);
              
              if (mysql_num_rows($hconsulta)>0)
              {
                ?>
                                  <br />
                                    La cuenta de correo que ingreso ya existe en nuestra base de datos, por favor intente con otra cuenta de correo. Si ya posee una cuenta creada y no recuerda su contraseña puede recuperarla dando click en Recuperar Contraseña.
                                    <br /><br />
                                    <div style="text-align: center;">
                                      <a href="registro.php"> Intentar de Nuevo</a>
                                      <br /><br />
                                      <a href="recuperar.php"> Recuperar contrasena</a>
                                    </div>
                                   
                                <?php 
              }
              else
              {
                mysql_query ("INSERT INTO usuarios VALUES ('','$tipo','$nombre','$apellido','$rif','$email','$pass','$telefono1','$telefono2','$pais','$estado','$ciudad','$dir','$zipcode','$encargado','$cargo','$como','$fecha','noConfirmado')");
                
                mysql_close ($conexion);
                
                
                
                
                
                
                
                
                
                
                //Enviar email a correo
                
                
              
                
                $body='Se ha registrado un Nuevo Usuario (Persona Juridica)               
                Empresa:  '.$_POST['empresa'].'               
                Pais:     '.$_POST['paisEmpresas'].'
                Estado:   '.$_POST['estadoEmpresas'].'
                Ciudad:   '.$_POST['ciudadEmpresas'].'
                E-Mail:   '.$_POST['emailEmpresas'].'
                Celular:  '.$_POST['telefono1Empresas'].'
                Telefono:   '.$_POST['telefono2Empresas'].'
                Direccion:  '.$_POST['dirEmpresas'].'
                Encargado:  '.$_POST['encargado'].'
                Cargo:    '.$_POST['cargo'].'
                
                ';

                $body2 = 'Saludos Cordiales:
              
                Srs. '.$_POST['empresa'].', es un gusto para nosotros que usted forme parte de nuestra cartera de clientes. Su usuario y su password para acceer a su cuenta son los siguientes:
                
                    Usuario:  '.$_POST['emailEmpresas'].'
                    Password: '.$cad.'
                  
                 Usted puede cambiar su contraseña cuando guste desde su cuenta en la pestaña editar perfil.      
                

                  De igual forma lo invitamos a visitar nuestra pagina web www.systemsadms.com donde con su usuario y su contrasena, usted podra monitorear el estatus de sus facturas, pagos y servicios.
                    
                    Gracias por preferirnos, esperamos brindarles un excelente servicio.
                    
                      ';
              
              
              
                    $para="systemsadms@hotmail.com";
                    $para2= $_POST['emailEmpresas'];
              
                  
                  
                      $asunto = "Nuevo Registro de Usuario";
                      $desde = $_POST["emailEmpresas"];
                      $mensaje = $body;                     
                      $cabeceras = "";
                      $cabeceras = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras = "To: " . $_POST ["empresa"] . "\r\n";
                      $cabeceras = "From: " . $_POST ["emailEmpresas"] . "\r\n";   
              
              
                      $asunto2  = "Bienvenido a Systems Admins C.A";
                      $desde2   = $_POST["emailEmpresas"];
                      $mensaje2   = $body2;
                      $cabeceras2 = "";
                      $cabeceras2 = "MIME-VErsion: 1.0 \r\n";
                      $cabeceras2 = "Content-Type: text/html; charset=iso-8859-1\r\n";
                      $cabeceras2 = "To: " . $_POST ["emailEmpresas"] . "\r\n";
                      $cabeceras2 = "From: " . " @systemsadms.com" . "\r\n";    
              
              
                      mail ($para2, $asunto2, $mensaje2, $cabeceras2);   
              
                            
                      mail ($para, $asunto, $mensaje, $cabeceras);
                        
                      
                   
                        echo "Se ha registrado Exitosamente, en breve nuestro Equipo Tecnico validara los datos ingresados para confirmar su cuenta. Luego Recibira un email con los datos de acceso a su cuenta y podra acceder al aerea de clientes, desde donde pordra Solicitar Servicios y hacer seguimiento de los mismos."; 
                      
                    
                
                
              
              }
    

    
  }//FIN DE IF NUM ROWS PERSONA JURIDICA
  else
  {
    echo "Disculpe
     debes seleccionr que tipo de usuarios deseas registrar"; 


  }
      

  
?>


<!--------------------------------------------FIN CUERPO PARA EL CONTENIDO---------------------------------------------->


</div><!----------------------------------------- FIN DEL DIV BANNER  ---------------------------------------------------->


<div id="footerRegistro">FOOTER</div>

</body>
</html>