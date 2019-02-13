<?php 
session_start();
include('includes/function.php');
include('includes/transformation.php');

function jouable($plateau,$ligne,$col,$joueur) {
	if(sud($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(nord($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(ouest($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(est($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(nordest($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(nordouest($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(sudest($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	if(sudouest($plateau,$ligne,$col,$joueur)) {
		return true;
	}
	return false;
}


if(isset($_POST['bRecommencer'])) {
	session_destroy();
	session_start();
}

if(isset($_SESSION['joueur'])) {
	for ($ligne=0; $ligne<8; $ligne++) 
	{ 
		for ($col=0; $col<8; $col++) 
		{ 
			$plateau[$ligne][$col] = $_SESSION[$ligne.','.$col];
		}
	}
	$joueur = $_SESSION['joueur'];
	if(isset($_GET['ligne']) AND isset($_GET['col']) AND $_GET['ligne'] >= 0 AND $_GET['col'] >= 0 AND $_GET['ligne'] < 8 AND $_GET['col'] < 8) 
	{
		$ligne= $_GET['ligne'];
		$col= $_GET['col'];

		if(jouable($plateau,$ligne,$col,$joueur)) {
			transformation($plateau,$ligne,$col,$joueur);

			if($joueur == 1) { $joueur = 2;} else { $joueur = 1;}
		}
	}
	
}
else
{
	$joueur = 1;
	for ($ligne=0; $ligne<8; $ligne++) 
	{ 
		for ($col=0; $col<8; $col++) 
		{ 
			$plateau[$ligne][$col] = 0;
		}
	}

	// Placement des jetons sur le plateau noir = 1 blanc = 2
	$plateau[3][3] = 1;
	$plateau[4][4] = 1;
	$plateau[3][4] = 2;
	$plateau[4][3] = 2;
}
//Enregistrement du plateau dans une variable de session
for ($ligne=0; $ligne<8; $ligne++) 
{ 
		for ($col=0; $col<8; $col++) 
		{ 
			$_SESSION[$ligne.','.$col] = $plateau[$ligne][$col];
		}
}
$_SESSION['joueur'] = $joueur;

?>


<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
	    <title>Othello</title>
	    <link href="css/default.css" rel="stylesheet"/>
	</head>
	<body>
			
		<br/><br/>
		<div id="container">
			<div align="center" class="title"><h1>Othello</h1></div>
			<div class="block_content1" align="center">
				<!------ debut plateau ------>
				<table>
				<?php
				// pour chaque lignes
				for ($i=0; $i<8; $i++) 
				{ 
				echo '<tr>';
					// pour chaque colonne
					for ($j=0; $j<8; $j++) 
					{ 		
						echo '<td>';
						if (jouable($plateau,$i,$j,$joueur) == true) 
						{
							$plateau[$i][$j] =9;
							echo '<a href="?ligne='.$i.'&col='.$j.'">';
							echo '<img src=images/'.$plateau[$i][$j].'.png /></a>';
						}
						else
						{
							echo '<img src=images/'.$plateau[$i][$j].'.png />';
						}
						
						echo '</td>';
					} // end for
					echo '</tr>';
				} // end for
				?>
				</table>

			</div>

			<?php 
			// parcours du tableau bi-dim pour connaitre le nombre de valeur presente (pion blanc, pion noir, pion jouable etc)
			foreach ($plateau as $key => $value)
			{ 
				$tab[$key]=$plateau[$key];
			}
			$nbNoir = 0;
			$nbBlanc = 0;
			$pionjouable=0;
			foreach ($tab as $key2 => $value)			
			{
				foreach($value as $key3 => $value2)
				{
					if($value2 == 1) { $nbNoir ++; }
					if($value2 == 2) { $nbBlanc ++; }
					if($value2 == 9) { $pionjouable ++; }
				}
			}
			?>
			<div class="block_content2" align="center">
				<?php if($pionjouable==0) {
					echo '<p><span id="winner">PARTIE TERMINEE</span><br/>';
					gagnant($nbBlanc,$nbNoir);
					echo '<span style="display:none;"><audio controls autoplay>
							  <source src="sound/sound1.mp3" type="audio/mpeg">
							Your browser does not support the audio element.
							</audio> </span>';
					echo '<img id="img2" src="images/2.gif" />';
					echo '<img id="img3" src="images/3.gif" />';
					echo '<img id="img4" src="images/4.gif" />';
					echo '<img id="img5" src="images/5.gif" />';
				}
				else {
					echo '<p>
							<span id="block2">C\'est au tour du joueur <span class="joueur'.$joueur.'"></span>
							<br/><br/> Vous avez <b>'.$pionjouable.'</b>';
					echo (($pionjouable > 1)?' possibilités.</span>':' possibilité.</span>');
					echo '</p><div class="spacer center"><div class="mask center"></div></div>';
				} ?>
				<div>
					<table align="center">
					<tr>
					<td>
					<span class="pionNoir"></span></td><td><span class="pionBlanc"></span></td>
					</tr>
					<tr>
					<td>
					<?= $nbNoir; ?></td><td><?= $nbBlanc; ?></td></tr>
					</table>
				</div>
				<div class="spacer center"><div class="mask center"></div></div>

				<form action="" method="POST">
					
					<button name="bRecommencer" type="submit" class="btn">Recommencer</button>
				</form>
				<br/>
			</div>

			<br class="finContainer" />
			<div id="copyright">2016-2017 © <a href=""><font color="#337ab7">E</font><font color="#4d8bc0">l</font><font color="#669bc9">_</font><font color="#80acd2">M</font><font color="#99bddb">o</font><font color="#b3cde4">j</font><font color="#ccdeed">i</font><font color="#e6eef6">t</font><font color="#ffffff">o</font></a> - All Rights Reserved </div>
		</div>
	</body>
</html>