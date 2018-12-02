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

// Zoek een gebruiker.
if(isset($_POST['searchName'])) {
    // Defineer de ingevoerde naam.
    $searchName = htmlspecialchars($_POST['username']);
    // Kijk of de gebruiker voorkomt in de database.
    $search = DB::query("SELECT null FROM ".Emu::Get('tablename.Users')." WHERE username =%s", $searchName);
    if($search == 0) {
        $nope = TRUE;
    // Is er niets ingevuld? Error.
    } if(empty($searchName)) {
        $template->assign('editError', '<b>Vul een naam in</b>');
    // Kan de gebruiker niet gevonden worde? Error.
    } else if($nope == TRUE) {
        $template->assign('editError', '<b>Kan de gebruiker niet vinden</b>');
    // Ga door naar het wijzigen van de gebruiker.
    } else {
        Core::forcePage('users_edit?username='.$searchName);
    }
}

// Wijzig een gebruiker.
if(isset($_POST['submitEdit'])) {
    // Defineer de ingevoerde gegevens.
    $searchName = $_GET['username'];
    $editRealname = htmlspecialchars($_POST['realname']);
    $editMotto = htmlspecialchars($_POST['motto']);
    $editGender = htmlspecialchars($_POST['gender']);
    $editLook = htmlspecialchars($_POST['look']);
    $editCredits = htmlspecialchars($_POST['credits']);
    $editPixels = htmlspecialchars($_POST['pixels']);
    $editPoints = htmlspecialchars($_POST['points']);
    $editId = Users::nameToId($_GET['username']);
    
    // Is de look leeg gelaten? Error.
    if(empty($editLook)) {
        $template->assign('editError', '<b>Je mag de look niet leeg laten!</b>');
    // Is de motto langer dan 32 karakters? Error.
    } else if(strlen($editMotto) > 32) {
        $template->assign('editError', '<b>De motto is te lang.</b>');
    // Meer dan 9999999 credits? Error.
    } else if(strlen($editCredits > 9999999)) {
        $template->assign('editError', '<b>Dit zijn wel heel veel credits.. wow..</b>');
    // Meer dan 9999999 pixels? Error.
    } else if(strlen($editPixels > 9999999)) {
        $template->assign('editError', '<b>Dit zijn wel heel veel pixels.. wow..</b>');
    // Meer dan 99999 points? Error.
    } else if(strlen($editPoints > 99999)) {
        $template->assign('editError', '<b>Wat moet je met zoveel diamanten?</b>');
    // Alles goed? Opslaan, een stafflog maken en een melding geven.
    } else {
        DB::update('users', array(
            "real_name" => $editRealname,
            "motto" => $editMotto,
            "gender" => $editGender,
            "look" => $editLook,
            "credits" => $editCredits,
            "pixels" => $editPixels,
            "points" => $editPoints,
        ), 'id=%i', $editId);
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft een speler gewijzigd: ".$searchName,
            "note" => "users_edit.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('editError', '<b>Gebruiker met succes aangepast!</b>');
    }
}

// Basis assigns voor de pagina.
$varCmsUsersEdit = array(
    "siteTitle" => $cmsName."CMS - Gebruikers wijzigen",
    "editError" => "",
    "userEdit" => incCms::userEdit()
);

// Defineer de pagina assigns.
$template->assign($varCmsUsersEdit);

// Maak de pagina.
$template->draw($cmsTemplate.'_users');
$template->draw($cmsTemplate.'cmsUsersEdit');

// page end..