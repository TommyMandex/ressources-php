<?php
$ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
if($query && $query['status'] == 'success') 
{
    //code avec les variables
    echo "Votre IP est : ".$ip."<br/>";
    echo "Pays : " . $query['country']."<br/>";
    echo "Région : " . $query['regionName']."<br/>";
    echo "Ville : " . $query['city']."<br/>";
    echo "Longitude : " . $query['lon']."<br/>";
    echo "Lattitude : " . $query['lat']."<br/>";
    echo "Time zone : " . $query['timezone']."<br/>";
}
?>