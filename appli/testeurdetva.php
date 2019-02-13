<center><?php
	$titre = 'Testeur de numéro de TVA';
	$version = '1.0';
	include('inc/entete.php');
?>

<FORM action="" method="POST">
<h2>Numéro de TVA à tester :</h2>
<INPUT type="text" name="eTVA" size="10" maxlength="9" required autofocus />
<br/><br/>
<INPUT type="submit" name="bTester" value="Tester" />
</FORM>

<?php

if (isset($_POST['bTester']))
{
	// On récupère le numéro de TVA introduit
	$numTVA = htmlentities($_POST['eTVA']);

	// On vérifie qu'on a bien récupéré 9 caractères
	if (strlen($numTVA) == 9)
	{
		// On récupère les 7 premiers caractères
		$nombreA = substr($numTVA, 0, 7);
		// On récupère les 2 derniers caractères
		$nombreB = substr($numTVA, -2);

		// Calcul du modulo (reste de la division du nombreA par 97)
		$modulo = $nombreA % 97;
		// Calcul de la valeur à tester (97 - $modulo)
		$nombreATester = 97 - $modulo;

		// Le message à afficher dépend du test : si $nombreATester a la même valeur que $nombreB, le numéro introduit est correct
		echo (($nombreB == $nombreATester) ? 'Ce numéro de TVA est correct' : 'Ce numéro de TVA est incorrect');
	}
	else
	{
		echo 'Ce numéro de TVA est incorrect car il ne contient pas 9 caractères.';
	}
}

	include('inc/bas_de_page.php');
?>
</center>
