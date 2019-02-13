<center><?php
$titre = 'Crypteur/Decrypteur';
include('inc/entete.php');
$version = '2.0';
?>
<br/><br/>
<FORM action="" method="POST">

  <fieldset style="display: inline-block;">
    <legend>Clef</legend>
      <h4>Clef de crytage ou de decryptage (ex: Huj*78Jusi) :</h4>
      <INPUT type="text" name="eClefCrypt" required autofocus/>
  </fieldset>
  <br/><br/>
  <table>
    <tr>
	  <td>
		<fieldset>
		  <legend>Crypter</legend>
			<center>
			  <h4>Mot ou texte a crypter</h4>
			  <INPUT type="text" name="eNumCrypt"/>
			  <br/><br/>
			  <INPUT type="submit" name="bCrypter" value="Crypter"/>
			</center>
		</fieldset>
	  </td>
	  <td>

		<fieldset>
		  <legend>Decrypter</legend>
		    <center>
			  <h4>Mot ou texte a decrypter :</h4>
			  <INPUT type="text" name="eNumDecrypt"/>
			  <br/><br/>
			  <INPUT type="submit" name="bDecrypter" value="Décrypter" />
			</center>
		</fieldset>
	  </td>
	</tr>
  </table>

</FORM>


<?php


if (isset($_POST['bCrypter'])) {
	$maChaineACrypter = htmlspecialchars($_POST['eNumCrypt']);
	$maCleDeCryptage = htmlspecialchars($_POST['eClefCrypt']);

	// —————————————–
	// crypte une chaine (via une clé de cryptage)
	// —————————————–
	function crypter($maCleDeCryptage="", $maChaineACrypter){
	if($maCleDeCryptage==""){
	$maCleDeCryptage=$GLOBALS[‘PHPSESSID’];
	}
	$maCleDeCryptage = md5($maCleDeCryptage);
	$letter = -1;
	$newstr = "";
	$strlen = strlen($maChaineACrypter);
	for($i = 0; $i < $strlen; $i++ ){
	$letter++;
	if ( $letter > 31 ){
	$letter = 0;
	}
	$neword = ord($maChaineACrypter{$i}) + ord($maCleDeCryptage{$letter});
	if ( $neword > 255 ){
	$neword -= 256;
	}
	$newstr .= chr($neword);
	}
	return base64_encode($newstr);
	}



	$maChaineCrypter = crypter($maCleDeCryptage, $maChaineACrypter);

	echo "Chaine à Crypter => <b>".$maChaineACrypter."</b><br/>";
	echo "Clef de cryptage => <b>".$maCleDeCryptage."</b><br/>";
	echo "Chaine Crypter => <b>".$maChaineCrypter."</b><br/>";
}

if (isset($_POST['bDecrypter'])) {

	$maChaineCrypter = htmlentities($_POST['eNumDecrypt']);
	$maCleDeCryptage = htmlspecialchars($_POST['eClefCrypt']);


	// —————————————–
	// décrypte une chaine (avec la même clé de cryptage)
	// —————————————–
	function decrypter($maCleDeCryptage="", $maChaineCrypter){
	if($maCleDeCryptage==""){
	$maCleDeCryptage=$GLOBALS[‘PHPSESSID’];
	}
	$maCleDeCryptage = md5($maCleDeCryptage);
	$letter = -1;
	$newstr = "";
	$maChaineCrypter = base64_decode($maChaineCrypter);
	$strlen = strlen($maChaineCrypter);
	for ( $i = 0; $i < $strlen; $i++ ){
	$letter++;
	if ( $letter > 31 ){
	$letter = 0;
	}
	$neword = ord($maChaineCrypter{$i}) - ord($maCleDeCryptage{$letter});
	if ( $neword < 1 ){
	$neword += 256;
	}
	$newstr .= chr($neword);
	}
	return $newstr;
	}

	$maChaineDecrypter = decrypter($maCleDeCryptage, $maChaineCrypter);

	echo "Chaine Crypter => <b>".$maChaineCrypter."</b><br/>";
	echo "Clef de decryptage => <b>".$maCleDeCryptage."</b><br/>";
	echo "Chaine Decrypter => <b>".$maChaineDecrypter."</b><br/>";
}
include('inc/bas_de_page.php');
?>
</center>
