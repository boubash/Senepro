<?php include('header.php') ?>

 <?php
   include("conexion.php");

    $id=$_GET["matricule"] ;

     $req="SELECT * FROM client WHERE matricule =".$id;

      $exe=mysql_query($sql);
 
      if($l=mysql_fetch_array($exe))
      {

  ?>

        <form method="POST" name="insertion" action="modification-client2.php" >

          <input type="hidden" name="id_client" value="<?php echo $id_mclient ;?>">

          <table class='table table-bordered'>

              <tr >
                <td>Nom</td>
                <td><input type="text" name="nom" value="<?php echo $l['nom'] ;?>"></td>
              </tr>

              <tr >
                <td>Prenom</td>
                <td><input type="text" name="prenom" value="<?php echo $l['prenom'] ;?>"></td>
              </tr>
             
             <tr >
                <td>Adresse</td>
                <td><input type="text" name="adresse" value="<?php echo $l['adresse'] ;?>"></td>
              </tr>

              <tr >
                <td>t&aecut;l&aecut;phone</td>
                <td><input type="text" name="telephone" value="<?php echo $l['telephone'] ;?>"></td>
              </tr>

              <tr >
                <td ><input type="submit" value="modifier"></td>
              </tr>

          </table>
        </form>
  <?php
  }

  ?>

<?php include('footer.php') ?> 