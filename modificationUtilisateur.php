<?php 
	include 'conexion.php';
	$id = $_GET['matricule'];
	$req = "SELECT * FROM login WHERE id_login=" .$id;
	$exe = mysql_query($req);
	if ($logins = mysql_fetch_assoc($exe))
	{
?>

<?php include'header.php' ?>
<div class="container">
	<div class="row">

		<div class="span9">
			<h1>modifier un Utilisateur</h1>
		</div>
		<div class="span3">
			<a href="inscription.php" class= 'btn btn-info'>
				<i class="icon-plus"></i>
				creer un utilisateur
			</a>
		</div>
	</div>
	<div class="row">
		<div class="span5">
			<form method="POST" name="insertion" action="modification_utilisateur.php" >

				<input type="hidden" name="id_log" value="<?php echo $_GET['matricule'] ;?>">
				<table class='table table-condensed'>
					<tr >
						<th>Nom</th>
						<th>
							<input type="text" name="nom" value="<?php echo $logins['Nom'] ;?>">
						</th>
					</tr>

					<tr >
					<th>Prenom</th>
						<th>
							<input type="text" name="prenom" value="<?php echo $logins['Prenom'] ;?>">
						</th>
					</tr>

					<tr >
						<th>Identifiant</th>
					 	<td>
					 		<input type="text" name="identifiant" value="<?php echo $logins['identifiant'] ;?>">
					 	</td>
					</tr>
					<tr >
						<th>Profil</th>
					 	<td>
					 		<input type="text" name="profil" value="<?php echo $logins['profil'] ;?>">
					 	</td>
					</tr>
					<th>Mot de passe</th>
					 	<td>
					 		<input type="text" name="password" value="<?php echo $logins['password'] ;?>">
					 	</td>
					</tr>
					<tr >
						<th>
							<input type="submit" class="btn btn-info pull-right" value="modifier">
						</th>
					</tr> 
		    </table>
		  </form>
		</div>
		<div class="span7"></div>  
	</div>
</div>
 <?php
  }

  ?>