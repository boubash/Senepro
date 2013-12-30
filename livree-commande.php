<?php

	include('conexion.php');
	// récupérer l'identifioant de la commande dans l'url
	$id = $_GET['id_commande'];

	// voir si la commande existe
	$req = "SELECT id_commande, livree FROM commande where id_commande = $id";
	$exe = mysql_query($req);

	$date_livraison = date('Y-m-d');

	if($exe)
	{
		$commandes = mysql_fetch_assoc($exe);
	}

	if ($commandes) 
	{	
		// vérifier si la commande a été livrée
		if($commandes['livree'] == 0)
		{
			// requete pour mettre a jour le champ livré dans la table commande
			$sql = "UPDATE commande SET livree=1, date_livraison='$date_livraison' WHERE id_commande = $id";
			if (mysql_query($sql)) {
				header("Location:detail-commande.php?id_commande=$id"."&message=la commande a été livrée avec succée!");
			} else {
				echo mysql_error();
				echo $date_livraison;
			}
			
			
		}

		else
		{
			header("Location:detail-commande.php?id_commande=$id"."&message=la commande a deja été livrée");
		}
	//sinon on livre la commande
	}
	else
	{
		header("Location:commande.php");
	}
?>

