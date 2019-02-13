<?php 
//fonction nord
function nord($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($ligne-1>=0) 
			{
				$out = $plateau[$ligne-1][$col];
			}
			else 
			{
				$out = 0;
			}

		for($l=$ligne;$l >= 0 AND $out == $adv;$l--) 
		{
			//pour eviter de sortir du plateau
			if($l-1>=0) 
			{
				$out = $plateau[$l-1][$col];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($l-2>=0) 
				{
					$out2 = $plateau[$l-2][$col];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		}
	}
	return $resultat;
}


//fonction sud 
function sud($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($ligne+1<8) 
			{
				$out = $plateau[$ligne+1][$col];
			}
			else 
			{
				$out = 0;
			}

		for($l=$ligne;$l < 8 AND $out == $adv;$l++) 
		{
			//pour eviter de sortir du plateau
			if($l+1<8) 
			{
				$out = $plateau[$l+1][$col];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($l+2<8) 
				{
					$out2 = $plateau[$l+2][$col];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		}
	}
	return $resultat;
}


//fonction est
function est($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($col-1>=0) 
			{
				$out = $plateau[$ligne][$col-1];
			}
			else 
			{
				$out = 0;
			}

		for($c=$col;$c >= 0 AND $out == $adv;$c--) 
		{
			//pour eviter de sortir du plateau
			if($c-1>=0) 
			{
				$out = $plateau[$ligne][$c-1];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($c-2>=0) 
				{
					$out2 = $plateau[$ligne][$c-2];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		}
	}
	return $resultat;
}


//fonction ouest 
function ouest($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($col+1<8) 
			{
				$out = $plateau[$ligne][$col+1];
			}
			else 
			{
				$out = 0;
			}

		for($c=$col;$c < 8 AND $out == $adv;$c++) 
		{
			//pour eviter de sortir du plateau
			if($c+1<8) 
			{
				$out = $plateau[$ligne][$c+1];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($c+2<8) 
				{
					$out2 = $plateau[$ligne][$c+2];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		}
	}
	return $resultat;
}


//fonction nordest
function nordest($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($ligne-1>=0 AND $col-1>=0) 
			{
				$out = $plateau[$ligne-1][$col-1];
			}
			else 
			{
				$out = 0;
			}

		$c=$col;
		for($l=$ligne;$l >= 0 AND $out == $adv AND $c >= 0 AND $out == $adv;$l--) 
		{
			//pour eviter de sortir du plateau
			if($l-1>=0 AND $c-1>=0) 
			{
				$out = $plateau[$l-1][$c-1];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($l-2>=0 AND $c-2>=0) 
				{
					$out2 = $plateau[$l-2][$c-2];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
			$c--;
		}
	}
	return $resultat;
}


//fonction nordouest 
function nordouest($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($ligne-1>=0 AND $col+1<8) 
			{
				$out = $plateau[$ligne-1][$col+1];
			}
			else 
			{
				$out = 0;
			}

		$c=$col;
		for($l=$ligne;$l >= 0 AND $out == $adv AND $c < 8 AND $out == $adv;$l--) 
		{
			//pour eviter de sortir du plateau
			if($l-1>=0 AND $c+1<8) 
			{
				$out = $plateau[$l-1][$c+1];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($l-2>=0 AND $c+2<8) 
				{
					$out2 = $plateau[$l-2][$c+2];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		$c++;
		}
	}
	return $resultat;
}


//fonction sudest
function sudest($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($ligne+1<8 AND $col-1>=0) 
			{
				$out = $plateau[$ligne+1][$col-1];
			}
			else 
			{
				$out = 0;
			}

		$c=$col;
		for($l=$ligne;$l < 8 AND $out == $adv AND $c >= 0 AND $out == $adv;$l++) 
		{
			//pour eviter de sortir du plateau
			if($l+1<8 AND $c-1>=0) 
			{
				$out = $plateau[$l+1][$c-1];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($l+2<8 AND $c-2>=0) 
				{
					$out2 = $plateau[$l+2][$c-2];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		$c--;
		}
	}
	return $resultat;
}


//fonction sudouest
function sudouest($plateau,$ligne,$col,$joueur) {
	$resultat = false;
	if($joueur == 1) 
	{
		$adv = 2;
	}
	else 
	{
		$adv = 1;
	}
	if ($plateau[$ligne][$col] == 0 ) 
	{
		//pour eviter de sortir du plateau
			if($ligne+1<8 AND $col+1<8) 
			{
				$out = $plateau[$ligne+1][$col+1];
			}
			else 
			{
				$out = 0;
			}

		$c=$col;
		for($l=$ligne;$l < 8 AND $out == $adv AND $c < 8 AND $out == $adv;$l++) 
		{
			//pour eviter de sortir du plateau
			if($l+1<8 AND $c+1<8) 
			{
				$out = $plateau[$l+1][$c+1];
			}
			else 
			{
				$out = 0;
			}
			//verifie si la case suivante du bas et celle de l adversaire
			if($out==$adv) 
			{
				if($l+2<8 AND $c+2<8) 
				{
					$out2 = $plateau[$l+2][$c+2];
				}
				else 
				{
					$out2 = 0;
				}
				if ($out2==$joueur) 
				{
					$resultat = true;
				}
			}
		$c++;
		}
	}
	return $resultat;
}




//Fonction permettant de savoir qui a gagner
function gagnant($nbBlanc,$nbNoir) {
    if($nbBlanc>$nbNoir){
      echo 'Le joueur <span class="joueur2"></span> a gagné.</p><div class="spacer center"><div class="mask center"></div></div>';
    }
    elseif($nbNoir>$nbBlanc){
      echo 'Le joueur <span class="joueur1"></span> a gagné.</p><div class="spacer center"><div class="mask center"></div></div>';
    }
    else{
      echo 'C\'est un match nul.<div class="spacer center"><div class="mask center"></div></div>';
    }
  }
?>