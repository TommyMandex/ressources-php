<?php
$text="";
$new="";
$fichier="blocnote.txt";

if(!file_exists($fichier)){
$h=fopen($fichier,'w+');
fclose($h);
}else{
}

if(isset($_POST['sa'])){ 
	echo 'reussi';
$new=$_POST['bloc'];
$h=fopen($fichier,'w');
fputs($h,$new);
fclose($h);
$new="";$_POST['bloc']="";
}else{
}

$t[]=fread($h=fopen($fichier,'r'),filesize($fichier));
  foreach($t as $ligne){
  $text.=$ligne."\n";
  }
fclose($h);
?>
<form method="post" action="">
<textarea name="bloc" cols="51" rows="30"><?php echo $text;?></textarea>

<input type="submit" name="sa">


</form>