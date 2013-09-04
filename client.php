<?php include('header.php') ?>

	<div class='container'>
	
		<div class='row'>
			<div class='span9'><h1>Gestion de la clientèle</h1></div>
			<div class='span3'>
				<a href='nouveau-client.php' class='btn btn-success pull-right'>
					<i class='icon-plus'></i>
					nouveau client
				</a>
			</div>			
		</div>
	
		<table class='table table-bordered'>
			<tr>
				<th>nom</th>
				<th>prénom</th>
				<th>adresse</th>
				<th>téléphone</th>
				<th>actions</th>
			</tr>
			
			<?php // ajouter les lignes provenant de la base ?>
			
		</table>
	</div>

<?php include('footer.php') ?> 