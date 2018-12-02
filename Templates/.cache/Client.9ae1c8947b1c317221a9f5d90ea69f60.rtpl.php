<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="<?php echo $siteAuthor;?>" />
    <meta name=description content="<?php echo $siteName;?>" />
    <meta name=build content="Alpha <?php echo $cmsV;?>-<?php echo $cmsB;?>" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/libs2.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/visual.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/libs.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/common.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/habboflashclient.js"></script>
    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/swfobject.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/client.css" />
    
    <script type="text/javascript">
    var BaseUrl = "<?php echo $clientHabboswffolder;?>";
    var flashvars = {
        "special.url" : "<?php echo $clientSpecial;?>",
        "client.allow.cross.domain" : "1",
        "client.notify.cross.domain" : "0", 
        "connection.info.host" : "<?php echo $clientIp;?>",
        "connection.info.port" : "<?php echo $clientPort;?>",
        "site.url" : "<?php echo $siteLink;?>",
        "url.prefix" : "<?php echo $siteLink;?>",
        "client.reload.url" : "<?php echo $siteLink;?>client",
        "client.fatal.error.url" : "<?php echo $siteLink;?>client",
        "client.connection.failed.url" : "<?php echo $siteLink;?>client",
        "external.variables.txt" : "<?php echo $clientExternalVariables;?>?<?php echo $time;?>",
        "external.texts.txt" : "<?php echo $clientExternalTexts;?>?<?php echo $time;?>",
        "external.override.texts.txt" : "<?php echo $clientOverrideTexts;?>",
        "external.override.variables.txt" : "<?php echo $clientOverrideVariables;?>",
        "external.figurepartlist.txt" : "<?php echo $clientFiguredata;?>", 
        "productdata.load.url" : "<?php echo $clientProductdata;?>?<?php echo $time;?>",
        "furnidata.load.url" : "<?php echo $clientFurnidata;?>?<?php echo $time;?>",
        "use.sso.ticket" : "1",
        "sso.ticket" : "<?php echo $clientSso;?>",
        "client.starting" : "Even geduld! <?php echo $siteName;?> start op.", 
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
    swfobject.embedSWF(BaseUrl + "<?php echo $clientHabboswf;?>", "client", "100%", "100%", "10.0.0", "<?php echo $clientSwf;?>/expressInstall.swf", flashvars, params, null);
    </script>
    
    <title><?php echo $siteTitle;?></title>
    <link rel="shortcut icon" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/favicon.ico" />
</head>

<body>
<div id="client"></div>
</body>
</html>