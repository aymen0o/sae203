<?php
$couleur_bulle_classe = "rose";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

$id = $_GET['id'];
$requete_brute = "
    SELECT * FROM article
    WHERE article.id = $id
";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);
$entite = mysqli_fetch_array($resultat_brut);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $entite["titre"]; ?> - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    <link rel="icon" type="image/png" href="ressources/images/favicon.png">
    <link rel="stylesheet" href="./ressources/css/accueil.css">
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

    <main class="conteneur-principal conteneur-1280">
        <article>
            <h1 class="titre"><?php echo $entite["titre"]; ?></h1>
            <p class="chapo"><?php echo $entite["chapo"]; ?></p>
            
            <img src="./ressources/images/<?php echo $entite["image"]; ?>" alt="">

            <div class="contenu">
                <?php echo $entite["contenu"]; ?>
            </div>
            
            <?php if (!empty($entite["lien_yt"])) : ?>
                <div class="video">
                    <iframe width="560" height="315" src="<?php echo $entite["lien_yt"]; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            <?php endif; ?>
        </article>
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>