<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $sql = "DELETE FROM materiel WHERE id_materiel = ".$id ;
    

  $exe = mysql_query($sql) ;
 

  if($exe)
  {
    
header("Location:materiel.php");
  }
  else
  {
    echo("La suppression a echoue");
  }
?>