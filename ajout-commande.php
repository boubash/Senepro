<?php
if(isset($_POST['ok']))
{

  include("conexion.php");
  extract($_POST);
  
  $req="insert into  commande values('','$date_commande','$date_livraison','$avance',$client)";
  $exe=mysql_query($req);
 
    header("Location:commande.php");
 
  }
  
?>
<?php include('header.php') ?>

<div class=container>
	<div class='row'>
			<div class='span9'><h1>Ajout commande</h1></div>
			<div class='span3'>
	
				<a href='commande.php' class='btn btn-success pull-right' >
					<i class='icon-plus'></i>

					Commande 
				</a>
			</div>
	</div>

<form method="POST" class="form-inline" role="form" action='ajout-commande.php'>
<pre>
    <input type="hidden" name="id_commande">
      
                                 date commande  <input type="date" name="date_commande" >
                  
                                 date Livraison <input type="date" name="date_livraison" >
                 
                                        avance  <input type="text" name="avance" placeholder="Avance">              
              
                                        client  <select name="client" class="form-inline">
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
                                                <input type="submit" class="btn btn-success" name="ok" value="Ajouter">  
</pre>
</pre>
         
</form>

</div>