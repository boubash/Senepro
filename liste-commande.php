<div class="container">
  <table class='table table-striped'>
  		<tr >
  			<th>Client</th>
  		  <th>Date commande</th> 
  		  <th>Date livraison</th>
  			<th>Avance</th>
  			<th>Action</th>
  		</tr>

  		<?php foreach ($commandes as $key => $commande): ?>	               
       		<tr>	               		       
       		    <td>
       		    	<?php echo $commande['Prenom'] ?> <?php echo ' ' ?> <?php echo $commande['Nom'] ?>
       		    </td>
       		    <th>
       		    	<a href='detail-commande.php?id_commande=<?php echo $commande['id_commande'] ?>'>     		    	
       		    		<?php echo date('d F Y', strtotime($commande['date_commande'])) ?>
       		    	</a>
       		    </td>
       			<td>
       				<?php echo date('d F Y', strtotime($commande['date_livraison'])) ?>
       			</td>
       			<td>
              <?php echo $commande['avance']; ?>
            </td>	           
   			<td>
   				<a href = "modification-commande1.php?matricule=<?php echo $commande['id_commande'] ?>">
   					<img src = "img/b_edit.png" title = "modifier">
   					modifier
   				</a>
   					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   				<?php if($_SESSION['profil'] == "admin"): ?>
   			
     				<a href="suppression-commande.php?matricule=<?php echo $commande['id_commande'] ?>" onclick="return(confirm('etes vous de vouloir supprimer cette table?'))">
     					<img src="img/b_drop.png"title="supprimer">
     					supprimer
     				</a>
              <?php endif ?>  
            </td>
          </tr>
        <?php endforeach ?>   
  </table>
</div>  