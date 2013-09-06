<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $sql = "DELETE FROM materiel WHERE id_materiel = ".$id ;
    

  $exe = mysql_query($sql) ;
 

  if($exe)
  {
    echo("La supprimer") ;
include("materiel.php");
  }
  else
  {
    echo("La suppression a echouee") ;
  }
?>