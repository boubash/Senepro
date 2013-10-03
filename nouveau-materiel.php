<?php
	if(isset($_POST['ok']))
	{

		include("conexion.php");

		extract($_POST);
		

$prix= number_format($prix, 2, ',', ' ') ; 

		$req="insert into materiel values('','$designation','$prix')";

		$exe=mysql_query($req);
		
		header("Location:ajout-commande.php");
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

		<form method="POST" class="form-inline" role="form" >
<pre>
							                     
			<input type="hidden" name="id_materiel">
			
					  Désignation <input type="text" name="designation" placeholder="Designation" >

					         Prix  <input type="text" name="prix" placeholder="PRIX" >
												
					                         <input type="submit" class="btn btn-success" name="ok" value="Ajouter"> 
</pre>
		</form>
</div>


<?php include('footer.php') ?>
