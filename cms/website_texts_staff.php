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

// Teksten veranderen.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens, pas deze aan en geef een melding.
    $textNL = htmlspecialchars($_POST['nl']);
    $textEN = htmlspecialchars($_POST['en']);
    DB::update('cms_sitetexts', array(
        "nl" => $textNL,
        "en" => $textEN,
    ), 'page =%s', $_GET['page']);
    $template->assign('editError', 'Aangepast!');
}

// Basis assigns voor de pagina.
$varCmsWebsiteTextsStaff = array(
    "siteTitle" => $cmsName."CMS - Teksten staff.php",
    "editError" => ""
);

// Defineer de pagina assigns.
$template->assign($varCmsWebsiteTextsStaff);

// Maak de pagina.
$template->draw($cmsTemplate.'_website');
$template->draw($cmsTemplate.'cmsWebsiteTextsStaff');

// page end..