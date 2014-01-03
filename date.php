
	<form method="POST">
	Du : <SELECT name='i' Size='1'>
		<?php
			for($i=1; $i<=31;$i++)
			{	       //Lister les jours
				if ($i < 10)
				{		       //Lister les jours pour pouvoir leur ajouter un 0 devant
					echo "<OPTION>0$i<br></OPTION>";
				}
				else 
				{
					echo "<OPTION>$i<br></OPTION>";
				}
            }
			?>
		</SELECT>
		<SELECT name="d" Size="1">
		<?php
			for($d=1; $d<=12;$d++)
			{	       //Lister les mois
				if ($d < 10)
				{		       //Lister les jours pour pouvoir leur ajouter un 0 devant
					echo "<OPTION>0$d<br></OPTION>";
				}
				else 
				{
					echo "<OPTION>$d<br></OPTION>";
				}
            }
		?>
		</SELECT>
		<?php
		$date = date('Y');		 //On prend l'année en cours
 
		echo '<SELECT name="y" Size="1">';
		for ($y=$date; $y<=$date+10; $y++)
		{	       //De l'année 2000 à l'année actuelle
			echo "<OPTION><br>$y<br></OPTION>";
		}
		echo "</SELECT>";
		?>
		Au <SELECT name='i2' Size='1'>
		<?php
			for($i=1; $i<=31;$i++)
			{	       //Lister les jours
				if ($i < 10)
				{		       //Lister les jours pour pouvoir leur ajouter un 0 devant
					echo "<OPTION>0$i<br></OPTION>";
				}
				else 
				{
					echo "<OPTION>$i<br></OPTION>";
				}
            }
			?>
		</SELECT>
		<SELECT name="d2" Size="1">
		<?php
			for($d=1; $d<=12;$d++)
			{	       //Lister les mois
				if ($d < 10)
				{		       //Lister les jours pour pouvoir leur ajouter un 0 devant
					echo "<OPTION>0$d<br></OPTION>";
				}
				else 
				{
					echo "<OPTION>$d<br></OPTION>";
				}
            }
		?>
		</SELECT>
		<?php
		$date2 = date('Y');		 //On prend l'année en cours
 
		echo '<SELECT name="y2" Size="1">';
		for ($y2=$date2; $y2<=$date2+10; $y2++)
		{	       //De l'année 2000 à l'année actuelle
			echo "<OPTION><br>$y2<br></OPTION>";
		}
		echo "</SELECT>";
		?>
		<input type="submit" value="Rechercher"><br/>
		</form>

<?php
 
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
	echo $debut;
	echo $fin;
 
	include 'conexion.php';
 
	$sql = "SELECT * FROM commande WHERE date_commande BETWEEN $debut AND $fin ORDER BY id_commande DESC";
	$req = mysql_query($sql);
	print_r($sql);
 
	?>

