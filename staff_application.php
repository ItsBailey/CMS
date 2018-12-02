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

$id = 0;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// add id
// id 0 = basic. id 1++ is vacature van rank.
// check ff hoe je het doet. slaapkop.

// Basis assigns voor de pagina.
$varStaffApplication = array(
    // siteTile = De website titel in de url balk.
    "siteTitle" => $siteShort." &bull; Vacatures",
    // loadCss = De css specifiek voor deze pagina.
    "loadCss" => '<!-- Resources - CSS -->
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/buttons.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/boxes.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/tooltips.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/welcome.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/personal.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/group.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/rooms.css" />',
    // loadJs = De js specifiek voor deze pagina.
    "loadJs" => '<!-- Resources - JS -->
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/visual.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/common.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/fullcontent.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs2.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/group.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/rooms.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/moredata.js"></script>',
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
    <li class=""><a href="me">'.$userName.'</a><span></span></li>
    <li class=""><a href="community">Community</a><span></span></li>
    <li class="selected"><strong>Medewerkers</strong><span></span></li>
    <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
    <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
    ',
    // navSub = De sub navigatie specifiek voor deze pagina.
    "navSub" => '
    <li><a href="staff">Medewerkers</a></li>
    <li><a href="staff_experts">Experts</a></li>
    <li><a href="staff_others">Anders</a></li>
    <li><a href="staff_team">Het Team</a></li>
    <li class="selected last">Vacatures</li>
    ',
    "id" => $id,
);

// Defineer de pagina assigns.
$template->assign($varStaffApplication);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'StaffApplication');
$template->draw($siteTemplate.'_footer');

// page end..