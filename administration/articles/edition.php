<?php
require_once('../../ressources/includes/connexion-bdd.php');

$page_courante = "articles";

$formulaire_soumis = !empty($_POST);
$id_present_url = array_key_exists("id", $_GET);

$entite = null;
if ($id_present_url) {
    $id = $_GET["id"];
    // On cherche l'article à éditer
    $requete_brute = "SELECT * FROM article WHERE id = $id";
    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);
    $entite = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC);
}

if ($formulaire_soumis) {
    $id = $_POST["id"];
    $titre = htmlentities($_POST["titre"]);
    $chapo = htmlentities($_POST["chapo"]);
    $contenu = htmlentities($_POST["contenu"]);

    // Requête SQL pour mettre à jour l'article
    $requete_brute = "
        UPDATE article
        SET
            titre = '$titre',
            chapo = '$chapo',
            contenu = '$contenu'
        WHERE id = '$id'
    ";
    
    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);

    if ($resultat_brut === true) {
        // Redirection vers la liste après succès
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Editer article - Administration</title>
</head>

<body>
<?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header style="view-transition-name: article-<?php echo $id; ?>" class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <p class="text-3xl font-bold text-gray-900">Editer "<?php echo $entite['titre'] ?? ''; ?>"</p>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <div class="py-6">
                <?php if ($entite) { ?>
                    <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                        <section class="grid gap-6">
                            <input type="hidden" value="<?php echo $entite['id']; ?>" name="id">
                            
                            <div class="col-span-12">
                                <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                                <input type="text" name="titre" value="<?php echo $entite['titre']; ?>" id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div class="col-span-12">
                                <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                                <textarea name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo" rows="3"><?php echo $entite['chapo']; ?></textarea>
                            </div>

                            <div class="col-span-12">
                                <label for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                                <textarea name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu" rows="10"><?php echo $entite['contenu']; ?></textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Enregistrer les modifications</button>
                            </div>
                        </section>
                    </form>
                <?php } else { ?>
                    <p class="text-red-500">Article introuvable.</p>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>