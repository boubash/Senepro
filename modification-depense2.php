<?php
 include("conexion.php");
  $designationc = $_POST['designation'] ;
  $sommec = $_POST['somme'] ;
  $datec = $_POST['dates'];
  $id = $_POST['id_dep'] ;

  $sql = "UPDATE depense
  SET designation='$designationc', 
  somme = $sommec, 
  date_de_depense = '$datec'
 WHERE id_depense=$id";

print_r($sql) ;
  $exe=mysql_query($sql);
  
 
  if($exe)
  {
   header("Location:depense.php");

  }
  else
  {
    echo("echec") ;
    echo mysql_error();
  }
?>