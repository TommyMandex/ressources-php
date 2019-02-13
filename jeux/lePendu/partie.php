<?php
session_start(); 
$titre = 'Le pendu';
$version = 'V4.5';
include('templates/entete.php');
if(isset($_SESSION['mot'])) {
	
	$nbErreursMax = 0;

	// Récupération du mot. Il est directement transformé en majuscules et on retire les espaces inutiles
	$motADeviner = trim(strtoupper(htmlspecialchars($_SESSION['mot'] )));
	
	// A-t-on émis une proposition ?
	if (isset($_POST['eProp'])) 
	{
		// On récupère le caractère proposé (on le met en majuscules)
		$prop = trim(strtoupper(htmlspecialchars($_POST['eProp'])));
		if(ctype_alpha($prop) and strlen($prop)==1)
     	{
			// On récupère également le compteur d'erreurs
			$_SESSION['nbErreurs'] = (isset($_SESSION['nbErreurs'])) ? htmlspecialchars($_SESSION['nbErreurs']) : 0;
			// On récupère également les lettres erroner
			$_SESSION['lettreErreur'] = (isset($_SESSION['lettreErreur'])) ? htmlspecialchars($_SESSION['lettreErreur']) : 0;
			// On récupère le mot à afficher
			$_SESSION['motAAfficher'] = (isset($_SESSION['motAAfficher'])) ? htmlspecialchars($_SESSION['motAAfficher']) : '';
							// On vérifie si la proposition contient un signe
			// On vérifie si la proposition na pas deja etait utilser
			if (strpos($_SESSION['lettreErreur'], $prop) !== false) 
			{ 
				$dejaJoue = '<p class="dejaJouer faa-flash animated"><i class="fa fa-warning"></i> Vous avez deja jouer cette lettre <i class="fa fa-warning"></i><p><br/>'; 
			}
			
			else 
			{				
				// On contrôle si la proposition peut être affichée
				for ($i=0; $i<strlen($motADeviner); $i++) {
					$_SESSION['motAAfficher'][$i] = ($motADeviner[$i]==$prop) ? $prop : $_SESSION['motAAfficher'][$i];
				}
						
				// La proposition était-elle dans le mot ?
				if (strpos($motADeviner, $prop)===false) 
				{
					$_SESSION['nbErreurs']-- ; $_SESSION['lettreErreur'] .= $prop;
				}
				
			}
		}
		else {
			$dejaJoue = '<p class="dejaJouer faa-flash animated"><i class="fa fa-warning"></i> Vous n\'avez pas entrée une lettre <i class="fa fa-warning"></i><p><br/>';
		}
	}	
	else 
	{
		// Initialisation du compteur d'erreurs
		$_SESSION['nbErreurs'] = 7;
		$_SESSION['motAAfficher'] = '';
		$_SESSION['lettreErreur'] = '';
		for ($i= 0; $i<strlen($motADeviner); $i++) $_SESSION['motAAfficher'] .='-';
	}



	// On ne peut émettre une proposition que si le nombre d'erreurs est inférieur à 7 et que le mot n'a pas été découvert
	if ($_SESSION['nbErreurs']>$nbErreursMax and $_SESSION['motAAfficher'] != $motADeviner) 
	{
		
		if($_SESSION['nbErreurs']==7) 
		{
			$comError= "Vouz avez le droit à 7 essais";
		}
		else 
		{
			$comError= 'il vous reste '.$_SESSION['nbErreurs'].' essai'.(($_SESSION['nbErreurs']>1)?'s':'');
		}
		
		include('pages/v_partieEnCours.php');
	} 
	else 
	{ // Si on n'affiche plus le formulaire : Gagné ou Perdu ?
		if ($motADeviner == $_SESSION['motAAfficher']) {
			$fini = '<img src="assets/img/simpson.png" width="200px" height="200px"/><span class="penduDecor"><h3 class="decoColor faa-flash animated">Félicitation</h3> Vous avez trouvé le mot : <b>'.$motADeviner.'</b></span>';
		
		}
		else {
			$fini = '<img src="assets/img/pendu8.png" width="300px" height="200px"/><br/></br/><span class="penduDecor">Désolé, vous avez perdu. Le mot était : <b>'.$motADeviner.'</b></span>';
		}
		
		include('pages/v_partieTerminer.php');
	} 

	include('pages/reglement.php');
	include('templates/footer.php');

}
else {
	header('Location: pendu');
} ?>
			
	