<?php 
include_once 'Conne.php';
		$idl=$_POST['txtid'];
		$titulo= $_POST['titulo'];
		$editorial=$_POST['editorial'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];

		if (isset($titulo) && isset($editorial) && isset($precio) && isset($cantidad)) {
				$query= "UPDATE libros SET Titulo = :Titulo, Editorial = :Editorial, Precio = :Precio, Cantidad = :Cantidad WHERE Id=:id1";
				$nlibro= $con -> prepare($query);
				$nlibro ->bindParam(':Titulo',$titulo, PDO::PARAM_STR);
				$nlibro -> bindParam('Editorial', $editorial, PDO::PARAM_STR);

				$nlibro -> bindParam(':Precio', $precio, PDO::PARAM_INT);
				$nlibro -> bindParam(':Cantidad', $cantidad, PDO::PARAM_INT);
					$nlibro -> bindParam(':id1', $idl, PDO::PARAM_INT);
	
				$nlibro -> execute();



$mensaje = "Se ha Actualizado el libro:  ".$titulo;
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'index.php';";
echo "</script>"; 
				 }else{
				 	echo "campos vacios";
				 }
		




	 ?>
