<?php include('header.php') ?>
<?php include('verifier-session.php') ?>
<div class='container'>
	
	<div class='row'>
			<div class='span9'><h1>Gestion des dépenses</h1></div>
			<div class='span3'>
	
				<a href='ajout-depense.php' class='btn btn-success pull-right' >
					<i class='icon-pencil'></i>

					Nouvelle Dépense 
				</a>
			</div>
	</div>
	
	<table class='table table-striped'>
			<tr>
				
				<th>#</th>
				<th>désignation</th>
				<th>Somme</th>
				<th>Date</th>
				<th>actions</th>				
			</tr>			
			<?php 
				include("conexion.php");
				$req="select * from depense ";
				$exe=mysql_query($req);
			?>	
			<?php if ($exe): ?> 					
				<?php while($l= mysql_fetch_array($exe)): ?>	
				

					<tr>
					    <th><?php echo $l['0'] ?>..</th>
					    <th><?php echo $l['1'] ?> </th>
					    <th><?php echo $l['2'] ?> </th>
					    <th><?php echo date('d F Y', strtotime($l['3'])) ?></th>
					    <th>
					    	<a href = 'modification-depense1.php?matricule=<?php echo $l['id_depense'] ?>'><img src="img/b_edit.png" title="Modifier">
					    		modifier
					    	</a>
					    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	<?php if($_SESSION['profil'] == "admin"): ?>
					    	<a href = 'suppression-depense.php?matricule=<?php echo $l['id_depense'] ?>' onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));" >
					    		<img src="img/b_drop.png"title="Supprimer">
					    		Supprimer
					    	</a>
					    <?php endif ?>
					    </th> 
					</tr>
				<?php endwhile ?>
			<?php else: ?>	
            	<tr>
            		<td colspan='5'>
            			<div class='alert'>
            				<h4 style='text-align:center'>Il n'y a pas encore de dépense éffectuée.</h4 style='text-align:center'>
            			</div>
            		</td>
            	</tr>
            <?php endif ?>
	</table>
</div>


<?php include('footer.php') ?>