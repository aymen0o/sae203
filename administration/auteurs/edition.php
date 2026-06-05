<?php
// Importe le fichier qui permet d'établir la connexion à la base de données
require_once '../../ressources/includes/connexion-bdd.php';

// Définit le nom de la page active, souvent utilisé pour mettre en surbrillance l'onglet dans le menu de navigation
$page_courante = 'auteurs';

// Vérifie si le formulaire d'édition a été cliqué/envoyé (renvoie 'true' si $_POST contient des données)
$formulaire_soumis = !empty($_POST);
// Vérifie si le lien sur lequel on a cliqué contient bien un ID d'auteur (ex: edition.php?id=3)
$id_present_url = array_key_exists('id', $_GET);

// Initialise une variable à "vide" qui servira à stocker les informations de l'auteur plus tard
$entite = null;

// --- PREMIÈRE PARTIE : AFFICHAGE DE L'AUTEUR (Quand on arrive sur la page) ---
if ($id_present_url) {
    // Récupère la valeur de l'ID qui se trouve dans l'URL
    $id = $_GET["id"];
    // Prépare une requête SQL pour aller chercher toutes les informations de cet auteur précis
    $requete_brute = "SELECT * FROM auteur WHERE id = $id";
    // Demande à la base de données d'exécuter cette requête
    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);
    // Convertit le résultat de la base de données en un tableau PHP exploitable (titre, nom, prenom...)
    $entite = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC);
}

// --- DEUXIÈME PARTIE : MODIFICATION DE L'AUTEUR (Quand on valide le formulaire) ---
if ($formulaire_soumis) {
    // Récupère les données envoyées par le formulaire
    $id = $_POST["id"];
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $lien_avatar = htmlentities($_POST["lien_avatar"]);
    $lien_twitter = htmlentities($_POST["lien_twitter"]);

    // Prépare la requête SQL pour mettre à jour l'auteur
    $requete_brute = "
        UPDATE auteur
        SET
            nom = '$nom',
            prenom = '$prenom',
            lien_avatar = '$lien_avatar',
            lien_twitter = '$lien_twitter'
        WHERE id = '$id' 
    ";

    // Lance l'exécution de la mise à jour dans la base de données
    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);

    // Vérifie si l'enregistrement s'est fait avec succès et redirige pour voir les changements
    if ($resultat_brut === true) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once '../ressources/includes/head.php'; ?>
    <title>Editeur auteur - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    
    <header style="view-transition-name: auteur-<?php echo $id; ?>" class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <p class="text-3xl font-bold text-gray-900">Editer
                "<?php echo $entite['nom'] ?? ''; ?> <?php echo $entite['prenom'] ?? ''; ?>"
            </p>
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
                                <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                                <input type="text" value="<?php echo $entite['nom']; ?>" name="nom" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nom" required>
                            </div>
                            
                            <div class="col-span-12">
                                <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
                                <input type="text" value="<?php echo $entite['prenom']; ?>" name="prenom" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom" required>
                            </div>
                            
                            <div class="col-span-12">
                                <label for="avatar" class="block text-lg font-medium text-gray-700">Lien avatar</label>
                                <input type="url" value="<?php echo $entite['lien_avatar']; ?>" name="lien_avatar" class="block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="avatar">
                                <p class="text-sm text-gray-500">Mettre l'URL de l'avatar (chemin absolu)</p>
                            </div>
                            
                            <div class="col-span-12">
                                <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Lien twitter</label>
                                <input type="url" value="<?php echo $entite['lien_twitter']; ?>" name="lien_twitter" class="block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="lien_twitter">
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 focus-within:bg-indigo-700">Enregistrer les modifications</button>
                            </div>
                        </section>
                    </form>
                <?php } else { ?>
                    <p class="text-red-500 font-bold">Auteur introuvable.</p>
                <?php } ?>
            </div>
        </div>
    </main>
    
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>