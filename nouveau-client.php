<?php
	if(isset($_POST['ok']))
	{
		include("conexion.php");

		extract($_POST);

		$req="insert into client values('','$nom','$pnom','$adr','$tel')";

		$exe=mysql_query($req);
		header("Location:client.php");
		
	}
?>

<?php include('header.php') ?>

<div class="container">
	<div class="row">
		<div class="span9"><h1>Ajout Client</h1></div>
		<div class="span3"><a href="client.php" class="btn  btn-success pull-right">
			<i class='icon-pencil'></i>
			Liste Clients
		</a>
		</div>
	
	</div>
	 
	<form method="post" class="form-inline" role="form">

				<input type="hidden" name="id_client" >

			    <input type="text" name="nom" class="input-large" placeholder="Nom:">
				
				<input type="text" name="pnom" class="input-large" placeholder="Prenom:">
			
				<input type="text" name="adr" class="input-large" placeholder="Adresse:">
				
				<input type="text" name="tel" class="input-large" placeholder="Téléphone:">

				<input type="submit" class="btn btn-success" name="ok" value="Ajouter">  

    </form>
</div>

<?php include('footer.php') ?> 