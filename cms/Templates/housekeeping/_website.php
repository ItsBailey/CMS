<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="{$siteAuthor}" />
    <meta name=description content="{$siteName} - Housekeeping" />
    <meta name=build content="AcellCMS {$cmsV}-{$cmsB}" />
    
    <link rel=stylesheet type="text/css" href="{$siteLink}{$cmsTemplateStyle}css/style.css" />
    
    <script type="text/javascript" src="{$siteLink}{$cmsTemplateStyle}js/js.js"></script>
    <script type="text/javascript" src="{$siteLink}{$cmsTemplateStyle}ckeditor/ckeditor.js"></script>
    
    <title>{$siteTitle}</title>
    <link rel="shortcut icon" href="{$siteLink}{$cmsTemplateStyle}images/faviconW.ico" />
</head>

<body>
<div id="ipdwrapper">
    <div class="tabwrap-main">
        <div class="taboff-main">
            <img src="{$siteLink}{$cmsTemplateStyle}images/dashboard.png" style="vertical-align:middle" />
            <a href="dashboard">Dashboard</a>
        </div>
        <div class="tabon-main">
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
    
    <div class="outerdiv" id="global-outerdiv">
        <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
            <tr>
                <td width="22%" valign="top" id="leftblock">
                    <div>
                        <div class="menuouterwrap">
                            <div class="menucatwrap">
                                <img src="{$siteLink}{$cmsTemplateStyle}images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" />
                                Website instellingen
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website" style="text-decoration:none;font-weight: bold;">Basis</a>
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_hotel" style="text-decoration:none;font-weight: bold;">Hotel client links</a>
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_newsadd" style="text-decoration:none;font-weight: bold;">Nieuws schrijven</a>
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_news" style="text-decoration:none;font-weight: bold;">Nieuws beheren</a>
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_staffapps" style="text-decoration:none;font-weight: bold;">Medewerker vacatures</a>
                            </div>
                        </div><br />
                        <div class="menuouterwrap">
                            <div class="menucatwrap">
                                <img src="{$siteLink}{$cmsTemplateStyle}images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" />
                                Website teksten
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_texts_index" style="text-decoration:none;font-weight: bold;">index.php teksten</a>
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_texts_me" style="text-decoration:none;font-weight: bold;">me.php teksten</a>
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="{$siteLink}{$cmsTemplateStyle}images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="website_texts_staff" style="text-decoration:none;font-weight: bold;">staff.php teksten</a>
                            </div>
                        </div>
                    </div>
                </td>