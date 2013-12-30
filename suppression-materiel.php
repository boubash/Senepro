<?php
  include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  $nombre_ligne_commande_exec="SELECT COUNT(*) FROM ligne_de_commande WHERE id_ligne_commande=".$id;
  $execute=mysql_query($nombre_ligne_commande_exec);
  echo mysql_error();
  $nombre_ligne_commande=mysql_fetch_array($execute);
  $ligne_de_commandes = "SELECT id_ligne_commande FROM id_ligne_commande WHERE id_materiel=".$id; 

  if ($nombre_ligne_commande[0]> 0) {

   
    # code..
    header("Location: materiel.php?message=impossible de supprimer. Ce materiél est dans $nombre_ligne_commande[0] ligne de commandes.");
  }
  else 
  {
    $sql = "DELETE FROM materiel WHERE id_materiel = ".$id;
    # code...
  }
  




 // $exe = mysql_query($sql) ;
 
 // if($exe)
 // {
    
//header("Location:materiel.php");
  //}
  //else
  //{
    //echo("La suppression a echoue");
  //}
?>