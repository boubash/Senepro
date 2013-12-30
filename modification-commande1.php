<?php
  include("conexion.php");
  $id = $_GET["matricule"];
  $req = "SELECT * FROM commande WHERE id_commande =".$id;
  $exe = mysql_query($req);
  if($l = mysql_fetch_assoc($exe))
  {
?>
<?php include('header.php') ?>
<div class="container">
  <div class="row">
    <div class="span9">
      <h1>
        Modification Commande
      </h1>
    </div>
    <div class="span3">
      <a href="ajout-commande.php" class="btn btn-success pull-right">
        <i class='icon-plus'></i>
        Nouvelle Commande
      </a>
    </div>
  </div>
  <form method="POST" name="insertion" action="modification-commande2.php" >

    <input type="hidden" name="id_com" value="<?php echo $_GET['matricule'] ;?>">

    <table class='table table-condensed'>

      <tr >
        <th>date commande</th>
        <th>
          <input type="text" name="datecommande" value="<?php echo $l['date_commande'] ;?>">
        </th>
      </tr>

      <tr >
        <th>date Livraison</th>
        <th>
          <input type="text" name="datelivraison" value="<?php echo $l['date_livraison'] ;?>">
        </th>
      </tr>
     
     <tr >
        <th>avance</th>
        <td>
          <input type="text" name="avanc" value="<?php echo $l['avance'] ;?>">
        </td>
      </tr>

      <tr >
        <th>Client</th>
        <th>
          <input type="text" name="clien" value="<?php echo $l['id_client'] ;?>" placeholder='nom client' disabled>
        </th>
      </tr>

      <tr lign="center">
        <th a ><input type="submit" class="btn btn-success pull-right" value="modifier"></th>
      </tr>
    </table>
  </form>
</div>
<?php
}

?>

<?php include('footer.php') ?> 
