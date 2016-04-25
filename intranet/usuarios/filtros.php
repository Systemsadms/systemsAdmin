<?php
	if(isset ($_POST["buscar"]))
			{
				
				$filtro	= $_POST['filtro'];
				$dato	= $_POST['dato'];
				
				//echo $filtro;
				//print "/";
				//echo $dato;

				require("../cnx.php");


			if ( $_POST["filtro"]=="NoConfirmados"  AND $_POST['dato']=="" )
				{
										echo "<br><br>";
				echo "<font color='red'>REGISTROS NO CONFIRMADOS</font>";
				echo "<br><br>";

				 $consulta = "SELECT * FROM usuarios WHERE estatus='noConfirmado';";
				 $hacerconsulta=mysql_query ($consulta,$conexion);
				 //$hacerconsulta=mysql_query ($consulta,$conexion);
						
				echo "<table border='1' bordercolor='#3ADF00' align='center'>";
				echo "<tr>";
				echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
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
				echo "<td align='center'>".$reg[5]."</td>";
				echo "<td align='center'>".$reg[7]."</td>";				
				echo "<td align='center'>".$reg[8]."</td>";
				echo "<td align='center'>".$reg[9]."</td>";
				echo "<td align='center'>".$reg[14]."</td>";
				echo "<td align='center'>".$reg[15]."</td>";
				echo "<td align='center'>".$reg[18]."</td>";
				echo "<td align='center' style='border: inset 0pt'>				
					<form action='usuarios.php' method='post'>								
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

			elseif ($_POST['dato']=="") 
				{
					echo "<br><br>";
					echo "TODOS LOS USUARIOS";
					
				$consulta = "SELECT * FROM usuarios;";
				$hacerconsulta=mysql_query ($consulta,$conexion);
				
				echo "<table border='1' bordercolor='#3ADF00' align='center'>";
				echo "<tr>";
				echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
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
				echo "<td align='center'>".$reg[5]."</td>";
				echo "<td align='center'>".$reg[7]."</td>";				
				echo "<td align='center'>".$reg[8]."</td>";
				echo "<td align='center'>".$reg[9]."</td>";
				echo "<td align='center'>".$reg[14]."</td>";
				echo "<td align='center'>".$reg[15]."</td>";
				echo "<td align='center'>".$reg[18]."</td>";
				echo "<td align='center' style='border: inset 0pt'>				
					<form action='usuarios.php' method='post'>								
					<input type='hidden' name='ticket' value=".$reg[0].">
					<input type='submit' name='ver' value='Abrir'>
					</form>				
				</td>";//FIN DEL echo

			


				$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
				echo "</tr>";
				}
				echo "</table>";
				mysql_close($conexion);

				//COMIENZO DE CONSULTA CON FILTRO

				}
			
			elseif ($_POST["filtro"]=="Nombre")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;


			
 
				echo "<br><br>";
				echo "FILTRADO POR NOMBRES";

				$consulta = "SELECT * FROM usuarios WHERE nombres LIKE '%$busqueda%';";
				$hacerconsulta=mysql_query ($consulta,$conexion);	
				
				
				echo "<table border='1' bordercolor='#3ADF00' align='center'>";
				echo "<tr>";
				echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
				echo "<td align='center' style='border: inset 0pt;'></td>";
				echo "</tr>";;
				
				
				$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
				
				while ($reg)
				{
				echo "<tr>";
				echo "<td align='center'>".$reg[0]."</td>";
				echo "<td align='center'>".$reg[1]."</td>";
				echo "<td align='center'>".$reg[2]."</td>";
				echo "<td align='center'>".$reg[3]."</td>";
				echo "<td align='center'>".$reg[5]."</td>";
				echo "<td align='center'>".$reg[7]."</td>";				
				echo "<td align='center'>".$reg[8]."</td>";
				echo "<td align='center'>".$reg[9]."</td>";
				echo "<td align='center'>".$reg[14]."</td>";
				echo "<td align='center'>".$reg[15]."</td>";
				echo "<td align='center'>".$reg[18]."</td>";
				echo "<td align='center' style='border: inset 0pt'>				
					<form action='usuarios.php' method='post'>								
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

			elseif ($_POST["filtro"]=="Apellido")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				
				echo "<br><br>";
				echo "FILTRADO POR APELLIDOS";

				$consulta = "SELECT * FROM usuarios WHERE apellidos LIKE '%$busqueda%';";
				$hacerconsulta=mysql_query ($consulta,$conexion);
				//$hacerconsulta=mysql_query ($consulta,$conexion);
				

				echo "<table border='1' bordercolor='#3ADF00' align='center'>";
				echo "<tr>";
				echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
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
				echo "<td align='center'>".$reg[5]."</td>";
				echo "<td align='center'>".$reg[7]."</td>";				
				echo "<td align='center'>".$reg[8]."</td>";
				echo "<td align='center'>".$reg[9]."</td>";
				echo "<td align='center'>".$reg[14]."</td>";
				echo "<td align='center'>".$reg[15]."</td>";
				echo "<td align='center'>".$reg[18]."</td>";
				echo "<td align='center' style='border: inset 0pt'>				
					<form action='usuarios.php' method='post'>								
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
			
				
			elseif ($_POST["filtro"]=="Email")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "FILTRADO POR EMAIL";

				$consulta = "SELECT * FROM usuarios WHERE email LIKE '%$busqueda%';";
				$hacerconsulta=mysql_query ($consulta,$conexion);
				//$hacerconsulta=mysql_query ($consulta,$conexion);
						
				echo "<table border='1' bordercolor='#3ADF00' align='center'>";
				echo "<tr>";
				echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
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
				echo "<td align='center'>".$reg[5]."</td>";
				echo "<td align='center'>".$reg[7]."</td>";				
				echo "<td align='center'>".$reg[8]."</td>";
				echo "<td align='center'>".$reg[9]."</td>";
				echo "<td align='center'>".$reg[14]."</td>";
				echo "<td align='center'>".$reg[15]."</td>";
				echo "<td align='center'>".$reg[18]."</td>";
				echo "<td align='center' style='border: inset 0pt'>				
					<form action='usuarios.php' method='post'>								
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

			elseif ($_POST["filtro"]=="NoConfirmados")
				{
									
					$like = $_POST['dato'];	
					$busqueda = $like;
 
				echo "<br><br>";
				echo "USUARIOS NO CONFIRMADOS";

				$consulta = "SELECT * FROM usuarios WHERE estatus='noConfirmado';";
				$hacerconsulta=mysql_query ($consulta,$conexion);
				
						
				echo "<table border='1' bordercolor='#3ADF00' align='center'>";
				echo "<tr>";
				echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
				echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
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
				echo "<td align='center'>".$reg[5]."</td>";
				echo "<td align='center'>".$reg[7]."</td>";				
				echo "<td align='center'>".$reg[8]."</td>";
				echo "<td align='center'>".$reg[9]."</td>";
				echo "<td align='center'>".$reg[14]."</td>";
				echo "<td align='center'>".$reg[15]."</td>";
				echo "<td align='center'>".$reg[18]."</td>";
				echo "<td align='center' style='border: inset 0pt'>				
					<form action='usuarios.php' method='post'>								
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
				echo "<font color='red'>*NUEVOS REGISTROS NO CONFIRMADOS*</font>";
				echo "<br><br>";

				require("../cnx.php");
					$ssql = "SELECT * FROM usuarios WHERE estatus='noConfirmado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM usuarios WHERE estatus='noConfirmado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Tipo</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Encargado</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Cargo</b></td>";
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
							echo "<td align='center'>".$reg[5]."</td>";
							echo "<td align='center'>".$reg[7]."</td>";				
							echo "<td align='center'>".$reg[8]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center'>".$reg[14]."</td>";
							echo "<td align='center'>".$reg[15]."</td>";
							echo "<td align='center'>".$reg[18]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
								<form action='usuarios.php' method='post'>								
									<input type='hidden' name='id' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
							</td>";//FIN DEL echo
							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay registros por confirmar";
					}

				
				
						
			}

?>