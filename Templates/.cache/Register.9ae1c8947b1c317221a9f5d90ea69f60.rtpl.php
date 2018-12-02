<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang=nl>
<head>
    <!-- Resources - META -->
    <meta charset=UTF-8 />
    <meta name=author content="<?php echo $siteAuthor;?>" />
    <meta name=description content="<?php echo $siteName;?>" />
    <meta name=build content="Alpha <?php echo $cmsV;?>-<?php echo $cmsB;?>" />
    <meta name=copyright content="Made by WeszDEV.com" />

    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/style.css" />
    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/buttons.css" />
    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/process.css" />
    <link rel=stylesheet type="text/css" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>v2/styles/registration.css" />

    <script type="text/javascript" src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>static/js/visual.js"></script>
    
    <script type="text/javascript">
    document.habboLoggedIn = false;
    var habboName = null;
    var habboReqPath = '';
    var habboStaticFilePath = '<?php echo $siteTemplateStyle;?>';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    window.name = 'habboMain';
    
    HabboView.add(function() {
        Rounder.addCorners($('register-avatar-editor-title'), 4, 4, 'rounded-container');
    });
    </script>
    
    <!-- Resources - TITLE AND ICON -->
    <title><?php echo $siteTitle;?></title>
    <link rel="shortcut icon" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/favicon.ico" />
</head>

<body id="register" class="process-template secure-page">
<div id="overlay"></div>
<div id="container">
    <div class="cbb process-template-box clearfix">
        <div id="content">
            <div id="header" class="clearfix">
                <h1><a href="index"></a></h1>
                <ul class="stats">
                    <li class="stats-online"><span class="stats-fig"><?php echo $onlineCount;?></span>
                        spelers online
                    </li>
                    <li class="stats-visited"><img src="<?php echo $siteTemplateStyle;?>v2/images/<?php echo $onlineOfflineIndex;?>.gif" alt="Server Status" border="0"></li>
                </ul>
            </div>
            
            <div id="process-content">
                <div id="column1" class="column">
                    <div class="habblet-container">
                        <?php echo $referral;?>

                        <?php echo $registerError;?>

                        <form method="POST" id="registerform" autocomplete="off">
                            <?php echo $referralInput;?>

                            <div id="register-column-left">
                                <div id="register-section-2">
                                    <div class="rounded rounded-blue">
                                        <h2 class="heading"><span class="numbering white">1.</span>KIES EEN NAAM</h2>
                                        <fieldset id="register-fieldset-name">
                                            <div class="register-label white">Gebruikersnaam</div>
                                            <input type="text" name="username" id="register-name" class="register-text" required />
                                            <span id="register-name-check-container">
                                                <a class="new-button search-icon" href="#" id="register-name-check"><b><span></span></b><i></i></a>
                                            </span>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div id="register-section-3">
                                    <div class="cbb clearfix gray">
                                        <h2 class="title heading"><span class="numbering white">2.</span>Jouw details</h2>
                                        <div class="box-content">
                                            <fieldset id="register-fieldset-password">
                                                <div class="register-label">
                                                    <label for="register-password">Mijn wachtwoord</label>
                                                </div>
                                                <div class="register-label">
                                                    <input type="password" name="password" id="register-password" class="register-text" required />
                                                </div>
                                                <div class="register-label">
                                                    <label for="register-password2">Wachtwoord herhalen</label>
                                                </div>
                                                <div class="register-label">
                                                    <input type="password" name="password2" id="register-password2" class="register-text" required />
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="register-label">
                                                    <label>Ik ben geboren op:</label>
                                                </div>
                                                <div id="register-birthday">
                                                    <select name="bornDay" id="bornDay" class="dateselector" required>
                                                        <option value="">Dag</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                    <select name="bornMonth" id="bornMonth" class="dateselector" required>
                                                        <option value="">Maand</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                    <select name="bornYear" id="bornYear" class="dateselector" required>
                                                        <option value="">Jaar</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="register-label">
                                                    <label for="register-email">E-mailadres</label>
                                                </div>
                                                <div class="register-label">
                                                    <input type="email" name="mail" id="register-email" class="register-text" required />
                                                </div>
                                                <div class="register-label">
                                                    <label for="register-email2">E-mailadres herhalen</label>
                                                </div>
                                                <div class="register-label">
                                                    <input type="email" name="mail2" id="register-email2" class="register-text" required />
                                                </div>
                                            </fieldset>
                                            <fieldset id="register-fieldset-terms">
                                                <div class="rounded rounded-darkgray" id="register-terms">
                                                    <div id="register-terms-content">
                                                        <p><a href="disclaimer" target="_blank" id="register-terms-link">Algemene Voorwaarden</a></p>
                                                        <p class="last">
                                                            <input type="checkbox" name="tos" id="register-terms-check" value="true" required />
                                                            <label for="register-terms-check">Door op 'Doorgaan' te drukken, bevestig je akkoord te gaan met de Algemene Voorwaarden.</label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="register-column-right">
                                <div id="register-avatar-editor-title">
                                    <h2 class="heading"><span class="numbering white">3.</span>Kies een karakter</h2>
                                </div>
                                <div id="avatar-error-box"></div>
                                <div id="register-avatar-editor">
                                    <h3>Meisjes</h3>
                                    <div class="register-avatars clearfix">
                                        <div class="register-avatar" style="background-image: url(http://www.habbo.co.uk/habbo-imaging/avatar/hr-505-40.hd-625-5.ch-665-66.lg-715-77.sh-740-88.ha-1020-.he-1605-72.ea-1404-69.wa-2009-72,s-0.g-1.d-4.h-4.a-0,b1c6d189e50bdb212298d8abb4fecd6f.gif)">
                                            <input type="radio" name="randomFigure" value="F-hr-505-40.hd-625-5.ch-665-66.lg-715-77.sh-740-88.ha-1020-.he-1605-72.ea-1404-69.wa-2009-72" checked="checked" />
                                        </div>
                                        <div class="register-avatar" style="background-image: url(http://www.habbo.co.uk/habbo-imaging/avatar/hd-600-3.ch-685-72.lg-715-62.sh-730-72.hr-545-45,s-0.g-1.d-4.h-4.a-0,a84223ce0944cfa29266ac6479f3dc28.gif)">
                                            <input type="radio" name="randomFigure" value="F-hd-600-3.ch-685-72.lg-715-62.sh-730-72.hr-545-45" />
                                        </div>
                                        <div class="register-avatar" style="background-image: url(http://www.habbo.co.uk/habbo-imaging/avatar/hd-600-1.ch-685-72.lg-715-72.sh-907-68.hr-890-39.ca-1818-.he-1610-,s-0.g-1.d-4.h-4.a-0,14edf197f523577dfa41db90af0ad9ca.gif)">
                                            <input type="radio" name="randomFigure" value="F-hd-600-1.ch-685-72.lg-715-72.sh-907-68.hr-890-39.ca-1818-.he-1610-" />
                                        </div>
                                    </div>
                                    <h3>Jongens</h3>
                                    <div class="register-avatars clearfix">
                                        <div class="register-avatar" style="background-image: url(http://www.habbo.co.uk/habbo-imaging/avatar/hd-180-2.ch-235-62.lg-281-62.sh-290-62.hr-165-34.ca-1802-,s-0.g-1.d-4.h-4.a-0,9f489bd657bd52e81e274526b9b91c93.gif)">
                                            <input type="radio" name="randomFigure" value="M-hd-180-2.ch-235-62.lg-281-62.sh-290-62.hr-165-34.ca-1802-" />
                                        </div>
                                        <div class="register-avatar" style="background-image: url(http://www.habbo.co.uk/habbo-imaging/avatar/hr-893-48.hd-205-3.ch-878-70.lg-280-78.sh-906-64.ea-1403-78,s-0.g-1.d-4.h-4.a-0,eb135383bd46a25b7464d07f27604df8.gif)">
                                            <input type="radio" name="randomFigure" value="M-hr-893-48.hd-205-3.ch-878-70.lg-280-78.sh-906-64.ea-1403-78" />
                                        </div>
                                        <div class="register-avatar" style="background-image: url(http://www.habbo.co.uk/habbo-imaging/avatar/hr-889-36.hd-207-5.ch-210-62.lg-280-62.sh-300-62.wa-2009-62.ea-1404-66.ha-1010-62.fa-1201-.ca-1805-62.he-1608-,s-0.g-1.d-4.h-4.a-0,5d541e21a3bc762448e1e21955f59f17.gif)">
                                            <input type="radio" name="randomFigure" value="M-hr-889-36.hd-207-5.ch-210-62.lg-280-62.sh-300-62.wa-2009-62.ea-1404-66.ha-1010-62.fa-1201-.ca-1805-62.he-1608-" />
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Als je de karakters niet mooi vind, kan je ze later altijd nog veranderen in het hotel!
                                </p>
                                <div id="register-buttons">
                                    <input type="submit" value="Doorgaan" name="submit" class="continue" id="register-button-continue" />
                                    <a href="index" class="cancel">Stoppen</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                <?php echo $tplRounder;?>

            </div>