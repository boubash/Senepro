<?php
if(isset($_POST['ok']))

{

include("conexion.php");

extract($_POST);


$req="insert into  ligne_de_commande (nombre, id_materiel, id_commande) values($quantite,$materiel,$id_commande)";

$exe=mysql_query($req);
if($exe){
	header("Location:detail-commande.php?id_commande=".$id_commande."&message=ligne de commande ajoutée.");
}
else{
	echo mysql_error();
}

}
  
?>

