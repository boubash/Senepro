﻿<?php include('header.php') ?>

<div class="container">
		<div class="btn-group">
			<a href="depense.php" class='btn btn-info'>
					<i class='icon-th-list'></i>
					Liste des dépenses
			</a>
			<a href="client.php" class='btn btn-info'>
					<i class='icon-th-list'></i>
					Liste des clients
			</a>

			<a href="materiel.php" class='btn btn-info'>
					<i class='icon-th-list'></i>
					Liste des Materiels
			</a>
			<a href="commande.php" class='btn btn-info'>
					<i class='icon-th-list'></i>
					Liste des Commandes
			</a>
			<a href="inscription.php"  class='btn btn-info'>
					<i class='icon-th-list'></i>
					Créer Un Utilisateur
			</a>
		</div>
</div>

<hr>

<?php 

	include 'conexion.php';

	// 
	// calculer les entrées périodiquement
	// 
	// on déclare et initialise le tableau devant contenir les commandes
	// 
		$commandes = array();

		$sql_comandes = // ajouter un filtre sur les dates
		"
			SELECT date_commande, SUM(nombre * prix) as montant, nom, prenom
			FROM commande c, ligne_de_commande l, materiel m, client cli
			WHERE c.id_commande = l.id_commande
			AND l.id_materiel = m.id_materiel
			AND c.id_client = cli.id_client
			GROUP BY cli.id_client
			ORDER BY montant DESC
		";

		$exec = mysql_query($sql_comandes);

		while ($commande = mysql_fetch_assoc($exec)) {
				array_push($commandes, $commande);
		}

	// 
	// calculer les sorties périodiquement
	// 
		$depenses= array();
		$req = "SELECT SUM(somme) as montant, designation FROM depense GROUP BY designation ORDER BY montant";
		$exec = mysql_query($req);
		echo mysql_error();
		if ($exec) 
		{
			while ( $depense = mysql_fetch_assoc($exec))
			{
				array_push($depenses, $depense);	
			}			
		}

?>

<div class="container">

		<h1>Rapport de la QUINZAINE</h1>

		<div class="row">

			<div class="span6">
				<table class='table table-bordered table-entree' >
					<tr>
						<th colspan='2'>ENTREES</th>
					</tr>
					<tr>
						<th>Client</th>
						<th>Montant</th>
					</tr>

					<?php $total_commandes = 0; ?>

					<?php if(!empty($commandes)): ?>
						<?php foreach ($commandes as $key => $commande): ?>
							<?php $total_commandes += $commande['montant'] ?>
							<tr>
								<td><?php echo $commande['nom']. " " . $commande['prenom'] ?></td>
								<td><?php echo $commande['montant'] ?></td>
							</tr>
						<?php endforeach ?>	
					<?php else: ?>
						<tr><th colspan='2'>PAS DE COMMANDE POUR CETTE PERIODE!</th></tr>
					<?php endif ?>

					<tr>
						<th>TOTAL DES ENTREES: </th>
						<th><?php echo $total_commandes; ?></th>
					</tr>

				</table>
			</div>

			<div class="span6">
				<table class='table table-bordered table-sortie'>
					<tr>
						<th colspan='2'>SORTIES</th>
					</tr>
					<tr>
						<td>désignation</td>
						<td>montant</td>
					</tr>
					<?php if (empty($depenses)): ?>
						
					<?php else: ?>
					<?php $total_depenses=0 ?>
						<?php foreach ($depenses as $key => $depense): ?>
						<?php $total_depenses += $depense['montant']; ?>
							<tr>
								<td><?php echo $depense['designation']; ?></td>
								<td><?php echo $depense['montant']; ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td>TOTAL DEPENSES</td>
							<td><?php echo $total_depenses; ?></td>
						</tr>
					<?php endif ?>
				</table>
			</div>

		</div>


</div>

<?php include('footer.php') ?>
