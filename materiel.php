<?php include('header.php') ?>


<div class='container'>
	
	<div class='row'>
			<div class='span9'><h1>Gestion du matériel</h1></div>
			<div class='span3'>
	
				<a href='nouveau-materiel.php' class='btn btn-success pull-right' >
					<i class='icon-plus'></i>

					Nouveau materiel 
				</a>
			</div>
	</div>
	<?php if($_GET && $_GET['message']): //test si la variable GET est définie ?>
		<div class="alert alert-success"><?php echo $_GET['message'] ?></div>		
	<?php endif ?>
	<table class='table table-bordered'>
			<tr>
				
				<th>#</th>
				<th>désignation</th>
				<th>prix</th>
				<th>actions</th>
				
			</tr>
			
			<?php 

				include("conexion.php");
					$req="select * from materiel ";
						$exe=mysql_query($req);
							while($l= mysql_fetch_array($exe))
							    {

								 echo"<tr>
									    <td>".$l[0]."</td>
									    <td>".$l[1]."</td>
									    <td>".$l[2]."</td>
									    <td><a href=\"modification-materiel1.php?matricule=".$l['0']."\"><img src=\"img/b_edit.png\" title=\"Modifier\"></a>
									    <td><a href=\"suppression-materiel.php?matricule=".$l['0']."\" onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\" ><img src=\"img/b_drop.png\"title=\"Supprimer\"></a>
									    </td> 
								    </tr>";

								}
					echo"</table>";
			?>
</div>

<?php include('footer.php') ?> 