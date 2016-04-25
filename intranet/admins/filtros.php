<?php

if(isset($_POST['crear']))
{
	?>
	<hr>
	<h5>Registro de Administradores</h5>
<form method="post" action="#">
		<div style=" width: 300px; height: auto; margin:0 auto; background-color: grey; text-align: left; padding:10px 0 0 10px; ">
		<label>Nombres:</label><br>
		<input type="text" name="nombres"></input><br>
		<label>Apellidos:</label><br>
		<input type="text" name="apellidos"></input><br>
		<label>Email:</label><br>
		<input type="text" name="email"></input><br>
		<label>Password:</label><br>
		<input type="text" name="pass"></input><br>
		<label>Cedula:</label><br>
		<input type="text" name="ci"></input><br>
		<label>Fecha de Naciento:</label><br>
		<input type="text" name="fechaNacimiento" placeholder="dd-mm-yy"></input><br>
		<label>Telefono:</label><br>
		<input type="text" name="telefono"></input><br>
		<label>Celular:</label><br>
		<input type="text" name="celular"></input><br>
		<label>Pais:</label><br>
		<input type="text" name="pais"></input>	<br>
		<label>Estado:</label><br>
		<input type="text" name="estado"></input>	<br>
		<label>Ciudad:</label><br>
		<input type="text" name="ciudad"></input><br>
		<label>Direccion:</label><br>
		<input type="text" name="dir"></input><br>	
		<label>Especialidad1:</label><br>
		<select name="especialidad1" id="dato">	
						<option>Soporte</option>
	                    <option>Redes</option>
	                    <option>Telefono</option>
	                    <option>Desarrollo Web</option>
	                    <option>Diseno Grafico</option>
	                    <option>Backend</option>
	                    <option>Frontend</option> 
	                    <option>Social Marketing</option>
	                    <option>Programador</option>					
	 					<option>Programador Movil</option>	                                       
	                    <option>Base de Datos</option>                   
		</select><br>
		<label>Especialidad2:</label><br>
		<select name="especialidad2" id="dato">			
						<option>Soporte</option>
	                    <option>Redes</option>
	                    <option>Telefono</option>
	                    <option>Desarrollo Web</option>
	                    <option>Diseno Grafico</option>
	                    <option>Backend</option>
	                    <option>Frontend</option> 
	                    <option>Social Marketing</option>
	                    <option>Programador</option>					
	 					<option>Programador Movil</option>	                                       
	                    <option>Base de Datos</option>                   
		</select><br>
		<label>Descripcion:</label><br>
		<textarea name="descripcion"></textarea><br><br>
		<input type="submit" name="registrar" value="Registrar ADministrador"></input>
		</div>
		

</form>
	<hr>
	<?php
}

/*******************************************************************************************************/

	if(isset ($_POST["buscar"]))
			{
				
				$filtro	= $_POST['filtro'];
				$dato	= $_POST['dato'];
				require("../cnx.php");






if ($_POST["filtro"]=="ID" and $dato=="Todos")
				{
									

				echo "<br><br>";
				echo "Administradores Filtrados por ID";


						 $consulta = "SELECT * FROM administradores ;";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Ciudad</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad1</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad2</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center'>".$reg[10]."</td>";
						echo "<td align='center'>".$reg[13]."</td>";
						echo "<td align='center'>".$reg[14]."</td>";
						echo "<td align='center'>".$reg[16]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='admins.php' method='post'>								
									<input type='hidden' name='idAdmin' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion); 

				
				}
				elseif ($filtro=="ID" and $dato!="Todos")
				{



						echo "<br><br>";
						echo "Administradores en Area:" . $dato;

						$ssql = "SELECT * FROM administradores WHERE especialidad1='$dato' OR Especialidad2='$dato'";
						$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{

						
						$consulta = "SELECT * FROM administradores WHERE especialidad1='$dato' OR Especialidad2='$dato';";
						$hacerconsulta=mysql_query ($consulta,$conexion);	
				
									
							echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Ciudad</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad1</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad2</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center'>".$reg[10]."</td>";
						echo "<td align='center'>".$reg[13]."</td>";
						echo "<td align='center'>".$reg[14]."</td>";
						echo "<td align='center'>".$reg[16]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='admins.php' method='post'>								
									<input type='hidden' name='idAdmin' value=".$reg[0].">
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
						echo "<br><br>";
						echo "No hay Administradores con esta Especialidad";
					}
				
				}
				elseif ($filtro=="Activo" or $filtro=="Inactivo" and $dato=="Todos")
				{



						echo "<br><br>";
						echo "Administradores con estatus ".$filtro.":" . $dato;

						$ssql = "SELECT * FROM administradores WHERE estatus='$filtro'";
						$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{

						
						$consulta = "SELECT * FROM administradores WHERE estatus='$filtro';";
						$hacerconsulta=mysql_query ($consulta,$conexion);	
				
									
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Ciudad</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad1</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad2</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center'>".$reg[10]."</td>";
						echo "<td align='center'>".$reg[13]."</td>";
						echo "<td align='center'>".$reg[14]."</td>";
						echo "<td align='center'>".$reg[16]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='admins.php' method='post'>								
									<input type='hidden' name='idAdmin' value=".$reg[0].">
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
						echo "<br><br>";
						echo "No hay Administradores con este Estatus";
					}
				
				}
				elseif ($filtro=="Activo" or $filtro=="Inactivo" and $dato!="Todos")
				{

						echo "<br><br>";
						echo "Administradores con estatus ".$filtro." en el area :" . $dato;

						$ssql = "SELECT * FROM administradores WHERE estatus='$filtro' AND especialidad1='$dato' OR especialidad2='$dato'";
						$rs = mysql_query($ssql,$conexion);			
						if (mysql_num_rows($rs)>0)
						{

						
						$consulta = "SELECT * FROM administradores WHERE estatus='$filtro' AND especialidad1='$dato' OR especialidad2='$dato';";
						$hacerconsulta=mysql_query ($consulta,$conexion);	
				
									
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Ciudad</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad1</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad2</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center'>".$reg[10]."</td>";
						echo "<td align='center'>".$reg[13]."</td>";
						echo "<td align='center'>".$reg[14]."</td>";
						echo "<td align='center'>".$reg[16]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='admins.php' method='post'>								
									<input type='hidden' name='idAdmin' value=".$reg[0].">
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
						echo "<br><br>";
						echo "No hay administradores en esta area con el Estatus señalado";
					}
				
				}		
				}
			else
				{
				echo "<br><br>";
				echo "<font color='#8A0829'>Administradores</font>";
				echo "<br><br>";

						 $consulta = "SELECT * FROM administradores ;";
						 $hacerconsulta=mysql_query ($consulta,$conexion);
						 //$hacerconsulta=mysql_query ($consulta,$conexion);
								
						echo "<table border='1' bordercolor='#3ADF00' align='center'>";
						echo "<tr>";
						echo "<td align='center' bgcolor='#58ACFA'><b>ID</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Email</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Nombres</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Apellidos</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Telefono</b></td>";		
						echo "<td align='center' bgcolor='#58ACFA'><b>Celular</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Pais</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Ciudad</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad1</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Especialidad2</b></td>";
						echo "<td align='center' bgcolor='#58ACFA'><b>Estatus</b></td>";
						echo "<td align='center' style='border: inset 0pt'></td>";
						echo "</tr>";
						
						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						
						while ($reg)
						{
						echo "<tr>";
						echo "<td align='center'>".$reg[0]."</td>";
						echo "<td align='center'>".$reg[1]."</td>";
						echo "<td align='center'>".$reg[3]."</td>";
						echo "<td align='center'>".$reg[4]."</td>";
						echo "<td align='center'>".$reg[7]."</td>";
						echo "<td align='center'>".$reg[8]."</td>";
						echo "<td align='center'>".$reg[9]."</td>";
						echo "<td align='center'>".$reg[10]."</td>";
						echo "<td align='center'>".$reg[13]."</td>";
						echo "<td align='center'>".$reg[14]."</td>";
						echo "<td align='center'>".$reg[16]."</td>";
						echo "<td align='center' style='border: inset 0pt'>				
								<form action='admins.php' method='post'>								
									<input type='hidden' name='idAdmin' value=".$reg[0].">
									<input type='submit' name='ver' value='Abrir'>
								</form>				
						</td>";//FIN DEL echo

						
						$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
						echo "</tr>";
						}
						echo "</table>";
						mysql_close($conexion);
				

				
						

				


			}//FIn de If principal

