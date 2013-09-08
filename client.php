<?php include('header.php') ?>

	<div class='container'>
	
		<div class='row'>
			<div class='span9'><h1>Gestion de la client&eacute;le</h1></div>
			<div class='span3'>
				<a href='nouveau-client.php' class='btn btn-success pull-right'>
					<i class='icon-plus'></i>
					nouveau client
				</a>
			</div>			
		</div>

	
		<table class="table table-bordered">
			<tr class="warning">
				<th>nom</th>
				<th>pr&eacute;nom</th>
				<th>adresse</th>
				<th>t&eacute;l&eacute;phone</th>
				<th>actions</th>
			</tr>
			
			<?php // ajouter les lignes provenant de la base 

			    include("conexion.php");

				$req="select * from client ";

				$exe=mysql_query($req);

			    while($l= mysql_fetch_array($exe))
				{
							    	
					echo"<tr>
						<td>".$l[1]."</td>
						<td>".$l[2]."</td>
						<td>".$l[3]."</td>
						<td>".$l[4]."</td>
						<td><a href=\"modification-client1.php?matricule=".$l['0']."\"><img src=\"img/b_edit.png\" title=\"Modifier\"></a>
						<td><a href=\"suppression-client.php?matricule=".$l['0']."\" onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\" ><img src=\"img/b_drop.png\" title=\"supprimer\"></a></td> 
						</tr>";
				}
		echo"</table>";
			?>
		
	</div>

<?php include('footer.php') ?> 