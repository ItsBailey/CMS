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
$varCmsDashboard = array(
    "siteTitle" => $cmsName."CMS - Dashboard",
    "guilds" => Emu::Get('tablename.Guilds'),
    "users" => Emu::Get('tablename.Users')
);

// Defineer de pagina assigns.
$template->assign($varCmsDashboard);

// Maak de pagina.
$template->draw($cmsTemplate.'_dashboard');
$template->draw($cmsTemplate.'cmsDashboard');

// page end..