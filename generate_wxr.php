<?php
// Script to generate a WordPress WXR file from the old static PHP files.

$baseUrl = 'https://belline.net/';
$outputFile = 'import-belline.xml';

$files = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.'));

// Folders we WANT to import pages from
$allowedFolders = [
    './Cartomancie',
    './Methodes',
    './Planetes',
    './Dons',
    './CGU',
];

// Specific files at root to keep
$allowedFiles = [
    './index.php',
    './Partenaires/Partenaires.php'
];

foreach ($iterator as $file) {
    if ($file->isDir()) continue;
    $path = $file->getPathname();

    if (pathinfo($path, PATHINFO_EXTENSION) !== 'php') {
        continue;
    }

    $isAllowed = false;
    foreach ($allowedFolders as $folder) {
        if (strpos($path, $folder) === 0) {
            $isAllowed = true;
            break;
        }
    }

    if (in_array($path, $allowedFiles)) {
        $isAllowed = true;
    }

    // Specifically exclude "Formulaire", "Envoi", "Echec" since they are logic/forms
    if (strpos($path, 'Formulaire.php') !== false ||
        strpos($path, 'Envoi.php') !== false ||
        strpos($path, 'Echec.php') !== false ||
        strpos($path, 'Accueil.php') !== false // Handled manually or redundant
    ) {
        $isAllowed = false;
    }

    if ($isAllowed) {
        $files[] = $path;
    }
}

$wxr = '<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0"
	xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:wp="http://wordpress.org/export/1.2/"
>
<channel>
	<title>Belline</title>
	<link>https://belline.net</link>
	<description>Entre ésotérisme et magie</description>
	<pubDate>Mon, 15 Apr 2024 00:00:00 +0000</pubDate>
	<language>fr-FR</language>
	<wp:wxr_version>1.2</wp:wxr_version>
	<wp:base_site_url>https://belline.net</wp:base_site_url>
	<wp:base_blog_url>https://belline.net</wp:base_blog_url>
';

$postId = 1000;

foreach ($files as $file) {
    $content = file_get_contents($file);

    $title = '';
    if (preg_match('/<title>(.*?)<\/title>/is', $content, $matches)) {
        $title = $matches[1];
        $title = str_replace([' - Magie blanche', ' sur https://belline.net', '&#233;'], ['', '', 'é'], $title);
    }

    if (empty($title)) {
        $title = basename($file, '.php');
    }

    $mainContent = '';

    if (preg_match('/<div id="XBody"[^>]*>(.*?)<\/body>/is', $content, $bodyMatches)) {
        $mainContent = $bodyMatches[1];

        $mainContent = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $mainContent);
        // Clean out typical openElement navigation images
        $mainContent = preg_replace('/<a href="[^"]*"><img src="[^"]*(Accueil|Droite|Gauche|Methodes|Planetes|Tarots|Belline|Gratuite|mail|tchat|domicile|coaching)[^"]*"[^>]*><\/a>/is', "", $mainContent);
    }

    $mainContent = str_replace(']]>', ']]&gt;', $mainContent);
    $mainContent = htmlspecialchars($mainContent, ENT_NOQUOTES, 'UTF-8');
    $mainContentHtml = html_entity_decode($mainContent, ENT_QUOTES, 'UTF-8');

    $slug = sanitize_title(basename($file, '.php'));
    $folder = basename(dirname($file));
    if ($folder !== '.' && $folder !== '32-cartes' && $folder !== 'Tarots' && $folder !== 'Belline') {
        $slug = sanitize_title($folder) . '-' . $slug;
    }
    if ($file === './index.php') {
        $slug = 'accueil';
    }

    $wxr .= '
	<item>
		<title>' . htmlspecialchars($title) . '</title>
		<link>https://belline.net/' . $slug . '</link>
		<pubDate>Mon, 15 Apr 2024 00:00:00 +0000</pubDate>
		<dc:creator><![CDATA[admin]]></dc:creator>
		<guid isPermaLink="false">https://belline.net/?page_id=' . $postId . '</guid>
		<description></description>
		<content:encoded><![CDATA[' . $mainContentHtml . ']]></content:encoded>
		<excerpt:encoded><![CDATA[]]></excerpt:encoded>
		<wp:post_id>' . $postId . '</wp:post_id>
		<wp:post_date><![CDATA[2024-04-15 00:00:00]]></wp:post_date>
		<wp:post_date_gmt><![CDATA[2024-04-15 00:00:00]]></wp:post_date_gmt>
		<wp:comment_status><![CDATA[closed]]></wp:comment_status>
		<wp:ping_status><![CDATA[closed]]></wp:ping_status>
		<wp:post_name><![CDATA[' . $slug . ']]></wp:post_name>
		<wp:status><![CDATA[publish]]></wp:status>
		<wp:post_parent>0</wp:post_parent>
		<wp:menu_order>0</wp:menu_order>
		<wp:post_type><![CDATA[page]]></wp:post_type>
		<wp:post_password><![CDATA[]]></wp:post_password>
		<wp:is_sticky>0</wp:is_sticky>
	</item>
';
    $postId++;
}

$wxr .= '</channel>
</rss>';

file_put_contents($outputFile, $wxr);

function sanitize_title($title) {
    $title = strip_tags($title);
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    $title = str_replace('%', '', $title);
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title);
    $title = str_replace('.', '-', $title);
    $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    return $title;
}

echo "Clean WXR generated successfully. Pages processed: " . count($files) . "\n";
?>
