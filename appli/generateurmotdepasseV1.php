<center><br/><br/><?php
$titre = 'Générateur de mot de passe';
	$version = '1.0';
	include('inc/entete.php');


if (isset($_POST['bValider']))
{

	// Récupère les paramètres pour adapter selon les besoins de l'utilisateur
	$SaisieNbrCaract = htmlspecialchars($_POST['nbrCaract']);
	$SaisieTypePasswd = htmlspecialchars($_POST['typePasswd']);
	// Type de caractères à prendre en compte pour générer les mots de passe (change selon paramètre utilisateur) :
	if ($SaisieNbrCaract < 6){
		echo '<p><span class="coulGag">ERREUR </span></p>';
		echo 'Introduisez un nombre supérieur à 5 caractères svp ! ';
		?>
		<br/><br/>
		<FORM action="" method="POST">
		<INPUT  class="button" type="submit" name="bRecommencer" value="Recommencer" />
		</FORM>
		<?php
		}

	else {
		if ($SaisieTypePasswd == '1')
		{
			$caract = "0123456789";
		}
		else if ($SaisieTypePasswd == '2')
		{
			$caract = "AZERTYUIOPQSDFGHJKLMWXCVBNabcdefghijklmnopqrstuvwyxz";
		}
		else if ($SaisieTypePasswd == '3')
		{
			$caract = "AZERTYUIOPQSDFGHJKLMWXCVBNabcdefghijklmnopqrstuvwyxz0123456789";
		}
		else if ($SaisieTypePasswd == '4')
		{
			$caract = "AZERTYUIOPQSDFGHJKLMWXCVBNabcdefghijklmnopqrstuvwyxz0123456789@!:;,§/?*µ$=+";
		}

		// Nombre de caractères que le mot de passe doit contenir (= saisie utilisateur) :
		$nb_caract = $SaisieNbrCaract;

		// Puis une seconde boucle pour générer le mot de passe caractère par caractère jusqu'au nombre indiqué par l'utilisateur
		echo 'Votre mot de passe est : <br/><p class="texteP"> ';
		// Puis une seconde boucle pour générer le mot de passe caractère par caractère jusqu'au nombre indiqué par l'utilisateur
		for($i = 1; $i <= $nb_caract; $i++)
		{

		// On compte le nombre de caractères
		$Nbr = strlen($caract);

		// On choisit un caractère au hasard dans la chaine sélectionnée :
		$Nbr = mt_rand(0,($Nbr-1));

		// Pour finir, on écrit le résultat :

		$resultat = $caract[$Nbr];
		echo $resultat;
		}
		echo '</p>';
		?>

		<FORM action="" method="POST">
		<INPUT  class="button" type="submit" name="bRecommencer" value="Générer un nouveau mot de passe" />
		</FORM>
		<?php
	}
}

else
{
	?><form action='' method="POST">
<table>
<tr><td>
Taille du mot de passe (Nombre de caractères) : </td><td><input type='text' size="18" maxlength="2" name='nbrCaract' required autofocus/>
</td></tr>

<tr><td style="text-align: right;">
Type de mot de passe : </td><td>    <select name='typePasswd'>
<option value='1'>Chiffres uniquement</option>
<option value='2'>Lettres uniquement</option>
<option value='3'>Chiffres et lettres</option>
<option value='4'>Tout caractères</option>
</select>
</td></tr></table>
<br/>
<INPUT type="submit" class="button" name="bValider" value="Générer votre mot de passe" />
	</FORM><?php

}
	include('inc/bas_de_page.php');
?>
</center>
<style>
.texteP {
    background-color: rgb(44, 44, 44);
    padding: 7px 15px;
    text-align: center;
    -webkit-box-shadow: inset 0px 0px 0px 2px black;
    -moz-box-shadow: inset 0px 0px 0px 2px black;
    -khtml-box-shadow: inset 0px 0px 0px 2px black;
    box-shadow: inset 0px 0px 0px 2px black;
    min-width: 50px;
    border-radius: 3px;
    color: red;
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: inline-block;
    font-size: 15pt;
    text-shadow: 1px 1px 0px black;
    font-weight: bold;
    letter-spacing: 2.4px;
}


@keyframes importantprefix {
0% { color: white; }
20% { color: red; }
40% { color: white; }
60% { color: red; }
80% { color: white; }
100% { color: red; }
 }

.coulGag {
	animation: importantprefix 2s ease infinite alternate;
	font-size: 25pt;
	font-weight: bold;
 }
.button {
    font-family: "Trebuchet MS",Verdana,Geneva,Arial,Helvetica,sans-serif;
    color: #ffffff;
    background-color: rgb(50, 108, 149);
    border: 1px solid rgb(50, 108, 149);
    border-radius: 0;
    text-align: center;
    box-shadow: 0px 1px 4px 0px rgb(0,0,0), inset 0px 0px 0px 1px rgba(0,0,0,0.15);
    cursor: pointer;
    background-image: -webkit-linear-gradient(rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0) 100%), -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0) 100%);
    background-image: linear-gradient(rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0) 100%), linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0) 100%);
    box-sizing: content-box;
    height: 21px;
	text-shadow: 1px 1px 0px black;
}
.button:hover {
	background-color: rgba(50, 108, 149,0.5);
}

INPUT, select{
	background-color: rgb(64, 64, 64);
	border: 1px solid rgb(64, 64, 64);
	color: white;
	box-shadow: inset 0px 0px 0px 1px rgba(0,0,0,0.2);
}
option:hover {
	background: #26a0da;
	color: white;
}
</style>
