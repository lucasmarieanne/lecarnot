<?php

// config.php

/* -------------------------------------------------------
   🔥 AUTO-DETECTION : LOCAL vs PRODUCTION
-------------------------------------------------------- */

$isLocal = false;

// Si on détecte localhost, 127.0.0.1 ou un port local
if (
    str_contains($_SERVER['HTTP_HOST'], 'localhost') ||
    str_contains($_SERVER['HTTP_HOST'], '127.0.0.1') ||
    str_contains($_SERVER['HTTP_HOST'], '8888')
) {
    $isLocal = true;
}

/* -------------------------------------------------------
   🔥 BASE_URL automatique
-------------------------------------------------------- */

// Dossier de ton site en LOCAL (IMPORTANT : inclure les / )
$localBase = '/projets-web/website-nicolas-sohier/';

// Production (racine du domaine)
$prodBase = '/';

$BASE_URL = $isLocal ? $localBase : $prodBase;


/* -------------------------------------------------------
   🔥 Fonction URL() → génère des liens parfaits
-------------------------------------------------------- */

function url(string $path = ''): string {
    global $BASE_URL;
    return rtrim($BASE_URL, '/') . '/' . ltrim($path, '/');
}
