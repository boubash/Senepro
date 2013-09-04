<?php include('header.php') ?>
<div class="container">
	<div class="row">
		<div class="span9"><h1>Ajout Materiel</h1></div>
		<div class="span3"><a href="materiel.php" class="btn pull-right">Liste Materiel</a></div>
	
	
	</div>

	<form method="post" action="">
							                     
					<input type="hidden" name="id_materiel">
			
				<input type="text" name="designation" placeholder="Desiagnation" >
				     <input type="text" name="prix" placeholder="PRIX" >
				
				
							
				              <input type="submit" name="ok" value="Ajouter">   


</form>

</div>
<?php include('footer.php') ?>
