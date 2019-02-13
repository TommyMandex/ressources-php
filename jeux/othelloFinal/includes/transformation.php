<?php
function transformation(&$plateau,$ligne,$col,$joueur) {
	if($joueur == 1) {
		$adv = 2;
	} else {
		$adv = 1;
	}
	// Transformation sud
	if(sud($plateau,$ligne,$col,$joueur)) {
		for($l = $ligne;$l < 8 AND $plateau[$l+1][$col] == $adv;$l++) {
			$plateau[$l+1][$col] = $joueur;
		}
	}


	// Transformation nord
	if(nord($plateau,$ligne,$col,$joueur)) {
		for($l = $ligne;$l >= 0 AND $plateau[$l-1][$col] == $adv;$l--) {
			$plateau[$l-1][$col] = $joueur;
		}
	}

	// Transformation est
	if(est($plateau,$ligne,$col,$joueur)) {
		for($c = $col;$c >= 0 AND $plateau[$ligne][$c-1] == $adv;$c--) {
			$plateau[$ligne][$c-1] = $joueur;
		}
	}
	
	// Transformation ouest
	if(ouest($plateau,$ligne,$col,$joueur)) {
		for($c = $col;$c < 8 AND $plateau[$ligne][$c+1] == $adv;$c++) {
			$plateau[$ligne][$c+1] = $joueur;
		}
	}

	// Transformation sudest
	if(sudest($plateau,$ligne,$col,$joueur)) {
		$c = $col;
		for($l = $ligne;$l < 8 AND $c >= 0 AND $plateau[$l+1][$c-1] == $adv;$l++) {
			$plateau[$l+1][$c-1] = $joueur;
			$c--;
		}
	}

	// Transformation sudouest
	if(sudouest($plateau,$ligne,$col,$joueur)) {
		$c=$col;
		for($l = $ligne;$l < 8 AND $c < 8 AND $plateau[$l+1][$c+1] == $adv;$l++) {
			$plateau[$l+1][$c+1] = $joueur;
			$c++;
		}
	}

	// Transformation nordest
	if(nordest($plateau,$ligne,$col,$joueur)) {
		$c=$col;
		for($l = $ligne;$l >= 0 AND $c >= 0 AND $plateau[$l-1][$c-1] == $adv;$l--) {
			$plateau[$l-1][$c-1] = $joueur;
			$c--;
		}
	}

	// Transformation nordouest
	if(nordouest($plateau,$ligne,$col,$joueur)) {
		$c=$col;
		for($l = $ligne;$l >= 0 AND $c < 8 AND $plateau[$l-1][$c+1] == $adv;$l--) {
			$plateau[$l-1][$c+1] = $joueur;
			$c++;
		}
	}
	$plateau[$ligne][$col]=$joueur;
}
?>


