﻿<?php include('header.php') ?>

<div class="container">
	<div class="row">
	
		<div class="span6">
			<a href="nouveau-client.php">
				<button type="submit" name="client" class="btn btn-success btn-block ">
					<i class='icon-pencil'></i>
					nouveau Client
				</button>
			</a>
			<br>
			<br>
			<a href="nouveau-materiel.php">
				<button type="submit" name="materiel" class="btn btn-default btn-block ">
					<i class='icon-pencil'></i>
					nouveau Materiel
				</button>
			</a>			
			<br>
			<br>
		</div>
	
		<div class="span6">
			<a href="ajout-commande.php">
				<button type="submit" name="materiel" class="btn btn-info btn-block">
					<i class='icon-pencil'></i>
					nouvelle Commande
				</button>
			</a>
			<br>
			<br>
			<a href="ajout-depense.php">
				<button type="submit" name="materiel" class="btn btn-warning btn-block">
					<i class='icon-pencil'></i>
					nouvelle Depense
				</button>
			</a>
			<br>
			<br>
		</div>	
	</div>
	<div class='row'>
		<div class="span9"><h2>Les livraisons du jour.</h2></div>
		<div class="span3"> 
			<div class="pull-right">
				<form class="navbar-search pull-right">
					<input type="text" name="recherche" class="search-query" placeholder="Rechercher un client">
				</form>
			</div>
		</div>
	</div>		
	<table class="table table-striped">
		<tr class="warning">
		<th>nom</th>
		<th>prénom</th>
		<th>adresse</th>
		<th>téléphone</th>
		<th>statut</th>
		<th>actions</th>
		</tr>	
		<?php 
			include("conexion.php");
			$date_du_jour = date("Y-m-d");
			//$requette = "SELECT * FROM Commande";
			$req = "SELECT id_commande, id_client, date_livraison, livree FROM commande WHERE date_livraison = '$date_du_jour'";
			$exec = mysql_query($req);
			$l = mysql_fetch_assoc($exec);
			$rec = "SELECT id_client, nom, prenom, adresse, telephone FROM client WHERE id_client = " .$l['id_client'];
			$exe = mysql_query($rec);

		?>	
		<?php if ($exe): ?>
			
			<?php while ($clients = mysql_fetch_assoc($exe)): ?>

				<tr>
			 		<td>
			 			<?php echo $clients['nom'] ?>
			 		</td>			 		 
			 		<td>
			 			<?php echo $clients['prenom'] ?>
			 		</td>			 			
			 		<td>
			 			<?php echo $clients['adresse'] ?>
			 		</td>			 		 
			 		<td>
			 			<?php echo $clients['telephone'] ?>
			 		</td>
			 		<?php if ($l['livree'] == 0) : ?>	
			 			<td>!livrée</td>		 			
					 	<td>
					 		<a href='livree-commande.php?id_commande=<?php echo $l['id_commande'] ?>'>
				    			Livrer la commande.
				    		</a>
				    	</td>
				    <?php else : ?>	
			 			<td>livrée!</td>		 		
				    	<td>
					 		<a href='livree-commande.php?id_commande=<?php echo $l['id_commande'] ?>'>
				    			commande deja livrée
				    		</a>
				    	</td>
				    <?php endif ?>	
			 	</tr>						
			<?php endwhile ?>
		<?php else: ?>	
			<tr>
	    		<td colspan='5'>
	    			<div class='alert'>
	    				<h4 style='text-align:center'>Il n'y a aucune commande à livrer aujourd'hui.</h4 style='text-align:center'>
	    			</div>
	    		</td>
			</tr>
		<?php endif ?>	
	</table>						
</div>

<?php include('footer.php') ?>