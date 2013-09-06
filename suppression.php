<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $sql = "DELETE FROM client WHERE id_client = ".$id ;
    

  $exe = mysql_query($sql) ;
 

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