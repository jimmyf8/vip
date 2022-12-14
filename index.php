<!--FORMULAIRE-->
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><!--bootstrap-->
            <link rel="stylesheet" href="css/style.css">
            <title>Connexion</title><!--titre-->
        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['login_err'])){
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err){
                        case 'password':
                            ?>
                                <div class="alert alert-danger"
                                    <p><strong>Erreur </strong>mot de passe incorrect</p>
                                </div>
                            <?php
                        break;

                        case 'email':
                            ?>
                                <div class="alert alert-danger"
                                    <p><strong>Erreur </strong>email incorrect</p>
                                </div>
                            <?php
                        break;

                        case 'already':
                            ?>
                                <div class="alert alert-danger"
                                    <p><strong>Erreur </strong>compte non existant</p>
                                </div>
                            <?php
                        break;
                    }
                }
            ?>
            <form action="connection.php" method="post"><!--envoi vers connexion.php-->
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off"><!--email-->
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off"><!--password-->
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off"><!--password-->
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button><!--bouton-->
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Inscription</a></p><!--inscription-->
        </div>
        </body>
</html>