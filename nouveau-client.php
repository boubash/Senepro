<?php include('header.php') ?>
<div class="container">
	<div class="row">
		<div class="span9"><h1>Ajout Client</h1></div>
		<div class="span3"><a href="client.php" class="btn pull-right">Liste Clients</a></div>
	
	</div>
	 
	 
	 
	<form method="post" action="">

		
					<input type="hidden" name="id_client">
			     	<input type="text" name="nom" placeholder="Nom:">
				
				<input type="text" name="pnom" placeholder="Prenom:">
			
				<input type="text" name="adr" placeholder="Adresse:">
				
				<input type="text" name="tel" placeholder="telephone">
				
			    	
								
				<input type="submit" name="ok" value="Ajouter">   



</form>
</div>


<?php include('footer.php') ?> 