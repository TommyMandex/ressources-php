<?php 
$pseudo = "LMoury.com"; //Mettre votre pseudo  
$title = $pseudo." - Acceuil"; // Titre de la page ! (Vous pouvez retire le "$pseudo.")
$dossierAppli = "appli"; // Mettre le nom du dossier ou vos site se trouve 
$dossierJeux = "jeux"; // Mettre le nom du dossier ou vos site se trouve 
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?= $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Developpement web">
		<meta name="author" content="Laurent Moury">
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<script src="assets/js/jquery-2.2.3.min.js"></script>
		<script src="assets/js/bootstrap.js"></script>	
	</head>
	<body class="fond">
		<div class="container">
			<div class="text-center">
				<h1 class="elmojitopseudo"><?= $pseudo ?></h1>
				<p>Dossier de développement</p>
			</div>
			<br />
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#home">Application</a></li>
				<li><a data-toggle="tab" href="#menu1">Jeux PHP</a></li>
			</ul>

			<div class="tab-content lm_container">
				<div id="home" class="tab-pane fade in active">
					<?php
					$nb_fichier = "";
					if($dossier = opendir($dossierAppli))	{
						while(false !== ($fichier = readdir($dossier)))	{
							if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != '.DS_Store') {
								$nb_fichier++; 
								echo '
								<div class="conteiner">
								<ul class="list-group">
								<a href="./'.$dossierAppli.'/'.$fichier.'" style="text-decoration:none"><li class="list-group-item">'.$fichier.'</li></a>
								</ul>
								</div>';
							} 
						}
						echo '</ul><br />';
						$avecousans = ($nb_fichier > 1) ? 'fichiers' : 'fichier';
						echo '<p class="pied text-center">Il y a <strong>' .$nb_fichier.'</strong> ' .$avecousans.' dans le dossier </p>';
						 
						closedir($dossier); 
					}
					else {
						 echo 'Le dossier n\' a pas pu être ouvert';
					}
					?>
				</div>
				<div id="menu1" class="tab-pane fade">
					<?php
					$nb_fichier = "";
					if($dossier = opendir($dossierJeux))	{
						while(false !== ($fichier = readdir($dossier)))	{
							if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != '.DS_Store') {
								$nb_fichier++; 
								echo '
								<div class="conteiner">
								<ul class="list-group">
								<a href="./'.$dossierJeux.'/'.$fichier.'" style="text-decoration:none"><li class="list-group-item">'.$fichier.'</li></a>
								</ul>
								</div>';
							} 
						}
						echo '</ul><br />';
						$avecousans = ($nb_fichier > 1) ? 'fichiers' : 'fichier';
						echo '<p class="pied text-center">Il y a <strong>' .$nb_fichier.'</strong> ' .$avecousans.' dans le dossier </p>';
						 
						closedir($dossier); 
					}
					else {
						 echo 'Le dossier n\' a pas pu être ouvert';
					}
					?>
				</div>
			</div>				
		</div>
		<footer>
			<span class="basDePageCss" style="float:left;">
					 2016-<?php echo date('Y'); ?> © <a href="https://lmoury.com/">LMoury.com</a> - All Rights Reserved
			</span>
		</footer>
	</body>
</html>
