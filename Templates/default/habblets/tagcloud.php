<?php
/**==================================================+
|| # AcellCMS - Website and Content Management System.
|+==================================================+
|| # Copyright © 2018 - WeszDEV. All rights reserved.
|| # https://weszdev.com
|+==================================================+
|| # AcellCMS is free for the whole Retro Community.
|| # Don't know what you are doing? Quit already!
|+==================================================**/

// Roep het framework aan.
require_once '../../../Main/Framework.php';

// Is er bekend wat er wordt opgevraagd?
$cloud = (!empty($_GET['cloud']) ? $_GET['cloud'] : '');

// Plain met deze vaste div.
echo ($cloud == 'plain') ? '<div class="habblet box-content">' : '';

// Tel de tags.
DB::query("SELECT null FROM cms_tags");
$count = DB::count();

// Zijn er tags? Laat ze dan zien!
if($count > 0) {
    echo '<li>';
    $query = DB::query("SELECT tag FROM cms_tags ORDER BY RAND() DESC LIMIT 20");
    foreach($query as $tag) {
        echo '<a href="tags?tag='.$tag['tag'].'" class="tag" style="">'.$tag['tag'].'</a>&nbsp;';
    } echo '</li>';
// Geen tags? Wat is dit voor hotel?
} else {
    echo '<div>Geen tags gevonden..</div>';
}

// page end..