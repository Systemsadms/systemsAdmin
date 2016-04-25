<?php
if(isset($_POST['crear']))
{

	date_default_timezone_set('America/La_Paz');
	$fecha 	= date("j-n-y"); 
	?>
	<hr>

		
			
		<form action="#" method="post" id="crearNuevoT" style="text-align: center; background-color: grey; width: 100%; margin:0 auto; padding: 20px;">
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
				<label id="validarId">ID:</label>
				<input type="text" name="id" size="2"></input>
				
			</div>
			

			<div style="background-color: none; width: 300px; display: inline-block; margin-top: 10px; text-align: center;" >
				<label>Pagar a:</label>
				<?php 
						require ("../cnx.php");
						$consulta_mysql='select * from administradores where estatus="Activo"';
						$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
						echo "<select name='admin'>";
							?>							
							<?php											
							while($fila=mysql_fetch_array($resultado_consulta_mysql))
							{												
								echo "<option>".$fila['nombres']." ".$fila['apellidos']."</option>";
							}
							echo "</select>";
					?>
			</div>
			
			
			<div style="background-color: none; width: 250px; display: inline-block; margin-top: 10px; text-align: center;">
				<label>Area:</label>
				<select name="area">					
 					<option>Sistemas Administrativos</option>
                    <option>Camaras (CCTV)</option>
                    <option>Redes</option>
                    <option>Diseno Web</option>
                    <option>Disno Grafico</option>
                   	<option>Soporte Tecnico</option>
                    <option>Hosting y Dominios</option>
                    <option>Nuevo Proyecto</option>
                    <option>Falla Tecnica</option>
                    <option>Consultoria</option>
				</select>		
			</div>
			
			
			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarFecha">Fecha:</label><br>
				<input type="text" name="fecha" size="4" placeholder="dd-mm-yy" value="<?php echo $fecha; ?>">		
			</div>
			<br>

			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label>Banco..........Medio</label><br>
				<select name="banco">
					<option>Banesco</option>
 					<option>Mercantil</option>
                    <option>PayPal</option>
				</select>	
				<select name="medio">
					<option>Deposito</option>
 					<option>Transferencia</option>
				</select>		
			</div>
			<br>


			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validarMonto">Monto:</label><br>
				<input type="text" name="monto" size="3">
				<select name="moneda">
					<option>BsF</option>
 					<option>$(usd)</option>
				</select>	
			</div>
			<br>
				
				
			
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<label id="validarComentario">Comentario:</label><br>
				<textarea name="comentario"></textarea>	
			</div>
			<br>
			
			
			<br>
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<!--<input type="button" name="crearTicket" value="CREAR TICKET" onclick="validarCampos()">-->
				<a href="javascript: validarCampos()" name="test">CARGAR NUEVO TICKET</a>
			</div>
		</form>
	<hr>
	<?php
}





	if(isset ($_POST["buscar"]))
			{
				
				$filtro	= $_POST['filtro'];
				$like = $_POST['dato'];	
				$busqueda = $like;
				

				require("../cnx.php");


			if ( $_POST["filtro"]=="ID"  )
				{
					echo "<br><br>";
					echo "<font color='red'>*PAGOS REALIZADOS POR ID*</font>";
					echo "<br><br>";

					$ssql = "SELECT * FROM pagosadmins";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM pagosadmins;";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Ticket</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Comentarios</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";							
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
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";
							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);

						}
						else
						{
							echo "No hay Pagos Reportados";
						}


					}
				elseif ( $_POST["filtro"]=="Solicitados"  )
					{

							echo "<br><br>";
							echo "<font color='red'>*PAGOS SOLICITADOS*</font>";
							echo "<br><br>";

 							require("../cnx.php");
							$ssql = "SELECT * FROM pagosadmins WHERE estatus='Solicitado'";
							$rs = mysql_query($ssql,$conexion);			
							if (mysql_num_rows($rs)>0)
							{
 							$consulta = "SELECT * FROM pagosadmin WHERE estatus='Solicitado';";
							$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Ticket</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Comentarios</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
							echo "<td align='center' style='border: inset 0pt;'></td>";
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
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
								<form action='#' method='post'>								
									<input type='hidden' name='idConfirmar' value=".$reg[0].">
									<input type='submit' name='confirmar' value='Confirmar'>
								</form>				
							</td>";//FIN DEL echo
							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay Pagos solicitados";
					}
						
			
			}
			elseif ( $_POST["filtro"]=="Realizados"  )
			{

							echo "<br><br>";
							echo "<font color='red'>*PAGOS REALIZADOS*</font>";
							echo "<br><br>";

 							require("../cnx.php");
							$ssql = "SELECT * FROM pagosadmins WHERE estatus='Pagado'";
							$rs = mysql_query($ssql,$conexion);			
							if (mysql_num_rows($rs)>0)
							{
 							$consulta = "SELECT * FROM pagosadmins WHERE estatus='Pagado';";
							$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Ticket</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Comentarios</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";						
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
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay Pagos solicitados";
					}
				
				}				
			elseif ($_POST["filtro"]=="Admin")
				{
					echo "<br><br>";
					echo "<font color='red'>*PAGOS REPORTADOS POR ADMIN*</font>";
					echo "<br><br>";

					
 						$consulta = "SELECT * FROM pagosadmins WHERE admin LIKE '%$busqueda%';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Ticket</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Comentarios</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";										
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
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";


							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					
					
				}
	
				}
			else
				{
				echo "<br><br>";
				echo "<font color='red'>*PAGOS SOLICITADOS*</font>";
				echo "<br><br>";

				require("../cnx.php");
					$ssql = "SELECT * FROM pagosadmins WHERE estatus='Solicitado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM pagosadmin WHERE estatus='Solicitado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Admin</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Ticket</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Area N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Comentarios</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
							echo "<td align='center' style='border: inset 0pt;'></td>";
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
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
								<form action='#' method='post'>								
									<input type='hidden' name='idConfirmar' value=".$reg[0].">
									<input type='submit' name='confirmar' value='Confirmar'>
								</form>				
							</td>";//FIN DEL echo
							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay Pagos solicitados";
					}

				
				
						
			}

?>