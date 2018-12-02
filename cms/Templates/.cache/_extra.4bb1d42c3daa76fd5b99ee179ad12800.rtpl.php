<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="<?php echo $siteAuthor;?>" />
    <meta name=description content="<?php echo $siteName;?> - Housekeeping" />
    <meta name=build content="AcellCMS <?php echo $cmsV;?>-<?php echo $cmsB;?>" />
    
    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>css/style.css" />
    
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>js/js.js"></script>
    
    <title><?php echo $siteTitle;?></title>
    <link rel="shortcut icon" href="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/faviconW.ico" />
</head>

<body>
<div id="ipdwrapper">
    <div class="tabwrap-main">
        <div class="taboff-main">
            <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/dashboard.png" style="vertical-align:middle" />
            <a href="dashboard">Dashboard</a>
        </div>
        <div class="taboff-main">
            <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/tools.png" style="vertical-align:middle" />
            <a href="website">Website</a>
        </div>
        <div class="taboff-main">
            <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/system.png" style="vertical-align:middle" />
            <a href="system">Systeem</a>
        </div>
        <div class="taboff-main">
            <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/admin.png" style="vertical-align:middle" />
            <a href="users">Gebruikers</a>
        </div>
        <div class="tabon-main">
            <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/components.png" style="vertical-align:middle" />
            <a href="extra">Extra</a>
        </div>
        <div class="taboff-main">
            <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/help.png" style="vertical-align:middle" />
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
            Welkom <strong><?php echo $userName;?></strong>, <?php echo $userRank;?> [<a href="<?php echo $siteLink;?>">Terug naar <?php echo $siteShort;?></a> &middot; <a href="logout">Uitloggen</a>]
        </div>
    </div>
    
    <div class="outerdiv" id="global-outerdiv">
        <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
            <tr>
                <td width="22%" valign="top" id="leftblock">
                    <div>
                        <div class="menuouterwrap">
                            <div class="menucatwrap">
                                <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" />
                                Extra instellingen
                            </div>
                            <div class="menulinkwrap">&nbsp;
                                <img src="<?php echo $siteLink;?><?php echo $cmsTemplateStyle;?>images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
                                <a href="users" style="text-decoration:none;font-weight: bold;">Extra</a>
                            </div>
                        </div><br />
                    </div>
                </td>