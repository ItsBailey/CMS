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

// Is er een news id?
$newsId = isset($_GET['id']) ? (int)$_GET['id']: 0;

// Nieuws gegevens.
if(!empty($newsId)) {
    $query = DB::query("SELECT * FROM cms_news WHERE id =%i", $newsId);
    foreach($query as $news) {
        // Is het nieuws aangepast?
        if($news['updated'] == 1) {
            $updated = '<i><small>dit bericht is aangepast</small></i>';
        } else {
            $updated = '';
        }
        $varNewsArticle = array(
            "siteTitle" => $siteShort." &bull; ".$news['title'],
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
            <li class="selected"><strong>Community</strong><span></span></li>
            <li class=""><a href="staff">Medewerkers</a><span></span></li>
            <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
            <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
            ',
            // navSub = De sub navigatie specifiek voor deze pagina.
            "navSub" => '
            <li class=""><a href="community">Community</a></li>
            <li class="selected">Nieuws</li>
            <li class=""><a href="club">'.$siteShort.' Club</a></li>
            <li class=""><a href="guild">Groepen</a></li>
            <li class="last"><a href="tags">Tags</a></li>
            ',
            "newsTitle" => $news['title'],
            "newsId" => $news['id'],
            "newsShort" => $news['shortstory'],
            "newsStory" => $news['story'],
            "newsPosted" => date('d-m-Y', $news['time']),
            "newsAuthor" => $news['author'],
            "newsCategory" => $news['category'],
            "newsUpdated" => $updated,
        );
    }
// Geen nieuws id opgegeven? Standaard template.
} else {
    $varNewsArticle = array(
        "siteTitle" => $siteShort." &bull; Het laatste nieuws",
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
        <li class="selected"><strong>Community</strong><span></span></li>
        <li class=""><a href="staff">Medewerkers</a><span></span></li>
        <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
        <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
        ',
        // navSub = De sub navigatie specifiek voor deze pagina.
        "navSub" => '
        <li class=""><a href="community">Community</a></li>
        <li class="selected">Nieuws</li>
        <li class=""><a href="club">'.$siteShort.' Club</a></li>
        <li class=""><a href="guild">Groepen</a></li>
        <li class="last"><a href="tags">Tags</a></li>
        ',
        "newsTitle" => 'Geen nieuws',
        "newsId" => 0,
        "newsShort" => 'Helaas..',
        "newsStory" => 'Er is nog geen nieuws artikel of het gezochte artikel kan niet gevonden worden!',
        "newsPosted" => '04-12-1996',
        "newsAuthor" => 'Het Team',
        "newsCategory" => 'AcellCMS',
        "newsUpdated" => '',
    );
}

// Defineer de pagina assigns.
$template->assign($varNewsArticle);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'News');
$template->draw($siteTemplate.'_footer');

// page end..