<?php
require_once('../../ressources/includes/connexion-bdd.php');

$page_courante = "articles";

$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    // On récupère les champs du formulaire
    $titre = htmlentities($_POST["titre"]);
    $chapo = htmlentities($_POST["chapo"]);
    $contenu = htmlentities($_POST["contenu"]);
    $image = "https://placehold.co/600x400"; // Image par défaut en attendant la gestion d'upload
    $auteur_id = 1; // On assigne l'article au premier auteur par défaut

    // Requête pour créer une nouvelle entrée dans la table article
    $requete_brute = "
        INSERT INTO article (titre, chapo, contenu, image, auteur_id, date_creation) 
        VALUES ('$titre', '$chapo', '$contenu', '$image', '$auteur_id', NOW())
    ";

    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);

    if ($resultat_brut) {
        // Redirection vers la liste pour voir le nouvel article apparaître
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Créer un article - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <h1 class="text-3xl font-bold text-gray-900">Créer un nouvel article</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre" id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="col-span-12">
                            <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea name="chapo" id="chapo" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="col-span-12">
                            <label for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                            <textarea name="contenu" id="contenu" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="mb-3 col-md-6">
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer l'article</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>