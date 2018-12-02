<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="{$siteAuthor}" />
    <meta name=description content="{$siteName}" />
    <meta name=build content="Alpha {$cmsV}-{$cmsB}" />
    
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/visual.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/libs.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/common.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/fullcontent.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/libs2.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/group.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/rooms.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/moredata.js"></script>
    
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/buttons.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/boxes.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/tooltips.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/welcome.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/personal.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/group.css" />
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/rooms.css" />
    
    <script type="text/javascript">
    var andSoItBegins = (new Date()).getTime();
    document.habboLoggedIn = true;
    var habboName = {$userName};
    var habboReqPath = '{$siteTemplateStyle}';
    var habboStaticFilePath = '{$siteTemplateStyle}';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    window.name = 'habboMain';
    document.observe("dom:loaded", function() {
        initView(55918, 1478728);
    });
    </script>
    
    <title>{$siteTitle}</title>
    <link rel="shortcut icon" href="{$siteLink}{$siteTemplateStyle}images/favicon.ico" />
</head>

<body>
    <div id="overlay"></div>
    <div id="header-container">
        <div id="header" class="clearfix">
            <h1><a href="index.php"></a></h1>
            <div id="subnavi">
                <div id="subnavi-user">
                    <ul>
                        <li id="myfriends"><a href="#"><span>Mijn vrienden</span></a><span class="r"></span></li>
                        <li id="mygroups"><a href="#"><span>Mijn groepen</span></a><span class="r"></span></li>
                        <li id="myrooms"><a href="#"><span>Mijn kamers</span></a><span class="r"></span></li>
                    </ul>
                    <p>
                        <a href="client" id="enter-hotel-open-medium-link" target="client" onclick="openOrFocusHabbo('client'); return false;">Ga het hotel in</a>
                    </p>
                </div>
                
                <div id="subnavi-search">
                    <div id="subnavi-search-upper">
                        <ul id="subnavi-search-links">
                            <li><a href="help" target="habbohelp" onclick="openOrFocusHelp(this); return false">Help</a></li>
                            <li><a href="logout" class="userlink">Uitloggen</a></li>
                        </ul>
                    </div>
                    <form name="" action="" class="search-box clearfix">
                        <a id="search-button" class="new-button search-icon" href="#" onclick="$('search-button').up('form').submit(); return false;"><b><span></span></b><i></i></a>
                        <input type="text" name="tag" id="search_query" placeholder="Gebruikersnaam" class="search-box-query search-box-onfocus" style="float: right" />
                    </form>
                </div>
            </div>
            
            <ul id="navi">
                <li class=""><a href="me">{$userName}</a><span></span></li>
                <li class=""><a href="community">Community</a><span></span></li>
                <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
                <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
                <li id="tab-register-now"><a href="cms/" target="_blank"><b>Housekeeping</b></a><span></span></li>
            </ul>
            <div id="habbos-online">
                <div class="rounded"><span>{$onlineCount} {$siteShort}'s online nu!</span></div>
            </div>
        </div>
    </div>
    
    <div id="content-container">
        <div id="navi2-container" class="pngbg">
            <div id="navi2" class="pngbg clearfix">
                <ul>
                    <li class="selected last">Verbannen!</li>
                </ul>
            </div>
        </div>
        
        <div id="container">
            <div id="content">
                <div id="column1" class="column">
                    <div class="habblet-container">
                        
                    </div>
                    {$tplRounder}
                </div>
                
                <div id="column2" class="column">
                    <div class="habblet-container"></div>
                    {$tplRounder}
                    <div class="habblet-container"></div>
                    {$tplRounder}
                    <div class="habblet-container">
                        
                    </div>
                </div>
                {$tplRounder}
            </div>