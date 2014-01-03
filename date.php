<div class="well">
	<div class="row">
		<form method="POST" class='form-inline'>
			
			<div class="span5">
				Du: 
				<SELECT name='i' id='i' class='input-small'>
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
				<SELECT name="d"  class='input-small'>
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
					$date = date('Y')-1;		 //On prend l'année en cours
			 
					echo '<SELECT name="y"  class="input-small">';
					for ($y=$date; $y<=$date+10; $y++)
					{	       //De l'année 2000 à l'année actuelle
						echo "<OPTION><br>$y<br></OPTION>";
					}
					echo "</SELECT>";
				?>	
			</div>
			
			<div class="span5">
				Au: <SELECT name='i2'  class='input-small'>
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
				<SELECT name="d2"  class='input-small'>
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
				$date2 = date('Y')-1;		 //On prend l'année en cours
		 
				echo '<SELECT name="y2"  class="input-small">';
				for ($y2=$date2; $y2<=$date2+10; $y2++)
				{	       //De l'année 2000 à l'année actuelle
					echo "<OPTION><br>$y2<br></OPTION>";
				}
				echo "</SELECT>";
				?>
			</div>
			<div class="span1">	
				<input type="submit" name="ok" class='btn btn-info' value="Rechercher" ><br/>
			</div>		
		</form>
	</div>
</div>

