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

//Verander je e-mailadres
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $mailOld = htmlspecialchars($_POST['oldemail']);
    $mailNew = htmlspecialchars($_POST['newemail']);
    $mailNew2 = htmlspecialchars($_POST['newemail2']);
    // Is er iets leeggelaten? Error.
    if(empty($mailNew) || empty($mailNew2)) {
        $template->assign('editError', incWeb::redError('Je mag de velden niet leeg laten'));
    // Is je oude e-mailadres niet hetzelfde als in de database? Error.
    } elseif($mailOld !== Users::getData('mail', $userID)) {
        $template->assign('editError', incWeb::redError('Je oude e-mailaddres is fout, denk aan hoofdletters'));
    } else if($mailNew != $mailNew2) {
    // Is je nieuwe e-mailadres niet hetzelfde?
        $template->assign('editError', incWeb::redError('Je e-mailadressen zijn niet hetzelfde'));
    // Alles goed? Opslaan en een error geven.
    } else {
        Users::updateUser($userID, "mail", $mailNew);
        $template->assign('editError', incWeb::greenError('Je e-mailadres is met succes aangepast'));
    }
}

// Basis assigns voor de pagina.
$varSettingsEmail = array(
    // siteTile = De website titel in de url balk.
    "siteTitle" => $siteShort." &bull; E-mail wijzigen",
    // editError = Standaard error, leeg laten.
    "editError" => "",
    // loadCss = De css specifiek voor deze pagina.
    "loadCss" => '<!-- Resources - CSS -->
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/buttons.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/boxes.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/tooltips.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/welcome.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/personal.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/group.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/rooms.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/settings.css" />',
    // loadJs = De js specifiek voor deze pagina.
    "loadJs" => '<!-- Resources - JS -->
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/visual.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/common.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/fullcontent.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs2.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/group.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/rooms.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/moredata.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/settings.js"></script>',
    // extraJs = De extra js scripts voor deze pagina.
    "extraJs" => "document.habboLoggedIn = true;
    var habboName = '$userName';
    var habboReqPath = '$siteLink';
    var habboStaticFilePath = '$siteTemplateStyle';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    var cmsHabblets = 'Templates/$siteTemplate/habblets/';
    window.name = 'habboMain';
    L10N.put('purchase.group.title', 'Maak een groep');",
    // navHead = De navigatie specifiek voor deze pagina.
    "navHead" => '
    <li class="selected"><strong>'.$userName.'</strong><span></span></li>
    <li class=""><a href="community">Community</a><span></span></li>
    <li class=""><a href="staff">Medewerkers</a><span></span></li>
    <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
    <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
    ',
    // navSub = De sub navigatie specifiek voor deze pagina.
    "navSub" => '
    <li><a href="me">Homepage</a></li>
    <li><a href="profile">Profiel</a></li>
    <li class="selected">Instellingen</li>
    <li class="last"><a href="logout">Uitloggen</a></li>
    '
);

// Defineer de pagina assigns.
$template->assign($varSettingsEmail);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'SettingsEmail');
$template->draw($siteTemplate.'_footer');

// page end..