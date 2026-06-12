<?php
session_start();

// On inclut la connexion BDD (qui charge aussi les variables d'environnement pour le head.php)
require_once("../ressources/includes/connexion-bdd.php");

$erreur = "";

if (!empty($_POST)) {
    $mot_de_passe = $_POST["mot_de_passe"];

    // On vérifie le mot de passe
    if ($mot_de_passe === "mmi203") {
        $_SESSION['admin_connecte'] = true;
        header("Location: articles/index.php");
        exit();
    } else {
        $erreur = "Mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once("ressources/includes/head.php"); ?>
    <title>Connexion - Administration</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <main class="w-full max-w-md">
        <form method="POST" action="" class="rounded-lg bg-white p-8 shadow-md border border-gray-300">
            <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Espace Sécurisé</h1>
            
            <?php if (!empty($erreur)): ?>
                <div class="mb-4 rounded-md border border-red-400 bg-red-50 p-4">
                    <p class="text-red-700 font-medium"><?php echo $erreur; ?></p>
                </div>
            <?php endif; ?>

            <div class="mb-6">
                <label for="mot_de_passe" class="block text-lg font-medium text-gray-700 mb-2">Mot de passe administrateur</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" onkeydown="if(event.key === 'Enter'){ this.form.submit(); }" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border" required>
            </div>

            <button type="submit" class="w-full rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 transition duration-300">
                Se connecter
            </button>
        </form>
    </main>
</body>
</html>