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

// Client instellingen veranderen.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $clientIp = htmlspecialchars($_POST['hotelip']);
    $clientPort = htmlspecialchars($_POST['hotelport']);
    $clientMusPort = htmlspecialchars($_POST['hotelmusport']);
    $clientSwf = htmlspecialchars($_POST['hotelswf']);
    $clientHabboswffolder = htmlspecialchars($_POST['hotelhabboswffolder']);
    $clientHabboswf = htmlspecialchars($_POST['hotelhabboswf']);
    $clientExternalVars = htmlspecialchars($_POST['hotelexternalvars']);
    $clientExternalTexts = htmlspecialchars($_POST['hotelexternaltexts']);
    $clientOverrideVars = htmlspecialchars($_POST['hotelexternaloverridevars']);
    $clientOverrideTexts = htmlspecialchars($_POST['hotelexternaloverridetexts']);
    $clientFigurdata = htmlspecialchars($_POST['hotelfiguredata']);
    $clientProductdata = htmlspecialchars($_POST['hotelproductdata']);
    $clientFurnidata = htmlspecialchars($_POST['hotelfurnidata']);
    // Velden leeg gelaten? Error!
    if(empty($clientIp) || empty($clientPort) || empty($clientSwf) || empty($clientHabboswf)) {
        $template->assign('hotelError', '<p><strong>Niet de belangrijkste velden leeg laten!</strong></p>');
    // Sla alles op, maak een stafflog en geef een melding.
    } else {
        DB::update('cms_system', array(
            "ip" => $clientIp,
            "port" => $clientPort,
            "musport" => $clientMusPort,
            "swf" => $clientSwf,
            "habboswffolder" => $clientHabboswffolder,
            "habboswf" => $clientHabboswf,
            "texts" => $clientExternalTexts,
            "variables" => $clientExternalVars,
            "overridevariables" => $clientOverrideVars,
            "overridetexts" => $clientOverrideTexts,
            "figuredata" => $clientFigurdata,
            "productdata" => $clientProductdata,
            "furnidata" => $clientFurnidata,
        ), "id ='1'");
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft de client instellingen veranderd",
            "note" => "website_hotel.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('hotelError', '<p><strong>Wijzigingen opgeslagen!</strong></p>');
    }
}

// Basis assigns voor de pagina.
$varCmsHotel = array(
    "siteTitle" => $cmsName."CMS - Hotel",
    "hotelError" => "",
    "clientIp" => Core::getSystem('ip'),
    "clientPort" => Core::getSystem('port'),
    "clientMusPort" => Core::getSystem('musport'),
    "clientSwf" => Core::getSystem('swf'),
    "clientHabboswffolder" => Core::getSystem('habboswffolder'),
    "clientHabboswf" => Core::getSystem('habboswf'),
    "clientTexts" => Core::getSystem('texts'),
    "clientVars" => Core::getSystem('variables'),
    "clientOverrideTexts" => Core::getSystem('overridetexts'),
    "clientOverrideVars" => Core::getSystem('overridevariables'),
    "clientFiguredata" => Core::getSystem('figuredata'),
    "clientProductdata" => Core::getSystem('productdata'),
    "clientFurnidata" => Core::getSystem('furnidata'),
);

// Defineer de pagina assigns.
$template->assign($varCmsHotel);

// Maak de pagina.
$template->draw($cmsTemplate.'_website');
$template->draw($cmsTemplate.'cmsWebsiteHotel');

// page end..