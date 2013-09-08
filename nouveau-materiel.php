<?php
	if(isset($_POST['ok']))
	{

		include("conexion.php");
		extract($_POST);
		$req="insert into materiel values('','$designation','$prix')";
		$exe=mysql_query($req);
		header("Location:materiel.php");
	}
?>


<?php include('header.php') ?>

<div class="container">

	<div class="row">

		<div class="span9"><h1>Ajout Materiel</h1></div>

		<div class="span3"><a href="materiel.php" class="btn btn-success pull-right">

			<i class="icon-pencil"></i>

			Liste Materiel

		</a></div>
	
	</div>

		<form method="post" class="form-inline" role="form">
							                     
			<input type="hidden" name="id_materiel">
			
			<input type="text" name="designation" placeholder="Desiagnation" >

		    <input type="text" name="prix" placeholder="PRIX" >
								
	        <input type="submit" class="btn btn-success" name="ok" value="Ajouter"> 

		</form>
</div>


<?php include('footer.php') ?>
