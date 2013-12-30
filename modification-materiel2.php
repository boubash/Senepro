<?php
  include("conexion.php");

  $designat = $_POST['designation'] ;

  $pri = $_POST['prix'] ;

  $id = $_POST['id_mat'] ;

  $sql = "UPDATE materiel
  SET designation = '$designat', 
  prix = '$pri' 
  WHERE id_materiel = $id " ;
  print_r($sql);
  $exe = mysql_query($sql);
 
  if($exe)
  {
    // redirection vers la page index du materiel
    header("Location: materiel.php?message=modifié avec succé!!!.");
  }
  else
  {
    echo("La modification a échoué") ;
    echo mysql_error();
  }
?>