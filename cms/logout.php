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

// Accepteer geen mensen die niet ingelogd zijn.
if(!Users::isLogged()) { Core::forcePage($siteLink); exit; }

// Geen housekeeping sessie? Wat doe je hier?
if(!Cms::hkSession()) {
    Core::forcePage($siteLink);
// Wel een sessie? Zet die sessie dan stop.
} else {
    DB::insert("cms_stafflog", array(
        "action" => "Housekeeping",
        "message" => $userName." uitgelogd met ip ".$remoteIp,
        "note" => "logout.php",
        "userid" => $_SESSION['USERHKID'],
        "timestamp" => time(),
    ));
    unset($_SESSION['USERHKID']);
    unset($_SESSION['USERHKNAME']);
}

// En weer terug naar de index.
Core::forcePage($siteCms.'index');
exit;

// page end..