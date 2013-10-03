<?php
    include("conexion.php");
 
  $id  = $_GET['matricule'] ;
  
  $suppression_client = "DELETE FROM client WHERE id_client = ".$id ;
  $commandes = "SELECT id_commande FROM commande WHERE id_client=".$id;
    
  $id_commandes= "";
  $id_commandes_exec = mysql_query($commandes);
  while ($l = mysql_fetch_assoc($id_commandes_exec)) {
    if ("" == $id_commandes) {
      $id_commandes .= $l['id_commande'];
    } else {      
      $id_commandes .= ",".$l['id_commande'];
    }
    
  }


  $id_ligne_commandes = "";
  if ("" != $id_commandes) {
    $lignes_commande = "SELECT id_ligne_commande FROM ligne_de_commande WHERE id_commande IN ($id_commandes)";
    $exec = mysql_query($lignes_commande);
    echo mysql_error();

    $id_ligne_commande_exec = mysql_query($lignes_commande);
    while ($l = mysql_fetch_assoc($id_ligne_commande_exec)) {
      if ("" == $id_ligne_commandes) {
        $id_ligne_commandes .= $l['id_ligne_commande'];
      } else {      
        $id_ligne_commandes .= ",".$l['id_ligne_commande'];
      }    
    }
  } 
  



  if ("" != $id_ligne_commandes) {
    // suprimer les lignes commandes
    $delete_lignes_commandes = "DELETE FROM ligne_de_commande WHERE id_ligne_commande IN ($id_ligne_commandes)";
    $exec = mysql_query($delete_lignes_commandes);
    echo mysql_error();
    $lignes_commandes_supprimees= mysql_affected_rows();
    echo $lignes_commandes_supprimees. " lignes_commandes_supprimees";
  } 


  if ("" != $id_commandes) {
    // supprimer les commandes
    $delete_commandes = "DELETE FROM commande WHERE id_commande IN ($id_commandes)";
    $exec = mysql_query($delete_commandes);
    echo mysql_error();
    $commandes_supprimees= mysql_affected_rows();   
    echo $commandes_supprimees.' commandes_supprimees'; 
  }
    // supprimer le client
   
    
  $suppression_client = "DELETE FROM client WHERE id_client = ".$id ;
  $exe = mysql_query($suppression_client);
  if ($exe) {
    header("Location: client.php?message=client supprimé avec succé!!!.");
    # code...
  }  
  else

 {
  header("Location: client.php?message=impossible de supprimer ce client.");
  
  }


//   $exe = mysql_query($sql) ;
 
//   if($exe)
//   {
    
// header("Location:client.php");
//   }
//   else
//   {
//     echo("La suppression a echoue");
//     echo mysql_error();
//   }
?>