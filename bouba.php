<?php include('header.php') ?>

<?php require_once 'header.php';?>

	<div class="container">
		<div class="row">
			<div class="span6" align="center"><h3>Commandes Clients</h3></div>
		</div>
		<?php
			
			
			echo "<table class='span8'>
			<tr>
			<th align='center'>Clients</th>
			<th align='center'>Dates Commandes</th>
			<th align='center'>Dates Livraisons</th>
			<th align='center'>Montant Commandes</th>
			<th align='center' colspan='2'>Faire</th>
			</tr>";
			require_once ('conexion.php');

			
			$req="select * from commande";
			$exe=mysql_query($req);
			while ($l=mysql_fetch_array($exe)) {
				$nom=mysql_query("select nom,pnom from client where idcli=".$l[0]);
				$montant=msql_query("select SUM(mont) from commande_client a,ligne_commande b where a.idcom=b.idcom");
				if($nom){
					echo"<tr>
						<td align='center'><a href=\"ligne_commande.php?id=".$l[0]."\">".$nom."</td></a>
						<td align='center'>".$l[1]."</td>
						<td align='center'>".$l[2]."</td>
						<td align='center'>".$montant."</td>";
						
				}
				else{
					mysql_error();
				}
			}
			echo"</table>";
		?>
	</div>
	

<?php include('footer.php') ?> 