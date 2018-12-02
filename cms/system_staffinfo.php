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

// Is de gebruiker een manager? Dan heb je meer instellingen.
if(Users::getData('rank', $_SESSION['USERHKID']) < 7) {
    $template->assign('managerSettings', '');
} else {
    $template->assign('managerSettings', '
        <div class="menuouterwrap">
            <div class="menucatwrap">
                <img src="'.$siteLink.'cms/Templates/'.$cmsTemplate.$cmsTemplateStyle.'images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" />
                Hotel Manager instellingen
            </div>
            <div class="menulinkwrap">&nbsp;
                <img src="'.$siteLink.'cms/Templates/'.$cmsTemplate.$cmsTemplateStyle.'images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                <a href="system_useredit" style="text-decoration:none;font-weight: bold;">Gebruiker wijzigen</a>
            </div>
            <div class="menulinkwrap">&nbsp;
                <img src="'.$siteLink.'cms/Templates/'.$cmsTemplate.$cmsTemplateStyle.'images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                <a href="system_rankedit" style="text-decoration:none;font-weight: bold;">Rangen wijzigen</a>
            </div>
            <div class="menulinkwrap">&nbsp;
                <img src="'.$siteLink.'cms/Templates/'.$cmsTemplate.$cmsTemplateStyle.'images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                <a href="system_rank" style="text-decoration:none;font-weight: bold;">Gebruiker een rank geven</a>
            </div>
        </div><br />
    ');
}

// Word er iets gewijzigd?
if(isset($_POST['submit'])) {
    $staffPin = htmlspecialchars($_POST['pincode']);
    $staffRank = htmlspecialchars($_POST['specialrank']);
    $staffTitle = htmlspecialchars($_POST['title']);
    $staffStory = htmlspecialchars($_POST['story']);
    
    if(strlen($staffRank) > 32) {
        $template->assign('editError', 'Oeps, je speciale rank naam is te lang.');
    } else if(strlen($staffTitle) > 32) {
        $template->assign('editError', 'Oeps, de titel van je verhaal is te lang.');
    } else {
        DB::update('cms_staffinfo', array(
            "pincode" => $staffPin,
            "specialrank" => $staffRank,
            "title" => $staffTitle,
            "story" => $staffStory,
            "timestamp" => time(),
        ), "userid =%i", $_SESSION['USERHKID']);
        DB::insert('cms_stafflog', array(
            "action" => "Housekeeping",
            "message" => $_SESSION['USERHKNAME']." heeft zijn informatie gewijzigd",
            "note" => "system_staffinfo.php",
            "userid" => $_SESSION['USERHKID'],
            "timestamp" => time(),
        ));
        $template->assign('editError', '<b>Je hebt met succes je informatie aangepast!</b>');
    }
}

// Basis assigns voor de pagina.
$varCmsSystemStaffinfo = array(
    "siteTitle" => $cmsName."CMS - Systeem Staff pincode",
    "editError" => "",
    "staffPin" => Core::getData('pincode', 'cms_staffinfo', 'userid', $_SESSION['USERHKID']),
    "staffRank" => Core::getData('specialrank', 'cms_staffinfo', 'userid', $_SESSION['USERHKID']),
    "staffTitle" => Core::getData('title', 'cms_staffinfo', 'userid', $_SESSION['USERHKID']),
    "staffStory" => Core::getData('story', 'cms_staffinfo', 'userid', $_SESSION['USERHKID']),
);

// Defineer de pagina assigns.
$template->assign($varCmsSystemStaffinfo);

// Maak de pagina.
$template->draw($cmsTemplate.'_system');
$template->draw($cmsTemplate.'cmsSystemStaffinfo');

// page end..