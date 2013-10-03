<?php
 include("conexion.php");


  $datecommandec=$_POST['datecommande'] ;
  $datelivraisonc=$_POST['datelivraison'] ;
  $avancc=$_POST['avanc'];
  $clienc=$_POST['clien'];
  $id= $_POST['id_com'] ;

  $sql = "UPDATE client
            SET datecommande='$datecommandec', 
                datelivraison='$datelivraisonc', 
                avanc='$avancc',
                clien='$clienc'
	          
           WHERE id_commande=$id";
 
echo $sql;
  $exe=mysql_query($sql);
  
 
  if($exe)
  {
   header("Location:commande.php");

  }
  else
  {
    echo("echec") ;
    echo mysql_error();
  }
?>