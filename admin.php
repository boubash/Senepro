<?php include('header.php') ?>

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

?>

<div class="container">

	<?php if(empty($commandes)): ?>

	<?php else: ?>

		<h1>Rapport de la QUINZAINE</h1>

		<div class="row">
			<div class="span6">
				<table class='table table-bordered'>
					<tr>
						<th colspan='2'>ENTREES</th>
					</tr>
					<tr>
						<th>Client</th>
						<th>Montant</th>
					</tr>
					<?php $total_commandes = 0; ?>
					<?php foreach ($commandes as $key => $commande): ?>
						<?php $total_commandes += $commande['montant'] ?>
						<tr>
							<td><?php echo $commande['nom']. " " . $commande['prenom'] ?></td>
							<td><?php echo $commande['montant'] ?></td>
						</tr>
					<?php endforeach ?>
					<tr>
						<th>TOTAL DES ENTREES DE LA QUINZAINE: </th>
						<th><?php echo $total_commandes; ?></th>
					</tr>
				</table>
			</div>
			<div class="span6">
				<table class='table table-bordered'>
					<tr>
						<th colspan='2'>SORTIES</th>
					</tr>
				</table>
			</div>
		</div>

	<?php endif ?>

</div>

<?php include('footer.php') ?>
