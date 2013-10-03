<?php
	if(isset($_POST['ok']))
	{
		include("conexion.php");

		extract($_POST);
		
$tel = wordwrap ($tel, 2, ' ', 3);

		$req="insert into client values('','$nom','$pnom','$adr','$tel')";

		$exe=mysql_query($req);
		header("Location:nouveau-materiel.php");
		
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
	 
<form method="POST" class="form-inline" role="form" >
<pre>

						<input type="hidden" name="id_client" >

					Nom    <input type="text" name="nom" class="input-large" placeholder="Nom:">
						
					Prenom	<input type="text" name="pnom" class="input-large" placeholder="Prenom:">
					
					adresse	<input type="text" name="adr" class="input-large" placeholder="Adresse:">
						
			              Telephone <input type="text" name="tel" class="input-large" placeholder="Téléphone:">

						        <input type="submit" class="btn btn-success" name="ok" value="Ajouter">  
</pre>
    </form>
</div>

<?php include('footer.php') ?> 