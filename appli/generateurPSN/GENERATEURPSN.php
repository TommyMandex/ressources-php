<?php
$titre = 'Générateur PSN';
$version = '1.0';
include('entete.php');

if (isset($_POST['bValider'])) 
{
	$caractA = "AZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
	$caractB = "AZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
	$caractC = "AZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
		
	$melangeA = str_shuffle($caractA);
	$melangeB = str_shuffle($caractB);
	$melangeC = str_shuffle($caractC);
	
	$chaineA = substr($melangeA, 0, 4);
	$chaineB = substr($melangeB, 0, 4);
	$chaineC = substr($melangeC, 0, 4);
	
	$resultat = ($chaineA.'-'.$chaineB.'-'.$chaineC);
	 
	echo '<br/><center><p class="texteP">'.$resultat.'</center>';
	$myfile = fopen ("newfile.txt", "a+");
	
	$txt = ($resultat.'    ') ;
	fwrite($myfile, $txt);
	fclose($myfile);	
		
	?><form action='' method="POST">

	<center><INPUT type="submit" class="button" name="bValider" value="Générer votre codde PSN" /></center>
	</FORM><br/><?php
	
	$myfile=fopen("newfile.txt","r"); // ouverture fichier en lecture "r"
	while (!feof ($myfile))         // tant que pas en fin de fichier
	{
		$tampon = fgets($myfile, 4096); // mise en tampon des données
		echo '<p class="texteA">'.$tampon.'</p>';		       // affichage du tampon
  	}
	fclose($myfile);		       // fermeture fichier
	
}

else 
{
	?><form action='' method="POST">
	<br/><br/>
	<center>	<INPUT type="submit" class="button" name="bValider" value="Générer votre mot de passe" /></center>
	</FORM><?php		
}
include('bas_de_page.php');
?>

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
.texteA {
    background-color: black;
    padding: 9px;
	color: #C8C8C8;
    -webkit-box-shadow: inset 0px 0px 0px 2px rgba(255, 255, 255, 0.2);
    -moz-box-shadow: inset 0px 0px 0px 2px rgba(255, 255, 255, 0.2);
    -khtml-box-shadow: inset 0px 0px 0px 2px rgba(255, 255, 255, 0.2);
    box-shadow: inset 0px 0px 0px 2px rgba(255, 255, 255, 0.2);
    border: 1px solid black;
    text-shadow: 1px 1px 0px black;
    
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
</style>