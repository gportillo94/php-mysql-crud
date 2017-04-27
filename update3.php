<?php
	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$update_string= "UPDATE alumnos SET
	apPaterno = ?,
	apMaterno = ?,
	nombre = ?,
	carrera = ?,
	sexo = ?,
	correo = ?,
	celular = ?,
	semestre = ?
	WHERE clave = ?"; 

	$stmt = $conn->prepare($update_string) ; 
	$stmt->bind_param("ssssssssi", $apPaterno , $apMaterno , $nombre, $carrera , $sexo , $correo , $celular , $semestre , $clave); 

	$apPaterno = $_POST["apPaterno"]; 
	$apMaterno = $_POST["apMaterno"]; 
	$nombre = $_POST["nombre"]; 
	$carrera = $_POST["carrera"]; 
	$sexo = $_POST["sexo"]; 
	$correo = $_POST["correo"]; 
	$celular = $_POST["celular"]; 
	$semestre = $_POST["semestre"]; 
	$clave = $_POST["clave"]; 

	$stmt->execute() ; 

	echo "Actualizacion exitosa<br />";
	echo "<a href='index.html'>Regresar</a>";

?>