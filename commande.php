<?php include('header.php') ?>
<?php include('verifier-session.php') ?>
<div class='container'>
	<div class='row'>
		<div class='span9'><h1>Commande Client</h1> </div>	
		<div class='span3'>
	    <a href='ajout-commande.php' class='btn btn-success pull-right'>
        <i class='icon-pencil'></i>
		    Ajouter commande
      </a>
      <div class="pull-right">
        <?php 
          /*if (isset($_POST['recherche']))
          {
            extract($_POST);
            $requette = "SELECT * FROM commande";
            $execution = mysql_query($requette);
            if ($execution) 
            {
              
              if ($l['id_commande'] == $recherche) 
              {
                header('Location:detail-commande.php?id_commande=$recherche');
              } 
              else
              {
                header('Location:client.php?messages=Cette commande n\'existe pas encore');
              }# code...
            }
          }  */
        ?>
      </div>
	  </div>
  </div>
	
	<table class='table table-striped'>
		<tr >
			<th>Client</th>
		    <th>Date commande</th> 
		    <th>Date livraison</th>
			<th>Avance</th>
			<th>Action</th>
		</tr>
			
		<?php // ajouter les lignes provenant de la base
      include("conexion.php");
      $req = "SELECT * FROM commande WHERE livree=0";
      $exe = mysql_query($req);
    ?>
    <?php if($exe): ?>	
      <?php while($l=mysql_fetch_array($exe)): ?>	
        <?php 	$requette="SELECT nom, prenom FROM client WHERE id_client=$l[4]";
         	$execute=mysql_query($requette);
         	$ligne=mysql_fetch_assoc($execute);
        ?>               
               
     		<tr>	               		       
     		    <td>
     		    	<?php echo $ligne['prenom'] ?> <?php echo ' ' ?> <?php echo $ligne['nom'] ?>
     		    </td>
     		    <th>
     		    	<a href='detail-commande.php?id_commande=<?php echo $l['id_commande'] ?>'>     		    	
     		    		<?php echo date('d F Y', strtotime($l['1'])) ?>
     		    	</a>
     		    </td>
     			<td>
     				<?php echo date('d F Y', strtotime($l['2'])) ?>
     			</td>
     			<td>
            <?php echo $l['3']; ?>
          </td>	           
     			<td>
     				<a href = "modification-commande1.php?matricule=<?php echo $l['0'] ?>">
     					<img src = "img/b_edit.png" title = "modifier">
     					modifier
     				</a>
     					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     				<?php if($_SESSION['profil'] == "admin"): ?>
     			
       				<a href="suppression-commande.php?matricule=<?php echo $l['0'] ?>" onclick="return(confirm('etes vous de vouloir supprimer cette table?'))">
       					<img src="img/b_drop.png"title="supprimer">
       					supprimer
       				</a>
            <?php endif ?>  
          </td>
        </tr>
      <?php endwhile ?>     
    <?php else: ?>
		    <tr>
		        <td colspan='5'>
		           <div class='alert'>
		            	<h4 style='text-align:center'>Il n'a pas encore eu de commande.</h4 style='text-align:center'>
		            </div>
		        </td>
		    </tr>
    <?php endif ?>
	</table>
</div>
<?php include('footer.php') ?> 