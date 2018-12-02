<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="{$siteAuthor}" />
    <meta name=description content="{$siteName}" />
    <meta name=build content="Alpha {$cmsV}-{$cmsB}" />
    
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}styles/maintenance.css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    
    <title>{$siteTitle}</title>
    <link rel="shortcut icon" href="{$siteLink}{$siteTemplateStyle}images/favicon.ico" />
</head>

<body>
<div id="container">
    <div id="content">
        <div id="header" class="clearfix">
            <h1><span style="width: 300px;"></span></h1>
        </div>
        <div id="process-content">
            <div class="fireman">
                <h1>Oeps, we zijn heel even in onderhoud!</h1>
                <p>
                    <i>Nee hé, heeft {$siteOwner} weer wat gedaan? ..</i><br /><br />
                    Geen paniek, er is niets aan de hand!<br />We updaten de website even<br />
                    Dit duurt niet lang!<br /><br />
                    - Het {$siteShort} Team
                </p>
            </div>
            <div class="tweet-container">
                <h2>Wat is er aan de hand?</h2>
                <div style="padding: 10px; line-height: 15px; margin: 10px; background: #f5f5f5; border-radius: 5px;">
                    Kleine tekst...
                </div>
                <div style="padding: 10px; line-height: 15px; margin: 10px; border: 1px solid #f5f5f5; border-radius: 5px;">
                    Nog zo'n kleine tekst..
                </div>
                <div style="padding: 10px; line-height: 15px; margin: 10px; background: #f5f5f5; border-radius: 5px;">
                    Hey, kijk is! Nog meer tekst..
                </div>
            </div>
            <div id="footer">
                <p>
                    <strong>{$siteShort} is gemaakt door {$siteOwner}</strong>
                </p>
                <p>
                    <strong><a href="//acell.weszdev.com/_versions/about.htm" target="_blank" style="text-decoration:none;">AcellCMS 0.2</a></strong> - Developed by Wesz.<br />
                    Powered by <a href="https://weszdev.com" target="_blank">wow</a> &copy; 2018
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    HabboView.run();
</script>
</body>
</html>