<?php
$titre = 'Transformer une date de naissance en âge';
include('inc/entete.php');

function DateAgeFR($DateNaissance)
{
    $DateNaissance = explode("/", $DateNaissance);
    $Date = explode("/", date("d/m/Y"));

    if (($DateNaissance[1] <= $Date[1]) && ($DateNaissance[0] <= $Date[0])) $Age = $Date[2] - $DateNaissance[2];
    else $Age = $Date[2] - $DateNaissance[2] - 1;

    return $Age;
}
?>
<center>
<h2 id="texteA">Transformer une date de naissance en âge</h2>
<?php
if (isset($_POST['bValider']))
{
	$DateNaissance = htmlspecialchars($_POST['eDate']);
	echo DateAgeFR($DateNaissance).' ans';
}
?>
<br/><br />
<form method="post" action="">
	<label>Entrez une date de naissance en respectant le format suivant (dd/mm/yyyy) : </label><input type="text" name="eDate" placeholder="dd/mm/yyyy" required autofocus/><br /><br />
	<INPUT class="btn" type="submit" name="bValider" value="Calculer" />       
</form>
</center>
<style>
#texteA {
    background-color: rgb(44, 44, 44);
    padding: 12px;
    text-align: center;
    -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25), 0 1px 5px black inset;
    -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25), 0 1px 5px black inset;
    -khtml-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25), 0 1px 5px black inset;
    box-shadow: 0px 1px 0px rgba(255,255,255,0.25), inset 0px 1px 5px black;
	width: 85%;
	border-radius: 10px;
	font-size: 16pt;
}
</style>
<?php
$version = '1.0';
include('inc/bas_de_page.php');
?>
