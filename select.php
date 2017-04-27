<?php
	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM alumnos"; 

	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$tabla = "<table><thead> <th>Clave</th> <th>Nombre</th> <th>A. Paterno</th> <th>A. Materno</th> <th>Sexo</th>" ; 
		$tabla .= "<th>Correo</th> <th>Carrera</th> <th>Celular</th>  <th>Semestre</th>  </thead>" ; 
		while($row = $result->fetch_assoc()) 
		{
			$tabla .= "<tr><td>" . $row["clave"] . "</td>" ;
			$tabla .= "<td>" . $row["nombre"] . "</td>" ;
			$tabla .= "<td>" . $row["apPaterno"] . "</td>" ;
			$tabla .= "<td>" . $row["apMaterno"] . "</td>" ;
			$tabla .= "<td>" . $row["sexo"] . "</td>" ;
			$tabla .= "<td>" . $row["correo"] . "</td>" ;
			$tabla .= "<td>" . $row["carrera"] . "</td>" ;
			$tabla .= "<td>" . $row["celular"] . "</td>" ;
			$tabla .= "<td>" . $row["semestre"] . "</td></tr>" ; 
		}
		$tabla .= "</table>" ;
		echo $tabla; 
	} 
	else 
	{
		echo "0 results";
	}
	$conn->close();

?>