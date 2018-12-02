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

// Defineer de onderhoud.
define('MAINTENANCE', TRUE);

// Roep het framework aan.
require_once 'Main/Framework.php';

// Basis assigns voor de pagina.
$varMaintenance = array(
    "siteTitle" => $siteShort." is in onderhoud!"
);

// Defineer de pagina assigns.
$template->assign($varMaintenance);

// Maak de pagina.
$template->draw($siteTemplate.'Maintenance');

// page end..