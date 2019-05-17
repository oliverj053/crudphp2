<?php 
include_once 'Conne.php';








		$titulo= $_POST['titulo'];
		$editorial=$_POST['editorial'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];

		if (isset($titulo) && isset($editorial) && isset($precio) && isset($cantidad)) {
				$query= "INSERT INTO libros(Titulo, Editorial, Precio, Cantidad) VALUES (:Titulo, :Editorial, :Precio, :Cantidad) ";
				$nlibro= $con -> prepare($query);
				$nlibro ->bindParam(':Titulo',$titulo, PDO::PARAM_STR);
				$nlibro -> bindParam('Editorial', $editorial, PDO::PARAM_STR);

				$nlibro -> bindParam(':Precio', $precio, PDO::PARAM_INT);
				$nlibro -> bindParam(':Cantidad', $cantidad, PDO::PARAM_INT);
	
				$nlibro -> execute();



$mensaje = "Se ha insertado un nuevo libro";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'index.php';";
echo "</script>"; 
				 }else{
				 	echo "campos vacios";
				 }
		




	 ?>



