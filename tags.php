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

// Is er een ingevoerde tag?
$tag = isset($_GET['tag']) ? strtolower($_GET['tag']) : '';

// Is er een tag die toegevoegd wordt?
if(isset($_GET['add']) && $_GET['add'] == TRUE) {
    // Controleer de tags van de gebruiker.
    $myTags = DB::query("SELECT COUNT(*) FROM cms_tags WHERE userid =%i", $userID);
    // Filter de tag.
    $filter = preg_replace("/[^a-z\d]/i", '', $tag);
    // Controleer of deze geldig is.
    $validTag = (strlen($tag) < 2 || $filter != $tag || strlen($tag) > 20 || $myTags > 20);
    // Controleer of de gebruiker deze tag al heeft.
    DB::query("SELECT id FROM cms_tags WHERE userid =%i AND tag =%s LIMIT 1", $userID, $tag);
    $countTag = DB::count();
    // Alles goed? Voeg de tag toe!
    if($validTag && !$countTag > 0) {
        DB::insert("cms_tags", array(
            "userid" => $userID,
            "tag" => $tag
        ));
    }
}

// Tel de tags op
DB::query("SELECT null FROM cms_tags WHERE tag =%s", $tag);
$countTag = DB::count();
if($countTag > 0) {
    $template->assign('countTags', '<br /><br /><p class="search-result-count">&nbsp;1 -'.$countTag.' / '.$countTag.'</p>');
} else {
    $template->assign('countTags', '<br /><br /><p class="search-result-count">Geen resultaat</p>');
}

// Voeg de ingevoerde tag toe.
if($countTag > 0 && Users::isLogged()) {
    $template->assign('addTag', '
    <p id="tag-search-add" class="clearfix">
        <span style="float:left">Voeg deze tag toe:</span>
        <a id="tag-search-tag-add" href="tags?tag='.$tag.'&add=true" class="new-button" style="float:left"><b>'.$tag.'</b><i></i></a>
    </p>
    ');
} else {
    $template->assign('addTag', '');
}

// Basis assigns voor de pagina.
$varCommunity = array(
    // siteTile = De website titel in de url balk.
    "siteTitle" => $siteShort." &bull; Tags",
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
    var habboSiteDir = '$siteDir';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    var cmsHabblets = 'Templates/$siteTemplate/habblets/';
    window.name = 'habboMain';
    L10N.put('purchase.group.title', 'Maak een groep');",
    // navHead = De navigatie specifiek voor deze pagina.
    "navHead" => '
    <li class=""><a href="me">'.$userName.'</a><span></span></li>
    <li class="selected"><strong>Community</strong><span></span></li>
    <li class=""><a href="staff">Medewerkers</a><span></span></li>
    <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
    <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
    ',
    // navSub = De sub navigatie specifiek voor deze pagina.
    "navSub" => '
    <li class=""><a href="community">Community</a></li>
    <li class=""><a href="news">Nieuws</a></li>
    <li class=""><a href="club">'.$siteShort.' Club</a></li>
    <li class=""><a href="guild">Groepen</a></li>
    <li class="selected last">Tags</li>
    ',
    // tag = De ingevoerde tag.
    "tag" => $tag
);

// Defineer de pagina assigns.
$template->assign($varCommunity);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'Tags');
$template->draw($siteTemplate.'_footer');

// page end..