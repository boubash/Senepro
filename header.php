<?php session_start(); ?>
<html>
	<head>
		<link rel='stylesheet' href='css/bootstrap.css' type="text/css" />
		<link rel='stylesheet' href='css/application.css' type="text/css" />
		<title>SENEPRO</title>
	</head>	
	<body>		
		<div class='container'>
			<div class="page-header" align='center'>
		  		<h1 >S E N E P R O <small>Senegal Nettoyage Professionnel</small></h1>
			</div>
			<?php if (isset($_SESSION) && !empty($_SESSION['identifiant'])): ?>			
					
				<div class='navbar'>				
					<div class='navbar-inner'>
						<ul class='nav'>
							<?php if($_SESSION['profil'] == "admin"): ?>
								<li><a href="admin.php">Acceuil</a></li>
								<?php else: ?>
								<li><a href="secretaire.php">Acceuil</a></li>
							<?php endif ?>
							<li><a href="client.php">Client</a></li>
							<li><a href="materiel.php">Matériel</a></li>
							<li><a href="commande.php">Commande</a></li>
							<li><a href="depense.php">Dépense</a></li>
							<li>
								<a href="#"><?php  echo 'Bienvenue '.$_SESSION['identifiant']; ?></a></li>
							<li>
								<a href="deconnexion.php"> DÉCONNEXION</a>
							</li>
						</ul>
					</div>						
				</div>
			<?php endif ?>	
			<br>
			<?php if (!empty($_GET['message'])): ?>			
				<?php if($_GET['message']):?>
					<div class="alert alert-success"><?php echo $_GET['message'] ?></div>		
				<?php endif ?>
			<?php endif ?>
			<?php if (!empty($_GET['messages'])): ?>			
				<?php if($_GET['messages']):?>
					<div class="alert alert-danger"><?php echo $_GET['messages'] ?></div>		
				<?php endif ?>
			<?php endif ?>
		</div>