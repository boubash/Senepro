<?php
if(isset($_POST['ok']))

{

include("conexion.php");

extract($_POST);


$req="insert into  ligne_de_commande values('', $quantite,$materiel,$id_commande)";
echo"$req";
$exe=mysql_query($req);

header("Location:detail-commande.php?id_commande=".$id_commande);

}
  
?>

