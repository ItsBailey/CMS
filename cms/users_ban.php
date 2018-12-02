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

// Verban een gebruiker.
if(isset($_POST['submitBan'])) {
    // Defineer de ingevoerde gegevens.
    $banName = htmlspecialchars($_POST['username']);
    $banIp = Users::getData('ip_current', Users::nameToId($banName));
    $banReason = htmlspecialchars($_POST['reason']);
    $banSort = $_POST['sort'];
    $banLength = $_POST['length'];
    // Naam en reden leeg? Error.
    if(empty($banName) || empty($banReason)) {
        $template->assign('usersBanError', '<p><strong>Geen velden leeg laten!</strong></p>');
    // Naam niet in de database? Error.
    } else if(!Users::usernameExists($banName)) {
        $template->assign('usersBanError', '<p><strong>Naam bestaat niet!</strong></p>');
    // Ban reden korter dan 10 karakters? Error.
    } else if(strlen($banReason) < 10) {
        $template->assign('usersBanError', '<p><strong>Geef een iets duidelijkere reden!</strong></p>');
    // Ban naam = eigenaar naam? Error.
    } else if($banName == $siteOwner) {
        $template->assign('usersBanError', '<p><strong>Bijna had je de eigenaar verbannen..</strong></p>');
    // Ban de gebruiker, leeg ze auth_ticket, maak een stafflog en geef een melding.
    } else {
        DB::insert('bans', array(
            "user_id" => Users::nameToId($banName),
            "ip" => $banIp,
            "machine_id" => Users::getData('machine_id', Users::nameToId($banName)),
            "user_staff_id" => $_SESSION['USERHKID'],
            "timestamp" => time(),
            "ban_expire" => $banLength,
            "ban_reason" => $banReason,
            "type" => $banSort,
        ));
        DB::update('users', array(
            "auth_ticket" => '',
        ), 'id =%i', Users::nameToId($banName));
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft $banName verbannen",
            "note" => "users_ban.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('usersBanError', '<p><strong>Je hebt '.$banName.' verbannen!</strong></p>');
    }
}

// Ontban een gebruiker.
if(isset($_POST['submitUnban'])) {
    // Defineer de ingevoerde gegevens.
    $banName = htmlspecialchars($_POST['username']);
    // Is de naam leeg? Error.
    if(empty($banName)) {
        $template->assign('usersUnbanError', 'Velden niet leeg laten..');
    // Is de gebruiker niet verbannen? Error.
    } else if(!Users::isUserBanned(Users::nameToId($banName))) {
        $template->assign('usersUnbanError', 'Gebruiker niet verbannen..');
    // Alles goed? Ontbannen, maak een stafflog en melding geven.
    } else {
        DB::delete('bans', 'user_id =%i', Users::nameToId($banName));
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft $banName ontbannen",
            "note" => "users_ban.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('usersUnbanError', 'Gebruiker ontbannen..');
    }
}

// Basis assigns voor de pagina.
$varCmsUsersBan = array(
    "siteTitle" => $cmsName."CMS - Gebruikers bannen",
    "usersBanError" => "",
    "usersUnbanError" => ""
);

// Defineer de pagina assigns.
$template->assign($varCmsUsersBan);

// Maak de pagina.
$template->draw($cmsTemplate.'_users');
$template->draw($cmsTemplate.'cmsUsersBan');

// page end..