<?php
session_start();
?>

<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>site</title>
</head>
    <body>
    <?php include("include/header.php") ?>
       <main>
        <form action="inscription.php" method="POST" class="formulaire">
            <p>
                Inscrivez-vous <br/>  <br/>
                <label for="login">Login</label>
                <input type="text" name="login" id="login"><br/>
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password"><br/>
                <label for="confpw">Confirmation Mot de Passe</label>
                <input type="password" name="confpw" id="confpw"><br/>
                <input type="submit" value="S'inscrire" name="inscription" class="submit">
            </p>
        
        <?php
          $bdd= mysqli_connect("localhost", "root", "", "livreor");

            if (isset($_SESSION['login']) == false)
            {
                if (isset($_POST['inscription']))
                {
                    $login = $_POST['login'];
                    $mdp = $_POST['password'];
					
					
					$conf = $_POST['confpw']; 

                    $checklogin = "SELECT login FROM utilisateurs WHERE login = '$login'";
                    $query = mysqli_query($bdd, $checklogin);
                    $veriflogin = mysqli_fetch_all($query);

                    if (empty($veriflogin))
                    {

                        if ($_POST['password'] == $_POST['confpw'])
                        {
                          
                            $ajoutbdd = 'INSERT INTO utilisateurs (login, password) VALUES ("'.$login.'", "'.$mdp.'")';
                            $ajout = mysqli_query($bdd, $ajoutbdd);
                            echo '<p style="white">Inscriptions réussie.<br/>
                                    Allez vous connectez pour mettre un avis sur le livre d or.</p>';

                        }
                        else
                        {
                           echo '<p style="white">La mot de passe et sa confirmation ne sont pas semblable. Réessayez.</p>';
                        }
                    }
                    else
                    {   
                        echo '<p style="white">login pas disponible ou champ non remplie, trouvez-en un autre.</p>';
                    }
                }
         
                mysqli_close($bdd);
            }
            else
            {
                
        ?>
            
            
        <?php
            }
        ?>
        </form>
        </main>
        <footer>
  <?php include("include/footer.php") ?>
</footer>
       