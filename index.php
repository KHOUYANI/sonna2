<?php

// Les secrets viennent de l'environnement : plus de mot de passe écrit dans le code
$db_password = getenv('DB_PASSWORD');
$api_key = getenv('API_KEY');


// ✅ Injection SQL corrigée : requête préparée
function chercher_utilisateur($connexion)
{
    $nom = $_GET['nom'] ?? '';
    $requete = mysqli_prepare($connexion, "SELECT * FROM users WHERE nom = ?");
    mysqli_stmt_bind_param($requete, "s", $nom);
    mysqli_stmt_execute($requete);
    return mysqli_stmt_get_result($requete);
}

// ✅ XSS corrigé : on nettoie avant d'afficher
function afficher_bienvenue()
{
    $nom = $_GET['nom'] ?? '';
    echo "Bienvenue " . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
}

// ✅ Hachage fort pour les mots de passe
function crypter($mdp)
{
    return password_hash($mdp, PASSWORD_DEFAULT);
}

// ✅ La fonction eval() a été supprimée (trop dangereuse)


// ✅ Bug corrigé : plus de comparaison d'une variable avec elle-même
// ✅ Bug corrigé : plus de condition répétée
function type_utilisateur($role)
{
    if ($role === "admin") {
        return "A";
    }
    if ($role === "editeur") {
        return "B";
    }
    return "C";
}

// ✅ Bug corrigé : plus de code après le return
function calcul()
{
    return 10;
}

// ✅ Bug corrigé : on utilise le résultat de trim()
function nettoyer($texte)
{
    return trim($texte);
}

// ✅ Bug corrigé : l'objet créé est retourné
function creer_date()
{
    return new DateTime();
}

// ✅ Bug corrigé : plus de boucle inutile
function premier($liste)
{
    return $liste[0] ?? null;
}

// ✅ Bug corrigé : on vérifie le fichier au lieu de cacher les erreurs avec @
function lire($chemin)
{
    if (!file_exists($chemin)) {
        return null;
    }
    return file_get_contents($chemin);
}


// ✅ Code smell corrigé : un seul return, plus de "if" imbriqués
function verifier($a, $b, $c, $d)
{
    return ($a && $b && $c && $d) ? "ok" : "ko";
}

// ✅ Code smell corrigé : l'erreur est enregistrée, pas cachée
function ouvrir($chemin)
{
    try {
        return file_get_contents($chemin);
    } catch (Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}
