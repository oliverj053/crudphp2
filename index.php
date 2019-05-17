<?php 
 	include_once 'Conne.php';

            
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>crud basico en php</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="estilos.css">
<h1 align="center">¡¡Hello word Azure :) !!</h1>
	<h1 align="center">CRUD EN PHP LIBROS</h1>
</head>



<body>
<a href="agregar.php"></a>

<div class="container">
 <div class="row d-flex justify-content-around mt-5">
    <div class="card cold-md-6 cold-md-offset-6">
     <a href="index.php" class="btn btn-dark mt-2" style="width:70px;height:25px;font-size:10px;text-align: center;left:82%;position:absolute;"><b>recargar</b></a>
    <article class="card-body">
    <br>
    <br>
    <h4 class="card-title mb-4 mt-1 text-center"> <B>DATOS</B></h4>
       <br>
	<table>
		
<thead>
	
	<tr>
		<th>  Id  </th>
		<th>  Titulo  </th>
		<th>  Editorial  </th>
		<th>  Cantidad  </th>
		<th>  Precio  </th>
		<th>  Opcion  </th>


	</tr>
</thead>
<tbody>
	<?php
 $query ="SELECT * FROM libros";
            $resultado= $con->prepare($query);
            $resultado->execute(); 
	foreach ($resultado as $filas) {
		 $uno=$filas['Id'];
		 $dos=$filas['Titulo'];
		 $tres=$filas['Editorial'];
		 $cua=$filas['Precio'];
		 $qui=$filas['Cantidad'];


		 ?>
 <tr>
	 	<td><?php echo "  ".$uno."  " ?></td>
	 	<td><?php echo $dos ?></td>
	 	<td><?php echo $tres ?></td>
	 	<td><?php echo $qui ?></td>
	 	<td><?php echo $cua ?></td>
	 	<td>
	 		<a class="btn btn-primary btn-sm" onClick="Mostrar()" id="edi" href="?id=<?php echo $uno ?>" >Editar</a>
	 		<a  class="btn btn-danger btn-sm" href="Eliminar.php?id=<?php echo $uno ?>">Eliminar</a>
	 	</td>
	 </tr>
		 <?php
		}
?>
</tbody>
</table>
</article>
<div class="form-group" align="center">
<select id="select" name="select" class="form-control" style="width:200px;height:40px;font-size: 15px" required autofocus >
	<option value=""> Seleccionar</option>
	<option value="div1" href="../">Agregar Libro</option>
	<!--<option value="div2" size="30">Modificar Libro</option>-->
</select>
</div>
</div>
</div>
</div>

<br>



<div id="op">
<div id="div1" name="div1" style="display: none">
<div class="container">
  <div class="row d-flex justify-content-around mt-5">
    <div class="card cold-md-6 cold-md-offset-6">
    <article class="card-body">
    <h4 class="card-title mb-4 mt-1 text-center"> <B>DATOS</B></h4>
		<form action="agregar.php" method="POST">
		<div class="row " align="center">
		<div class="cold-md-3">
		<div class="form-group">
			<label>Titulo: </label>
			<input type="text" class="form-control" name="titulo" id="titulo" require required> <br>
			</div>
			<div class="form-group">

			<label>Editorial: </label>
			<input type="text" class="form-control" name="editorial" required require> <br>
			</div>
			</div>

			<div class="cold-md-3">
			<div class="form-group">
			<label>Precio: </label>
			<input type="number" class="form-control" name="precio" required require><br>
			</div>
			<div class="form-group">
			<label>Cantidad: </label>
			<input type="number" class="form-control" name="cantidad" required require> <br>
			</div>
			</div>
			</div>
			<div class="form-group" class="form-control" align="center">
			<input type="submit" class= "btn btn-success" name="" value="Agregar"></div>

		</form>
		</article>
		</div>
		</div>
	</div>
</div>

<?php 
error_reporting(E_ALL ^ E_NOTICE);
$id1=$_GET['id'];

 $query1 ="SELECT * FROM libros WHERE Id=:id";
            $resultado1= $con->prepare($query1);
            $resultado1->bindParam(':id',$id1, PDO::PARAM_INT);
            $resultado1->execute(); 
	foreach ($resultado1 as $filas) {
		 $uno1=$filas['Id'];
		 $dos1=$filas['Titulo'];
		 $tres1=$filas['Editorial'];
		 $cua1=$filas['Precio'];
		 $qui1=$filas['Cantidad'];


 ?>




<div id="div2" name="div2">
<div class="container" >
  <div class="row d-flex justify-content-around mt-5">
    <div class="card cold-md-6 cold-md-offset-6">
    <article class="card-body">
    <h4 class="card-title mb-4 mt-1 text-center"> <B>Modificar-Datos</B></h4>
		<form action="Editar.php" method="POST">
		<div class="row " align="center">
		<div class="cold-md-3">
		<div class="form-group">
			<input type="hidden" name="txtid" id="txtid" value="<?php echo $uno1; ?>">

			<label>Titulo: </label>
			<input type="text" class="form-control" name="titulo" id="titulo" require required value="<?php echo $dos1; ?>"> <br>
			</div>
			<div class="form-group">

			<label>Editorial: </label>
			<input type="text" class="form-control" name="editorial" required require  value="<?php  echo $tres1; ?>"> <br>
			</div>
			</div>

			<div class="cold-md-3">
			<div class="form-group">
			<label>Precio: </label>
			<input type="number" class="form-control" name="precio" required require value="<?php  echo $cua1; ?>"><br>
			</div>
			<div class="form-group">
			<label>Cantidad: </label>
			<input type="number" class="form-control" name="cantidad" required require value="<?php  echo $qui1; ?>"> <br>
			</div>
			</div>
			</div>
			<div class="form-group" class="form-control" align="center">
			<input type="submit" class= "btn btn-success" name="" value="Actualizar"></div>

		</form>
		</article>
		</div>
		</div>
	</div>
	
</div>



<?php
}

?>
</div>

 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="accion.js"></script>

<script type="text/javascript">
	function Mostrar(){
		document.getElementById("div2").style.display = "block";
	}

	function Ocultar(){
		document.getElementById("div2").style.display = "none";
	}

	function Mostrar_Ocultar(){
		var div2 = document.getElementById("div2");
		if (div2.style.display == "none") {
			Mostrar();
			<?php header('location: index.php'); ?>
			document.getElementById("edi").value = "Ocultar";
		}
		else {
			Ocultar();
			<?php header('location: index.php'); ?>
			document.getElementById("edi").value = "Editar";
		}
	}




</script>




</body>
</html>

<!-- <tr>
	 	<td><?php //echo $filas['Id'] ?></td>
	 	<td><?php //echo $filas['Titulo'] ?></td>
	 	<td><?php //echo $filas['Editorial'] ?></td>
	 	<td><?php  //echo $filas['Precio'] ?></td>
	 </tr>-->
	 
	