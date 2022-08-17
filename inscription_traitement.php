<?php
// TRAITER LES DONNEES D'INSCRIPTION
require_once 'config.php';

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    //faille xss
    $pseudo          = htmlspecialchars($_POST['pseudo']);
    $email           = htmlspecialchars($_POST['email']);
    $password        = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    //verifier présence utilisateur
    $check =$bdd->prepare('SELECT pseudo, email, password FROM users WHERE email = ?');
    $check->execute(array($email));
    //stocker les données dans data
    $data =$check->fetch();
    //rechercher s'il y a une table
    $row =$check->rowCount();
    //personne n'existe pas
    if($row == 0){
        if(strlen($pseudo) <=100){
            if(strlen($email) <=100){
                //email valide
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if($password == $password_retype){
                        //hash
                        $password = hash('sha256',$password);
                        $ip       = $_SERVER['REMOTE_ADDR'];
                        $insert   = $bdd->prepare('INSERT INTO users(pseudo, email, password, ip) VALUES(:pseudo, :email, :password, :ip)');
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'email' => $email,
                            'password' => $password,
                            'ip' => $ip
                        )); 
                        header('location: inscription.php?reg_err=success');
                        
                    }else header('location: inscription.php?reg_err=password'); 
                }else header('location: inscription.php?reg_err=email'); 
            }else header('location: inscription.php?reg_err=pseudo_length');
        }else header('location: inscription.php?reg_err=pseudo_length');
    }else header ('location: inscription.php?reg_err=already');

}