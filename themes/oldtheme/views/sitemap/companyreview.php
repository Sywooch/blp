<?php
/**
 * Created by PhpStorm.
 * User: user-204-008
 * Date: 18.05.16
 * Time: 14:37
 */
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $host?>/reviews</loc>
        <changefreq>always</changefreq>
        <priority>0.4</priority>
    </url>
    <url>
        <loc><?= $host?>/map</loc>
        <changefreq>always</changefreq>
        <priority>0.4</priority>
    </url>
    <url>
        <loc><?= $host?>/addreview</loc>
        <changefreq>always</changefreq>
        <priority>0.4</priority>
    </url>
    <?php foreach($urls as $url): ?>
        <url>
            <loc><?= $host . $url[0] ?></loc>
            <changefreq>always</changefreq>
            <priority>0.4</priority>
        </url>
    <? endforeach;?>

</urlset>





