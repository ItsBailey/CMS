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
                <div id="column1news" class="column">
                    <div class="habblet-container">
                        <div class="cbb clearfix default">
                            <h2 class="title">Nieuws artikelen</h2>
                            <div id="article-archive">
                                <h2>Nieuws archief</h2>
                                <ul>
                                    <?php echo incWeb::newsArchive(10); ?>

                                </ul>
                                <h2>Meer nieuws?</h2>
                                <ul>
                                    <li>
                                        <a href="news.php?id=">Bekijk ons nieuws archief!</a> &raquo;
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                
                <div id="column2news" class="column">
                    <div class="habblet-container">
                        <div class="cbb clearfix notitle">
                            <div id="article-wrapper">
                                <h2><?php echo $newsTitle;?></h2>
                                <div class="article-meta">
                                    Geplaatst op: <?php echo $newsPosted;?>

                                    in <a href="news.php?category=<?php echo $newsCategory;?>"><?php echo $newsCategory;?></a><br />
                                    <?php echo $newsUpdated;?>

                                </div>
                                <p class="summary">
                                    <?php echo $newsShort;?>

                                </p>
                                <div class="article-body">
                                    <p>
                                        <?php echo $newsStory;?>

                                    </p>
                                    <div class="article-body">
                                        <a href="profile.php?name=<?php echo $newsAuthor;?>"><img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>album1/users_online.png" alt="Gebruikers profiel" border="0"></a>
                                        <?php echo $newsAuthor;?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $tplRounder;?>

                <div id="column3" class="column"></div>
            </div>