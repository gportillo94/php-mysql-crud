<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
</head>
<body>
	<h3>Eliminar</h3>
	<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
		Clave:<input type="number" name="clave"><button>Eliminar</button>
		<br/>
		<br/>
	</form>

	<?php
		if($_GET["clave"])
		{
			include 'config/cred_info.php';
			
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
		    	die("Connection failed: " . $conn->connect_error);
			}

			$deleteStatement = "DELETE FROM alumnos WHERE clave = ?"; 
			$stmt = $conn->prepare($deleteStatement);
			$stmt->bind_param("i", $_GET["clave"]); 
			$stmt->execute() ; 
			$stmt->close() ; 
			$conn->close() ; 
		}
	?>

	<?php include 'select.php'; ?>

	<h4><a href="index.html">Regresar</a></h4>

</body>
</html>