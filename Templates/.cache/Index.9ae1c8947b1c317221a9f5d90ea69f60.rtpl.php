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
    var habboPartner = 'WeszDEV.com';
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
                    <li class="stats-online"><span class="stats-fig"><?php echo $onlineCount;?></span>
                        <?php echo Core::getLanguage($siteLang, 'index', 'onlinePlayers'); ?>

                    </li>
                    <li class="stats-visited"><img src="<?php echo $siteTemplateStyle;?>v2/images/<?php echo $onlineOfflineIndex;?>.gif" alt="Server Status" border="0"></li>
                </ul>
            </div>
            
            <div id="process-content">
                <div id="column1" class="column">
                    <div class="habblet-container " id="create-habbo">
                        <div id="create-habbo-flash">
                            <div id="create-habbo-nonflash">
                                <div id="landing-register-text">
                                    <a href="register"><span><?php echo Core::getLanguage($siteLang, 'index', 'registerNow'); ?> >></span></a>
                                </div>
                                <div id="landing-promotional-text">
                                    <span><?php echo $siteName;?> <?php echo Core::getLanguage($siteLang, 'index', 'aVirtualWorld'); ?></span>
                                </div>
                            </div>
                            <div class="cbb clearfix green" id="habbo-intro-nonflash">
                                <h2 class="title"><?php echo Core::getLanguage($siteLang, 'index', 'getTheBest'); ?>:</h2>
                                <div class="box-content">
                                    <ul>
                                        <li id="habbo-intro-install" style="display:none"><a href="http://www.adobe.com/go/getflashplayer">Installeer Flash Player 8 of hoger</a></li>
                                        <noscript>
                                            <li><?php echo Core::getLanguage($siteLang, 'index', 'activateJS'); ?></li>
                                        </noscript>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript" language="JavaScript">
                        var swfobj = new SWFObject('<?php echo $siteTemplateStyle;?>flash/intro/habbos.swf', 'ch', '396', '378', '8');
                        swfobj.addParam('AllowScriptAccess', 'always');
                        swfobj.addParam('wmode', 'transparent');
                        swfobj.addVariable('base_url', '<?php echo $siteTemplateStyle;?>flash/intro')
                        swfobj.addVariable('habbos_url', '<?php echo $siteTemplateStyle;?>xml/promo_habbos.php');
                        swfobj.addVariable('create_button_text', '<?php echo Core::getLanguage($siteLang, 'index', 'registerNow'); ?>');
                        swfobj.addVariable('in_hotel_text', 'Online nu!');
                        swfobj.addVariable('slogan', '<?php echo Core::getLanguage($siteLang, 'index', 'pushStart'); ?>')
                        swfobj.addVariable('video_start', 'START');
                        swfobj.addVariable('video_stop', 'STOP');
                        swfobj.addVariable('button_link', 'register');
                        swfobj.addVariable('localization_url', '<?php echo $siteTemplateStyle;?>xml/landing_intro_<?php echo $siteLang; ?>.xml');
                        swfobj.addVariable('video_link', '<?php echo $siteTemplateStyle;?>flash/intro/Habbo_intro.swf');
                        swfobj.write('create-habbo-flash');
                        HabboView.add(function()  {
                            if (deconcept.SWFObjectUtil.getPlayerVersion()['major'] >= 8) {
                                try {
                                    $('habbo-intro-nonflash').hide();
                                } catch (e) {}
                            } else {
                                $('habbo-intro-install').show();
                            }
                        });
                        var PromoHabbos = {
                            track: function(n) {
                                if (!!n && window.pageTracker) {
                                    pageTracker._trackPageview('/landingpromo/' + n);
                                }
                            }
                        }
                        </script>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                
                <div id="column2" class="column">
                    <div class="habblet-container ">
                        <?php echo $loginError;?>

                        <div class="cbb loginbox clearfix">
                            <h2 class="title"><?php echo Core::getLanguage($siteLang, 'index', 'loggingIn'); ?></h2>
                            <div class="box-content clearfix" id="login-habblet">
                                <form method="POST" class="login-habblet">
                                    <ul>
                                        <li>
                                            <label for="login-username" class="login-text"><?php echo Core::getLanguage($siteLang, 'index', 'username'); ?></label>
                                            <input type="text" name="username" class="login-field" id="login-username" />
                                        </li>
                                        <li>
                                            <label for="login-password" class="login-text"><?php echo Core::getLanguage($siteLang, 'index', 'password'); ?></label>
                                            <input type="password" name="password" class="login-field" id="login-password" />
                                            <input type="submit" name="submit" value="<?php echo Core::getLanguage($siteLang, 'index', 'logIn'); ?>" class="submit" id="login-submit-new-button" />
                                        </li>
                                        <li class="no-label">
                                            <input type="checkbox" name="remember" id="login-remember-me" value="true" />
                                            <label for="login-remember-me"><?php echo Core::getLanguage($siteLang, 'index', 'rememberMe'); ?></label>
                                        </li>
                                        <li class="no-label">
                                            <a href="register" id="forgot-password"><span><?php echo Core::getLanguage($siteLang, 'index', 'registerFree'); ?></span></a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div id="remember-me-notification" class="bottom-bubble" style="display:none;">
                            <div class="bottom-bubble-t"><div></div></div>
                            <div class="bottom-bubble-c">
                                <?php echo Core::getLanguage($siteLang, 'index', 'rememberMeDesc'); ?>

                            </div>
                            <div class="bottom-bubble-b"><div></div></div>
                        </div>
                        <script type="text/javascript">
                        HabboView.add(LoginFormUI.init);
                        HabboView.add(RememberMeUI.init);
                        </script>
                    </div>
                    <?php echo $tplRounder;?>

                    <div class="habblet-container "></div>
                    <?php echo $tplRounder;?>

                        
                    <div class="habblet-container ">
                        <div class="ad-container">
                            <a href="register.php"><img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/images/landing/uk_party_frontpage_image.gif" alt="" /></a>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                <div id="column3" class="column"></div>
                
                