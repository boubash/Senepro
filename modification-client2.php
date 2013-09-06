<?php
 include("connexion.php");

 
          $nom=$_POST['nom'] ;
        $prenom=$_POST['prenom'] ;
        $adresse=$_POST['adresse'];
        $telephone=$_POST['telephone']
      
       $id= $_POST['id_client'] ;
 
  $sql = "UPDATE client
            SET nom='$nom', 
                       prenom='$prenom', 
                       adresse='$adresse',
                       telephone='$telephone'
	          
           WHERE id_client='$id' " ;
 

  $exe=mysql_query($sql);
 
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;
include("modification-client1.php.php");
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>