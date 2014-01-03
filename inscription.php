<?php
	include("conexion.php");
	if (isset($_POST['inscrire'])) 
	{
	 	extract($_POST);
	 	// initialisation
	 	$valid = true;  
		$errors = array();
		if (empty($Nom))
		{
			$valid = false;
			$errors = "Nom=Le nom doit etre rempli";
		}

		if (empty($Prenom))
		{
			$valid = false;
			$errors .= "&Prenom=Le prenom doit etre rempli";
		}

		if (empty($identifiant)) 
		{
			$valid = false;
			$errors .= "&identifiant=l'identifiant doit etre rempli";
		}
		if (empty($password))
		{
			$valid = false;
			$errors .= "&password=Le mot de passe doit etre rempli";
		}
		if (empty($passwords)) {
			$valid = false;
			$errors .= "&passwords=Le mot de passe doit etre rempli";
		}
		
		if($valid)
		{

	 		if (strlen($password)>=8) 
	 		{	 		
			 	if ($password == $passwords)
			 	{
			 		//$password = hash('sha256', $password);
				 	$req = "insert into login values('','$Nom', '$Prenom', '$identifiant','$password','$passwords','$profil')";
				 	$exe = mysql_query($req);
				 	print_r($req);
				 	if ($exe) {
				 		header("Location:index.php?message=$identifiant inscrit avec succes ");	
				 	}
				 	else
				 	{
				 		echo mysql_error();
				 	}
			 	}
			 	else
			 	{
			 		header("Location:inscription.php?messages=les mots de passe doivent etre identiques"); 
			 	}
			}
			else
			{				
				header("Location:inscription.php?messages=le mot de passe doit comporter au minimum 8 caractaires");
			}
		}
		else
		{		
		echo mysql_error();	
			header("Location:inscription.php?".$errors."&noms=$Nom&prenoms=$Prenom&id=$identifiant&mdp=$password&mdps=$passwords&login=$profil");
		}			
	}
?>

<?php include('header.php') ?>

<div class="container">
	<div classs='row'>
		<div class="span4"></div>
		<div class="span4 well">
			<form method="POST" class="form-inline" role="form" >

				<div class="control-group <?php if(!empty($_GET['Nom'])) echo 'Error' ?>">
					<label class="control-label">Nom</label>
					<div class="controls">
					  <input type="text" name="Nom" placeholder="votre Nom" class='span4' 
					  	value="<?php if (isset($_GET) && !empty($_GET['noms'])) {echo $_GET['noms']; }?>">
					  <?php if (!empty($_GET['Nom'])):?> 					 
						<span class="help-inline"><?php echo $_GET['Nom'] ?></span>
					  <?php endif ?>
					</div>
				</div>
				<div class="control-group <?php if(!empty($_GET['Prenom'])) echo 'Error' ?>">
					<label class="control-label">Prenom</label>
					<div class="controls">
					  <input type="text" name="Prenom" placeholder="votre prenom" class='span4' 
					  	value="<?php if (isset($_GET) && !empty($_GET['prenoms'])) {echo $_GET['prenoms']; }?>">
					  <?php if (!empty($_GET['Prenom'])):?> 					 
						<span class="help-inline"><?php echo $_GET['Prenom'] ?></span>
					  <?php endif ?>
					</div>
				</div>
				<div class="control-group <?php if(!empty($_GET['identifiant'])) echo 'Error' ?>">
					<label class="control-label">Identifiant</label>
					<div class="controls">
					  <input type="text" name="identifiant" placeholder="votre identifiant" class='span4' 
					  	value="<?php if (isset($_GET) && !empty($_GET['id'])) {echo $_GET['id']; }?>">
					  <?php if (!empty($_GET['identifiant'])):?> 					 
						<span class="help-inline"><?php echo $_GET['identifiant'] ?></span>
					  <?php endif ?>
					</div>
				</div>
				<div class="control-group<?php if(!empty($_GET['password'])) echo 'Error' ?>">
					<label class="control-label" >Mot de passe</label>
					<div class="controls">
					  <input type="password" name="password" placeholder="*******" class='span4' 
					  value="<?php if (isset($_GET) && !empty($_GET['mdp'])) {echo $_GET['mdp'];} ?>">
					  <?php if (!empty($_GET['password'])):?> 					 
						<span class="help-inline"><?php echo $_GET['password'] ?></span>
					  <?php endif ?>
					</div>
				</div>
				<div class="control-group <?php if(!empty($_GET['passwords'])) echo 'Error' ?>">
					<label class="control-label" >Répéter Mot de passe</label>
					<div class="controls">
					  <input type="password" name="passwords" placeholder="*******" class='span4' 
					  value="<?php if(isset($_GET) && !empty($_GET['mdps'])) {echo $_GET['mdps'];} ?>">
					  <?php if (!empty($_GET['passwords'])):?> 					 
						<span class="help-inline"><?php echo $_GET['passwords'] ?></span>
					  <?php endif ?>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label" >Profil</label>
					<div class="controls">
					  <input type="text" name="login" placeholder="Saisir le profil de l'utilisateur" class='span4' 
					  value="<?php if(isset($_GET) && !empty($_GET['login'])) {echo $_GET['login'];} ?>">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">		  
					  <button type="submit" name="inscrire" class="btn btn-inverse btn-block">S'inscrire</button>
					</div>
				</div>			
			</form>
		</div>	
	</div>
</div>	

<?php include('footer.php') ?>