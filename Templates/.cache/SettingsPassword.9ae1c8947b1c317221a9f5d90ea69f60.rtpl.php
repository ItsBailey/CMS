<?php if(!class_exists('raintpl')){exit;}?>

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
                        <?php echo $onlineOffline;?>

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
                <?php echo $navHead;?>

                <?php echo incWeb::cmsAccess($userID); ?>

            </ul>
            <div id="habbos-online">
                <div class="rounded"><span><?php echo $onlineCount;?> <?php echo $siteShort;?>'s online nu!</span></div>
            </div>
        </div>
    </div>
    
    <div id="content-container">
        <div id="navi2-container" class="pngbg">
            <div id="navi2" class="pngbg clearfix">
                <ul>
                    <?php echo $navSub;?>

                </ul>
            </div>
        </div>
        
        <div id="container">
            <div id="content">
                <div>
                    <div class="content">
                        <div class="habblet-container" style="float:left; width:210px;">
                            <div class="cbb settings">
                                <h2 class="title">Account instellingen</h2>
                                <div class="box-content">
                                    <div id="settingsNavigation">
                                        <ul>
                                            <li><a href="settings">Basis instellingen ></a></li>
                                            <li><a href="settings_motto">Motto instellingen ></a></li>
                                            <li class="selected">Wachtwoord instellingen</li>
                                            <li><a href="settings_email">E-mail instellingen ></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="cbb habboclub-tryout">
                                 <h2 class="title">Join <?php echo $siteShort;?> Club!</h2>
                                 <div class="box-content">
                                     <div class="habboclub-banner-container habboclub-clothes-banner"></div>
                                     <p class="habboclub-header">
                                        <?php echo $siteShort;?> Club is de manier om te laten zien dat je geld hebt!
                                        Niks geen gekke 'diamanten' of dure 'belcredits'.<br /><br />
                                        Je bent gewoon lid van dé <?php echo $siteShort;?> Club! Gaaf man!
                                     </p>
                                     <p class="habboclub-link">
                                         <a href="javascript:void()">Ontdek nu <?php echo $siteShort;?> Club!</a>
                                     </p>
                                 </div>
                            </div>
                        </div>

                        <div class="habblet-container" style="float:left; width: 560px;">
                            <div class="cbb clearfix settings">
                                <h2 class="title">Wachtwoord instellingen</h2>
                                <div class="box-content">
                                    <p>
                                        Welkom bij de instellingen pagina,
                                        hier kan jij je account gegevens aanpassen voor als je een nieuw e-mail adres wilt,
                                        of je wachtwoord wilt veranderden. Wij raden je hoe dan ook aan je wachtwoord een keer in de maand te veranderen, minstens.
                                        Verder kan je ook je motto veranderen en binnenkort kan je nog veel meer!<br /><br />

                                        Geen zorgen.. Al je gegevens zijn veilig bij ons en wij gaan hier zorgvuldig mee om!<br />
                                        Zorg jij maar dat jij je wachtwoord onthoud.
                                    </p>
                                    <hr><br />
                                    <form method="POST">
                                        <?php echo $editError;?>

                                        <h3>Jouw wachtwoord veranderen</h3>
                                        <p>Het wordt je aangeraden je wachtwoord minimaal eens in de twee weken te veranderen. Dit is belangrijk om je account veilig te houden!</p>
                                        <p>
                                            <span class="label">Oud wachtwoord:</span>
                                            <input type="password" name="oldpassword" value="" />
                                        </p>
                                        <p>
                                            <span class="label">Nieuw wachtwoord:</span>
                                            <input type="password" name="newpassword" value="" />
                                        </p>
                                        <p>
                                            <span class="label">Nieuw wachtwoord herhalen:</span>
                                            <input type="password" name="newpassword2" value="" />
                                        </p>
                                        <div class="settings-buttons">
                                            <input type="submit" value="Wijzig je wachtwoord!" name="submit" class="submit" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php echo $tplRounder;?>

                    </div>
                </div>
                <?php echo $tplRounder;?>

                
                <div id="column2" class="column">
                    
                </div>
                <?php echo $tplRounder;?>

            </div>