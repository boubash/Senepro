<?php
	include("conexion.php");
	if (isset($_POST['inscrire'])) 
	{
	 	extract($_POST);
	 	// initialisation
	 	$valid = true;  
		$errors = array();

		if (empty($identifiant)) {
			$valid = false;
			$errors = "identifiant=l'identifiant doit etre remplie";
		}
		if (empty($password)) {
			$valid = false;
			$errors .= "&password=Le mot de passe doit etre rempi";
		}
		if (empty($passwords)) {
			$valid = false;
			$errors .= "&passwords=Le mot de passe doit etre rempi";
		}
	 //sha256
		if($valid)
		{

	 		if (strlen($password)>=8) 
	 		{	 		
			 	if ($password == $passwords)
			 	{
			 		//$password = hash('sha256', $password);
				 	$req = "insert into login values('','$identifiant','$password','$passwords','')";
				 	$exe = mysql_query($req);
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
			header("Location:inscription.php?".$errors."&id=$identifiant&mdp=$password&mdps=$passwords");
		}			
	}
?>

<?php include('header.php') ?>

<div class="container">
	<div classs='row'>
		<div class="span4"></div>
		<div class="span4 well">
			<form method="POST" class="form-inline" role="form" >
				
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