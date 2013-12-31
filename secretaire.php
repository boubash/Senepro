<?php include('header.php') ?>

<div class="container">
	<div class="row">
		<div class="span8">
			<div class="btn-group">
			
				<a href="nouveau-client.php" class="btn btn-default">
						<i class='icon-pencil'></i>
						nouveau Client
				</a>
				
				<a href="nouveau-materiel.php" class="btn btn-info">
					
						<i class='icon-pencil'></i>
						nouveau Materiel
					
				</a>
				<a href="ajout-commande.php" class="btn btn-default">
					
						<i class='icon-pencil'></i>
						nouvelle Commande
				</a>
				<a href="ajout-depense.php" class="btn btn-info">
						<i class='icon-pencil'></i>
						nouvelle Depense
				</a>	
			</div>
		</div>
		<div class="span4">	
			<div class="pull-right">
				<form class="navbar-search pull-right">
					<input type="text" name="recherche" class="search-query" placeholder="Rechercher un client">
				</form>
			</div>		
		</div>	
	</div>
	
	<div class='row'>
		<div class="span9"><h2>Les livraisons du jour.</h2></div>
		<div class="span3"> </div>
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
			$requette = "SELECT * FROM Commande";
			$req = "SELECT id_commande, nom, prenom,adresse,telephone, date_livraison, livree FROM
			commande a, client b WHERE b.id_client= a.id_client and   date_livraison = '$date_du_jour' ";
			 if (isset($_GET) && !empty($_GET['recherche'])) 
		    {
		    	
				$req="select * from client WHERE nom LIKE '%". $_GET['recherche'] ."%' OR prenom LIKE '%". $_GET['recherche'] ."%'";
		    } 
		    else 
			$exec = mysql_query($req);
			echo mysql_error();
		?>	
	
		<?php if ($exec): ?>
		
			<?php while ($l=mysql_fetch_assoc($exec)): ?>
				<tr>
					<td><?php echo $l['nom'] ?></td>
					<td><?php echo $l['prenom'] ?></td>
					<td><?php echo $l['adresse'] ?></td>
					<td><?php echo $l['telephone'] ?></td>
			 		<?php if ($l['livree'] == 0) : ?>	
			 			<td> <span class="label label-warning">en attente</span> </td>		 			
					 	<td>
					 		<a href='detail-commande.php?id_commande=<?php echo $l['id_commande'] ?>'>
				    			Livrer la commande.
				    		</a>
				    	</td>
				    <?php else : ?>	
			 			<td><span class="label label-info">Livrée</span></td>		 		
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