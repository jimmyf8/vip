<?php
//TRAITER LES DONNEES DU FORMULAIRE
session_start();
require_once 'config.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
    //faille xss
    $email    = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    //verifier présence utilisateur
    $check =$bdd->prepare('SELECT pseudo, email, password FROM users WHERE email = ?');
    $check->execute(array($email));
    //stocker les données dans data
    $data =$check->fetch();
    //rechercher s'il y a une table
    $row =$check->rowCount();
    //personne existe
    if($row == 1){
        //email valide
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //hash
            $password = hash('sha256',$password);
            if($data['password'] === $password){
                $_SESSION['user'] = $data['pseudo'];
                header('location: landing.php');
            }else header('location: index.php?login_err=password');
        }else header('location: index.php?login_err=email');
    }else header('location: index.php?login_err=already');
}else header('location: index.php');