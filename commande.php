<?php include('header.php') ?>


<div class='container'>

	<div class='row'>

		<div class='span9'><h1>Commande Client</h1> 

		</div>
	
		    <div class='span3'><a href='ajout-commande.php' class='btn btn-success'>

			                   <i class='icon-plus'></i>
			    Ajouter commande
		                   </a>
		   </div>
    </div>
	
		<table class='table table-bordered'>
			<tr>
			    <th>Client</th>
				<th>Date commande</th>
				<th>Date livraison</th>
				<th>Début Nettoyage</th>
				<th>Livraison</th>
				<th>Avance</th>
				<th>Action</th>
			</tr>
			
			<?php // ajouter les lignes provenant de la base

               include("conexion.php");

               $req= "select * from commande";

               $exe=mysql_query($req);

               while($l=mysql_fetch_array($exe))
               {
               		echo"<tr>
               				<th>".$l[1]."</th>
               				<th>".$l[2]."</th>
               				<th>".$l[3]."</th>
               				<th>".$l[4]."</th>
               				<th>".$l[5]."</th>
               				<th>".$l[6]."</th>
               				<th><a href=\"modification-commande1.php?matricule=".$l[0]."\"><img src=\"img/b_edit.png\">\"title\"=\"modifier\"</a></th>
               				<th><a href=\"supression-commande.php?matricule=".$l[0]."\" onclick=\"return(confirm('etes vous de vouloir supprimer cette table?'))\"><img src=\"img/img/b_drop.png\"title=\"supprimer\"></a></th>
               		    </tr>";

               }

               		echo"</table>";

			 ?>
			
	</div>

<?php include('footer.php') ?> 