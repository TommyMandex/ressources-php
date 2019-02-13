<?php
function datePassedSansHeure($date)
{
	if(!ctype_digit($date)) {
		$date = strtotime($date);
	}
	if(date('Ymd', $date) == date('Ymd')) {
		$diff=time()-$date;
		if($diff<60) {
			return 'Il y a '.$diff.' sec';
		}
		else if($diff < 3600) {
			return 'Il y a '.round($diff/60, 0).' min';
		}
		else if($diff<10800) {
			return 'Il y a '.round($diff/3600, 0).' heures';
		}
		else {
			return 'Aujourd\'hui à '.date('H:i', $date);
		}
	}
	else if(date('Ymd', $date) == date('Ymd', strtotime('- 1 DAY'))) {
		return 'Hier à '.date('H:i', $date);
	}
	else {
		$dateFR = utf8_encode(strftime('%e ',$date));
	    $dateFR .= utf8_encode(ucfirst(strftime('%B %Y',$date)));
		return $dateFR;
	}
}

function datePassedAvecHeure($date)
{
	if(!ctype_digit($date)) {
		$date = strtotime($date);
	}
	if(date('Ymd', $date) == date('Ymd')) {
		$diff=time()-$date;
		if($diff<60) {
			return 'Il y a '.$diff.' sec';
		}
		else if($diff < 3600) {
			return 'Il y a '.round($diff/60, 0).' min';
		}
		else if($diff<10800) {
			return 'Il y a '.round($diff/3600, 0).' heures';
		}
		else {
			return 'Aujourd\'hui à '.date('H:i:s', $date);
		}
	}
	else if(date('Ymd', $date) == date('Ymd', strtotime('- 1 DAY'))) {
		return 'Hier à '.date('H:i:s', $date);
	}
	else {
		$dateFR = utf8_encode(strftime('%e ',$date));
	    $dateFR .= utf8_encode(strftime('%B %Y &#224 %R',$date));
		return $dateFR;
	}
}

function datetimeAvecHeure($datetimeFunct)
{
	$datetimeFunct= strip_tags($datetimeFunct);
	$datetimeFunctConversion = utf8_encode(ucfirst(strftime('%e ',strtotime($datetimeFunct))));
	$datetimeFunctConversion .= utf8_encode(ucfirst(strftime('%B %Y &#224 %R',strtotime($datetimeFunct))));
	return $datetimeFunctConversion;
}

function datetimeSansHeure($datetimesansheure)
{
	$datetimesansheure= strip_tags($datetimesansheure);
	$datetimesansheureConversion = utf8_encode(ucfirst(strftime('%e ',strtotime($datetimesansheure))));
	$datetimesansheureConversion .= utf8_encode(ucfirst(strftime('%B %Y',strtotime($datetimesansheure))));
	return $datetimesansheureConversion;
}

function datetimeSansHeureAbreg($datetimesansheure)
{
	$datetimesansheure= strip_tags($datetimesansheure);
	$datetimesansheureConversion = utf8_encode(ucfirst(strftime('%e ',strtotime($datetimesansheure))));
	$datetimesansheureConversion .= utf8_encode(ucfirst(strftime('%b %y',strtotime($datetimesansheure))));
	return $datetimesansheureConversion;
}

function up_error($code,$nom)
{
	switch ($code) {
		case '0' : $erreur = 'Pas d\'erreur';$valid = true;break;
		case '1' : $erreur = 'Votre fichier `'.$nom.'` dépasse la taille maximale d\'upload autorisée par PHP( '.get_cfg_var('upload_max_filesize').' )';$valid = false;break;
		case '2' : $erreur = 'Votre fichier dépasse la taille maximale demandée par le Webmestre';$valid = false;break;
		case '3' : $erreur = 'Le fichier n\'a pas été totalement uploadé !!!';$valid = false;break;
		case '4' : $erreur = 'Aucun fichier téléchargé !!!';$valid = false;break;
		default : $erreur = 'L\'upload a rencontré une erreur inconnue !!!';$valid = false; break;
	}
	$return[] = $valid;
	$return[] = $erreur;
	return $return;
}

function bddCountNbTable($table, $bdd)
{
    $tableCount=htmlspecialchars($table);
    $count=$bdd->query('SELECT COUNT(*) FROM '.$tableCount)->fetchColumn();
    return $count;
}
?>
