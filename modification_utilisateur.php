<?php 
	include 'conexion.php';
	$noms = $_POST['nom'];
	$prenoms = $_POST['prenom'];
	$identifiants = $_POST['identifiant'];
	$profils = $_POST['profil'];
	$passwords = $_POST['password'];
	$id = $_POST['id_log'];

	$sql = "UPDATE login SET 
	Nom = '$noms',
	Prenom = '$prenoms',
	identifiant = '$identifiants', 
	profil = '$profils',
	password = $passwords
	WHERE id_login = $id";

	$exe = mysql_query($sql);
	print_r($sql);
	if ($exe)
	{
		header('Location:liste_utilisateur.php?message=utilisateur modifier avec succes');
	}
	else
	{
		echo mysql_error();
		echo "erreur";
	}



 ?>