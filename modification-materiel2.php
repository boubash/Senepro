<?php
 include("connexion.php");
  //récupération des valeurs des champs:
 
  $nomc=$_POST['nom'] ;
$pnomc=$_POST['pnom'] ;
 $adrc=$_POST['adr'] ;

 
  //récupération du numero :
  $id= $_POST['id_materiel'] ;
 
  //création de la requête SQL:
  $sql = "UPDATE materiel
            SET designation='$designationc', 
                       Prix='$prix', 
	          
           WHERE matricule='$id' " ;
 
  //exécution de la requête SQL:
  $exe=mysql_query($sql);;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($exe)
  {
    echo("La modification à été correctement effectuée") ;
include("modification-materiel1.php.php");
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>