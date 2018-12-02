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

// Al een sessie? Doorsturen dan maar.
if(Users::isLogged()) { Core::forcePage('me'); exit; }

// Inloggen.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $userName = htmlspecialchars($_POST['username']);
    $userPass = htmlspecialchars($_POST['password']);
    // Zijn de velden leeg? Error.
    if(empty($userName) || empty($userPass)) {
        $template->assign('loginError', incWeb::loginRegError(Core::getLanguage($siteLang, 'index', 'error.fieldsEmpty')));
    // Kloppen de gegevens? Voer een check uit.
    } else if(Users::Validate($userName, $userPass)) {
        // Is de gebruiker een medewerker met een rank hoger dan 5? Security check!
        if(Users::getData('rank', Users::nameToId($userName)) > 5) {
            Core::forcePage('security_check');
            exit;
        // Geen medewerker? Inloggen, een sessie geven, laatst online en huidig ip updaten en doorsturen!
        } else {
            $_SESSION['USERID'] = Users::nameToId($userName);
            Users::updateUser($_SESSION['USERID'], Emu::Get('table.Users.last_login'), time());
            Users::updateUser($_SESSION['USERID'], Emu::Get('table.Users.ip_current'), $remoteIp);
            Core::forcePage('me');
            exit;
        }
    // Zijn de gegevens niet goed? Error.
    } else {
        $template->assign('loginError', incWeb::loginRegError(Core::getLanguage($siteLang, 'index', 'error.wrongCredentials')));
    }
}

// Basis assigns voor de pagina.
$varIndex = array(
    "siteTitle" => $siteShort." &bull; ".Core::getLanguage($siteLang, 'index', 'siteTitle'),
    "loginError" => ""
);

// Defineer de pagina assigns.
$template->assign($varIndex);

// Maak de pagina.
$template->draw($siteTemplate.'Index');
$template->draw($siteTemplate.'_footer');

// page end..