<?php
 include("conexion.php");


  $nomc=$_POST['nom'] ;
  $prenomc=$_POST['prenom'] ;
  $adressec=$_POST['adresse'];
  $telephonec=$_POST['telephone'];
  $id= $_POST['id_cli'] ;

  $sql = "UPDATE client
  SET nom='$nomc', 
  prenom='$prenomc', 
  adresse='$adressec',
  telephone='$telephonec'
  WHERE id_client=$id";
 
 echo $sql;
  $exe=mysql_query($sql);
  
 
  if($exe)
  {
   header('Location:client.php?message=client modifier avec succes');

  }
  else
  {
    echo mysql_error();
    echo("echec") ;
  
  }
?>