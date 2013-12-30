<?php
	if(isset($_POST['ok']))
	{
		include("conexion.php");
		extract($_POST);

		$valid = true;
		$errors = array();
		if(empty($designation)){
			$valid = false;
			$errors = "designation=La designation doit etre remplie.";
		}
		if (empty($somme)) {
			$valid = false;
			$errors .= "&somme=la somme doit etre remplie.";
		}
		if (empty($date_de_depense)) {
			$valid = false;
			$errors .= "&date_de_depense=la date doit etre remplie.";
		}

		if($valid){
			$req="insert into depense(designation, somme, date_de_depense) values('$designation','$somme','$date_de_depense')";
			$exe=mysql_query($req);
			if($exe)
			{

			header("Location:depense.php?message=Dépense ajoutée avec succés!");	
			}
			else{
				echo mysql_error();
			}
		}
		else{
			
			header("Location:ajout-depense.php?".$errors."&desi=$designation&som=$somme&dates=$date_de_depense");
		}		
	}
?>

<?php include('header.php') ?>

<div class="container">

	<div class="row">
		<div class="span9"><h1>Ajout Dépense</h1></div>
		<div class="span3">
			<a href="depense.php" class="btn btn-success pull-right">
				<i class="icon-th-list"></i>
				Liste Dépenses
		    </a>
	    </div>
	</div>
	<div class="span4 well">
		<form method="POST" class="form-inline" role="form" >
								                     
			<input type="hidden" name="id_materiel">

			<div class="control-group <?php if(!empty($_GET['designation'])) echo 'Error' ?>">
				<label class="control-group">Designation</label>
				<div class="controls">
			    	<input type="text" name="designation" class="input-large" placeholder="Designation" 
			    	value="<?php if(isset($_GET) && !empty($_GET['desi']))  {echo $_GET['desi'];} ?>">
			    	<?php if (!empty($_GET['designation'])):?> 					 
						<span class="help-inline"><?php echo $_GET['designation'] ?></span>
					<?php endif ?>
				</div>
			</div>

			<div class="control-group <?php if(!empty($_GET['somme'])) echo 'Error' ?>">
				<label class="control-group">Somme</label>
				<div class="controls">
			    	<input type="text" name="somme" class="input-large" placeholder="PRIX" 
			    	value="<?php if(isset($_GET) && !empty($_GET['som'])) echo $_GET['som'] ?>">
					<?php if (!empty($_GET['somme'])):?> 					 
						<span class="help-inline"><?php echo $_GET['somme'] ?></span>
					<?php endif ?>
				</div>
			</div>

			<div class="control-group <?php if(!empty($_GET['date_de_depense'])) echo 'Error' ?>">
				<label class="control-group">Date</label>
				<div class="controls">
			    	<input type="date" name="date_de_depense" 
			    	value="<?php if(isset($_GET) && !empty($_GET['dates'])) echo $_GET['dates'] ?>">
			    	<?php if (!empty($_GET['date_de_depense'])):?> 					 
						<span class="help-inline"><?php echo $_GET['date_de_depense'] ?></span>
					<?php endif ?>
				</div>
			</div>

			<input type="submit" class="btn btn-success" name="ok" value="Ajouter"> 
		</form>	
	</div>	
</div>

<?php include('footer.php') ?>