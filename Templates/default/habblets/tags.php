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

// Zet de key en tag vast aan een var.
$key = isset($_GET['key']) ? $_GET['key'] : '';
$tag = isset($_POST['tagName']) ? strtolower($_POST['tagName']) : '';

// Tel de tags van de gebruiker.
DB::query("SELECT null FROM cms_tags WHERE userid =%i LIMIT 20", $userID);
$tagCount = DB::count();

// Wat gaan we doen?
switch($key) {
    // Toevoegen.
    case 'add':
        // Filter de ingevoerde tag.
        $filter = preg_replace("/[^a-z\d]/i", "", $tag);
        // Is de tag te lang, kort, of niet geldig? Error.
        if(strlen($tag) < 2 || $filter != $tag || strlen($tag) > 20) {
            echo 'invalidtag';
            exit;
        // Goed? Dan gaan we door.
        } else {
            // Deze tag heb je al? Error.
            DB::query("SELECT null FROM cms_tags WHERE userid =%i AND tag =%s LIMIT 1", $userID, $tag);
            $count = DB::count();
            if($count > 0) {
                echo 'invalidtag';
                exit;
            // Heb je hem niet?
            } else {
                // Maar heb je er al 20? Error.
                if($tagCount > 20) {
                    echo 'invalidtag';
                    exit;
                // Alles goed? Voeg hem maar toe!
                } else {
                    DB::insert('cms_tags', array(
                        "tag" => $tag,
                        "userid" => $userID
                    ));
                    echo 'valid';
                    exit;
                }
            }
        }
        break;
    // Tag lijst zien.
    case 'mytagslist':
        // Echo de basis divs.
        echo '<div class="habblet" id="my-tags-list">
        <ul class="tag-list make-clickable">';
        // Selecteer de tags van de gebruiker en roep ze aan.
        $query = DB::query("SELECT tag FROM cms_tags WHERE userid =%i", $userID);
        foreach($query as $tag) {
        echo '
            <li>
                <a href="tags.php?tag='.$tag['tag'].'" class="tag" style="font-size:10px">'.$tag['tag'].'</a>
                <a class="tag-remove-link" title="Remove tag" href="#"></a>
            </li>
        ';
        }
        echo '</ul>';
        // Heb je nog minder dan 20 tags? Voeg er meer toe!
        if($tagCount < 20) {
        echo '
            <form method="POST" action="'.$siteDir.'habblets/tags?key=add" onsubmit="TagHelper.addFormTagToMe(); return false;">
                <div class="add-tag-form clearfix">
                    <a class="new-button" href="#" id="add-tag-button" onclick="TagHelper.addFormTagToMe(); return false;"><b>Voeg toe</b><i></i></a>
                    <input type="text" id="add-tag-input" maxlength="20" style="float: right" />
                    <em class="tag-question">vraagje..</em>
                </div>
                <div style="clear: both"></div>
            </form>
        ';
        }
        // De teksten voor de tags hieronder.
        echo '
        </div>
        <script type="text/javascript">
        document.observe(\'dom:loaded\', function() {
            TagHelper.setTexts({
              tagLimitText: \'Je hebt het maximale aantal tags bereikt! Verwijder er een paar als je een nieuwe wilt.\',
              invalidTagText: \'Dit is een ongeldige tag!\',
              buttonText: \'Oke\'
            });
            TagHelper.init(\'21063711\');
        });
        </script>
        ';
        break;
    // Verwijderen.
    case 'remove':
        // Oke, verwijderen maar.
        DB::delete('cms_tags', 'tag =%s AND userid =%i', $tag, $userID);
        echo 'SUCCESS';
        break;
}

// page end..