<?php			
	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT * FROM alumnos WHERE clave = ?");
	$stmt->bind_param("i", $_GET["clave"]);
	$stmt->execute();
	$stmt->bind_result($clave,$nombre,$apPaterno,$apMaterno,$carrera, $sexo,$correo,$celular,$semestre);
	$stmt->fetch();
?>

	<form action="update3.php" method="POST">

		Clave:<input type="number" name="clave" readonly="" value="<?php echo $clave;  ?>"><br/>
		Apellido Paterno:<input type="text" name="apPaterno" value="<?php echo $apPaterno;  ?>"><br/>
		Apellido Materno:<input type="text" name="apMaterno" value="<?php echo $apMaterno;  ?>"><br/>
		Nombre:<input type="text" name="nombre" value="<?php echo $nombre;  ?>"><br/>

		Carrera:<select name="carrera">
		<?php
			$carreras =  array
			(
				"Ing. Mecanica",
				"Ing. Mecatronica",
				"Ing. Cibernetica",
				"Ing. Electronica",
				"Ing. Civil",
				"Ing. Industrial"
			);
			foreach ($carreras as $i) 
			{
				if ($i == $carrera)
					echo "<option selected> {$i} </option>";
				else
					echo "<option> {$i} </option>";echo "";
			}
		?>
		</select><br/>

		Sexo: 
		M<input type="radio" name="sexo" value="M" <?php if($sexo=="M") echo "checked";  ?> > 
		F<input type="radio" name="sexo" value="F" <?php if($sexo=="F") echo "checked";  ?>><br/>
		Correo:<input type="text" name="correo" value="<?php echo $correo;  ?>" ><br/>
		Celular:<input type="text" name="celular" value="<?php echo $celular;  ?>" ><br/>
		Semestre:<select name="semestre">
		<?php
			for($i=1 ; $i<=9 ; $i++)
			{
				if ($i == $semestre)
					echo "<option selected> {$i} </option>"; 
				else
					echo "<option> {$i} </option>"; 
			}
		?>
		</select>
		<br/>
		<button>Enviar</button>

	</form>