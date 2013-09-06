
<?php include('header.php') ?>

 <?php
   include("conexion.php");

    $id=$_GET["matricule"] ;

     $req="SELECT * FROM materiel WHERE matricule =".$id;
     
      $exe=mysql_query($sql);
 
      if($l=mysql_fetch_array($exe))
      {

  ?>

        <form method="POST" name="insertion" action="modification-materiel2.php" >

          <input type="hidden" name="id_materiel" value="<?php echo $id_matiere ;?>">

          <table class='table table-bordered'>

              <tr >
                <td>Designation</td>
                <td><input type="text" name="designation" value="<?php echo $l['designation'] ;?>"></td>
              </tr>

              <tr >
                <td>Prix</td>
                <td><input type="text" name="prix" value="<?php echo $l['prix'] ;?>"></td>
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
