<?php
	if(isset($_POST['ok']))
	{
		include("conexion.php");

		extract($_POST);
		// initialisation
		$valid = true;  
		$errors = array();		
		// Validations
		if (empty($nom)) 
		{
			$valid = false;
			$errors = 'nom=le nom doit etre rempli.';
		}
		if (empty($pnom)) 
		{
			$valid = false;
			$errors .= '&pnom=le prenom doit etre rempli.';
		}
		if (empty($adr)) 
		{
			$valid = false;
			$errors .= "&adr=l'adresse doit etre remplie.";
		}
			
		if ($valid)
		{
			$req = "insert into client (Nom, Prenom, adresse, telephone) values('$nom','$pnom','$adr','$tel')";
			$exe = mysql_query($req);
			if($exe)
			{
			 header("Location:nouveau-materiel.php?message=client ajouté avec succés!");
			}
			else
			{			
				echo mysql_error();
			}	
		}
		else
		{
			header("Location: nouveau-client.php?".$errors."&nomv=$nom&adrv=$adr&pnomv=$pnom&telv=$tel");
		}
	}
?>

<?php include('header.php'); ?>

<div class="container">
	<div class="row">
		<div class="span9"><h1>Ajout Client</h1></div>
		<div class="span3">
			<a href="client.php" class="btn  btn-success pull-right">
				<i class='icon-th-list'></i>
				Liste Clients
			</a>
		</div>
	</div>
	<div class="span4 well"> 
		<form method="POST" class="form-inline" role="form" >

			<input type="hidden" name="id_client" >

			<div class="control-group <?php if(!empty($_GET['nom'])) echo 'Error' ?>">
				<label class="control-group">Nom</label>
				<div class="controls">
					<input type="text" name="nom" class="input-large" placeholder="nom:" 
					value="<?php if(isset($_GET) && !empty($_GET['nomv'])) echo $_GET['nomv'] ?>">
					<?php if (!empty($_GET['nom'])):?> 					 
						<span class="help-inline"><?php echo $_GET['nom'] ?></span>
					<?php endif ?>
				</div>
			</div>
			<div class="control-group <?php if(!empty($_GET['pnom'])) echo 'Error' ?>">
				<label class="control-group">Prenom</label>
				<div class="controls">
					<input type="text" name="pnom" class="input-large" placeholder="Prenom:" 
					value="<?php if(isset($_GET) && !empty($_GET['pnomv'])) echo $_GET['pnomv'] ?>">
					<?php if (!empty($_GET['pnom'])):?> 					 
						<span class="help-inline"><?php echo $_GET['pnom'] ?></span>
					<?php endif ?>
				</div>
			</div>
			<div class="control-group <?php if(!empty($_GET['adr'])) echo 'error' ?>">
				<label class="control-group">Adresse</label>
				<div class="controls">
					<input type="text" name="adr" class="input-large" placeholder="Adresse:"
					value="<?php if(isset($_GET) && !empty($_GET['adrv'])) echo $_GET['adrv'] ?>">
					<?php if(!empty($_GET['adr'])): ?>
						<span class="help-inline"><?php echo $_GET['adr'] ?></span>
					<?php endif ?>
			 	</div>
		    </div>
		    <div class="control-group">
				<label class="control-group">Telephone</label>
				<div class="controls">
		           <input type="text" name="tel" class="input-large" placeholder="Téléphone:">
		        </div>
			</div>
		    <input type="submit" class="btn btn-success btn-large" name="ok" value="Ajouter">
		</form>  
	</div>	
</div>

<?php include('footer.php') ?> 