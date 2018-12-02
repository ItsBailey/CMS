<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="{$siteAuthor}" />
    <meta name=description content="{$siteName} - Housekeeping" />
    <meta name=build content="AcellCMS {$cmsV}-{$cmsB}" />
    
    <link rel=stylesheet type="text/css" href="{$siteLink}{$cmsTemplateStyle}css/style.css" />
    
    <script type="text/javascript" src="{$siteLink}{$cmsTemplateStyle}js/js.js"></script>
    
    <title>{$siteTitle}</title>
    <link rel="shortcut icon" href="{$siteLink}{$cmsTemplateStyle}images/faviconW.ico" />
</head>

<body>
<div id="ipdwrapper">
    <div class="tabwrap-main">
        <div class="tabon-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/dashboard.png" style="vertical-align:middle" />
            <a href="dashboard">Dashboard</a>
        </div>
        <div class="taboff-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/tools.png" style="vertical-align:middle" />
            <a href="website">Website</a>
        </div>
        <div class="taboff-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/system.png" style="vertical-align:middle" />
            <a href="system">Systeem</a>
        </div>
        <div class="taboff-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/admin.png" style="vertical-align:middle" />
            <a href="users">Gebruikers</a>
        </div>
        <div class="taboff-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/components.png" style="vertical-align:middle" />
            <a href="extra">Extra</a>
        </div>
        <div class="taboff-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/help.png" style="vertical-align:middle" />
            <a href="help">Help</a>
        </div>
        <div class="logoright">
            <br />
            <font size="2" color="black">Live your life like life is your living..</font>
            &nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="sub-tab-strip">
        <div class="navwrap">
            Welkom <strong>{$userName}</strong>, {$userRank} [<a href="{$siteLink}">Terug naar {$siteShort}</a> &middot; <a href="logout">Uitloggen</a>]
        </div>
    </div>