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

// Accepteer geen mensen die niet ingelogd zijn.
if(!Users::isLogged()) { Core::forcePage($siteLink); exit; }

// Maak een nieuwe auth ticket aan.
Users::createSso($userID);

// Basis assigns voor de pagina.
$clientSwf = Core::getSystem('swf');
$varClient = array(
    "siteTitle" => $siteShort." &bull; Het hotel",
    "clientIp" => Core::getSystem('ip'),
    "clientPort" => Core::getSystem('port'),
    "clientSwf" => $clientSwf,
    "clientSpecial" => $clientSwf.'c_images/',
    "clientHabboswffolder" => $siteLink.$clientSwf.Core::getSystem('habboswffolder'),
    "clientHabboswf" => Core::getSystem('habboswf'),
    "clientExternalVariables" => $siteLink.$clientSwf.Core::getSystem('variables'),
    "clientExternalTexts" => $siteLink.$clientSwf.Core::getSystem('texts'),
    "clientOverrideVariables" => $siteLink.$clientSwf.Core::getSystem('overridevariables'),
    "clientOverrideTexts" => $siteLink.$clientSwf.Core::getSystem('overridetexts'),
    "clientFiguredata" => $siteLink.$clientSwf.Core::getSystem('figuredata'),
    "clientProductdata" => $siteLink.$clientSwf.Core::getSystem('productdata'),
    "clientFurnidata" => $siteLink.$clientSwf.Core::getSystem('furnidata'),
    "clientSso" => Users::getData('auth_ticket', $userID),
);

// Defineer de pagina assigns.
$template->assign($varClient);

// Maak de pagina.
$template->draw($siteTemplate.'Client');

// page end..