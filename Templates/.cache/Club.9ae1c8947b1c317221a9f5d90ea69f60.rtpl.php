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
                    <div class="habblet-container ">
                        <div class="cbb clearfix hcred ">
                            <h2 class="title">Word een <?php echo $siteShort;?> Club lid!</h2>
                            <div id="habboclub-products">
                                <div id="habboclub-clothes-container">
                                    <div class="habboclub-extra-image"></div>
                                    <div class="habboclub-clothes-image"></div>
                                </div>
                                <div class="clearfix"></div>
                                <div id="habboclub-furniture-container">
                                    <div class="habboclub-furniture-image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                    
                    <div class="habblet-container ">
                        <div class="cbb clearfix hcred ">
                            <h2 class="title">De voordelen</h2>
                            <div id="habboclub-info" class="box-content">
                                <p>
                                    <?php echo $siteShort;?> Club is speciaal voor onze leden die net even iets meer liefde hebben voor <?php echo $siteName;?>!
                                </p>
                                <h3 class="heading">1. Extra kleren en accessoires!</h3>
                                <p class="content habboclub-clothing">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                                <h3 class="heading">2. Gratis meubels!</h3>
                                <p class="content habboclub-furni">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                                <h3 class="heading">3. Exclusieve kamer layouts!</h3>
                                <p class="content">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                                <p class="habboclub-room" />
                                <h3 class="heading">4. Alle openbare kamers bezoeken!</h3>
                                <p class="content">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                                <h3 class="heading">5. Profiel upgrade!</h3>
                                <p class="content habboclub-clothing">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                                <h3 class="heading">6. Meer vrienden!</h3>
                                <p class="content habboclub-communicator">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                                <h3 class="heading">7. Speciale commando's!</h3>
                                <p class="content habboclub-commands right">
                                    Hier komt weer een lange tekst, want dat moet ja..
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                
                <div id="column2" class="column">
                    <div class="habblet-container ">
                        <div class="cbb clearfix hcred ">
                            <h2 class="title">Mijn lidmaatschap</h2>
                            <div id="hc-membership-info" class="box-content">
                                <p>
                                    <?php echo $userHC;?>

                                </p>
                                <?php echo $hcBuy;?>

                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                    <div class='habblet-container'>
                        <div class='cbb clearfix lightbrown'>
                            <h2 class='title'>Aanbieding!</h2>
                            <div class='box-content'>
                                Hoppa! Het is in de uitverkoop!
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                <?php echo $tplRounder;?>

            </div>