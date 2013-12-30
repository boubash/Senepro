<?php
 include("conexion.php");
  $id=$_GET["matricule"] ;
  $req="SELECT * FROM depense WHERE id_depense =".$id;
  $exe=mysql_query($req);
  if($l=mysql_fetch_array($exe))
  {
?>
  
<?php include('header.php') ?>

<div class="container">

  <div class="row">

    <div class="span9"><h1>Modification dépense</h1></div>

    <div class="span3">
      <a href="ajout-depense.php" class="btn btn-success pull-right">
        <i class='icon-plus'></i>
        Nouvelle depense
      </a>
    </div>
  </div>

	<form method="POST" name="insertion" action="modification-depense2.php" >

    <input type="hidden" name="id_dep" value="<?php echo $_GET['matricule'] ;?>">

    <table class='table table-condensed'>

      <tr >
        <th>Désigntion</th>
        <th><input type="text" name="designation" value="<?php echo $l['1'] ;?>"></th>
      </tr>

      <tr >
        <th>Somme</th>
        <th><input type="text" name="somme" value="<?php echo $l['2'] ;?>"></th>
      </tr>
     
     <tr >
        <th>Date</th>
        <td><input type="text" name="dates" value="<?php echo $l['3'] ;?>"></td>
      </tr>

      <tr align="center">
        <th a ><input type="submit" class="btn btn-success pull-right" value="modifier"></th>
      </tr> 
    </table>
  </form>
</div>  
  <?php
  }

  ?>
<?php include('footer.php') ?>