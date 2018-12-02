<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="<?php echo $siteAuthor;?>" />
    <meta name=description content="<?php echo $siteName;?>" />
    <meta name=build content="Alpha <?php echo $cmsV;?>-<?php echo $cmsB;?>" />

    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/style.css" />
    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/buttons.css" />
    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/process.css" />

    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/visual.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/libs2.js"></script>
    
    <script type="text/javascript">
    document.habboLoggedIn = false;
    var habboName = null;
    var habboReqPath = '';
    var habboStaticFilePath = '<?php echo $siteTemplateStyle;?>';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    window.name = 'habboMain';
    </script>
    
    <title><?php echo $siteTitle;?></title>
    <link rel="shortcut icon" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/favicon.ico" />
</head>

<body id="landing" class="process-template">
    <div id="overlay"></div>
    <div id="container">
        <div class="cbb process-template-box clearfix">
            <div id="content">
                <div id="header" class="clearfix">
                    <h1><a href="index"></a></h1>
                    <ul class="stats">
                        <li class="stats-online">
                            <span class="stats-fig"><?php echo $onlineCount;?></span>
                            spelers online
                        </li>
                        <li class="stats-visited"><img src="<?php echo $siteTemplateStyle;?>v2/images/<?php echo $onlineOfflineIndex;?>.gif"</li>
                    </ul>
                </div>
                <div id="process-content">
                    <div id="terms" class="box-content">
                        <div class="tos-header"><h1>De Algemene Voorwaarden van <?php echo $siteName;?></h1></div>
                        <div class="tos-item">
                            Hier komt een lange intro
                        </div>
                        <div class="tos-item">
                            En hier weer een lange tekst
                        </div><br />
                        <div class="tos-item">
                            Bedadankt voor uw begrip.
                        </div>
                    </div>
                </div>
            