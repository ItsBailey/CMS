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

// Schrijf een nieuws artikel.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $newsTitle = htmlspecialchars($_POST['title']);
    $newsCategory = htmlspecialchars($_POST['category']);
    $newsImage = htmlspecialchars($_POST['topstory']);
    $newsShort = htmlspecialchars($_POST['shortstory']);
    $newsStory = Cms::Filter($_POST['story']);
    $newsAuthor = htmlspecialchars($_POST['author']);
    // Velden leeg gelaten? Error!
    if(empty($newsTitle) || empty($newsImage) || empty($newsStory) || empty($newsAuthor)) {
        $template->assign('addNewsError', '<p><strong>Geen velden leeg laten..</strong></p>');
    // Titel langer dan 29 karakters? Error!
    } else if(strlen($newsTitle) > 29) {
        $template->assign('addNewsError', '<p><strong>De titel is wel lang, vind je niet?</strong></p>');
    // Alles goed? Opslaan, stafflog updaten en een melding geven.
    } else {
        DB::insert('cms_news', array(
            "title" => $newsTitle,
            "category" => $newsCategory,
            "image" => $newsImage,
            "shortstory" => $newsShort,
            "story" => html_entity_decode($newsStory),
            "author" => $newsAuthor,
            "time" => time(),
        ));
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft een nieuws artikel geplaatst",
            "note" => "website_newsadd.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('addNewsError', '<p><strong>Het artikel \''.$newsTitle.'\' is met succes geplaatst!</strong></p>');
    }
}

// Basis assigns voor de pagina.
$varCmsNewsAdd = array(
    "siteTitle" => $cmsName."CMS - Nieuws schrijven",
    "addNewsError" => ""
);

// Defineer de pagina assigns.
$template->assign($varCmsNewsAdd);

// Maak de pagina.
$template->draw($cmsTemplate.'_website');
$template->draw($cmsTemplate.'cmsWebsiteNewsAdd');

// page end..