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
$varCmsUsersApps = array(
    "siteTitle" => $cmsName."CMS - Vacatures"
);

// Defineer de pagina assigns.
$template->assign($varCmsUsersApps);

// Maak de pagina.
$template->draw($cmsTemplate.'_users');
$template->draw($cmsTemplate.'cmsUsersApplications');

// page end..