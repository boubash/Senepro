


<?php
   include("conexion.php");
  
          $id=$_GET["matricule"] ;

          $req="SELECT * FROM materiel WHERE id_materiel =".$id;

          $exe=mysql_query($req);

            if($l=mysql_fetch_array($exe))
          {
  ?>

  <?php include('header.php') ?>
  <div class='container'>
  
  <div class='row'>
      <div class='span9'><h1>Modification matériel</h1></div>
      <div class='span3'>
  
        <a href='nouveau-materiel.php' class='btn btn-success pull-right' >
          <i class='icon-plus'></i>

          Nouveau materiel 
        </a>
      </div>
  </div>

        <form name="insertion" action="modification-materiel2.php" method="POST">

          <input type="hidden" name="id_mat" value="<?php echo $_GET['matricule'] ;?>">

          <table class='table table-condenced'>

             <tr>
                <th>designation</th>
                <th><input type="text" name="designation" value="<?php echo $l[1] ;?>"></th>
            </tr>

               <tr >
                 <th>prix</th>
                 <th><input type="text" name="prix" value="<?php echo $l[2] ;?>"></th>
               </tr>
    
               <tr >
                 <th ><input type="submit" class="btn btn-success pull-right" value="modifier"></th>
               </tr>

          </table>

        </form>
  <?php
  }
  ?>

<?php include('footer.php') ?> 
