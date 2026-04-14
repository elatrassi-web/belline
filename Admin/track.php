<?php

// Activer les headers CORS directement dans le script
if (isset($_SERVER['HTTP_ORIGIN'])) {
    $allowed_origins = ['http://localhost:8080', 'https://belline.net'];

    if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header("Access-Control-Allow-Credentials: true");
    }
}

// Gérer la requête OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

session_start();

$file = 'tracking.json';

// Lire les utilisateurs existants (ou tableau vide)
$users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'enter') {
        // Ajouter ou mettre à jour l'utilisateur
        $users[$ip] = $timestamp;
    } elseif ($_GET['action'] === 'leave') {
        // Supprimer l'utilisateur
        unset($users[$ip]);
    }
    // Sauvegarde des données
    file_put_contents($file, json_encode($users));
} else {
    // Si aucune action n'est spécifiée, afficher la liste des utilisateurs
    header('Content-Type: application/json');
    echo json_encode($users);
    exit;
}

echo json_encode(['success' => true]);
