<?php
	if(isset($_POST['ok']))
	{
		include("conexion.php");
		extract($_POST);

		$valid = true;
		$errors = array();

		if (empty($designation)) {
			$valid = false;
			$errors = "designation=La designation doit etre remplie";
		}
		if (empty($prix)) {
			$valide = false;
			$errors = "&prix=Le prix doit etre remplie";
		}

		if($valid){	
			$req="insert into materiel (designation, prix) values('$designation','$prix')";
			$exe=mysql_query($req);
			if($exe)
				{
		 		header("Location:ajout-commande.php?message=matériel ajouté avec succés.");
				}
	   		else
	   		{
				echo mysql_error();
			}
		}
		else
		{
			header("Location=nouveau-materiel?".$errors."&desi=$designation&pri=$prix");
		}
	}
?>


<?php include('header.php') ?>

<div class="container">
	<div class="row">
		<div class="span9"><h1>Ajout Materiel</h1></div>
		<div class="span3">
			<a href="materiel.php" class="btn btn-success pull-right">
			  <i class="icon-th-list"></i>
			  Liste Materiel
		    </a>
	    </div>
	</div>
	<div class="sapn4 well">
		<form method="POST" class="form-inline" role="form" >
					                     
			<input type="hidden" name="id_materiel">
					  
			<div class="control-group <?php if(!empty($_GET['designation'])) echo 'error' ?>" align='center'>
				<label class="control-group">Désignation</label>
				<div class="controls">	   
					<input type="text" name="designation" class="input-large" placeholder="Designation" 
					value="<?php if(isset($_GET) && !empty($_GET['desi'])) echo $_GET['desi'] ?> ">
					<?php if (!empty($_GET['designation'])):?>
					  <span class="help-inline"><?php echo $_GET['designation'] ?></span>
					<?php endif ?>
				</div>
			</div>

		    <div class="control-group <?php if(!empty($_GET['prix'])) echo 'error' ?>"align='center'align='center'>
				<label class="control-group">Prix</label>
				<div class="controls">	
					<input type="text" name="prix" class="input-large" placeholder="PRIX"
					 value="<?php if(isset($_GET) && !empty($_GET['pri'])) echo $_GET['pri'] ?> ">
					<?php if(!empty($_GET['prix'])): ?>	
						<span class="help-inline"><?php echo $_GET['prix'] ?></span>
					<?php endif ?>						
				</div>	                         
			</div>

		  <input type="submit" class="btn btn-success" name="ok" value="Ajouter">
	   </form>
	</div>   
</div>
<?php include('footer.php') ?>
