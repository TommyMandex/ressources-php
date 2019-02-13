<?php
session_start(); 
$titre = 'Cherchez le nombre';
$version = '2.0';
include('templates/entete.php');

if (isset($_POST['bValider'])) {
	$prop = htmlspecialchars ($_POST['eProp']);
	if (ctype_digit($prop) and $_SESSION['nMin'] <= $prop and $_SESSION['nMax'] >= $prop) {
		$_SESSION['cpt'] = $_SESSION['cpt']+1;
	 
		if ($_SESSION['nb'] < $prop) {		
			$resultat = 'Votre nombre est trop grand, il doit être inférieur à <b>' .$prop. '</b>';
		}
		elseif ($_SESSION['nb'] > $prop) {		
			$resultat = 'Votre nombre est trop petit, il doit être supérieur à <b>' .$prop. '</b>';
		}
		else {		
			$resultat = '<span class="coulGag">Vous avez gagné !!!</span><br/>Vous avez réussi en ' .$_SESSION['cpt']. ' coups';
		}
	}
	else {
		$resultat = '<span class="coulGag"> Veuillez introduire un chiffre entre '.$_SESSION['nMin'].' et '.$_SESSION['nMax'].'</span>';
	}
}
else { // ERROR
    $_SESSION['cpt'] = 0;
	$_SESSION['nMin'] = 1;
	$_SESSION['nMax'] = 999;
	$_SESSION['nb'] = rand($_SESSION['nMin'],$_SESSION['nMax']);
	$resultat = 'Trouver le nombre caché entre '.$_SESSION['nMin'].' et ' .$_SESSION['nMax'];
}


?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="divP">
				<p class="texteP">
					<?= $resultat; ?>
				 	<br/>
					<?php 
						if (isset($prop) and $prop == $_SESSION['nb']) {

						}
						else {
							$essaies = (($_SESSION['cpt']+1) > 1) ? ($_SESSION['cpt']+1).' essaies' : ($_SESSION['cpt']+1).' essaie'; 
							echo $essaies; 
						}
					?> 
				</p>
			</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-sm-12">
			<div class="text-center">
				<?php if(isset($prop) and $_SESSION['nb'] == $prop ) {
					echo '<FORM action="" method="POST" style="display:none;">';
				}
				else {
					echo '<FORM action="" method="POST">';
				} ?>
				<FORM action="" method="POST">
					Votre proposition :
					<INPUT class="propoBtn form-control" type="text" name="eProp" maxlength="3" required autofocus /> 
					<INPUT class="btn" type="submit" name="bValider" value="Vérifier" />
				</FORM>
				<br/><br/>
				<FORM action="" method="POST">
					<INPUT class="btn" type="submit" name="bonsansfou" value="Recommencer la partie" />
				</FORM>
			</div>
		</div>
	</div>
</div>
<?php include('templates/footer.php'); ?>