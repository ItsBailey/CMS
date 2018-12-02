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

// Website instellingen veranderen.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $hotelName = htmlspecialchars($_POST['hotelname']);
    $hotelOwner = htmlspecialchars($_POST['hotelowner']);
    $hotelLang = htmlspecialchars($_POST['hotellang']);
    $hotelMaintenance = htmlspecialchars($_POST['hotelmaintenance']);
    // Velden leeg gelaten? Error!
    if(empty($hotelName) || empty($hotelOwner)) {
        $template->assign('basisError', '<p><strong>Geen velden leeg laten..</strong></p>');
    // Hotelnaam met cijfers? Error!
    } elseif(is_numeric($hotelName)) {
        $template->assign('basisError', '<p><strong>Hotel naam mag geen cijfers hebben!</strong></p>');
    // Rank lager dan 6? Error!
    } else if(Users::getData('rank', $_SESSION['USERHKID']) < 7) {
        $template->assign('basisError', '<p><strong>Helaas mag jij dit niet doen... ;)</strong></p>');
    // Sla alles op, maak een stafflog en geef een melding.
    } else {
        DB::update('cms_system', array(
            "sitename" => $hotelName." Hotel",
            "shortname" => $hotelName,
            "owner" => $hotelOwner,
            "maintenance" => $hotelMaintenance,
            "language" => $hotelLang,
        ), "id ='1'");
        DB::insert("cms_stafflog", array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft de website instellingen veranderd",
            "note" => "website.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('basisError', '<p><strong>Instellingen opgeslagen!</strong></p>');
    }
}

// Onderhoud controle voor template.
$mCheck = DB::queryFirstField("SELECT maintenance FROM cms_system");
if($mCheck == '1') {
    $template->assign('maintenanceCheck', '
        <option value="1">Aan</option>
        <option value="0">Uit</option>
    ');
} else {
    $template->assign('maintenanceCheck', '
        <option value="0">Uit</option>
        <option value="1">Aan</option>
    ');
}

// Taal controle voor template.
$langCheck = DB::queryFirstField("SELECT language FROM cms_system");
if($langCheck == 'nl') {
    $template->assign('langCheck', '
        <option value="nl">Nederlands</option>
        <option value="en">English</option>
    ');
} else {
    $template->assign('langCheck', '
        <option value="en">English</option>
        <option value="nl">Nederlands</option>
    ');
}

// Basis assigns voor de pagina.
$varCmsWebsite = array(
    "siteTitle" => $cmsName."CMS - Website",
    "basisError" => "",
    "maintenanceCheck" => "",
    "hotelOwner" => Core::getSystem('owner'),
    "hotelLang" => Core::getSystem('language'),
    "hotelIp" => Core::getSystem('ip'),
    "hotelPort" => Core::getSystem('port'),
);

// Defineer de pagina assigns.
$template->assign($varCmsWebsite);

// Maak de pagina.
$template->draw($cmsTemplate.'_website');
$template->draw($cmsTemplate.'cmsWebsite');

// page end..