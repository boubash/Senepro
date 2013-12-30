
<?php include('header.php') ?>
<?php include('verifier-session.php') ?>

<div class='container'>
	
	<div class='row'>
	    <div class='span7'><h1>Gestion du matériel</h1></div>
	    <div class='span5'>
	    	<div class='pull-right'>	
		        <a href='nouveau-materiel.php' class='btn btn-success' >
			        <i class='icon-pencil'></i>
			        Nouveau materiel 
		        </a>
		        <a href='ajout-commande.php' class='btn btn-info' >
			        <i class='icon-pencil'></i>
			        Ajout Commande 
		        </a>
	    	</div>
	    </div>
    </div>
	
    <table class='table table-striped'>
		<tr>	
			<th>#</th>
		 	<th>désignation</th>
		 	<th>prix</th>
		 	<th align="center">actions</th>		
	    </tr>			
		<?php 
			include("conexion.php");
			$req="select * from materiel ";
			$exe=mysql_query($req);
		?>	
		<?php if($exe): ?> 
			<?php while($l= mysql_fetch_array($exe)): ?> 
			
			   	<tr>
					<th><?php echo $l['id_materiel'] ?></th>
				    <th><?php echo $l['designation'] ?></th>
					<th><?php echo $l['prix'] ?></th>
					<th>
						<a href = 'modification-materiel1.php?matricule=<?php echo $l['id_materiel'] ?>'>
							<img src="img/b_edit.png" title="Modifier">
							modifier
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if($_SESSION['profil'] == "admin"): ?>
							<a href='suppression-materiel.php?matricule=<?php echo $l['id_materiel'] ?>' onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));" >
								<img src = "img/b_drop.png" title = "Supprimer">
								supprimer
							</a>
						<?php endif ?>	
					</th> 
				</tr>
			<?php endwhile ?>
		<?php else: ?>
		
	    	<tr>
	    		<td colspan='4'>
	    			<div class='alert'>
	    				<h4 style='text-align:center'>Il n'a pas encore eu de matériel.</h4 style='text-align:center'>
	    			</div>
	    		</td>
	    	</tr>
	    <?php endif ?>
	</table>
</div>

<?php include('footer.php') ?> 