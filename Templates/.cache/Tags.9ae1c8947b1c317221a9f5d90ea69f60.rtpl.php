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
            <div id="content" style="position: relative" class="clearfix">
                <div id="column1" class="column">
                    <div class="habblet-container">
                        <div class="cbb clearfix blue">
                            <h2 class="title">Willekeurige tags</h2>
                            <div id="tag-related-habblet-container" class="habblet box-contents">
                                <ul class="tag-list">
                                    <?php echo incWeb::tagRandom(); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                    
                    <div class="habblet-container">
                        <div class="cbb clearfix default">
                            <h2 class="title">Zoek andere met dezelfde interesses</h2>
                            <div id="tag-search-habblet-container">
                                <form name="tag_search_form" action="tags" class="search-box">
                                    <input type="text" name="tag" id="search_query" value="" class="search-box-query" style="float: left" />
                                    <a onclick="$(this).up('form').submit(); return false;" href="#" class="new-button search-icon" style="float: left"><b><span></span></b><i></i></a>
                                </form>
                                <br /><?php echo $countTags;?><?php echo $addTag;?>

                                <p class="search-result-divider"></p>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="search-result">
                                    <tbody>
                                       <?php echo incWeb::tagUserList($tag); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="column2" class="column">
                    <div class="habblet-container">
                        <div class="cbb clearfix red">
                            <h2 class="title">Tag gevecht</h2>
                            <div id="tag-fight-habblet-container">
                                <div class="fight-process" id="fight-process">Het gevecht.. is bezig..</div>
                                <div id="fightForm" class="fight-form">
                                    <div class="tag-field-container">
                                        Eerste tag<br />
                                        <input maxlength="30" type="text" class="tag-input" name="tag1" id="tag1" />
                                    </div>
                                    <div class="tag-field-container">
                                        Tweede tag<br />
                                        <input maxlength="30" type="text" class="tag-input" name="tag2" id="tag2" />
                                    </div>
                                </div>
                                <div id="fightResults" class="fight-results">
                                    <div class="fight-image">
                                        <img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/tagfight/tagfight_start.gif" alt="" name="fightanimation" id="fightanimation" />
                                        <a id="tag-fight-button" href="#" class="new-button" onclick="TagFight.init(); return false;"><b>Vecht!</b><i></i></a>
                                    </div>
                                </div>
                                <div class="tagfight-preload">
                                    <img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/tagfight/tagfight_end_0.gif" width="1" height="1" />
                                    <img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/tagfight/tagfight_end_1.gif" width="1" height="1" />
                                    <img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/tagfight/tagfight_end_2.gif" width="1" height="1" />
                                    <img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/tagfight/tagfight_loop.gif" width="1" height="1" />
                                    <img src="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/tagfight/tagfight_start.gif" width="1" height="1" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                    
                    <div class="habblet-container">
                        <div class="cbb clearfix green">
                                <h2 class="title">Mijn tags</h2>
                                <div id="my-tag-info" class="habblet-content-info">
                                    <div class="box-content">
                                        <div class="habblet" id="my-tags-list">
                                            <ul class="tag-list make-clickable">
                                                <?php echo incWeb::tagList($userID); ?>

                                            </ul>
                                            <form method="POST" action="<?php echo $siteTemplate;?>habblets/tags?key=add" onsubmit="TagHelper.addFormTagToMe(); return false;">
                                                <div class="add-tag-form clearfix">
                                                    <a class="new-button" href="#" id="add-tag-button" onclick="TagHelper.addFormTagToMe(); return false;"><b>Voeg toe</b><i></i></a>
                                                    <input type="text" id="add-tag-input" maxlength="20" style="float: right" />
                                                    <em class="tag-question">vraagje..</em>
                                                </div>
                                                <div style="clear: both"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                    document.observe('dom:loaded', function() {
                                        TagHelper.setTexts({
                                          tagLimitText: 'Je hebt het maximale aantal tags bereikt! Verwijder er een paar als je een nieuwe wilt.',
                                          invalidTagText: 'Dit is een ongeldige tag!',
                                          buttonText: 'Oke'
                                        });
                                        TagHelper.init('21063711');
                                    });
                                    </script>
                                </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                <?php echo $tplRounder;?>

            </div>