<?php include('header.php') ?>


<?php
   include("conexion.php");
  
          $id=$_GET["matricule"] ;

          $req="SELECT * FROM materiel WHERE id_materiel =".$id;

          $exe=mysql_query($req);

            if($l=mysql_fetch_array($exe))
          {
  ?>

        <form name="insertion" action="modification-materiel2.php" method="POST">

          <input type="hidden" name="num" value="<?php echo $id_materiel ;?>">

          <table class='table table-bordered'>

             <tr align="center">
                <td>d&aecut;signation</td>
                <td><input type="text" name="designation" value="<?php echo $l[1] ;?>"></td>
            </tr>

               <tr align="center">
                 <td>prix</td>
                 <td><input type="text" name="prix" value="<?php echo $l[2] ;?>"></td>
               </tr>
    
               <tr align="center">
                 <td colspan="2"><input type="submit" value="modifier"></td>
               </tr>

          </table>

        </form>
  <?php
  }
  ?>

<?php include('footer.php') ?> 
