<center><?php
	$titre = 'Tester numéro assurance sociale';
	$version = '1.0';
	include('inc/entete.php');
 ?>

<FORM action="" method="POST">
<h2>Numéro d'assurance sociale à tester :</h2>
<INPUT type="text" name="eNum" size="10" maxlength="9" required autofocus />
<br/><br/>
<INPUT type="submit" name="bTester" value="Tester" />
</FORM>

<?php

if (isset($_POST['bTester']))
{
	// On récupère le numéro introduit
	$numSecSoc = htmlentities($_POST['eNum']);

	// On vérifie qu'on a bien récupéré 9 caractères
	if (strlen($numSecSoc) == 9)
	{
		// On additionne tous les nombres en positions impaires (donc les caractères 0, 2, 4, 6 et 8)
		// N'oubliez pas le décalage de 1 (le premier caractère est en position 0)
		$nombreA = $numSecSoc[0] + $numSecSoc[2] + $numSecSoc[4] + $numSecSoc[6] + $numSecSoc[8];

		// On additionne le double de tous les nombres en positions paires (donc les caractères 1, 3, 5 et 7)
		// Seulement, les chiffres supérieurs à 4 donneront un résultat supérieur à 9
		// Pour ceux-là, il faut appliquer la formule suivante : chiffre * 2 - 9
		$nombreB =
			(($numSecSoc[1] > 4) ? $numSecSoc[1]*2-9 : $numSecSoc[1] * 2) +
			(($numSecSoc[3] > 4) ? $numSecSoc[3]*2-9 : $numSecSoc[3] * 2) +
			(($numSecSoc[5] > 4) ? $numSecSoc[5]*2-9 : $numSecSoc[5] * 2) +
			(($numSecSoc[7] > 4) ? $numSecSoc[7]*2-9 : $numSecSoc[7] * 2);

		// Le message à afficher dépend du test : il faut que la somme des deux nombres soit un multiple de 10
		// Si c'est le cas, le reste de la division de cette somme par 10 doit être égal à 0
		echo (($nombreA + $nombreB) % 10 == 0) ? 'Ce numéro est correct' : 'Ce numéro est incorrect';
	}
	else
	{
		echo 'Ce numéro introduit est incorrect car il ne contient pas 9 caractères.';
	}
}

	include('inc/bas_de_page.php');
?>
</center>
