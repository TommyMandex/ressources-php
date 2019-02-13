<?php
$titre = 'Date&Heure';
include('inc/entete.php');
?>
<center><p id="texteA">
<?php

echo 'Nous sommes le ' .date('d/m/y'). ' et il est ' .date('H:i:s');

?>
</p></center>
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
