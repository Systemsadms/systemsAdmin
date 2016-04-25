<?php

if(isset($_POST['crear']))
{
	date_default_timezone_set('America/La_Paz');
	$fecha 			= date("j-n-y");
	?>
	<hr>
		
			
		<form action="#" method="post" id="crearNuevoT" enctype="multipart/form-data" style="text-align: center; background-color: grey; width: 100%; margin:0 auto; padding: 20px;">
		<h4>Nuevo Ticket</h4>
		
			<div style="background-color: none; width: 250px; display: inline-block; text-align: center;">
				<label>Cliente:</label>	
				<?php 
						require ("../cnx.php");
						$consulta_mysql='select * from usuarios where estatus="confirmado"';
						$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
						echo "<select name='cliente'>";
							?>
								<!--<option>Systems Admins</option>-->
							<?php											
							while($fila=mysql_fetch_array($resultado_consulta_mysql))
							{												
								echo "<option>"."(".$fila['id'].")".$fila['nombres']." ".$fila['apellidos']."</option>";
							}
							echo "</select>";
					?>
			</div>

			<div style="background-color: none; width:80px; display: inline-block; text-align: center; margin-top: 10px;">
				<label id="validar1">ID:</label>
				<input type="text" name="id" size="2"></input>
				
			</div>
			


			<div style="background-color: none; width: 250px; display: inline-block; margin-top: 10px; text-align: center;">
				<label>Servicios:</label>
				<select name="tipo">
					<option>Soporte</option>
 					<option>Consultoria</option>
 					<option>Otros</option>                
				</select>		
			</div>
			
			
			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validar2">Emision</label>-<label id="validar3">Vence:</label><br>
				<input type="text" name="emision" size="4" value="<?php echo $fecha; ?>">-<input type="text" name="vence" size="4">	
			</div>
			<br>


			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validar4">Monto:</label><br>
				<input type="text" name="monto" size="3">
				<select name="moneda">
					<option>BsF</option>
 					<option>$(usd)</option>                 
				</select>		
			</div>
			<br>


			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label>Control</label><br>
				<input type="text" name="control" size="4" placeholder="Opcional">		
			</div>
			<br>





			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validar6">Cargar Factura PDF:</label><br>
				<input type="file" name="factura" id="factura" />
			</div>
			<br>
				
						
			<br>
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<!--<input type="submit" name="crearTicket" value="CREAR TICKET" >-->
				<a href="javascript: validarCampos()" name="test">CARGAR NUEVO TICKET</a>
			</div>
		</form>
	<hr>
	<?php
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	if(isset ($_POST["buscar"]))
			{
				
				$filtro	= $_POST['filtro'];			
				require("../cnx.php");


			if ($_POST["filtro"]=="Por Facturar")
				{
									

				echo "<br><br>";
				echo "FILTRADO Por Facturar";

					require("../cnx.php");
					$ssql = "SELECT * FROM facturas WHERE estatus='Por facturar'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM facturas WHERE estatus = 'Por facurar';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdFactura</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdTipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Emision</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Control</b></td>";										
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";		
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
	
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='facturas.php' method='post'>								
									<input type='hidden' name='proyecto' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Factura'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "<br><br>";
					echo "No hay nuevos ticket Por facturar";
					}
				
				}
			elseif ($_POST["filtro"]=="Facturado")
				{
									
 
				echo "<br><br>";
				echo "FILTRADO Facturado";

					require("../cnx.php");
					$ssql = "SELECT * FROM facturas WHERE estatus='Facturado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM facturas WHERE estatus = 'Facturado';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdFactura</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdTipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Emision</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Control</b></td>";										
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";		
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
	
						echo "<td align='center' style='border: inset 0pt'>				
								<a href='/facturasPDF/".$reg[0].".pdf' target='_blank'>Ver Factura</a>					
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "<br><br>";
					echo "No hay servicios Facturados";
					}
			
				}
			elseif ($_POST["filtro"]=="Pagada")
				{
									
 
				echo "<br><br>";
				echo "FILTRADO Facturado";

					require("../cnx.php");
					$ssql = "SELECT * FROM facturas WHERE estatus='Pagada'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM facturas WHERE estatus = 'Pagada';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdFactura</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdTipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Emision</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Control</b></td>";										
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";		
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
	
						echo "<td align='center' style='border: inset 0pt'>				
								<a href='../facturasPDF/".$reg[0].".pdf' target='_blank'>Ver Factura</a>					
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "<br><br>";
					echo "No hay nuevos facturas Pagadas";
					}
				}
				}
			else
				{

									



/////////////////////////////////////////////////////////////////////////////////////////////



				echo "<br><br>";
				echo "<font color='#8A0829'>Tickes Por Facturar</font>";
				echo "<br><br>";




				$ssql = "SELECT * FROM tickets WHERE estatus='Por facturar'";
				$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM tickets WHERE estatus='Por facturar';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Hora</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asunto</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Client</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>News</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asigando</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[5]."</td>";
						
						if ($reg[8]>0)
							{
								echo "<td align='center'><font color='#8A0829'>".$reg[8]."</font></td>";
							}
							else
							{
								echo "<td align='center'><font color='green'>".$reg[8]."</font></td>";
							}	
						if ($reg[9]>0)
							{
								echo "<td align='center'><font color='#8A0829'>".$reg[9]."</font></td>";
							}
							else
							{
								echo "<td align='center'><font color='green'>".$reg[9]."</font></td>";
							}	
						if ($reg[10]>0)
							{
								echo "<td align='center'><font color='#8A0829'>".$reg[10]."</font></td>";
							}
							else
							{
								echo "<td align='center'><font color='green'>".$reg[10]."</font></td>";
							}
						echo "<td align='center'>".$reg[12]."</td>";		
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='facturas.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Facturar'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "No Hay Nuevos tickets o seguimientos por revisar";
					}


				
						

				echo "<br><br>";
				echo "<font color='#8A0829'>*Servicios Facturados*</font>";
				echo "<br><br>";

					require("../cnx.php");
					$ssql = "SELECT * FROM proyectos WHERE estatus='Por Facturar'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM proyectos WHERE estatus = 'Por Facturar';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Enunciado</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Pago</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Inicio</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Resumen</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";						
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[5]."</td>";		
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='facturas.php' method='post'>								
									<input type='hidden' name='proyecto' value=".$reg[0].">
									<input type='submit' name='ver' value='Facturar'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "No hay nuevos ticket facturados";
					}




				echo "<br><br>";
				echo "<font color='#8A0829'>*Servicios Facturados por Cobrar*</font>";
				echo "<br><br>";

					require("../cnx.php");
					$ssql = "SELECT * FROM facturas WHERE estatus='Facturado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM facturas WHERE estatus = 'Facturado';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdFactura</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>IdTipo</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Emision</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Vence</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Control</b></td>";										
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[2]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";		
						echo "<td align='center'>".$reg[5]."</td>";
						echo "<td align='center'>".$reg[6]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
	
						echo "<td align='center' style='border: inset 0pt'>				
								<a href='../facturasPDF/".$reg[0].".pdf' target='_blank'>Ver Factura</a>					
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
					}
					else
					{
					echo "No hay nuevos ticket facturados";
					}






}//FIn de If principal

