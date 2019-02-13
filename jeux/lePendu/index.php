<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	session_start();
	$titre = 'Le pendu';
	$version = 'V4.5';
	include('templates/entete.php');

	if (isset($_POST['bFruit']) or isset($_POST['bDisneyF']) or isset($_POST['bSimpson']) or isset($_POST['bJeuVideo']) or isset($_POST['bAleatoire'])) 
	{
	
		if (isset($_POST['bFruit'])) 
		{
			// ouverture du fichier texte en mode "lecture seule"
			$ouvre=fopen("dico/fruit.txt","r");
			$mMax = 10;
			$rejouer = "bFruit";
			
		}
		elseif (isset($_POST['bDisneyF']))	
		{
			$ouvre=fopen("dico/disneyfilm.txt","r");
			$mMax = 36;
			$rejouer = "bDisneyF";
			
		}		
		elseif (isset($_POST['bSimpson']))	
		{
			$ouvre=fopen("dico/simpson.txt","r");
			$mMax = 58;
			$rejouer = "bSimpson";
			
		}
		elseif (isset($_POST['bJeuVideo']))	
		{
			$ouvre=fopen("dico/jeuxvideo.txt","r");
			$mMax = 40;
			$rejouer = "bJeuVideo";
			
		}
		elseif (isset($_POST['bAleatoire']))	
		{
			$ouvre=fopen("dico/aleatoire.txt","r");
			$mMax = 835;
			$rejouer = "bAleatoire";	
		}
			$i = 0;
			$mMin = 1;
			$chMot = rand($mMin,$mMax);
			while ($i < $chMot)
			{
			// on recupère la ligne courante
			$temp = fgets($ouvre);
			$i++;
			}
			// fermeture du fichier
			fclose($ouvre);	
			$_SESSION['mot'] = $temp;
			$_SESSION['rejouer'] = $rejouer;
			header('Location: partie');
	}
	elseif (isset($_POST['bThemes']))	
	{
		include('pages/v_themes.php');
	}	
	else 
	{
		include('pages/v_index.php');
	}			
	include('pages/reglement.php');
	include('templates/footer.php'); 
?> 