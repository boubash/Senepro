<?php
 include("conexion.php");


  $datecommandec=$_POST['datecommande'] ;
  $datelivraisonc=$_POST['datelivraison'] ;
  $avancc=$_POST['avanc'];
  $id= $_POST['id_com'] ;

  $sql = "UPDATE commande
            SET date_commande='$datecommandec', 
                date_livraison='$datelivraisonc', 
                avance='$avancc'
	          
           WHERE id_commande=$id";
 
echo $sql;
  $exe=mysql_query($sql);
  
 
  if($exe)
  {
   header("Location:commande.php?message=la modification a été réussie.");

  }
  else
  {
    echo("echec") ;
    echo mysql_error();
  }
?>