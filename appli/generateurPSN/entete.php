
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8"/>

<title>
<?php 
echo $titre; 
?>
</title>
<style>
html, body {
    height: 100%;
    margin: 0; padding: 0;
}
body {
    display : table;
    width: 100%;
	background: rgb(32,32,32);
	color: #c8c8c8;
}
footer {
    display : table-row;
	background: black;
	border-top: 2px solid rgba(255,255,255,0.2);
}
body {position: relative;}
footer {position: absolute; bottom: 0; left: 0; right: 0}

.basDePageCss {
    padding: 9px; 
	color: white;
}
.basDePageCssL {
	float:left;
}
.basDePageCssR {
	float:right;
}

a { 
	color: white;
	text-decoration: none;
}

a:hover {
	color: rgb(72, 132, 192);
	text-decoration: none;
}
</style>
</head>
<body>

