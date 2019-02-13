<?php
$title = 'IMC';
$version = 'Version 2.1';
include('templates/entete.php');


if (isset($_POST['bCalculer']))
{
	if(!empty($_POST['poids']) and !empty($_POST['taille'])) {

		$poids = htmlspecialchars ($_POST['poids']);
		$taille = htmlspecialchars ($_POST['taille']);
		$imc = ($poids / $taille / $taille);
		$resultat = round($imc, 2);
		$imc = 'Votre IMC est de <font style="color:red; font-weight: bold;">' .$resultat. '</font>' ;
			

		if ($resultat < 18.5) {
			$type = 'Vous êtes en insuffisance <b>pondérale</b>';
			$image = 'assets/img/image2.jpg';
			$texte = 'Votre poids apparaît trop faible par rapport à votre taille. Ce faible indice de masse corporelle (IMC) est peut-être la conséquence d’une pathologie, mais elle-même peut exposer à un certain nombre de risques pour votre santé (carences, anémie, ostéoporose...). Parlez-en avec votre médecin traitant. Il pourra rechercher la cause de cette maigreur et vous conseiller.';
		} 
			
		elseif ($resultat >= 18.5 and $resultat < 25) {
			$type = 'Votre poids est <b>optimal</b>';
			$image = 'assets/img/image3.png';
			$texte = 'Votre poids est adapté à votre taille. Gardez vos habitudes alimentaires pour conserver un indice de masse corporelle (IMC) idéal et un poids qui vous assure un état de santé optimal. Une alimentation équilibrée, sans excès de matières grasses, associée à une activité physique régulière vous aidera à maintenir votre poids idéal.';
		} 

		elseif ($resultat >= 25 and $resultat < 30) {
			$type = 'Vous êtes en <b>surpoids</b>';
			$image = 'assets/img/image4.png';
			$texte = 'Votre poids commence à devenir élevé par rapport à votre taille. A long terme, un indice de masse corporelle (IMC) élevé a des conséquences sur la santé. L’excès de poids entraîne un risque accru de maladies métaboliques (diabète), cardiaques, respiratoires, articulaires et de cancer.<br/> Si vous souhaitez commencer un régime pour perdre du poids, parlez-en au préalable avec votre médecin traitant.';
		} 
			
		else {
			$type = 'Votre poids est fort en <b>obésité</b>';
			$image = 'assets/img/image5.jpg';
			$texte = 'Votre poids est trop élevé par rapport à votre taille. Du point de vue médical, l’obésité est un excès de masse grasse ayant des conséquences sur la santé. L’excès de poids entraîne un risque accru de maladies métaboliques (diabète), cardiaques, respiratoires, articulaires et de cancer.<br/> Si vous souhaitez commencer un régime pour perdre du poids, parlez-en au préalable avec votre médecin traitant.<br/><br/> A noter que la sévérité de l’obésité dépend de l’indice de masse corporelle (IMC) : 
				  <br/>30 < IMC < 34,9 : obésité modérée 
				  <br/>35 < IMC < 39,9 : obésité sévère 
				  <br/>IMC > 40 : obésité morbide';
		}
?>

		<div class="texteP row" style="margin-bottom: 90px;">
			<div class="col-md-2 col-sm-12 text-center">
				<img src="<?= $image; ?>"/>
			</div>
			<div class="col-md-10 col-sm-12 col-xs-12">
				<h4 class="text-center"><?= $imc; ?></h4>
				<h5 class="text-center"><?= $type; ?></h5>
				<p>
					<?= $texte; ?>
				</p>
				<div class="text-center">
					<a href="index.php">Revenir au menu principal</a>
				</div>
			</div>
		</div>

<?php
	}
	else {
?>

		<div class="texteP row" style="margin-bottom: 90px;">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h4 class="text-center">ERREUR</h4>
				<p>
					erreur
				</p>
				<div class="text-center">
					<a href="index.php">Revenir au menu principal</a>
				</div>
			</div>
		</div>
<?php
	}
}
else {
?>
	<div class="texteP row">
		<div class="col-md-2 col-sm-12 text-center">
			<img src="assets/img/image1.jpg"/>
		</div>
		<div class="col-md-10 col-sm-12 col-xs-12">
			<p>
				L'indice de masse corporelle (IMC) est un indicateur plus fiable que le poids pour évaluer votre corpulence. Homme ou femme, calculez rapidement votre IMC et découvrez sa signification selon la classification de l'OMS.
				<br/>Attention : l’Indice de Masse Corporelle (IMC) est un indicateur qu’il faut utiliser avec prudence. Son interprétation peut être différente dans certaines situations (grossesse, sportifs de haut niveau, enfants, graves maladies, personnes âgées). De plus, il ne tient pas compte de la masse musculaire, de l'ossature et de la répartition des graisses. 
				Pour un IMC égal ou supérieur à 25kg/m² et inférieur à 35kg/m², l’examen clinique devra être complété par la mesure du tour de taille.
			</p>
		</div>
	</div>
	<br/>
	<div class="text-center" style="margin-bottom: 90px;">
		<form action="" method="post">
			Indiquez votre poids  <input type="text" name="poids" size="10" maxlength="4" placeholder="en kg" autofocus />
			<br/><br/>
			Indiquez votre taille  <input type="text" name="taille" size="10" maxlength="4" placeholder="en mètres"  />
			<br/><br/><br/>
			<input type="submit" name="bCalculer" value="Calculer l'IMC"/>
		</form>
	</div>

<?php } 
include('templates/footer.php');
?>
