<?php
date_default_timezone_set('Europe/Paris');

$url = "https://www.lemonde.fr";
$titles = [];
$errorLogFile = "errors.log";
$jsonOutputFile = "scraped_titles.json";

try {
    // Initialiser cURL
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    $html = curl_exec($ch);

    // Gérer les erreurs de cURL
    if (curl_errno($ch)) {
        throw new Exception("Erreur cURL : " . curl_error($ch));
    }

    curl_close($ch);

    // Vérifier que le contenu HTML est récupéré
    if (!$html) {
        throw new Exception("Aucun contenu HTML récupéré.");
    }

    // Extraire les titres avec DOMDocument
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//h3 | //h2');

    foreach ($nodes as $node) {
        $title = trim($node->textContent);
        if ($title && !in_array($title, $titles)) {
            $titles[] = $title;
        }
    }

    // Sauvegarder les titres
    file_put_contents($jsonOutputFile, json_encode($titles, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "✅ Scraping terminé. " . count($titles) . " titres enregistrés.\n";

} catch (Exception $e) {
    // Sauvegarder l'erreur dans errors.log
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n";
    file_put_contents($errorLogFile, $errorMessage, FILE_APPEND);
    echo "❌ Une erreur est survenue. Détails enregistrés dans errors.log\n";
}
