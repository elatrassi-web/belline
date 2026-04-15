<?php
// Script to generate a WordPress WXR file from the old static PHP files.
// This allows importing all the pages (Cartomancie, Planetes, etc.) into WP easily.

$baseUrl = 'https://belline.net/';
$outputFile = 'import-belline.xml';

// Find all .php files except admin/garbage etc
$files = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.'));
foreach ($iterator as $file) {
    if ($file->isDir()) continue;
    $path = $file->getPathname();

    // Ignore some directories
    if (strpos($path, './.git') === 0 || strpos($path, './Admin') === 0 || strpos($path, './Garbage') === 0 || strpos($path, './Backup') === 0 || strpos($path, './wordpress-theme') === 0) {
        continue;
    }

    if (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
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

    // Extract title (from <title> tag)
    $title = '';
    if (preg_match('/<title>(.*?)<\/title>/is', $content, $matches)) {
        $title = $matches[1];
        $title = str_replace([' - Magie blanche', ' sur https://belline.net'], '', $title);
    }

    // If no title found or title is empty, use filename
    if (empty($title)) {
        $title = basename($file, '.php');
    }

    // Attempt to extract the main content.
    // Looking for the main text box. It's often inside <span class="ContentBox"> or <div class="OESZ_DivContent">
    $mainContent = '';

    // Extremely basic extraction for demonstration and migration
    // We will extract everything between `<div id="XBody"` and `</body>` then strip out scripts
    if (preg_match('/<div id="XBody"[^>]*>(.*?)<\/body>/is', $content, $bodyMatches)) {
        $mainContent = $bodyMatches[1];

        // Strip out scripts
        $mainContent = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $mainContent);
        // Strip out navigation images/links that are mostly redundant in WP
        $mainContent = preg_replace('/<a href="[^"]*"><img src="[^"]*(Accueil|Droite|Gauche)[^"]*"[^>]*><\/a>/is', "", $mainContent);

        // Keep only inner HTML of ContentBox to get text, or keep as is if too complex
        // We'll keep it raw for the user to refine in WP, but clean up CDATA
    }

    // Clean up content for CDATA
    $mainContent = str_replace(']]>', ']]&gt;', $mainContent);
    $mainContent = htmlspecialchars($mainContent, ENT_NOQUOTES, 'UTF-8');

    // We use htmlspecialchars because CDATA can sometimes break if not perfectly formed, but standard WP export uses CDATA.
    // Let's use CDATA properly:
    $mainContentHtml = html_entity_decode($mainContent, ENT_QUOTES, 'UTF-8');

    $slug = sanitize_title(basename($file, '.php'));
    $folder = basename(dirname($file));
    if ($folder !== '.') {
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

echo "WXR generated successfully.\n";
?>
