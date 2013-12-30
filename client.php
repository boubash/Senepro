<?php include('header.php') ?>  
<?php include('verifier-session.php') ?>

<div class='container'>	
	<div class='row'>
		<div class='span6'>
			<h1>Liste des clients</h1>
		</div>
		<div class="span3">
			<div class="pull-right">
				<form class="navbar-search pull-right">
					<input type="text" name="recherche" class="search-query" placeholder="Rechercher un client">
				</form>
			</div>
		</div>		
		<div class='span3'>
			<a href='nouveau-client.php' class='btn btn-success pull-right'>
				<i class='icon-pencil'></i>
				Nouveau client
			</a>
		</div>		
	</div>
			
	<table class="table table-striped">
		<tr class="warning">
			<th>nom</th>
			<th>prénom</th>
			<th>adresse</th>
			<th>téléphone</th>
			<th>actions</th>
		</tr>
		
		<?php // ajouter les lignes provenant de la base 
		    include("conexion.php");

		    // si la variable get est définie inclure dans les paramètres de recheche les mot clés
		    if (isset($_GET) && !empty($_GET['recherche'])) 
		    {
		    	
				$req="select * from client WHERE nom LIKE '%". $_GET['recherche'] ."%' OR prenom LIKE '%". $_GET['recherche'] ."%'";
		    } 
		    else 
		    {
				$req="select * from client ";
		    }
		    
		    // sinon afficher tous les clients

			$exe=mysql_query($req);
		?>	
		<?php if($exe && mysql_num_rows($exe)): // si la requete marche et contient au moins une ligne ?> 
		    <?php while($l= mysql_fetch_array($exe)): ?> 
					    	
				<tr>
					<th><?php echo $l['Nom'] ?></th>
					<th><?php echo $l['Prenom'] ?></th>
					<th><?php echo $l['adresse'] ?></th>
					<th><?php echo $l['telephone'] ?></th>
					<th>
						<a href = 'modification-client1.php?matricule=<?php echo $l['0'] ?>'>
							<img src="img/b_edit.png" title="Modifier">&nbsp;&nbsp;
							modifier
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if($_SESSION['profil'] == "admin"): ?>
							<a href =' suppression-client.php?matricule=<?php echo $l['0'] ?>' onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));" >
								<img src="img/b_drop.png" title="supprimer">&nbsp;&nbsp;
								supprimer
							</a>
						<?php endif ?>	
					</th> 
				</tr>
			<?php endwhile ?>
		<?php else: ?>		
	    	<tr>
	    		<td colspan='5'>
	    			<div class='alert'>
	    				<h4 style='text-align:center'>Aucun résultat trouvé! Essayer un autre mot clé</h4 style='text-align:center'>
	    			</div>
	    		</td>
	    	</tr>
        <?php endif ?>
	</table>
</div>

<?php include('footer.php') ?> 