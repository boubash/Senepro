<?php include 'header.php' ?>

<div class="container">
	<div class="row">
		<div class="span9">
			<h2>liste des Utilsateurs</h2>
		</div>
		<div class="span3"></div>
	</div>

	<table class="table table-striped">
		<tr>
			
			<th>Nom</th>
			<th>Prenom</th>
			<th>Identifiant</th>
			<th>profil</th>
			<th>mot de passe</th>
			<th>Action</th>

		</tr>
		<?php 
			include 'conexion.php';
			$req = "SELECT * FROM login";
			$exe = mysql_query($req);
		?>
		<?php if($exe): ?>
		 	<?php while($logins = mysql_fetch_assoc($exe)):?>
		 		<tr>
		 			<td><?php echo $logins['Nom'] ?></td>
		 			<td><?php echo $logins['Prenom'] ?></td>
		 			<td><?php echo $logins['identifiant'] ?></td>
		 			<td><?php echo $logins['profil'] ?></td>
		 			<td><?php echo $logins['password'] ?></td>
		 			<td>
		 				<a href='modificationUtilisateur.php?matricule=<?php echo $logins['id_login'] ?>'>
		 					<img src="img/b_edit.png" title="Modifier">
		 					Modifier
		 				</a>
		 				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 				<a href='Supprimer_utilisateur.php?matricule=<?php echo $logins['id_login'] ?>' 
		 					onclick = "return(confirm('Etes-vous sûr de vouloir supprimer cet Utilisateur?'))">
		 					<img src="img/b_drop.png"title="Supprimer">
		 					Supprimer
		 				</a>
		 		</td>
		 			
		 		</tr>
		 	<?php endwhile ?>
		<?php else : ?> 
			<tr>
				<td colspan ="5">
					<div class="alert">
						<h3>il n'y a aucun utlisateur inscrit</h3>
					
					</div>
				</td>

			</tr>
		<?php endif ?>	
	</table>
</div>


<?php include 'footer.php' ?>