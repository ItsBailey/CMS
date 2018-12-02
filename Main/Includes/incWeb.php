<?php
/**==================================================+
|| # AcellCMS - Website and Content Management System.
|+==================================================+
|| # Copyright © 2018 - WeszDEV. All rights reserved.
|| # https://weszdev.com
|+==================================================+
|| # AcellCMS is free for the whole Retro Community.
|| # Don't know what you are doing? Quit already!
|+==================================================**/

/**
 * De incWeb class wordt gebruikt om html/php op de pagina te zetten.
 * @example incWeb::boxRounder() Wordt gebruikt voor de rondingen van de style.
 * @example incWeb::logingRegError($text) Is een error functie voor de style.
 * @example incWeb::maintenanceNotify($text, $text2) Is een kleine template notificatie voor als het hotel offline is.
 * @example incWeb::newsArchive($limit) Laat het nieuwsacrhief zien met een maximale limiet.
 * @example incWeb::cmsAccess($userid) Laat een cms knop zien als je user id herkent is.
 * @example incWeb::staffBox($ranklevel) Geef een gebruiker met de rank level een container.
 * @example incWeb::staffInfo() Geef de gebruiker met een rank een speciale container voor zijn shoutout.
 * @example incWeb::tagList($userid) De tag lijst van de gebruiker.
 * @example incWeb::tagRandom() Vraag random 20 tags op.
 * @example incWeb::tagUserList($tag) De lijst met tags die andere gebruikers hebben.
 * @example incWeb::staffAppHead() Default box met open en gesloten solliciaties.
 * @example incWeb::staffApplication($id) Kijk of er vacatures zijn en laat deze zien.
 */
class incWeb {
    
    /**
     * De rondingen van de box container.
     * @return string Return het script.
     */
    public static function boxRounder() {
        return '<script type="text/javascript">if(!$(document.body).hasClassName(\'process-template\')) {Rounder.init();}</script>';
    }
    
    /**
     * Standaard error template voor inloggen en registreren.
     * @param type $text Welke tekst moet er in?
     * @return type Return de error in html.
     */
    public static function loginRegError($text = '') {
        return '
            <div class="action-error flash-message">
                <div class="rounded">
                    <ul><li>'.$text.'</li></ul>
                </div>
            </div>
        ';
    }
    
    /**
     * Een fout error template.
     * @param type $text Wat is de error?
     * @return type Return de error in html.
     */
    public static function redError($text = '') {
        return '
            <div class="rounded rounded-red">
                <ul><li>'.$text.'</li></ul>
            </div>
        ';
    }
    
    /**
     * Een succes error template.
     * @param type $text Wat is de error?
     * @return type Return de error in html.
     */
    public static function greenError($text = '') {
        return '
            <div class="rounded rounded-green">
                <ul><li>'.$text.'</li></ul>
            </div>
        ';
    }
    
    /**
     * Een standaard melding voor de me feed.
     * @param type $text Titel van de melding.
     * @param type $text2 De omschrijving van de melding.
     * @return type Return de melding in htnl.
     */
    public static function feedNotify($text = '', $text2 = '') {
        return '
            <li id="feed-notification">
                <strong>'.$text.'</strong><br />
                '.$text2.'
            </li>
        ';
    }
    
    /**
     * Nieuws archief, met maximale limiet.
     * @param type $limit Wat is het limiet van je nieuws archief?
     */
    public static function newsArchive($limit = 0) {
        $query = DB::query("SELECT id, title FROM cms_news ORDER BY id DESC LIMIT $limit");
        foreach($query as $news) {
            echo '
                <li>
                    <a href="news.php?id='.$news['id'].'">'.$news['title'].'</a> &raquo;
                </li>
            ';
        }
    }
    
    /**
     * Controleer of de gebruiker toegang heeft tot het cms gedeelte.
     * @param type $userid Welke id moet er gecontroleerd worden?
     */
    public static function cmsAccess($userid) {
        if(Users::isLogged() && Users::getData('rank', $userid) > 5) {
            echo '<li id="tab-register-now"><a href="cms/" target="_blank"><b>Housekeeping</b></a><span></span></li>';
        } else {
            echo '';
        }
    }
    
    /**
     * De staff containers, heel makkelijk te gebruiken.
     * @param type $rankLevel Van welke rank level moeten we de box laten zien.
     */
    public static function staffBox($ranklevel) {
        $getRank = DB::query("SELECT ".Emu::Get('table.Permissions.level').",".Emu::Get('table.Permissions.rank_name')." FROM ".Emu::Get('tablename.Permissions')." WHERE ".Emu::Get('table.Permissions.level')." = %i ORDER BY id DESC", $ranklevel);
        foreach($getRank as $rank) {
            $get = DB::query("SELECT * FROM ".Emu::Get('tablename.Users')." WHERE rank =%i", $rank[Emu::Get('table.Permissions.level')]);
            $count = DB::count();
            
            if($count == 0) {
                echo '
                <div class="habblet-container">
                    <div class="cbb clearfix red">
                        <h2 class="title">'.$rank[Emu::Get('table.Permissions.rank_name')].'</h2>
                        <div class="habblet box-content">
                            <p>
                                <i>Er is nog niemand voor deze rank..</i>
                            </p>
                        </div>
                    </div>
                </div>
                ';
            } else {
                echo '
                <div class="habblet-container even">
                    <div class="cbb clearfix blue">
                        <h2 class="title">'.$rank[Emu::Get('table.Permissions.rank_name')].'</h2>
                        <div class="habblet box-content">
                            ';
                            foreach($get as $user) {
                                if(Users::getData('online', $user['id']) == '1') {
                                    $onOff = 'online_anim.gif';
                                } else {
                                    $onOff = 'offline.gif';
                                } if(Users::countGuilds($user['id']) > 0) {
                                    $guild = Core::getData('badge', Emu::Get('tablename.Guilds'), Emu::Get('table.Guilds.user_id'), $user['id']);
                                    $guildId = Core::getData('id', Emu::Get('tablename.Guilds'), Emu::Get('table.Guilds.user_id'), $user['id']);
                                    $guilds = '<a href="guild?guild='.$guildId.'"><img src="'.Config::R('siteLink').'habbo-imaging/badge-fill/'.$guild.'.gif"style="margin:5px;float:right;" /></a>';
                                } else {
                                    $guild = '';
                                    $guildId = '';
                                    $guilds = '';
                                }
                                
                                $userRank = Core::getData('specialrank', 'cms_staffinfo', 'userid', $user['id']);
                                
                                echo '
                                <p>
                                    <img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$user[Emu::Get('table.Users.look')].'&size=b&direction=2&head_direction=3&gesture=sml&size=s" alt="'.$user['username'].'" align="left" />
                                    <b><a href="profile.php?username='.$user['username'].'">'.$user['username'].'</a></b>&nbsp;
                                    <img src="Templates/'.Config::R('siteTemplate').Config::R('siteTemplateStyle').'v2/images/habbo_'.$onOff.'" title="Online" alt="Online" border="0"><br />
                                    <i>'.$user['motto'].'</i><br />
                                    <b>Rank:</b> '.$userRank.'<br />
                                    <b>Laatst ingelogd:</b> '.date('d-m-Y H:i', $user[Emu::Get('table.Users.last_login')]).'<br />
                                    ';
                                    if(Users::countBadges($user['id']) > 0) {
                                        $query = DB::query("SELECT * FROM ".Emu::Get('tablename.Users_badges')." WHERE ".Emu::Get('table.Users_badges.user_id')." =%i ORDER BY ".Emu::Get('table.Users_badges.slot_id')." DESC LIMIT 5", $user['id']);
                                        foreach($query as $badge) {
                                            echo '<img src="'.Config::R('siteLink').'swf/c_images/album1584/'.$badge[Emu::Get('table.Users_badges.badge_code')].'.gif" style="margin:5px;" />';
                                        }
                                    }
                                    echo '
                                    '.$guilds.'
                                </p><br />
                                ';
                            }
                            echo '
                        </div>
                    </div>
                </div>
                ';
            }
        }
    }
    
    /**
     * Een speciale info box voor de medewerkers.
     * Return de box met gebruikers info.
     */
    public static function staffInfo() {
        $getRank = DB::query("SELECT ".Emu::Get('table.Permissions.level')." FROM ".Emu::Get('tablename.Permissions')." ORDER BY ".Emu::Get('table.Permissions.level')." DESC");
        foreach($getRank as $level) {
            $getUser = DB::query("SELECT * FROM ".Emu::Get('tablename.Users')." WHERE rank =%i", $level[Emu::Get('table.Permissions.level')]);
            foreach($getUser as $user) {
                $getInfo = DB::query("SELECT * FROM cms_staffinfo WHERE userid =%i", $user['id']);
                foreach($getInfo as $info) {
                    if(Users::getData('online', $user['id']) == '1') {
                        $onOff = 'online_anim.gif';
                    } else {
                        $onOff = 'offline.gif';
                    }
                    echo '
                        <p>
                            <img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$user[Emu::Get('table.Users.look')].'&size=b&direction=2&head_direction=3&gesture=sml&size=s" alt="'.$user['username'].'" align="right" style="margin-top: -20px;" />
                            <span style="font-size: 22px;"><b><a href="profile.php?username='.$user['username'].'">'.$user['username'].'</a></b></span>&nbsp;
                            <img src="Templates/'.Config::R('siteTemplate').Config::R('siteTemplateStyle').'v2/images/habbo_'.$onOff.'" title="Online" alt="Online" border="0"><br />
                            <i>'.$user['motto'].'</i><br />
                            <b>Rank:</b> '.$info['specialrank'].'<br />
                            <b>Laatst ingelogd:</b> '. date('d-m-Y H:i', $user[Emu::Get('table.Users.last_login')]).'<br /><br />
                            <b><i>'.$info['title'].'</i></b><br /><br />
                            '.$info['story'].'
                        </p><hr>
                    ';
                }
            }
        }
    }
    
    /**
     * De tag lijst van de gebruiker.
     * @param type $userid De gebruiker id.
     */
    public static function tagList($userid) {
        $query = DB::query("SELECT tag FROM cms_tags WHERE userid =%i LIMIT 20", $userid);
        DB::query("SELECT null FROM cms_tags WHERE userid =%i", $userid);
        $count = DB::count();
        if($count > 0) {
            foreach($query as $tag) {
            echo '
                <li>
                    <a href="tags.php?tag='.$tag['tag'].'" class="tag" style="font-size:10px">'.$tag['tag'].'</a>
                    <a class="tag-remove-link" title="Remove tag" href="#"></a>
                </li>
            ';
            }
        } else {
            echo '<div>Je hebt geen tags..<br />Voeg er snel een toe!</div>';
        }
    }
    
    /**
     * Laat random tags zien.
     */
    public static function tagRandom() {
        echo '';
        $query = DB::query("SELECT tag FROM cms_tags ORDER BY RAND() DESC LIMIT 20");
            foreach($query as $tag) {
            echo '<li><a href="tags?tag='.$tag['tag'].'" class="tag" style="">'.$tag['tag'].'</a>&nbsp;</li>';
        } echo '';
    }
    
    /**
     * De tag lijst met gebruikers met dezelfde tag.
     * @param type $tag
     */
    public static function tagUserList($tag) {
        $oddeven = 0;
        $query = DB::query("SELECT * FROM cms_tags WHERE tag =%s", $tag);
        foreach($query as $tag) {
            $queryUser = DB::query("SELECT id,username,motto,look FROM users WHERE username =%s", Users::idToName($tag['userid']));
            foreach($queryUser as $user) {
                $oddeven++;
                $even = (Core::isEven($oddeven)) ? 'odd' : 'even';
                echo '
                <tr class="'.$even.'">
                    <td class="image" style="width:39px;">
                        <img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$user['look'].'&size=s&direction=4&head_direction=4&gesture=sml" alt="'.$user['username'].'" align="left"/>
                    </td>
                    <td class="text">
                        <a href="profile?username='.$user['username'].'" class="result-title">'.$user['username'].'</a><br/>
                        <span class="result-description">'.$user['motto'].'</span>
                        <ul class="tag-list">
                            <li>
                                <a href="tags?tag='.$tag['tag'].'" class="tag" style="font-size:10px">'.$tag['tag'].'</a>
                            </li>
                        </ul>
                    </td>
                </tr>
                ';
            }
        }
    }
    
    /**
     * Maak een default box voor een stukje tekst, open en gesloten sollicitaties.
     */
    public static function staffAppHead() {
        $query = DB::query("SELECT ".Emu::Get('table.Permissions.level').",".Emu::Get('table.Permissions.rank_name')." FROM ".Emu::Get('tablename.Permissions'));
        echo '
        <div class="habblet-container">
            <div class="cbb clearfix blue">
                <h2 class="title">Wij zoeken medewerkers!</h2>
                <div class="habblet box-content">
                <p>Denk jij dat wij jou kunnen gebruiken? Laat het hieronder weten dan!<br />
                <i>Het kan zijn dat we geen mensen zoeken, dit staat dan ook aangegeven!</i>
                </p><hr>
                '; foreach($query as $rank) {
                    $rankLevel = $rank[Emu::Get('table.Permissions.level')];
                    $rankName = $rank[Emu::Get('table.Permissions.rank_name')];
                    if(Core::staffAppStatus($rankLevel) == TRUE) {
                        echo '
                        <b style="color:green">Open</b> - <a href="staff_application?id='.$rankLevel.'">
                            '.$rankName.'
                        </a><br />
                        ';
                    } else {
                        if($rankLevel == '1' || $rankLevel == '2') {
                            echo '';
                        } else {
                            echo '
                            <small><b style="color:red">Gesloten</b> - <a>"
                                <s>'.$rankName.'</s>
                            </a></small><br />
                            ';
                        }
                    }
                } echo '
                </div>
            </div>
        </div>
        ';
        echo incWeb::boxRounder();
    }

    public static function staffApplication($id) {
        echo incWeb::staffAppHead();
        
        $query = DB::query("SELECT * FROM ".Emu::Get('tablename.Permissions')." WHERE ".Emu::Get('table.Permissions.level')." =%i", $id);
        
        if(Core::staffAppStatus($id) == TRUE) {
            $rankDesc = DB::queryFirstField("SELECT description FROM cms_staffapps WHERE rankid =%i LIMIT 1", $id);
            foreach($query as $rank) {
                echo '
                <div class="habblet-container">
                    <div class="cbb clearfix red">
                        <h2 class="title">Solliciteer voor '.$rank[Emu::Get('table.Permissions.rank_name')].'!</h2>
                        <div class="habblet box-content">
                            <p>'.$rankDesc.'</p><hr><br />
                            <form method="POST">
                                <table>
                                    <tr>
                                        <td><b>Gebruikersnaam</b>&nbsp;&nbsp;</td>
                                        <td><input type="text" name="username" value="'.Users::idToName($_SESSION['USERID']).'" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mailadres</b>&nbsp;&nbsp;</td>
                                        <td><input type="text" name="usermail" value="'.Users::getData(Emu::Get('table.Users.mail'), $_SESSION['USERID']).'" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Echte naam</b>&nbsp;&nbsp;</td>
                                        <td><input type="text" name="realname" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Discord tag</b>&nbsp;&nbsp;</td>
                                        <td><input type="text" name="discord" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Ervaring</b>&nbsp;&nbsp;</td>
                                        <td><select name="exp"><option value="1">Onervaren</option><option value="2">Beginner</option><option value="3">Ervaren</option></select></td>
                                    </tr>
                                    <tr>
                                        <td><b>Motivatie</b>&nbsp;&nbsp;</td>
                                        <td><textarea name="motivation" cols="35" rows="4"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><b></b>&nbsp;&nbsp;</td>
                                        <td><input type="submit" name="submit" value="Versturen" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                ';
            }
        } else {
            return;
        }
    }
}

// page end..