<?php 
include_once 'Conne.php';

$id= $_GET['id'];
$query="DELETE FROM libros WHERE Id=:id";

$resultado= $con -> prepare($query);
$resultado->bindParam(':id',$id, PDO::PARAM_INT);
$resultado->execute();
$mensaje = "Se ha Eliminado un libro";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'index.php';";
echo "</script>"; 

 ?>