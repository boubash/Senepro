<?php include('header.php') ?>
<?php include('verifier-session.php') ?>
<div class='container'>
	<div class='row'>
		<div class='span6'>
      <h1>Commande Client</h1>
         
    </div>  
    <div class="span3">
      <a href='ajout-commande.php' class='btn btn-success pull-right'>
        <i class='icon-pencil'></i>
        Ajouter commande
      </a>
    </div>
    <div class="span3">
      
        <form class='form-search pull-right'>
          <div class="input-append">
            <input type="text" name="recherche" class="span2 input-small" placeholder="Numéro du Bon">
            <button class='btn' id ='recherche'>ok</button>
          </div>
        </form>
       
	  </div>
  </div>
	<?php  include 'date.php' ?>
	

		<?php // ajouter les lignes provenant de la base
      include("conexion.php");

      $commandes = array();

      $req = "SELECT * from commande a, client b WHERE a.id_client = b.id_client ";
      
      if (isset($_GET) && !empty($_GET['recherche'])) 
      {        
        $req .="AND id_commande=". $_GET['recherche'];
      } 
      else 
      {
        if (isset($_POST['ok']))
        {
          if (isset ($_POST['d']))
          {
           $d=$_POST['d'];
          }
          else
          {
            $d="";
          }
          if (isset ($_POST['i']))
          {
            $i=$_POST['i'];
          }
          else
          {
            $i="";
          }
     
          if (isset ($_POST['y']))
          {
            $y=$_POST['y'];
          }
          else
          {
            $y="";
          }
     
          if (isset ($_POST['d2']))
          {
            $d2=$_POST['d2'];
          }
          else
          {
            $d2="";
          }
     
          if (isset ($_POST['i2']))
          {
            $i2=$_POST['i2'];
          }
          else
          {
            $i2="";
          }
     
          if (isset ($_POST['y2']))
          {
            $y2=$_POST['y2'];
          }
          else
          {
            $y2="";
          } 
     
          $debut= $y."-".$d."-".$i;
          $fin= $y2."-".$d2."-".$i2;
          $debut=date($debut);
          $fin=date($fin);
          $req .= "AND date_commande BETWEEN '$debut' AND '$fin' ORDER BY id_commande DESC";
          
        } 
        else 
        {
          $req .= "AND livree=0";
        }
      }
      
      $exe = mysql_query($req);

      while ($commande = mysql_fetch_assoc($exe))
      {
        array_push($commandes, $commande);
      }

      include 'liste-commande.php';
  ?>	    
</div>
<?php include('footer.php') ?> 