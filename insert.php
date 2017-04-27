<?php
	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$insertStatement = "INSERT INTO alumnos (clave, nombre, apPaterno, apMaterno, carrera, sexo, correo, celular, semestre)";
	$insertStatement .= "VALUES (?,?,?,?,?,?,?,?,?)" ; 

	$stmt = $conn->prepare($insertStatement);
	$stmt->bind_param("issssssss", $clave, $nombre, $apPaterno , $apMaterno , $carrera , $sexo , $correo , $celular  ,$semestre);
	$clave = $_POST["clave"] ; 
	$nombre = $_POST["nombre"] ; 
	$apPaterno = $_POST["apPaterno"] ; 
	$apMaterno = $_POST["apMaterno"] ; 
	$carrera = $_POST["carrera"] ; 
	$sexo = $_POST["sexo"] ; 
	$correo = $_POST["correo"] ; 
	$celular = $_POST["celular"] ; 
	$semestre = $_POST["semestre"] ;

	$stmt->execute();

	echo "Nuevo alumno insertado exitosamente";

	$stmt->close() ;
	$conn->close() ; 

	echo "<br/><a href='index.html'>Regresar<a>";

?>