<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="{$siteAuthor}" />
    <meta name=description content="{$siteName}" />
    <meta name=build content="Alpha {$cmsV}-{$cmsB}" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/libs2.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/visual.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/libs.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/common.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/habboflashclient.js"></script>
    <script type="text/javascript" src="{$siteLink}{$siteTemplateStyle}static/js/swfobject.js"></script>
    
    <link rel="stylesheet" type="text/css" href="{$siteLink}{$siteTemplateStyle}v2/styles/client.css" />
    
    <script type="text/javascript">
    var BaseUrl = "{$clientHabboswffolder}";
    var flashvars = {
        "special.url" : "{$clientSpecial}",
        "client.allow.cross.domain" : "1",
        "client.notify.cross.domain" : "0", 
        "connection.info.host" : "{$clientIp}",
        "connection.info.port" : "{$clientPort}",
        "site.url" : "{$siteLink}",
        "url.prefix" : "{$siteLink}",
        "client.reload.url" : "{$siteLink}client",
        "client.fatal.error.url" : "{$siteLink}client",
        "client.connection.failed.url" : "{$siteLink}client",
        "external.variables.txt" : "{$clientExternalVariables}?{$time}",
        "external.texts.txt" : "{$clientExternalTexts}?{$time}",
        "external.override.texts.txt" : "{$clientOverrideTexts}",
        "external.override.variables.txt" : "{$clientOverrideVariables}",
        "external.figurepartlist.txt" : "{$clientFiguredata}", 
        "productdata.load.url" : "{$clientProductdata}?{$time}",
        "furnidata.load.url" : "{$clientFurnidata}?{$time}",
        "use.sso.ticket" : "1",
        "sso.ticket" : "{$clientSso}",
        "client.starting" : "Even geduld! {$siteName} start op.", 
        "processlog.enabled" : "0",
        "flash.client.url" : BaseUrl,
        "client.starting.revolving" : "For science, you monster/Loading funny message... please wait./Would you like fries with that?/Follow the yellow duck./Time is just an illusion./Are we there yet?!/I like your t-shirt./Look left. Look right. Blink twice. Ta da!/It\'s not you, it\'s me./Shhh! I\'m trying to think here./Loading pixel universe.",
        "flash.client.origin" : "popup" 
    };
    var params = {
        "base" : BaseUrl + "",
        "allowScriptAccess" : "always",
        "menu" : "false" 
    };
    swfobject.embedSWF(BaseUrl + "{$clientHabboswf}", "client", "100%", "100%", "10.0.0", "{$clientSwf}/expressInstall.swf", flashvars, params, null);
    </script>
    
    <title>{$siteTitle}</title>
    <link rel="shortcut icon" href="{$siteLink}{$siteTemplateStyle}images/favicon.ico" />
</head>

<body>
<div id="client"></div>
</body>
</html>