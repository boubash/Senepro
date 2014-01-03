<?php 
	include 'conexion.php';
	$id = $_GET['matricule'];
	$req = 'DELETE FROM login WHERE id_login =' .$id;
	$exe = mysql_query($req);
	if ($exe)
	{
		header('Location:liste_utilisateur.php?messages=Utilisateur supprimé avec succés');
		# code...
	}
	else
	{
		echo mysql_error();
		header('Location:liste_utilisateur.php');
	}	
?>