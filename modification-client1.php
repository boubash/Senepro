

 <?php
   include("conexion.php");
  
          $id=$_GET["matricule"] ;

          $req="SELECT * FROM client WHERE id_client =".$id;

          $exe=mysql_query($req);

            if($l=mysql_fetch_array($exe))
          {
  ?>
        <?php include('header.php') ?>

<div class=container>

  <div class="row">

    <div class="span9"><h1>Modification Client</h1></div>

     <div class="span3">
      <a href="nouveau-client.php" class="btn btn-success pull-right">
        <i class='icon-plus'></i>
        Nouveau client
      </a>
    </div>
  </div>
  <form method="POST" name="insertion" action="modification-client2.php" >

    <input type="hidden" name="id_cli" value="<?php echo $_GET['matricule'] ;?>">

    <table class='table table-condensed'>

      <tr >
        <th>Nom</th>
        <th><input type="text" name="nom" value="<?php echo $l['1'] ;?>"></th>
      </tr>

      <tr >
        <th>Prenom</th>
        <th><input type="text" name="prenom" value="<?php echo $l['2'] ;?>"></th>
      </tr>
     
     <tr >
        <th>Adresse</th>
        <td><input type="text" name="adresse" value="<?php echo $l['3'] ;?>"></td>
      </tr>

      <tr >
        <th>téléphone</th>
        <th><input type="text" name="telephone" value="<?php echo $l['4'] ;?>"></th>
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
