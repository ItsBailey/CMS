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
                <div id="column1" class="column">
                    <div class="habblet-container">
                        <div class="cbb clearfix green">
                            <div class="box-tabs-container clearfix">
                                <h2>Kamers</h2>
                                <ul class="box-tabs">
                                    <li id="tab-0-0-1"><a href="#">Best bezocht</a><span class="tab-spacer"></span></li>
                                    <li id="tab-0-0-2" class="selected"><a href="#">Aanbevolen kamers</a><span class="tab-spacer"></span></li>
                                </ul>
                            </div>
                            <div id="tab-0-0-1-content" style="display: none">
                                <div class="progressbar"><img src="<?php echo $siteTemplateStyle;?>images/progress_bubbles.gif" alt="" width="29" height="6" /></div>
                                <a href="<?php echo $siteTemplate;?>habblets/proxy.php?hid=rooms" class="tab-ajax"></a>
                            </div>
                            <div id="tab-0-0-2-content">
                                <div id="rooms-habblet-list-container-h119" class="recommendedrooms-lite-habblet-list-container">
                                    <ul class="habblet-list">
                                        <li class="even">
                                            <span class="clearfix enter-room-link room-occupancy-4" title="Go to room" roomid="1">
                                                <span class="room-enter">Enter</span>
                                                <span class="room-name">Kamernaam</span>
                                                <span class="room-description">Kamer beschrijving enzo..</span>
                                                <span class="room-owner">Owner: <a href="">Wesz</a></span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                
                <div id="column2" class="column">
                    <?php $tpl = new Template;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("default/_newsBox") . ( substr("default/_newsBox",-1,1) != "/" ? "/" : "" ) . basename("default/_newsBox") );?>

                </div>
                <?php echo $tplRounder;?>

            </div>