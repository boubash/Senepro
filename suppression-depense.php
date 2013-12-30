<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $sql = "DELETE FROM depense WHERE id_depense = ".$id ;
    

  $exe = mysql_query($sql) ;
 

  if($exe)
  {
	header("Location:depense.php?message=dépense supprimer avec succé!!!");
  }
  else
  {
     mysql_error();
    echo("La suppression a echoue") ;
 
  }
?>