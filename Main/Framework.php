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

/**
 * @name wowCMS
 * @copyright (c) 2018, Wesley
 * @author WeszDEV <Wesley@WeszDEV.com>
 * @version 0.8
**/

// Hier starten we eerst de sessie.
session_start();

// Zet alles op nederlandse tijdzone's.
date_default_timezone_set("Europe/Amsterdam");
setlocale(LC_ALL, "nl_NL");

// Defineer het systeem.
define("wow", TRUE);

// ################################################## //

// Laad de extensies in.
require_once 'Classes/extRainTPL.php';
require_once 'Classes/extMeekroDB.php';

// Laad het configuratie bestand in.
require_once 'Configuration.php';

// Laad het template bestand in.
require_once 'Classes/classTemplate.php';
$template = new Template();

// Nieuwe CMS gebruiker? Start de install.php.
if(empty(Config::R('dbHost')) || empty(Config::R('dbUser')) || empty(Config::R('dbName'))) {
    header('Location: install?step=0');
// Toch niet nieuw?
} else {
    // Dan moet je wel het install.php bestand verwijderen.
    if(file_exists('install.php')) {
        if(Config::R('siteLang') == 'nl') {
            echo '<h1>Let op!</h1><hr><p>Het ziet er naar uit dat je al klaar bent met het installeren van AcellCMS, verwijder het bestand \'install.php\' om veilig door te gaan.</p>';
        } else {
            echo '<h1>Warning!</h1><hr><p>It looks like you\'re done with installing AcellCMS. Delete the file \'install.php\' to be safe and start with you\'re brand new hotel.</p>';
        }
        exit;
    // Verwijderd? Ga dan door.
    } else {
        DB::$host = Config::R('dbHost');
        DB::$user = Config::R('dbUser');
        DB::$password = Config::R('dbPass');
        DB::$dbName = Config::R('dbName');
        require_once 'check.php';
        if($newVersion.$newBuild !== $cmsVersion.$cmsBuild) {
            header('Location: upgrade?step=0');
        }
    }
}

// ################################################## //

// Laad het core en users bestand in.
require_once 'Classes/classCore.php';
require_once 'Classes/classUsers.php';
require_once 'Classes/classEmu.php';

// Laad alle includes in voor de templates.
require_once 'Includes/incWeb.php';
require_once 'Includes/incCms.php';

// Laad het emulator bestand in.
require_once 'Emulator/'.Config::R('emuUsing').'.php';

// Start met de basis variables.
$remoteIp = $_SERVER['REMOTE_ADDR'];
$time = time();
$siteName = Core::getSystem('sitename');
$siteShort = Core::getSystem('shortname');
$siteOwner = Core::getSystem('owner');
$siteLink = Config::R('siteLink');
$siteLang = Core::getSystem('language');
$siteTemplate = Config::R('siteTemplate');
$siteTemplateStyle = Config::R('siteTemplateStyle');
$siteDir = 'Templates/'.$siteTemplate.$siteTemplateStyle;
$cmsTemplate = Config::R('cmsTemplate');
$cmsTemplateStyle = Config::R('cmsTemplateStyle');
$cmsDir = 'cms/Templates/'.$cmsTemplate.$cmsTemplateStyle;
$siteAuthor = Core::getSystem('owner');
$logged = FALSE;

// Zet het belangrijkste om voor het front-end.
$varBasic = array(
    "siteName" => $siteName,
    "siteShort" => $siteShort,
    "siteOwner" => $siteOwner,
    "siteLink" => $siteLink,
    "siteLang" => $siteLang,
    "siteTemplate" => 'Templates/'.$siteTemplate,
    "siteTemplateStyle" => 'Templates/'.$siteTemplate.$siteTemplateStyle,
    "cmsTemplate" => 'cms/Templates/'.$cmsTemplate,
    "cmsTemplateStyle" => 'cms/Templates/'.$cmsTemplate.$cmsTemplateStyle,
    "siteAuthor" => $siteAuthor,
    "cmsName" => $cmsName,
    "cmsAuthor" => $cmsAuthor,
    "cmsV" => $cmsVersion,
    "cmsB" => $cmsBuild,
    "cmsP" => $cmsProcedure,
    "time" => $time,
    "onlineCount" => Core::getOnline(),
    "feedNotify" => "",
); $template->assign($varBasic);

// ################################################## //

// Log de gebruiker automatisch uit na xx aantal minuten.
$timeOut = Config::R('siteTimeout') * 60;
if(isset($_SESSION['TIMEOUT'])) {
    $duration = time() - (int)$_SESSION['TIMEOUT'];
    if($duration > $timeOut) {
        session_destroy();
        session_start();
        Core::forcePage($siteLink);
        exit;
    }
} $_SESSION['TIMEOUT'] = time();

// Controleer of de website in onderhoud is.
$allowed = Config::R('siteOverrideIp');
if(!in_array($_SERVER['REMOTE_ADDR'], $allowed)) {
    if(Core::checkMaintenance() && !defined(('MAINTENANCE'))) {
        Core::forcePage($siteLink.'maintenance');
    }
}

// Website in onderhoud maar wel toegang? Krijg een melding.
if(Core::checkMaintenance() && in_array($_SERVER['REMOTE_ADDR'], Config::R('siteOverrideIp'))) {
    $template->assign('feedNotifyMaintenance', incWeb::feedNotify('Op dit moment is de website in onderhoud!', 'Er kunnen dus fouten voorkomen op de website.'));
}

// Nieuws query's, maximaal 3.
// Eerst het laatste nieuws.
$newsFirst = DB::query("SELECT id,image,title,time,shortstory,story FROM cms_news WHERE id =%i LIMIT 1", Core::getLastId('cms_news'));
foreach($newsFirst as $news) {
    $varNewsFirst = array(
        "newsFirstId" => $news['id'],
        "newsFirstTitle" => $news['title'],
        "newsFirstImage" => $news['image'],
        "newsFirstShort" => $news['shortstory'],
        "newsFirstPosted" => date('d-m-Y', $news['time']),
        "newsFirstStory" => $news['story']
    ); $template->assign($varNewsFirst);
}

// Een na laatste.
$newsSecond = DB::query("SELECT id,title,time FROM cms_news ORDER BY id DESC LIMIT 1,2");
foreach($newsSecond as $news) {
    $varNewsSecond = array(
        "newsSecondId" => $news['id'],
        "newsSecondTitle" =>  $news['title'],
        "newsSecondPosted" => date('d-m-Y', $news['time'])
    ); $template->assign($varNewsSecond);
} $varNewsSecond = array("newsSecondId" => 0, "newsSecondTitle" => 'Nog geen tweede nieuwsbericht!', "newsSecondPosted" => 'Helaas..'); $template->assign($varNewsSecond);

// Voor een na laaste.
$newsThird = DB::query("SELECT id,title,time FROM cms_news ORDER BY id DESC LIMIT 2,3");
foreach($newsThird as $news) {
    $varNewsThird = array(
        "newsThirdId" => $news['id'],
        "newsThirdTitle" => $news['title'],
        "newsThirdPosted" => date('d-m-Y', $news['time'])
    ); $template->assign($varNewsThird);
} $varNewsThird = array("newsThirdId" => 0, "newsThirdTitle" => 'Nog geen derde nieuwsbericht!', "newsThirdPosted" => 'Helaas..'); $template->assign($varNewsThird);

// Controleer of de server aan staat van het hotel.
$mus = @fsockopen('127.0.0.1', Core::getSystem('port'));
if($mus) {
    $onlineOff = '<a href="client" id="enter-hotel-open-medium-link" target="client">Ga het hotel in</a>';
    $template->assign('onlineOffline', $onlineOff);
    $template->assign('onlineOfflineIndex', 'online');
    $template->assign('onlineOfflineMe', '<div class="open"><a href="client" target="client">Ga in '.$siteShort.'<i></i></a><b></b></div>');
    fclose($mus);
} else {
    $onlineOff = '<div id="hotel-closed-medium" style="margin: -10px;">'.$siteShort.' is offline</div>';
    $template->assign('onlineOffline', $onlineOff);
    $template->assign('onlineOfflineIndex', 'offline');
    $template->assign('onlineOfflineMe', '<div class="closed"><span>Hotel is gesloten</span><b></b></div>');
}

// ################################################## //

// Heeft een gebruiker een sessie? Defineer alles dan.
if(Users::isLogged()) {
    // Start met de basis variables.
    $logged = TRUE;
    $userID = $_SESSION['USERID'];
    $userName = Users::idToName($userID);
    // Zet het belangrijkste om voor het front-end.
    $varLogged = array(
        "userName" => $userName,
        "userID" => $userID,
        "userMotto" => Users::getData('motto', $userID),
        "userMail" => Users::getData(Emu::Get('table.Users.mail'), $userID),
        "userLook" => Users::getData(Emu::Get('table.Users.look'), $userID),
        "userRank" => Users::getData('rank', $userID),
        "userCredits" => Users::getData('credits', $userID),
        "userPixels" => Users::getData(Emu::Get('table.Users.pixels'), $userID),
        "userPoints" => Users::getData(Emu::Get('table.Users.points'), $userID),
        "userCreated" => date('d-m-Y H:i', Users::getData(Emu::Get('table.Users.account_created'), $userID)),
        "userLastLogin" => date('d-m-Y H:i', Users::getData(Emu::Get('table.Users.last_login'), $userID)),
    ); $template->assign($varLogged);
    // Is de gebruiker met een sessie verbannen?
    if(Users::isUserBanned(Users::nameToId($userName)) && !defined('ISUSER')) {
        Core::forcePage('banned');
        exit;
    }
// Heeft de gebruiker geen sessie? Default inputs dan.
} else {
    $logged = FALSE;
    $userName = 'Niet ingelogd..';
    $userID = 0;
    $varLogged = array(
        "userName" => $userName,
        "userID" => $userID,
        "userRank" => '1',
    ); $template->assign($varLogged);
}

// ################################################## //

// Zijn er assigns voor de template en op verschillende pagina's?
$template->assign('tplRounder', incWeb::boxRounder());

// page end..