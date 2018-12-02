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

// Gebruik je plus of comet? Dan heb je altijd Habbo Club.
if(Config::R('emuUsing') == 'plus' || Config::R('emuUsing') == 'comet') {
    $template->assign('userHC', 'Je hebt voor altijd Habbo Club!');
    $template->assign('hcBuy', '');
// Gebruik je arcturus? Dan kan je club kopen.
} else {
    if(Core::getData('club_expire_timestamp', 'users_settings', 'user_id', $userID) > 0) {
        $template->assign('userHC', 'Je hebt nog Habbo Club tot<br /><b>'.Users::getClubDays($userID));
    } else {
        $template->assign('userHC', 'Je hebt nog geen lidmaatschap op '.$siteShort.' Club!');
    }
    $template->assign('hcBuy', '
        <div id="hc-buy-container" class="box-content">
            <div id="hc-buy-buttons" class="hc-buy-buttons rounded rounded-hcred">
                <form>
                    <table>
                        <tr>
                            <td><a class="new-button fill" onclick="habboclub.buttonClick(1, \'HABBO CLUB\'); return false;" href="#"><b>1 maand</b><i></i></a></td>
                            <td>&nbsp;100 Credits</td>
                        </tr>
                        <tr>
                            <td><a class="new-button fill" onclick="habboclub.buttonClick(3, \'HABBO CLUB\'); return false;" href="#"><b>3 maanden</b><i></i></a></td>
                            <td>&nbsp;200 Credits</td>
                        </tr>
                        <tr>
                            <td><a class="new-button fill" onclick="habboclub.buttonClick(6, \'HABBO CLUB\'); return false;" href="#"><b>6 maanden</b><i></i></a></td>
                            <td>&nbsp;400 Credits</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    ');
}

// Basis assigns voor de pagina.
$varClub = array(
    // siteTile = De website titel in de url balk.
    "siteTitle" => $siteShort." &bull; ".$siteShort." Club",
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
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/moredata.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/habboclub.js"></script>',
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
    <li class=""><a href="news">Nieuws</a></li>
    <li class="selected">'.$siteShort.' Club</li>
    <li class=""><a href="guild">Groepen</a></li>
    <li class="last"><a href="tags">Tags</a></li>
    '
);

// Defineer de pagina assigns.
$template->assign($varClub);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'Club');
$template->draw($siteTemplate.'_footer');

// page end..