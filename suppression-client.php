<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $sql = "DELETE FROM client WHERE id_client = ".$id ;
    

  $exe = mysql_query($sql) ;
 

  if($exe)
  {
   
header("Location:client.php");
  }
  else
  {
    echo("La suppression a echoue") ;
  }
?>