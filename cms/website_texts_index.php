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

// Basis assigns voor de pagina.
$varCmsWebsiteTextsIndex = array(
    "siteTitle" => $cmsName."CMS - Teksten index.php",
    "editError" => ''
);

// Defineer de pagina assigns.
$template->assign($varCmsWebsiteTextsIndex);

// Maak de pagina.
$template->draw($cmsTemplate.'_website');
$template->draw($cmsTemplate.'cmsWebsiteTextsIndex');

// page end..