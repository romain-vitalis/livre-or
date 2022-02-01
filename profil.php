<?php

session_start();
$id = $_SESSION["id"];
$bdd= mysqli_connect("localhost", "root", "", "livreor");


$req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");

$res= mysqli_fetch_all($req,MYSQLI_ASSOC);

$login = $res[0]['login'];

$password = $res[0]['password']; 


if (isset($_POST['env']))
{
   
    $nom1 = $_POST['nom'];
    $prenom1 = $_POST['prenom'];
    $password1 = $_POST['password'];
    $login1 = $_POST['login'];
    $req2= mysqli_query($bdd,"UPDATE utilisateurs SET login='$login1', password='$password1' WHERE  id = $id ");
    header("Location: profil.php");
} 





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>
    <main>
<?php include("include/header.php") ?>
<form name="formu" action="" method="post">
    <p>
        Modifie ton profil<br/><br/>
        <label for="login">Login</label>
                <input type="text" name="login" value="<?php echo $login?>" id="login"><br/>
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" value="<?php echo $login?>" id="password"><br/>
        <input type=submit value="Envoyer" name="env"><br/>
    </form>
    </div>
</main>
    <footer>
    <?php include("include/footer.php") ?>
</footer>
</body>
</html>
</html>


