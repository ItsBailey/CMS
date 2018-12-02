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

// Basis assigns voor de pagina.
$varCmsSystemStafflog = array(
    "siteTitle" => $cmsName."CMS - Medewerkers log",
);

// Defineer de pagina assigns.
$template->assign($varCmsSystemStafflog);

// Maak de pagina.
$template->draw($cmsTemplate.'_system');
$template->draw($cmsTemplate.'cmsSystemStafflog');

// page end..