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

// Roep het framework aan.
require_once 'Main/Framework.php';

// Basis assigns voor de pagina.
$varPrivacyStatement = array(
    // siteTile = De website titel in de url balk.
    "siteTitle" => $siteShort." &bull; Privacy verklaring"
);

// Defineer de pagina assigns.
$template->assign($varPrivacyStatement);

// Maak de pagina.
$template->draw($siteTemplate.'PrivacyStatament');
$template->draw($siteTemplate.'_footer');

// page end..