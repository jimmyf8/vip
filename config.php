<?php
//CONNEXION BD
try{
    $bdd = new PDO('mysql:host=localhost;dbname=vip;charset=utf8', 'root', '');
}catch(Exception $e)
{
    die('Erreur'.$e->getMessage());
}