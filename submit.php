<?php
$title = 'Traitement commentaire';

session_start();

$bdd= mysqli_connect("localhost", "root", "", "livreor");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include("include/header.php") ?>
<main>
<?php


if (isset($_POST["envoyer"])) {

$id = $_SESSION["id"];
// récupérer le message et supprimer les antislashes ajoutés par le formulaire
$comm = strip_tags($_REQUEST['comm']); // j'utilise la fonction strip_tags pour qu'on ne puisse pas utiliser de balises html dans l'input
$time = date("Y-m-d H:i:s");
$query = "INSERT INTO commentaires (commentaire, id_utilisateur, date)
            VALUES ('$comm', '$id', '$time')";
$res = mysqli_query($bdd, $query);

if (isset($res)) {
    echo "<div class='sucess'>
         <h3>Vous avez envoyé le commentaire avec succès.</h3>
         <p>Vous allez être redirigés vers le livre d'or.</p>
         </div>";
    header("refresh:2; url=livreor.php");
} else {
    echo "L'envoi du commentaire a échoué";
}
}
?>
</main>
<footer>
  <?php include("include/footer.php") ?>
</footer>