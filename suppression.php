<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $sql = "DELETE FROM client WHERE id_client = ".$id ;
  echo $sql ;	    

  $exe = mysql_query($sql) ;
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($exe)
  {
    echo("La suppression à été correctement effectuée") ;
include("client.php");
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>