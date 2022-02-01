<?php
$title = 'Livre d\'or';

session_start();

$connect= mysqli_connect("localhost", "root", "", "livreor");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
    
    <title>Document</title>

<?php include("include/header.php") ?>
<main>


<?php

//Affichage des messages du livre d'or//
$req = mysqli_query($connect, "SELECT commentaires.date, commentaires.commentaire, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC");
$nbLignes = mysqli_num_rows($req);

if ($nbLignes > 0) {
    while ($row = mysqli_fetch_assoc($req)) {
        $nom = $row['login'];
        $comm = $row['commentaire'];
        $date = date_create($row['date']);
        $comm = nl2br($comm);

        echo ' <h5>Posté le ' .
            date_format($date, 'd/m/Y \à H:i:s') . ' par ' .  '<span class="user">' . $nom . '</span>:</h5><p style="white"><br>' .
            $comm . '</p><hr>';
    }
} else {
    echo "Aucun message n'a été publié pour le moment";
}
?>
</main>
<footer>
<?php include("include/footer.php") ?>
</footer>