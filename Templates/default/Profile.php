
<body id='viewmode'>
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
                        {$onlineOffline}
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
                {$navHead}
                {function="incWeb::cmsAccess($userID)"}
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
                    {$navSub}
                </ul>
            </div>
        </div>
        
        <div id="container">
            <div id="content" style="position: relative" class="clearfix">
                <div id="mypage-wrapper" class="cbb blue">
                    <div class="box-tabs-container box-tabs-left clearfix">
                        {$profileEdit}
                        <h2 class="page-owner">{$profileName}</h2>
                        <ul class="box-tabs"></ul>
                    </div>
                    <div id="mypage-content">
                        <div id="mypage-bg" class="b_bg_pattern_abstract2">
                            <div id="playground-outer">
                                <div id="playground">
                                    
                                </div>
                            </div>
                            <div id="mypage-ad">
                                <div class="habblet">
                                    <div class="ad-container">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {$tplRounder}
            </div>