<?php
$couleur_bulle_classe = "vert";
$page_active = "equipe";

require_once('./ressources/includes/connexion-bdd.php');

// Requête pour récupérer les membres de l'équipe
$requete_equipe = "SELECT * FROM auteur";
$resultat_equipe = mysqli_query($mysqli_link, $requete_equipe);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipe de rédaction - SAÉ 203</title>
    <link rel="icon" type="image/png" href="ressources/images/favicon.png">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    
    <link rel="stylesheet" href="./ressources/css/a-propos.css">

    <style>
    /* On cible les éléments qui ont la classe "vert" et on tourne la roue des couleurs ! */
    .vert {
        filter: hue-rotate(120deg) saturate(1.2);
    }
</style>
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

    <main class="conteneur-principal conteneur-1280">
        <p class="titre">L'équipe derrière le projet</p>

        <section>
            <div class="cards">
                <?php 
                while ($membre = mysqli_fetch_assoc($resultat_equipe)) { 
                    $avatar = !empty($membre['lien_avatar']) ? $membre['lien_avatar'] : 'https://placehold.co/150x150?text=Avatar'; 
                ?>
                    <article class="card">
                        <img src="<?php echo $avatar; ?>" alt="Avatar de <?php echo $membre['prenom']; ?>">
                        <div class="card-content">
                            <h3><?php echo $membre['prenom'] . ' ' . $membre['nom']; ?></h3>
                            <?php if(!empty($membre['lien_twitter'])) { ?>
                                <p>
                                    <a href="<?php echo $membre['lien_twitter']; ?>" target="_blank" style="color: #2563eb; text-decoration: underline;">
                                        Voir le profil X
                                    </a>
                                </p>
                            <?php } ?>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </section>
    </main>

    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>