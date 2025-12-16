<?php
// index.php

// Charger la config
require_once __DIR__ . '/config.php';

// Empêche l'accès direct aux fichiers inclus
define('APP_INIT', true);

// Sécurise ?page
$page = $_GET['page'] ?? 'home';
$page = strtolower(trim($page));
// Autorise uniquement lettres, chiffres, tiret, underscore
$page = preg_replace('/[^a-z0-9_-]/', '', $page);

// Dossier des pages
$pagesDir = __DIR__ . '/pages/';

// Routes autorisées (SLUG => FICHIER)
$routes = [
    'home'      => 'home.php',
    'contact'   => 'contact.php',
    'faq'       => 'faq.php',
    'produits'  => 'products.php',
    'assurance' => 'offer-assurance.php',
    'alarme'    => 'offer-alarme.php',
    'mondevis'  => 'devis.php',
];

// --------------------------------------------------------
// 🔥 ROUTE EXISTE ?
// --------------------------------------------------------
if (array_key_exists($page, $routes)) {

    $filePath = realpath($pagesDir . $routes[$page]);

    // Double sécurité : fichier existe + bien dans /pages
    if ($filePath !== false && strpos($filePath, realpath($pagesDir)) === 0) {
        require $filePath;
        exit;
    }
}

// --------------------------------------------------------
// ❌ ROUTE INCONNUE → PAGE 404
// --------------------------------------------------------
http_response_code(404);

$notFound = $pagesDir . '404.php';

if (file_exists($notFound)) {
    require $notFound;
} else {
    echo "<h1>404 - Page introuvable</h1>";
}

exit;
