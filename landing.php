<!--ESPACE MEMEBRE-->
<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('location: index.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="landing">
        <div class="card" style="min-width:8rem;">
            <img src="..." class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title"><h1 class="p-1">Bonjour <?php echo $_SESSION['user']; ?> !</h1></h5>
                <p class="card-text">Que vas-tu poster aujourd'hui?</p>
                <a href="deconnection.php" class="btn btn-primary">Déconnexion</a>
            </div>
        </div>




    

   
                        <!-- Button trigger modal -->
                       
  </body>
</html>