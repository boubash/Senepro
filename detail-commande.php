
<?php include('header.php') ?>

<?php
	include('conexion.php');
	$id = $_GET['id_commande'];
	$sql = "SELECT * FROM commande WHERE id_commande=$id";
	$exe = mysql_query($sql);
	if($exe )
	{
		$commande = mysql_fetch_assoc($exe);
    	if ($commande)
        {
				
		}
		else 
		{
			header('Location: commande.php');
	    }			
	}
?>

<div class = "container">
	<div class = "row">
		<div class = "span9">
			<h2>S E N E P R O</h2>
			<h4>SENEGAL NETTOYAGE</h4>
			<h4> PROFFESSIONNEL </h4>
			<h6>HLM Grand-Yoff. prés Station SHELL</h6>
				Tél:33 867 19 19
	    </div>
		
	    <div class = "span3" pull-right><h5><?php echo date('d F Y', strtotime($commande['date_commande'])) ?>
	    	<h5>
	    		<br>
	    		<?php if ($commande['livree'] == 0): ?>
		    		<a href = 'livree-commande.php?id_commande=<?php echo $_GET['id_commande'] ?>' class = 'btn btn-danger btn-block'>
		    			livraison commande
		    		</a>	    			
	    		<?php else: ?>
	    			<a class = "btn btn-info btn-block disabled" href='#'>
	    				<i class = "icon-ok"></i>
	    				commande livrée!
	    			</a>

	    		<?php endif ?>
	    	</h5>
    	</div>	
	</div>		

	<?php 
		include('conexion.php');
		$id=$_GET['id_commande'];
		$req = "SELECT * FROM ligne_de_commande WHERE id_commande=$id";

		$exec = mysql_query($req);
	?>
	<br>
	<br>
	<br>

 	<div class = 'row'>
	 	<div class = "span7" >
	 		<br><b>Client: </b>
	 		<?php 
	 		
				$req = "SELECT id_client FROM commande WHERE id_commande=$id";
				$exe = mysql_query($req);
				$clients = mysql_fetch_assoc($exe);
			    $requete = "SELECT nom, prenom, telephone FROM client WHERE id_client=". $clients['id_client'];
				$execut = mysql_query($requete);
				$client = mysql_fetch_array($execut);
				echo ($client['prenom']); echo(' ');
				echo ($client['nom']); echo(' '); echo ($client['telephone']);
			?>	
		</div>
		<div class = "span5">
			<span class="pull-right"><h3>BON DE DÊPOT N° <?php echo $commande['id_commande'] ?></h3></span>
		</div>
	</div>
	 
	<table class = 'table table-bordered'>
	 	<tr>
	 		<th>Quantité</th>
	 		<th>Désignation</th>
	 		<th>prix unitaire</th>
	 		<th>prix total</th>
	 	</tr>
	 	<?php 
	 		/**
	 		 * Déclaration d'une variable pour faire la somme des 
	 		 * montants des lignes de commandes
	 		 */
	 		$total_commande = 0; 
	 	?>
		<?php while ($ligne = mysql_fetch_assoc($exec)): ?>
		 	<tr>
		 		<td>
		 			<?php echo $ligne['nombre'] ?>
		 		</td>
		 		<td>
		 			
		 			<?php 		 			    
		 				$id = $ligne['id_materiel'];						
		 			    $req1 = "SELECT designation, prix FROM materiel WHERE id_materiel=$id";
		 				$resultat = mysql_query($req1);
		 				$materiel = mysql_fetch_assoc($resultat);
		 				echo($materiel['designation']);
		 			?>
		 		</td>
		 		<td>
		 			<?php echo ($materiel['prix']); ?>
		 		</td>
		 		<td>
		 			<?php 
		 				// On calcule le total de la ligne de commande
		 				$total = $ligne['nombre'] * $materiel['prix'];
		 				// on additione le total de la commande avec le total de la ligne de commande
		 				$total_commande = $total_commande + $total;
		 				echo $total;
		 			?>
		 		</td>
		 	</tr>
		<?php endwhile ?>	
		<tr>
			<td colspan = '3'><span class = "pull-right">NET A PAYER</span></td>
			<td>
			 	<b class = "pull-left">
			 		<?php echo $total_commande; ?> Fcfa
			 	</b>
			</td>
		</tr>
		<tr>
		    <td colspan = '3'><span class = "pull-right">AVANCE</span></td>
			<td>
				<b class = "pull-left">
					<?php echo $commande['avance'] ?> Fcfa</div>
				</b>	
			</td>
		</tr>
		<?php if($commande['livree'] == 0): ?>	
			<tr>
			 	<td colspan = '3'><b class = "pull-left">RV: <?php echo date('d F Y', strtotime($commande['date_livraison'])) ?>
			 		</b><span class = "pull-right">RELIQUAT</span>
			 	</td>
			 	<td>		 		
			 		<b class = "pull-left">
			 			<?php echo $total_commande - $commande['avance']; ?> Fcfa
			 		</b>
			 	</td>
			</tr>
		<?php else: ?>
			<tr>
			 	<td colspan = '3'>
			 		<b class="pull-left">	
			 			Livré le: 
			 			<?php echo date('d F Y', strtotime($commande['date_livraison'])) ?>
			 		</b>
			 		<span class="pull-right">
			 			<?php if ($commande['livree'] == 1): ?>
			 				<b>NET PAYE</b>
			 			<?php else: ?>
			 				<b>CREANCE</b>
			 			<?php endif ?>
			 			
			 		</span>
			 	</td>
			 	<td>		 		
			 		<b class = "pull-left">
			 			<?php echo $total_commande ?> Fcfa
			 		</b>
			 	</td>
			</tr>
		<?php endif ?>
	</table>
	<b> NB:</b> Au bout de 30 jours, tout tapis ou autre non retiré sera considéré comme perdu et l'entreprise dégage toute responsabilité.

	<?php if ($commande['livree'] == 0): ?>
		<div class = 'ajout-ligne-commande'>
			<h3>Ajouter une ligne de commande</h3>

			<form method = "POST" class = "form-inline" role = "form" action = "ajout-ligne-commande.php" >
				<pre>						
				    <input type = "hidden" name = "id_commande" value = "<?php echo $commande['id_commande'] ?>">

				    matériel  <select name = "materiel" class = "form-inline">
				    <option></option>
				        <?php

							include("conexion.php"); 
							$req = "select*from materiel";
							$exe = mysql_query($req);                   
							while($l = mysql_fetch_array($exe))
							{
							    echo"<option value = ".$l[0].">".$l[1]." ".$l[2]." </option>";
							} 
						?>
				    </select>


				    Quantité  <input type = "text" name = "quantite">
				        <br>
				        <input type = "submit" name = "ok" class = "btn btn-success " value = "Ajouter">
				</pre>
			</form>
		</div>
	<?php endif ?>
</div>

<?php include('footer.php') ?>