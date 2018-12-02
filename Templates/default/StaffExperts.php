
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
            <div id="content">
                <div id="column1" class="column">
                    {function="incWeb::staffBox(4)"}
                    {$tplRounder}
                    
                    {function="incWeb::staffBox(3)"}
                    {$tplRounder}
                </div>
                
                <div id="column2" class="column">
                    <div class="habblet-container">
                        <div class="cbb clearfix green">
                            <h2 class="title">{function="Core::getSiteTitle($siteLang,'staff_experts')"}</h2>
                            <div id="notfound-looking-for" class="box-content">
                                <p>
                                    {function="Core::getSiteTexts($siteLang,'staff_experts')"}
                                </p>
                            </div>
                        </div>
                    </div>
                    {$tplRounder}
                </div>