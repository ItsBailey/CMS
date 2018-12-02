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

// Is er een groep naam opgegeven?
$guildId = isset($_GET['id']) ? $_GET['id']: 1;
$do = isset($_GET['do']) ? $_GET['do']: '';
$guildName = '';

// Is er een groep id?
if(!empty($guildId)) {
    // Vraag de groep naam op
    $guildName = Core::getGuildName($guildId);
    // Zet een titel met groep naam.
    $template->assign('siteTitle', $siteShort.' &bull; Groep: '.$guildName);
    // Selcteer het id van de groep beheerder.
    $guildOwner = DB::queryFirstField("SELECT ".Emu::Get('table.Guilds.user_id')." FROM ".Emu::Get('tablename.Guilds')." WHERE id =%i LIMIT 1", $guildId);
    // Is de bezoeker eigenaar van de groep?
    if($guildOwner == Users::getData('id', $userID)) {
        $template->assign('guildEdit', '<a href="#" id="myhabbo-group-tools-button" class="new-button dark-button edit-icon" style="float:left"><b><span></span>Wijzigen</b><i></i></a>');
    // Of niet?
    } else {
        $template->assign('guildEdit', '');
    }
}

// Accepteer geen mensen die niet ingelogd zijn.
if(!Users::isLogged()) { Core::forcePage($siteLink); exit; }

// Basis assigns voor de pagina.
$varGuild = array(
    // loadCss = De css specifiek voor deze pagina.
    "loadCss" => '<!-- Resources - CSS -->
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/buttons.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/boxes.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/tooltips.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/myhabbo.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/skins.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/dialogs.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/buttons.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/control.textarea.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/boxes.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/myhabbo.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/assets.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/group.css" />
    <style type="text/css">#playground, #playground-outer {
        width: 752px;
        height: 1360px;
    }
    </style>',
    // loadJs = De js specifiek voor deze pagina.
    "loadJs" => '<!-- Resources - JS -->
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/visual.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/common.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/fullcontent.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs2.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/homeview.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/homeauth.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/homeedit.js"></script>',
    // extraJs = De extra js scripts voor deze pagina.
    "extraJs" => "document.habboLoggedIn = true;
    var habboName = '$userName';
    var habboReqPath = '$siteLink';
    var habboStaticFilePath = '$siteTemplateStyle';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    var cmsHabblets = 'Templates/$siteTemplate/habblets/';
    window.name = 'habboMain';
    L10N.put('purchase.group.title', 'Maak een groep');
    document.observe(\"dom:loaded\", function() {
        initView(55918, 1478728);
    });
    ",
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
    <li class="selected">Groepen</li>
    <li class="last"><a href="tags">Tags</a></li>
    '
);

// Defineer de pagina assigns.
$template->assign($varGuild);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'Guild');
$template->draw($siteTemplate.'_footer');

// page end..