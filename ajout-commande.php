<?php
  if(isset($_POST['ok']))
  {

    include("conexion.php");
    extract($_POST);

    $valid = true;
    $errors = array();

    if(empty($date_commande)){
      $valid = false;
      $errors = 'date_commande=la date de commande doit etre remplie';
    }
    if(empty($date_livraison)){
      $valid = false;
      $errors .= '&date_livraison=la date de Livraison doit etre remplie';
    }
   if(empty($avance)){
    $valid = false;
    $errors .= "&avance=l'avance doit etre remplie";
   }

   if($valid){
      $req="insert into  commande (date_commande, date_livraison, avance, id_client) values('$date_commande','$date_livraison','$avance','$client')";
      $exe=mysql_query($req);
      if($exe){

        header("Location:commande.php?message=commande ajoutée avec succés!"); 
      }
      else
      {
        echo mysql_error();
      }
    }
    else
    {  
      header("Location: ajout-commande.php?".$errors."&comm=$date_commande&liv=$date_livraison&avanc=$avance");
    }  
  }    
?>

<?php include('header.php') ?>

<div class="container">
	<div class='row'>
			<div class='span9'><h1>Ajout commande</h1></div>
			<div class='span3'>
	
				<a href='commande.php' class='btn btn-success pull-right' >
					<i class='icon-th-list'></i>

					Commande 
				</a>
			</div>
	</div>
  <div class="span4 well">
    <form method="POST" class="form-inline" role="form" >

     <input type="hidden" name="id_commande">

      <div class="control-group <?php if(!empty($_GET['date_commande'])) echo 'error' ?>">
       <label class="control-group"> Date commande </label>
        <div class="controls">
         <input type="date" name="date_commande" value="<?php if(isset($_GET) && !empty($_GET['comm'])) echo $_GET['comm'] ?>">
         <?php if (!empty($_GET['date_commande'])):?>
            <span class="help-inline"><?php echo $_GET['date_commande'] ?></span>
         <?php endif ?>
        </div>
      </div>

     <div class="control-group <?php if(!empty($_GET['date_livraison'])) echo 'error' ?>">
       <label class="control-group"> date Livraison </label>
        <div class="controls">
          <input type="date" name="date_livraison" class="input-large" value="<?php if(isset($_GET) && !empty($_GET['liv'])) echo $_GET['liv'] ?> ">
          <?php if (!empty($_GET['date_livraison'])):?>
            <span class="help-inline"><?php echo $_GET['date_livraison'] ?></span>
         <?php endif ?>
       </div>
     </div>

      <div class="control-group <?php if(!empty($_GET['avance'])) echo 'error' ?>">
        <label class="control-group"> avance  </label>
        <div class="controls">               
         <input type="text" name="avance" class="input-large" placeholder="Avance" 
         value="<?php if(isset($_GET) && !empty($_GET['avanc'])) echo $_GET['avanc'] ?> ">
          <?php if (!empty($_GET['avance'])):?>
            <span class="help-inline"><?php echo $_GET['avance'] ?></span>
          <?php endif ?>
        </div>
      </div>  

      client
      <br>
      <select name="client" class="form-inline" >
        <option>-----------</option>
        <?php
         include("conexion.php"); 
         $req="SELECT * FROM client";
         $exe=mysql_query($req);                
         while($l=mysql_fetch_array($exe))
         {
          echo"<option value=".$l[0].">".$l[1]." ".$l[2]."</option>";
         } 
        ?>  
      </select> 
        <br>
        <br>
      <input type="hidden" name="livree">

      <input type="submit" class="btn btn-success" name="ok" value="Ajouter">          
    </form>
  </div> 
</div>
<?php include('footer.php') ?> 