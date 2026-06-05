<?php
$couleur_bulle_classe = "vert";
$page_active = "apropos";

require_once('./ressources/includes/connexion-bdd.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos - SAÉ 203</title>
    <link rel="icon" type="image/png" href="ressources/images/favicon.png">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">

    <link rel="stylesheet" href="./ressources/css/a-propos.css">
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

    <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
    <main class="conteneur-principal conteneur-1280">
        <ul class="liste-ancres">
            <li><a href="./a-propos.php#presentation">Présentation</a></li>
            <li><a href="./a-propos.php#sae">SAÉ</a></li>
            <li class="dernier"><a href="./a-propos.php#exemple-sae">Exemples de SAÉ</a></li>
        </ul>

        <section>
            <p class="paragraphe" id="presentation">
                Le BUT métiers du multimédia et de l'internet (MMI) remplace le DUT MMI à partir de la rentrée 2021, auparavant appelé DUT SRC (services et réseaux de communication) jusqu'en mai 2013, qui était lancé à la rentrée universitaire 1994 par les IUT de Vélizy, Marne-la-Vallée, Saint-Raphaël et Verdun. Ce BUT offre une alternative aux anciens diplômes Bac+3, tels que la licence professionnelle en activités et techniques de communication et la licence professionnelle en systèmes informatiques et logiciels.
            </p>
            <p class="paragraphe">
                Lorsque cette formation était proposée sous la forme d'un Diplôme Universitaire Technologique (DUT), elle se déroulait sur deux années (1 800 heures). En théorie, elle est accessible à tous les bacheliers, quelle que soit leur série. En moyenne, il y a de 30 à 35 heures de cours par semaine. Cette formation se divise en trois grands pôles, auxquels il faut ajouter le projet tutoré (300 heures) et les stages (420 heures). Les trois grands axes sont les suivants :
            </p>

            <ul class="liste-axes">
                <li>La culture contemporaine et langues étrangères (500 heures) </li>
                <li>La culture scientifique et technique (700 heures) </li>
                <li>La culture communicationnelle (600 heures)</li>
            </ul>
        </section>

        <div class="img-quebec">
            <img src="ressources/images/img-quebec.jpeg" alt="">
        </div>

        <section>
            <p class="paragraphe">
                A CY Cergy Paris Université, il est donné la possibilité aux étudiants de passer un semestre au Québec à l'Université du Québec à Chicoutimi (UQAC) dans une formation dont le contenu est proche de celui proposé à l'IUT. Il est également possible d'effectuer ce semestre après avoir été diplômé. <span class="texte-gras">Attention : les cours sont dispensés en langue française.</span>
            </p>
        </section>

        <p class="titre" id="sae">Situation d'Apprentissage et d'Évaluation</p>

        <section>
            <p class="paragraphe">
                Dans l’optique de préparer au mieux les étudiants à leur future vie professionnelle, les étudiants sont regroupés en agences de communication de 3 à 7 personnes dans des projets appelés "SAÉ" ou Situation d'Apprentissage et d'Évaluation. Ces agences ont pour but d’encourager le travail d’équipe dans un cadre reprenant l'environnement du travail en entreprise.
            </p>
            <p class="paragraphe">
                La situation d'apprentissage et d'évaluation ou simplement SAÉ est la situation didactique que privilégie, au Québec, le Ministère de l'Éducation, Enseignement supérieur et Recherche (MEESR) par le biais du Programme de formation de l'école québécoise (PFEQ). Une SAÉ se définit comme un ensemble constitué d’une ou plusieurs tâches à réaliser par l’élève en vue d’atteindre le but fixé. Elle permet : à l’élève, de développer et d’exercer une ou plusieurs compétences disciplinaires et transversales; à l’enseignant, d’assurer le suivi du développement des compétences dans une perspective d’aide à l’apprentissage. Elle est donc centrée sur l'élève et préconise une approche constructiviste ou socioconstructiviste à l'école.
            </p>
            <p class="paragraphe">
                Les SAÉ sont une nouveauté des diplômes BUT, <span class="texte-gras">elles visent à remplacer les Devoirs Sur Table et les notes à terme,</span> en proposant une approche plus "ingénieure" de la scolarité avec des étudiants qui apprennent à résoudre des problèmes et non plus apprendre par cœur leurs cours.
            </p>
        </section>

        <p class="titre" id="exemple-sae">Exemples de projets réalisés en SAÉ</p>

                <div class="cards">
                    <article class="card">
                        <img src="https://static.vitrine.ynov.com/cdn-cgi/image/width=1240,height=693,fit=cover,format=auto/var/site/storage/images/5/2/7/8/38725-1-fre-FR/84287b4d270c-communication-digitale.jpg" alt="Audit communication">
                        <div class="card-content">
                            <h3>Auditer une communication numérique • SAÉ 101</h3>
                            <p>Apprendre les bases du reportage vidéo sur un sujet libre.</p>
                        </div>
                    </article>

                    <article class="card">
                        <img src="https://www.comundi.fr/mag-des-competences/wp-content/uploads/2024/04/5-conseils-essentiels-pour-une-strategie-digitale-reussie.jpg" alt="Recommandation numérique">
                        <div class="card-content">
                            <h3>Concevoir une recommandation de communication numérique • SAÉ 102</h3>
                            <p>Apprendre les bases du reportage vidéo sur un sujet libre.</p>
                        </div>
                    </article>

                    <article class="card">
                        <img src="https://h2u8a9f7.delivery.rocketcdn.me/wp-content/uploads/communication-visuelle.jpg.webp" alt="Communication visuelle">
                        <div class="card-content">
                            <h3>Produire les éléments d'une communication visuelle • SAÉ 103</h3>
                            <p>Apprendre les bases du reportage vidéo sur un sujet libre.</p>
                        </div>
                    </article>

                    <article class="card">
                        <img src="https://bc-user-uploads.brandcrowd.com/public/media-Production/2c36a2f3-acb8-48bd-818e-dfeffdb44045/9e043093-19ab-46e9-952e-21d66036cee2_2x" alt="Contenu audio vidéo">
                        <div class="card-content">
                            <h3>Produire un contenu audio et vidéo • SAÉ 104</h3>
                            <p>Apprendre les bases du reportage vidéo sur un sujet libre.</p>
                        </div>
                    </article>

                    <article class="card">
                        <img src="https://www.codeur.com/blog/wp-content/uploads/2021/01/creation-site.jpg" alt="Site Web">
                        <div class="card-content">
                            <h3>Produire un site web • SAÉ 105</h3>
                            <p>Apprendre les bases du reportage vidéo sur un sujet libre.</p>
                        </div>
                    </article>

                    <article class="card">
                        <img src="https://jjp-communication.com/wp-content/uploads/2024/10/art-11-im-1.jpg" alt="Gestion de projet">
                        <div class="card-content">
                            <h3>Gérer un projet de communication numérique • SAÉ 106</h3>
                            <p>Apprendre les bases du reportage vidéo sur un sujet libre.</p>
                        </div>
                    </article>
                </div>

        </section>
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
