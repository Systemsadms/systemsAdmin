<!---------------------------------------------VENTA MODAL ------------------------------------------------>
<div id="modal">
          
    <?php				
		$ticket = $_POST["ticket"];		
							
		require("../cnx.php");
		$ssql = mysql_query("SELECT * FROM tickets WHERE ticket='$ticket'");						
		$cliente	 	=  mysql_result($ssql,0,"cliente");
		$hora 			=  mysql_result($ssql,0,"hora");
		$fecha 			=  mysql_result($ssql,0,"fecha");
		$area 			=  mysql_result($ssql,0,"area");
		$asunto 		=  mysql_result($ssql,0,"asunto");
		$mensaje 		=  mysql_result($ssql,0,"mensaje");
		$estatus 		=  mysql_result($ssql,0,"estatus");
		$seguimientos	=  mysql_result($ssql,0,"seguimientos");	
		mysql_close($conexion);
					
					
		//Bloque de comando para resetear el rc cuando se revise el seguimiento
		$rs	=  "0";	
		require ("../cnx.php");				
		$consulta3 = "UPDATE tickets SET 
		rs ='$rs' WHERE ticket=$ticket" ; ;
		$hacerconsulta3 = mysql_query ($consulta3);
		mysql_close ($conexion);


	?>

 		<div class="modal-content"> 
        <div class="header">
        <h2>

          		
	<?php
		if($cliente=="SA")
		{
			$nombre="Systems";
			$apellido ="Admin";
		}
		else{
	        require("../cnx.php");
			$ssql15 = mysql_query("SELECT * FROM usuarios WHERE id='$cliente'");			
			$nombre	=  mysql_result($ssql15,0,"nombres");
			$apellido	=  mysql_result($ssql15,0,"apellidos");			
			mysql_close($conexion);
		}
			  
             				
    ?>              
        <table width="100%" border="0">
      	<tr>
       	<td align="left" width="50%">Cliente: <?php echo $nombre ." ". $apellido; ?></td>                        
        <td align="right" width="50%">

    <?php
    	/*
			if($estatus == "Abierto")
			{
				?>
			        <form method="post" action="#">
			        	<input type="hidden" name="ticket2" value="<?php echo $ticket; ?>"/>
			        	<input type="submit" value="Cerrar y Archivar Ticket" name="cerrar"/>
			        </form>
		    	<?php
			}
			else if($estatus == "Cerrado")
			{
				?>
	        		<form method="post" action="#">
	                    <input type="hidden" name="ticket2" value="<?php echo $ticket; ?>"/>
	                    <input type="submit" value="Reabrir Ticket" name="reabrir"/>
	                </form>
	            <?php
			}
		*/
	?>
                        	
                            
    	</td>
        </tr>
        </table>         
        </h2> 
</div> 
          
          
          
                  
  
    	

  
<div class="copy"> 
    	
	<h3>Ticket N°: "<?php echo $ticket; ?>"</h3>
	
	  
                   
    <table width="80%" border="0" align="center">
        <tr>
        <td>

        
	        <?php
	        echo "<b>Area:</b><br>" . $area;			
			echo "<br>";
			echo "<br>";	 
			echo "<b>Asunto:</b><br>" . $asunto;
			echo "<br>";
			echo "<br>";
			echo "<b>Descripcion:</b><br><font color='red'>-</font>".$mensaje;
			echo "<br><br>";

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

    			<!--   
            <form action="#" method="post">
           		<table width="200" border="0">
                <tr>
                <td valign="top"><b>Nuevo Seguimiento:</b></td>
                <td>
       
	            	<?php
					//date_default_timezone_set('America/La_Paz');
	                //$hora 			= date("G:H:s");
					//$fecha 			= date("j-n-y"); 
					//$seguimiento = $seguimientos+1;						
					?>                        
                        
                    <span id="sprytextarea1">
                            
                    <input type="hidden" name="ticket2" value="<?php echo $ticket; ?>"/>
                    <input type="hidden" name="cliente2" value="<?php echo $cliente; ?>"/>
                    <textarea name="contenido2" id="textarea1" cols="80" rows="10"></textarea>                                 
                    <input type="hidden" name="seguimiento2" value="<?php echo $seguimiento; ?>"/>

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
                	-->
    	</td>
        </tr>
		</table>
</div> <!--FIN DE COPY-->  
    
<div class="cf footer"> <a href="#"><font color="#0000FF">Cerrar Historial</font></a> </div> 
</div> 
<div class="overlay"></div> 
</div>
     
<!---------------------------------------------- FIN DE VENTA MODAL--------------------------------------------------->