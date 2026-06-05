<?php
require_once "../../ressources/includes/connexion-bdd.php";

$page_courante = "auteurs";

$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    if (
        isset(
            $_POST["prenom"],
            $_POST["nom"],
            $_POST["lien_avatar"],
            $_POST["lien_twitter"]
        )
    ) {
        // On récupère et sécurise les données
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prenom"]);
        $lien_avatar = htmlentities($_POST["lien_avatar"]);
        $lien_twitter = htmlentities($_POST["lien_twitter"]);

        // Requête d'insertion (Vérifie bien l'ordre : prenom, nom)
        $requete_brute = "
            INSERT INTO auteur(prenom, nom, lien_avatar, lien_twitter)
            VALUES ('$prenom', '$nom', '$lien_avatar', '$lien_twitter')
        ";
        
        $resultat_brut = mysqli_query($mysqli_link, $requete_brute);

        if ($resultat_brut === true) {
            // Redirection vers la liste des auteurs après la création réussie
            header("Location: index.php");
            exit();
        } else {
            // Optionnel : message d'erreur si la requête échoue
            $erreur = "Erreur lors de la création de l'auteur.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once('../ressources/includes/head.php'); ?>
    <title>Création auteur - Administration</title>
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <h1 class="text-3xl font-bold text-gray-900">Créer un nouvel auteur</h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <div class="py-6">
                <?php if (isset($erreur)): ?>
                    <p class="mb-4 text-red-600 font-bold"><?php echo $erreur; ?></p>
                <?php endif; ?>

                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nom" required>
                        </div>
                        <div class="col-span-12">
                            <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom" required>
                        </div>
                        <div class="col-span-12">
                            <label for="avatar" class="block text-lg font-medium text-gray-700">Lien avatar</label>
                            <input type="url" name="lien_avatar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="avatar" placeholder="https://...">
                            <p class="text-sm text-gray-500 mt-1">URL de l'image (ex: Gravatar ou lien externe).</p>
                        </div>
                        <div class="col-span-12">
                            <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Lien Twitter</label>
                            <input type="url" name="lien_twitter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_twitter" placeholder="https://twitter.com/...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="font-medium rounded-md bg-indigo-600 py-2 px-4 text-lg text-white shadow-sm hover:bg-indigo-700">Enregistrer l'auteur</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>