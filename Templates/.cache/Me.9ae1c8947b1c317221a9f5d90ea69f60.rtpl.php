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
                    <form name="tag_search_form" action="profile" class="search-box clearfix">
                        <a id="search-button" class="new-button search-icon" href="#" onclick="$('search-button').up('form').submit(); return false;"><b><span></span></b><i></i></a>
                        <input type="text" name="tag" id="search_query" placeholder="Gebruikersnaam" class="search-box-query search-box-onfocus" style="float: right" />
                    </form>
                    <script type="text/javascript">
                    SearchBoxHelper.init();
                    </script>
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
                        <div id="new-personal-info" style="background-image:url(<?php echo $siteTemplateStyle;?>v2/images/personal_info/hotel_views/htlview_br.png)">
                            <div id="enter-hotel">
                                <?php echo $onlineOfflineMe;?>

                            </div>
                            <div id="habbo-plate">
                                <a href="settings">
                                    <img alt="<?php echo $userName;?>" src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $userLook;?>&headonly=0&direction=2&head_direction=3&action=wav&gesture=sml&size=m" width="64" height="110" />
                                </a>
                            </div>
                            <div id="habbo-info">
                                <div id="motto-container" class="clearfix">
                                    <strong><?php echo $userName;?></strong>
                                    <div>
                                        <span title="Wijzig je motto"><?php echo $userMotto;?></span>
                                        <p style="display: none">
                                            <input type="text" length="30" name="motto" value="<?php echo $userMotto;?>" />
                                        </p>
                                    </div>
                                </div>
                                <div id="motto-links" style="display: none"><a href="#" id="motto-cancel">Annuleren</a></div>
                            </div>
                            <ul id="link-bar" class="clearfix">
                                <li class="credit"><a href="javascript:(void)"><b><?php echo $userCredits;?></b> Credits</a></li>
                                <li class="pixel"><a href="javascript:(void)"><b><?php echo $userPixels;?></b> Pixels</a></li>
                                <li class="diamond"><a href="javascript:(void)"><b><?php echo $userPoints;?></b> Diamanten</a></li>
                            </ul>
                            <div id="habbo-feed">
                                <ul id="feed-items">
                                    <?php echo $feedNotifyPincode;?>

                                    <?php echo $feedNotifyMaintenance;?>

                                    <li class="small" id="feed-lastlogin">
                                        Laatst ingelogd op: <?php echo $userLastLogin;?>

                                    </li>
                                </ul>
                            </div>
                            <p class="last"></p>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                    <div class="habblet-container">
                        <div class="cbb clearfix default">
                            <div class="box-tabs-container clearfix">
                                <h2><?php echo $siteShort;?> vrienden</h2>
                                <ul class="box-tabs">
                                    <li id="tab-0-4-1"><a href="#">Zoek <?php echo $siteShort;?>'s</a><span class="tab-spacer"></span></li>
                                    <li id="tab-0-4-2" class="selected"><a href="#">Nodig vrienden uit</a><span class="tab-spacer"></span></li>
                                </ul>
                            </div>
                            <div id="tab-0-4-1-content" style="display: none">
                                <div class="habblet-content-info">
                                    <a name="habbo-search">Typ de eerste paar karakters van de <?php echo $siteShort;?> die je wilt zoeken..</a>
                                </div>
                                <div id="habbo-search-error-container" style="display: none;">
                                    <div id="habbo-search-error" class="rounded rounded-red"></div>
                                </div>
                                <br clear="all" />
                                <div id="avatar-habblet-list-search">
                                    <input type="text" id="avatar-habblet-search-string" />
                                    <a href="#" id="avatar-habblet-search-button" class="new-button"><b>Zoeken</b><i></i></a>
                                </div>
                                <br clear="all" />
                                <div id="avatar-habblet-content">
                                    <div id="avatar-habblet-list-container" class="habblet-list-container">
                                        <ul class="habblet-list">
                                            
                                        </ul>
                                    </div>
                                    <script type="text/javascript">
                                    L10N
                                        .put('habblet.search.error.search_string_too_long', 'The search keyword was too long. Maximum length is 30 characters.')
                                        .put('habblet.search.error.search_string_too_short', 'The search keyword was too short. 2 characters required.')
                                        .put('habblet.search.add_friend.title', 'Add to friend list');
                                    new HabboSearchHabblet(2, 30);
                                    </script>
                                </div>
                                <?php echo $tplRounder;?>

                            </div>
                            <div id="tab-0-4-2-content">
                                <div id="friend-invitation-habblet-container" class="box-content">
                                    <div style="display: none">
                                        <div id="invitation-form" class="clearfix">
                                            <textarea name="invitation_message" id="invitation_message" class="invitation-message">Come and hangout with me in <?php echo $siteName;?>. -  <?php echo $userName;?> </textarea>
                                            <div id="invitation-email">
                                                <div class="invitation-input">
                                                    1.
                                                    <input onkeypress="$('invitation_recipient2').enable()" type="text" name="invitation_recipients" id="invitation_recipient1" value="Friend's email address:" class="invitation-input" />
                                                </div>
                                                <div class="invitation-input">
                                                    2.
                                                    <input disabled onkeypress="$('invitation_recipient3').enable()" type="text" name="invitation_recipients" id="invitation_recipient2" value="Friend's email address:" class="invitation-input" />
                                                </div>
                                                <div class="invitation-input">
                                                    3.
                                                    <input disabled type="text" name="invitation_recipients" id="invitation_recipient3" value="Friend's email address:" class="invitation-input" />
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="fielderror" id="invitation_message_error" style="display: none;">
                                                <div class="rounded"></div>
                                            </div>
                                        </div>
                                        <div class="invitation-buttons clearfix" id="invitation_buttons">
                                            <a class="new-button" id="send-friend-invite-button" href="#"><b>Invite friend(s)</b><i></i></a>
                                        </div>
                                        <hr />
                                    </div>
                                    <div id="invitation-link-container">
                                        <h3><?php echo $siteShort;?> is leuker met wat échte vrienden!</h3>
                                        <div class="copytext">
                                            <p>
                                                Nodig je vrienden uit op dit hotel om het nog gezelliger en leuker te maken!
                                            </p>
                                        </div>
                                        <div class="invitation-buttons clearfix">
                                            <a class="new-button" id="getlink-friend-invite-button" href="#"><b>Klik hier voor de uitnodiging!</b><i></i></a>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                L10N
                                    .put('invitation.button.invite', 'Invite friend(s)')
                                    .put('invitation.form.recipient', 'Friend\'s email address:')
                                    .put('invitation.error.message_too_long', 'invitation.error.message_limit');
                                    inviteFriendHabblet = new InviteFriendHabblet(500);
                                    $('friend-invitation-habblet-container').select('.fielderror .rounded').each(function(el) {
                                      Rounder.addCorners(el, 8, 8);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                <?php echo $tplRounder;?>

                
                <div id="column2" class="column">
                    <?php $tpl = new Template;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("default/_newsBox") . ( substr("default/_newsBox",-1,1) != "/" ? "/" : "" ) . basename("default/_newsBox") );?>

                    
                    <div class="habblet-container">
                        <div class="cbb clearfix green">
                            <div class="box-tabs-container clearfix">
                                <h2>Tags</h2>
                                <ul class="box-tabs">
                                    <li id="tab-3-1"><a href="#">Andere tags</a><span class="tab-spacer"></span></li>
                                    <li id="tab-3-2" class="selected"><a href="#">Mijn tags</a><span class="tab-spacer"></span></li>
                                </ul>
                            </div>
                            <div id="tab-3-1-content" style="display: none">
                                <div class="progressbar"><img src="<?php echo $siteTemplateStyle;?>images/progress_bubbles.gif" alt="" width="29" height="6" /></div>
                                <a href="<?php echo $siteTemplate;?>habblets/tagcloud?cloud=plain" class="tab-ajax"></a>
                            </div>
                            <div id="tab-3-2-content">
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
                    </div>
                    <?php echo $tplRounder;?>

                </div>
                <?php echo $tplRounder;?>

            </div>