<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indx.css">
    <title>Document</title>
</head>
<body>

<nav>
  <ul>
  <li><a href="index.php">Accueil</a></li>
    <li class="deroulant"><a href="#">Livre D'or &ensp;</a>
      <ul class="sous">
                    <?php 
        if (isset($_SESSION["id"])) {
        echo "<li><a href='commentaire.php'>Laissez un Avis</a></li>";
        echo "<li><a href='livreor.php'>Avis</a></li>"; 
         } else {
        echo "<li><a href='livreor.php'>Avis</a></li>";
       
    };
        ?>
        </ul>
    </li>
    
    <li class="deroulant"><a href="#">Mon espace &ensp;</a>
      <ul class="sous">
      <?php 
        if (isset($_SESSION["id"])) {
        echo "<li><a href='profil.php'>Modifiez profil</a></li>";
        echo "<li><a href='crash.php'>Deconnexion</a></li>"; 
         } else {
        echo "<li><a href='inscription.php'>Inscription</a></li>";
        echo "<li><a href='connexion.php'>Connexion</a></li>"; 
       
    };
        ?>
  </ul>
</nav>

<div class="conteneur">
</div>

</body>
</html>