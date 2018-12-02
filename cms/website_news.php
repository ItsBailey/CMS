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

// In onderhoud? Boeie, niet in de housekeeping!
define('MAINTENANCE', FALSE);

// Roep het framework aan.
require_once '../Main/Framework.php';
require_once '../Main/Classes/classCMS.php';

// Niet ingelogd? Geen toegang!
if(!Users::isLogged()) { Core::forcePage($siteLink); exit; }

// Geen housekeeping sessie? Geen toegang!
if(!Cms::hkSession()) { Core::forcePage($siteLink); }

// Verwijder een nieuws artikel.
if(isset($_GET['newsdeleteid'])) {
    $query = DB::query("SELECT id FROM cms_news");
    foreach($query as $news) {
        DB::delete('cms_news', 'id =%i', $news['id']);
        echo '<meta http-equiv="REFRESH" content="0;url=website_news">';
    }
}

// Het huidige plaatje van het nieuws.
$currentNews = isset($_GET['newsid']) ? $_GET['newsid'] : 0;
$currentImage = DB::queryFirstField("SELECT image FROM cms_news WHERE id =%i", $currentNews);

// Wijzig een nieuws artikel.
if(isset($_POST['submitEdit'])) {
    // Defineer de ingevoerde gegevens.
    $newsTitle = htmlspecialchars($_POST['title']);
    $newsCategory = htmlspecialchars($_POST['category']);
    $newsImage = htmlspecialchars($_POST['topstory']);
    $newsShort = htmlspecialchars($_POST['shortstory']);
    $newsStory = Cms::Filter($_POST['story']);
    $newsAuthor = htmlspecialchars($_POST['author']);
    // Velden leeg gelaten? Error!
    if(empty($newsTitle) || empty($newsStory) || empty($newsAuthor)) {
        $template->assign('editNewsError', '<p><strong>Geen velden leeg laten..</strong></p>');
    // Titel langer dan 29 karakters? Error!
    } else if(strlen($newsTitle) > 29) {
        $template->assign('editNewsError', '<p><strong>De titel is wel lang, vind je niet?</strong></p>');
    // Alles goed? Opslaan, stafflog updaten en een melding geven.
    } else {
        // Is er geen nieuw plaatje geüpload? Gebruik de huidige dan.
        if(empty($newsImage)) {
            $newsImage = $currentImage;
        }
        DB::update('cms_news', array(
            "title" => $newsTitle,
            "category" => $newsCategory,
            "image" => $newsImage,
            "shortstory" => $newsShort,
            "story" => html_entity_decode($newsStory),
            "author" => $newsAuthor,
            "time" => time(),
            "updated" => '1'
        ), 'id =%i', $_GET['newsid']);
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft een nieuws artikel gewijzigd: ".$newsTitle,
            "note" => "website_news.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('editNewsError', '<p><strong>Nieuws artikel gewijzigd!</strong></p>');
    }
}

// Basis assigns voor de pagina.
$varCmsNews = array(
    "siteTitle" => $cmsName."CMS - Nieuws beheren",
    "editNewsError" => "",
    "newsEdit" => incCms::newsEdit()
);

// Defineer de pagina assigns.
$template->assign($varCmsNews);

// Maak de pagina.
$template->draw($cmsTemplate.'_website');
$template->draw($cmsTemplate.'cmsWebsiteNews');

// page end..