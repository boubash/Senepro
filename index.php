<?php 

	if(isset($_POST['inscrire']))
	{
		include('conexion.php');
		extract($_POST);
		$req = "SELECT * FROM login";
		$requette = "SELECT * FROM login WHERE identifiant = '$identifiant' and password = '$password' ";
		$exec = mysql_query($requette);
		if($exec)
		{
			$user = mysql_fetch_assoc($exec);

			if($user)
			{
				
				session_start();
	            $_SESSION['identifiant'] = $user['identifiant'];
	            $_SESSION['profil'] = $user['profil'];  
	            if($_SESSION['profil'] == "admin")
	            {
	                header("Location:admin.php");
	            }
	            else
	            {
	            	header("Location:secretaire.php");
	            }
	        }
	        else
	        {
	        	header("Location:index.php?messages=votre identifiant ou mot de passe n'est pas valide");
	        }
	    } 
	    else{

	    	echo mysql_error();
	    }  
    }
?>

<?php include('header.php') ?>

<div class="container">
	<div clas='row'>
		<div class="span4"></div>
		<div class="span4 well">
			<form method="POST" class="form-inline" role="form">
				<div class="control-group">
					<label class="control-label" for="inputPseudo">Identifiant</label>
					<div class="controls">
					  <input type="text" name="identifiant" id="inputEmail" placeholder="votre identifiant" class='span4'>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" name="Password">Mot de passe</label>
					<div class="controls">
					  <input type="password" name="password" id="inputPassword" placeholder="*******"class='span4'>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">		  
					  <button type="submit" name="inscrire" class="btn btn-inverse btn-block">connexion</button>
					</div>
				</div>
			</form>
		</div>
		<div class="span4"></div>
	</div>
</div>

<?php include('footer.php') ?> 