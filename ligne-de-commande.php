<?php include('header.php') ?>

<div class="container">

	<div class="row">

		<div class="span9"><h1>ligne de commande</h1></div>

		<div class="span3"><a href="ajout-ligne-commande.php" class="btn btn-success pull-right">

			<i class="icon-pencil"></i>

			ligne commande

		</a></div>
	
	</div>
<table class='table table-bordered'>
			<tr>
				<th>#</th>
				<th>Quantité</th>
				<th>Commande</th>
			    <th>Matériel</th>
				<th>Action</th>
			</tr>


			<?php 
			 include("conexion.php");

               $req= "select * from ligne_de_commande";

               $exe=mysql_query($req);

               while($l=mysql_fetch_array($exe))
               {
               		echo"<tr>
               				<th>".$l[0]."</th>
               				<th>".$l[1]."</th>
               				<th>".$l[2]."</th>
               				<th>".$l[3]."</th>
               				<th><a href=\"modification-commande1.php?matricule=".$l[0]."\"><img src=\"img/b_edit.png\"title=\"modifier\"></a></th>

               				<th><a href=\"supprimerpression-commande.php?matricule=".$l[0]."\" onclick=\"return(confirm('etes vous de vouloir supprimer cette table?'))\"><img src=\"img/b_drop.png\"title=\"supprimer\"></a></th>
               		    </tr>";

               }

               		echo"</table>";

			 ?>
			
	</div>

<?php include('footer.php') ?>            







