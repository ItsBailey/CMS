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

// Rank lager dan 2? Geen toegang!
if(Users::getData('rank', $userID) < 2) { Core::forcePage($siteLink); }

// Inglogd in de housekeeping? Doorsturen.
if(Cms::hkSession()) { Core::forcePage('dashboard'); }

// Inloggen in de Housekeeping.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $hkName = htmlspecialchars($_POST['username']);
    $hkPass = htmlspecialchars($_POST['password']);
    $userRank = Users::getData('rank', Users::nameToId($hkName));
    $hkIp = $remoteIp;
    // Zijn de velden leeg? Error.
    if(empty($hkName) || empty($hkPass)) {
        $template->assign('loginError', 'Vul de velden in!');
    // Is je rank lager dan 5? Geen toegang!
    } else if($userRank < 5) {
        $template->assign('loginError', 'Je mag hier niet in komen!');
    // Kloppen de gegevens? Update de stafflog tabel en doorsturen!
    } else if(Users::Validate($hkName, $hkPass)) {
        $_SESSION['USERHKID'] = Users::nameToId($hkName);
        $_SESSION['USERHKNAME'] = $hkName;
        DB::insert("cms_stafflog", array(
            "action" => "Housekeeping",
            "message" => $hkName." ingelogd met ip ".$hkIp,
            "note" => "index.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        Core::forcePage('dashboard');
    // Gegevens niet goed? Error.
    } else {
        $template->assign('loginError', 'Gegevens niet goed, geen toegang!');
    }
}

// Basis assigns voor de pagina.
$varCmsIndex = array(
    "siteTitle" => $cmsName."CMS - Inloggen",
    "loginError" => ""
);

// Defineer de pagina assigns.
$template->assign($varCmsIndex);

// Maak de pagina.
$template->draw($cmsTemplate.'cmsIndex');

// page end..