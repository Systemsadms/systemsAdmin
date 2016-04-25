<?php
	if(isset ($_POST["buscar"]))
			{
				
				$filtro	= $_POST['filtro'];
				$dato	= $_POST['dato'];
				

				require("../cnx.php");


			if ( $_POST["filtro"]=="Reportados"  )
				{
					echo "<br><br>";
					echo "<font color='red'>*NUEVOS PAGOS REPORTADOS*</font>";
					echo "<br><br>";

					require("../cnx.php");
						$ssql = "SELECT * FROM pagos WHERE estatus='Reportado'";
						$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{
 						$consulta = "SELECT * FROM pagos WHERE estatus='Reportado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>IdCliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Nombre</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Transaccion N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Factura N°</b></td>";
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
							echo "<td align='center'>".$reg[1]."</td>";
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[4]."</td>";				
							echo "<td align='center'>".$reg[5]."</td>";
							echo "<td align='center'>".$reg[6]."</td>";
							echo "<td align='center'>".$reg[7]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
								<form action='#' method='post'>								
									<input type='hidden' name='id' value=".$reg[0].">
									<input type='submit' name='confirmar' value='Confirmar'>
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
							echo "No hay Pagos reportados";
						}
			

				}

			elseif ($_POST["filtro"]=="Confirmados")
				{
					echo "<br><br>";
				echo "<font color='red'>*NUEVOS PAGOS REPORTADOS*</font>";
				echo "<br><br>";

				require("../cnx.php");
					$ssql = "SELECT * FROM pagos WHERE estatus='Confirmado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM pagos WHERE estatus='Confirmado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>IdCliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Nombre</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Transaccion N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Factura N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Comentarios</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";							
							echo "</tr>";
							
							
							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td align='center'>".$reg[0]."</td>";
							echo "<td align='center'>".$reg[1]."</td>";
							echo "<td align='center'>".$reg[1]."</td>";
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[4]."</td>";				
							echo "<td align='center'>".$reg[5]."</td>";
							echo "<td align='center'>".$reg[6]."</td>";
							echo "<td align='center'>".$reg[7]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";


							


							$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
							echo "</tr>";
							}
							echo "</table>";
							mysql_close($conexion);


					}else
					{
						echo "No hay Pagos Confirmados";
					}
				
					
				}
	
				}
			else
				{
				echo "<br><br>";
				echo "<font color='red'>*NUEVOS PAGOS NO CONFIRMADOS*</font>";
				echo "<br><br>";

				require("../cnx.php");
					$ssql = "SELECT * FROM pagos WHERE estatus='Reportado'";
					$rs = mysql_query($ssql,$conexion);			
					if (mysql_num_rows($rs)>0)
					{
 						$consulta = "SELECT * FROM pagos WHERE estatus='Reportado';";
						$hacerconsulta=mysql_query ($consulta,$conexion);
							 //$hacerconsulta=mysql_query ($consulta,$conexion);
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
							echo "<tr>";
							echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>IdCliente</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Nombre</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Medio</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Fecha</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Transaccion N°</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Banco</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Monto</b></td>";
							echo "<td align='center' bgcolor='#58ACFA'><b>Factura N°</b></td>";
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
							echo "<td align='center'>".$reg[1]."</td>";
							echo "<td align='center'>".$reg[2]."</td>";
							echo "<td align='center'>".$reg[3]."</td>";
							echo "<td align='center'>".$reg[4]."</td>";				
							echo "<td align='center'>".$reg[5]."</td>";
							echo "<td align='center'>".$reg[6]."</td>";
							echo "<td align='center'>".$reg[7]."</td>";
							echo "<td align='center'>".$reg[10]."</td>";
							echo "<td align='center'>".$reg[9]."</td>";
							echo "<td align='center' style='border: inset 0pt'>				
								<form action='#' method='post'>								
									<input type='hidden' name='id' value=".$reg[0].">
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
						echo "No hay Pagos por confirmar";
					}

				
				
						
			}

?>