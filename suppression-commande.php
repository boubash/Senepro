
<?php
  include("conexion.php");
  $id  = $_GET['matricule'] ;
  $sql = "DELETE FROM commande WHERE id_commande = ".$id ;
  $exe = mysql_query($sql) ;
  if($exe)
  {
   
    header("Location:commande.php");
  }
  else
  {
    echo("La suppression a echoue") ;
    echo mysql_error();
  }
?>