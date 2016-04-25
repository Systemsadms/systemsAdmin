<?php

if(isset($_POST['crear']))
{
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
				<label id="validar1">ID:</label>
				<input type="text" name="id" size="2"></input>
				
			</div>
			

			<div style="background-color: none; width: 300px; display: inline-block; margin-top: 10px; text-align: center;" >
				<label>Asignar a:</label>
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
					<option>Notificacion</option>
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
			</div>
			
			
			<div style="background-color: none; width: 100%; display: inline-block; margin-top: 20px;">
				<label id="validar2">Asunto:</label>		
			</div>
			<br>
				<input type="text" name="asunto">
				
			
			<div style="background-color: none; width: 100%;  display: inline-block; margin-top: 10px;">
				<label id="validar3">Mensaje:</label>		
			</div>
			<br>
			<textarea name="mensaje"></textarea>
			
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
				$dato	= $_POST['dato'];
				require("../cnx.php");


			if ($_POST["filtro"]=="ID")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;


			
 
				echo "<br><br>";
				echo "FILTRADO POR ID";

				$consulta = "SELECT * FROM tickets WHERE ticket LIKE '%$busqueda%';";
				$hacerconsulta=mysql_query ($consulta,$conexion);	
				
				
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
				
				}		

			elseif ($_POST["filtro"]=="Sin Asignar")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				
				echo "<br><br>";
				echo "FILTRADO POR NO ASIGNADOS";

				$consulta = "SELECT * FROM tickets WHERE admin='Systems Admins';";
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
				
				}	
			elseif ($_POST["filtro"]=="Asignados")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "FILTRADO ASIGANADOS";

				$consulta = "SELECT * FROM tickets WHERE (admin<>'Systems Admins');";
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
				
				}	
			elseif ($_POST["filtro"]=="Abiertos")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "TICKETS ABIERTOS";

				$consulta = "SELECT * FROM tickets WHERE estatus='Abierto';";
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);

				}
				elseif ($_POST["filtro"]=="Por Facturar")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "TICKETS POR FACTURAR";

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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);

				}
				elseif ($_POST["filtro"]=="Facturados")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "TICKETS FACTURADOS";

				$consulta = "SELECT * FROM tickets WHERE estatus='Facturado';";
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);

				}
				elseif ($_POST["filtro"]=="Cerrados")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "TICKETS CERRADOS";

				$consulta = "SELECT * FROM tickets WHERE estatus='Cerrado';";
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
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
				echo "<font color='#8A0829'>***NUEVOS TICKETS Y SEGUIMIENTOS***</font>";
				echo "<br><br>";


				$ssql = "SELECT * FROM tickets WHERE rs > '0'";
				$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM tickets WHERE rs > '0';";
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
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
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
				echo "<font color='#8A0829'>*TICKETS POR FACTURAR*</font>";
				echo "<br><br>";

					require("../cnx.php");
					$ssql = "SELECT * FROM tickets WHERE estatus='Por Facturar'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
						 $consulta = "SELECT * FROM tickets WHERE estatus = 'Por Facturar';";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Area</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asunto</b></td>";						
						echo "<td align='center' bgcolor='#58ACFA'><b>Client</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Asignado a</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
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
						echo "<td align='center'>".$reg[7]."</td>";		
						echo "<td align='center'>".$reg[12]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='#modal' method='post'>
									<input type='hidden' name='cliente' value=".$reg[1].">
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Ver Serguimientos'>
								</form>				
							</td>";//FIN DEL echo
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='tickets.php' method='post'>								
									<input type='hidden' name='ticket' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
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


			}//FIn de If principal

