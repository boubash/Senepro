﻿<?php include('header.php') ?>

<div class="container">
	<div class="btn-group pull-right">
		<a href="liste_utilisateur.php" class='btn btn-info'>
				<i class='icon-th-list'></i>
				Liste des utilisateurs
		</a>
		<a href="inscription.php"  class='btn btn-info'>
				<i class='icon-th-list'></i>
				Créer Utilisateur
		</a>
		<a href="commande_livree.php" class='btn btn-info'>
				<i class='icon-th-list'></i>
				commande livrée
		</a>
	</div>
</div>



<?php 

	include 'conexion.php';
	// on déclare et initialise le tableau devant contenir les commandes
	$total_commandes = 0; 
	$commandes = array();

	$sql_comandes = // ajouter un filtre sur les dates
	"
		SELECT date_commande,livree, SUM(nombre * prix) as montant, nom, prenom
		FROM commande c, ligne_de_commande l, materiel m, client cli
		WHERE c.id_commande = l.id_commande
		AND l.id_materiel = m.id_materiel
		AND c.id_client = cli.id_client
	";
	// 
	// calculer les sorties périodiquement
	$total_depenses=0;
	$depenses= array();

	$sql_depenses = "SELECT SUM(somme) as montant, designation FROM depense ";

	if (isset($_GET['ok']))
	{
		if (isset($_GET['periode']) && (!empty($_GET['periode'])))
		{
			switch ($_GET['periode'])
			{
				case 'journalier':
					$today = date('Y-m-d');

					$sql_comandes .= "AND date_commande='$today'";
					$sql_depenses .= "WHERE date_de_depense='$today'";
				break;

				case 'mensuel':
					$debut = date("Y-m-d", mktime(0, 0, 0, date("m"), 1,   date("Y")));
					$fin   = date("Y-m-d", mktime(0, 0, 0, date("m"), 31,  date("Y")));

					$sql_comandes .= "AND date_commande BETWEEN '$debut' AND '$fin' ";
					$sql_depenses .= "WHERE date_de_depense BETWEEN '$debut' AND '$fin' ";
				break;

				case 'hebdomadaire':
					$bigin = date("Y-m-d", mktime(0, 0, 0,date("m"),1, date("Y")));
					$end = date("Y-m-d", mktime(0, 0, 0,date("m"),15, date("Y")));

					$sql_comandes .="AND date_commande BETWEEN '$bigin' And '$end'";
					$sql_depenses .="WHERE date_de_depense BETWEEN '$bigin' AND '$end'";
				break;	
				
				default:
					$today = date('Y-m-d');
					$sql_comandes .= "AND date_commande='$today'";
					$sql_depenses .= "WHERE date_de_depense='$today'";
				break;
			}
		} 
	}
	else
	{

		$today = date('Y-m-d');
		$sql_comandes .= "AND date_commande='$today'";
		$sql_depenses .= "WHERE date_de_depense='$today'";
	}	
	$sql_comandes .= " GROUP BY cli.id_client ORDER BY montant DESC" ;

	$sql_depenses .= " GROUP BY designation ORDER BY montant"; 



	$exec = mysql_query($sql_comandes);
	while ($commande = mysql_fetch_assoc($exec)) {
		array_push($commandes, $commande);
	}

	$exec = mysql_query($sql_depenses);
	if ($exec) 
	{
		while ( $depense = mysql_fetch_assoc($exec))
		{
			array_push($depenses, $depense);	
		}			
	}

?>

<div class="container">
	<hr>
	<div class="row">
		<div class="span6"><h1>Rapport Périodique </h1></div>
		<h1>
		<div class="span6">
			
			<form>
				<select name="periode">
					<option value='journalier'>journalier</option>
					<option value='hebdomadaire'>hebdomadaire</option>
					<option value='mensuel'>mensuel</option>
				</select>

				<input type="submit" name="ok" class='btn btn-info' value="choisir">
			</form>	
			
		</div>
		</h1>
	</div>

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

					<tr><th colspan='2'>PAS DE DEPENSE POUR CETTE PERIODE!</th></tr>
				<?php else: ?>
					<?php foreach ($depenses as $key => $depense): ?>
					<?php $total_depenses += $depense['montant']; ?>
						<tr>
							<td><?php echo $depense['designation']; ?></td>
							<td><?php echo $depense['montant']; ?></td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
					<tr>
						<th>TOTAL DEPENSES</th>
						<th><?php echo $total_depenses; ?></th>
					</tr>
			</table>
		</div>
	</div>
	<?php $resultat = $total_commandes - $total_depenses ?>
	<?php if ($resultat>=0):?>
				<h5 class="alert alert-success">Votre résultat de la période est un bénéfice de : <?php echo $resultat; ?></h5>		
	<?php else: ?>
		<h5 class="alert alert-warning">Votre résultat de la période est une perte de : <?php echo $resultat; ?></h5>
	<?php endif ?>
</div>

<?php include('footer.php') ?>