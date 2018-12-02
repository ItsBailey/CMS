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

// Defineer de gebruiker.
define('ISUSER', TRUE);

// Roep het framework aan.
require_once 'Main/Framework.php';

// Accepteer geen mensen die niet ingelogd zijn.
if(!Users::isLogged()) { Core::forcePage($siteLink); exit; }

// De gebruiker niet verbannen? Dan is deze pagina niet relevant.
if(!Users::isUserBanned($userID)) { Core::forcePage($siteLink); exit; }

// Basis assigns voor de pagina.
$varBanned = array(
    "siteTitle" => "Je bent verbannen van ".$siteShort."!"
);

// Defineer de pagina assigns.
$template->assign($varBanned);

// Maak de pagina.
$template->draw($siteTemplate.'Banned');

// page end..