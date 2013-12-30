<?php 
	
	//session_start();

	if (empty($_SESSION['identifiant'])) {
		header('Location: index.php');
		# code...
	}
 
?>