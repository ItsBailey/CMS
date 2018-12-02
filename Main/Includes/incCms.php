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
 * De incCms class wordt gebruikt om html/php op de pagina te zetten.
 * @example incCms::newsRow() Laat de nieuws rij met html zien.
 * @example incCms::newsEdit() Wijzig het nieuwsbericht met html.
 * @example incCms::userRow() Laat de gebruikers zien met html.
 * @example incCms::userEdit() Wijzig een speler met html.
 * @example incCms::staffLog() De staff logs van de housekeeping.
 * @example incCms::staffRow() De medewerkers voor het dashboard,
 * @example incCms::adminNotes() Een kleine note voor andere medewerkers.
 * @example incCms::textPage() De tekst pagina's die veranderd mogen worden.
 * @example incCms::textEdit() De tektsen om te veranderen in het Nederlands en Engels.
 * @example incCms::getLanguages($page) Een lijst met de teksten van de opgevraagde pagina.
 * @example incCms::editLanguages() Wijzig de teksten met nieuwe vertalingen.
 * @example incCms::staffApplications() De binnen gekomen vacatures van spelers.
 */
class incCms {
    
    /**
     * Laat het nieuws zien op de website_news pagina.
     * @return type Return de nieuws rij.
     */
    public static function newsRow() {
        $query = DB::query("SELECT * FROM cms_news ORDER BY time DESC LIMIT 25");
        foreach($query as $news) {
            echo '
            <tr>
                <td class="tablerow1" align="center">'.$news['id'].'</td>
                <td class="tablerow2">
                    <strong>'.$news['title'].'</strong>
                    <div class="desctext">'.$news['shortstory'].'</div>
                </td>
                <td class="tablerow2" align="center">'. date('d-m-Y H:i', $news['time']).'</td>
                <td class="tablerow2" align="center">'.$news['author'].'</td>
                <td class="tablerow2" align="center"><a href="website_news?newsid='.$news['id'].'"><img src="'.Config::R('siteLink').'cms/Templates/'.Config::R('cmsTemplate').Config::R('cmsTemplateStyle').'images/edit.gif" alt="Wijzigen"></a></td>
                <td class="tablerow2" align="center"><a href="website_news?newsdeleteid='.$news['id'].'"><img src="'.Config::R('siteLink').'cms/Templates/'.Config::R('cmsTemplate').Config::R('cmsTemplateStyle').'images/delete.gif" alt="Verwijderen"></a></td>
            </tr>
            ';
            if(isset($_GET['newsdeleteid'])) {
                DB::delete('cms_news', 'id =%i', $news['id']);
                echo '<meta http-equiv="REFRESH" content="0;url=website_news">';
            }
        }
    }
    
    /**
     * Laat het geselecteerde nieuws artikel zien om te veranderen.
     * @return type Return het nieuwsartikel dat gewijzigd moet worden.
     */
    public static function newsEdit() {
        $newsId = isset($_GET['newsid']) ? (int)$_GET['newsid']: 0;
        $query = DB::query("SELECT * FROM cms_news WHERE id =%i ORDER BY time DESC LIMIT 1", $newsId);
        if(!isset($_GET['newsid'])) {
            return;
        } else {
            foreach($query as $news) {
                return '
                <div>
                    <form method="POST">
                        <div class="tableborder">
                            <div class="tableheaderalt">Wijzig nieuws artikel: '.$news['title'].'</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Titel</b>
                                        <div class="graytext">Gebruik een krachtige en korte titel.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="title" size="30" class="textinput" value="'.$news['title'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Nieuws categorie</b>
                                        <div class="graytext">Dit zorgt voor het organiseren van het archief.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="category" class="dropdown">
                                            <option value="'.$news['category'].'">'.$news['category'].'</option>
                                            <option value="AcellCMS">AcellCMS</option>
                                            <option value="Nieuws">Nieuws</option>
                                            <option value="Meubels">Meubels</option>
                                            <option value="Updates">Updates</option>
                                            <option value="Server">Server</option>
                                            <option value="Onderhoud">Onderhoud</option>
                                            <option value="Evenementen">Evenementen</option>
                                            <option value="Veiligheid">Veiligheid</option>
                                            <option value="Tips">Tips</option>
                                            <option value="Anders">Anders</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Plaatjes</b>
                                        <div class="graytext">De naam van je plaatje.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="file" value="'.$news['image'].'" name="topstory" onchange="document.getElementById(\'topstory\').src = window.URL.createObjectURL(this.files[0])">
                                        <img id="topstory" src="'.Config::R('siteLink').'Templates/default/web-gallery/images/top-story/'.$news['image'].'" alt="Kies een topstory" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Artikel intro</b>
                                        <div class="graytext">Een kleine intro voor het nieuws artikel.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="shortstory" cols="60" rows="2" wrap="soft" id="sub_desc" class="multitext">'.$news['shortstory'].'</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Verhaal</b>
                                        <div class="graytext">
                                            Het hele nieuws artikel, houd het netjes!
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="story" rows="5" id="editor" class="form-control">'.$news['story'].'</textarea>
                                            <script type="text/javascript">
                                            CKEDITOR.replace(\'editor\', {
                                                height: 250,
                                            });
                                            </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Author</b>
                                        <div class="graytext">Uit naam van wie komt dit artikel?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="author" value="'.$news['author'].'" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input name="submitEdit" type="submit" value="Artikel wijzigen" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div><br />
                ';
            }
        }
    }
    
    /**
     * Een gebruikerslijst.
     * Laat de gebruikers zien met html.
     */
    public static function userRow() {
        $query = DB::query("SELECT * FROM ".Emu::Get('tablename.Users')." ORDER BY id DESC");
        foreach($query as $user) {
            echo '
                <tr>
                    <td class="tablerow1" align="center">#'.$user['id'].'</td>
                    <td class="tablerow2">
                        <strong>'.$user['username'].'</strong>
                        <div class="desctext">
                            '.$user[Emu::Get('table.Users.ip_current')].' [<a href="http://who.is/whois-ip/ip-address/'.$user[Emu::Get('table.Users.ip_current')].'" target="_blank">WHOIS]</a>
                        </div>
                    </td>
                    <td class="tablerow2" align="center">
                        <a href="mailto:'.$user[Emu::Get('table.Users.mail')].'">'.$user[Emu::Get('table.Users.mail')].'</a>
                    </td>
                    <td class="tablerow2" align="center">'.date('d-m-Y H:i', $user[Emu::Get('table.Users.account_created')]).'</td>
                    <td class="tablerow2" align="center">'.date('d-m-Y H:i', $user[Emu::Get('table.Users.last_login')]).'</td>
                    <td class="tablerow2" align="center">
                        <a href="users_edit?username='.$user['username'].'"><img src="'.Config::R('siteLink').'cms/Templates/'.Config::R('cmsTemplate').Config::R('cmsTemplateStyle').'images/edit.gif" alt="Wijzig speler"></a>
                    </td>
                </tr>
            ';
        }
    }
    
    /**
     * Wijzig een gebruiker form.
     * @return type Return de gebruiker die gewijzigd moet worden met html.
     */
    public static function userEdit() {
        $userName = isset($_GET['username']) ? $_GET['username']: '';
        $query = DB::query("SELECT * FROM ".Emu::Get('tablename.Users')." WHERE username =%s LIMIT 1", $userName);
        if(!isset($_GET['username'])) {
            return;
        } else {
            foreach($query as $user) {
                if($user['gender'] == 'M') {
                    $gender = "<option value='M'>Man</option><option value='F'>Vrouw</option>";
                } else {
                    $gender = "<option value='F'>Vrouw</option><option value='M'>Man</option>";
                }
                return '
                <div>
                    <form method="POST">
                        <div class="tableborder">
                            <div class="tableheaderalt">Wijzig gebruiker: '.$user['username'].'</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>ID</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="userid" value="'.$user['id'].'" disabled />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Gebruikersnaam</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="username" value="'.$user['username'].'" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Echte naam</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="realname" value="'.$user['real_name'].'" />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Motto</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="motto" value="'.$user['motto'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Look</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="look" value="'.$user[Emu::Get('table.Users.look')].'" />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Geslacht</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <select name="gender">'.$gender.'</select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>E-mailadres</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="mail" value="'.$user[Emu::Get('table.Users.mail')].'" disabled />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Rank</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="number" name="rank" value="'.$user['rank'].'" disabled />&nbsp;
                                        <i>Dit is rank: '.Core::getData(Emu::Get('table.Permissions.rank_name'), Emu::Get('tablename.Permissions'), Emu::Get('table.Permissions.level'), $user['rank']).'</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Wachtwoord</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="password" value="'.$user['password'].'" disabled />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Credits</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="number" name="credits" value="'.$user['credits'].'" max="9999999" min="0" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Pixels</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="number" name="pixels" value="'.$user[Emu::Get('table.Users.pixels')].'" max="9999999" min="0" />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Diamanten</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="number" name="points" value="'.$user[Emu::Get('table.Users.points')].'" max="99999" min="0" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Registreer IP</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="ipregister" value="'.$user[Emu::Get('table.Users.ip_register')].'" disabled />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Huidig IP</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="ipcurrent" value="'.$user[Emu::Get('table.Users.ip_current')].'" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Account gemaakt</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="accountcreated" value="'.date('d-m-Y H:i', $user[Emu::Get('table.Users.account_created')]).'" disabled />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Geboortedatum</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="userborn" value="'.date('d-m-Y', $user['account_day_of_birth']).'" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Laatst ingelogd</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="lastlogin" value="'.date('d-m-Y H:i', $user['last_login']).'" disabled />
                                    </td>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Laatst online</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="lastonline" value="'.date('d-m-Y H:i', $user['last_online']).'" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1"  width="20%"  valign="middle">
                                        <b>Auth Ticket</b>
                                        <div class="graytext">Lalalala.</div>
                                    </td>
                                    <td class="tablerow2"  width="30%"  valign="middle">
                                        <input type="text" name="machineid" value="'.$user['auth_ticket'].'" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="4">
                                        <input type="submit" name="submitEdit" value="Wijzigen" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div><br />
                ';
            }
        }
    }
    
    /**
     * Laat alle stafflogs zien.
     */
    public static function staffLog() {
        $getStafflog = DB::query("SELECT * FROM cms_stafflog ORDER BY id DESC");
        foreach($getStafflog as $log) {
            echo '
                <tr>
                    <td class="tablerow1" align="center">#'.$log['id'].'</td>
                    <td class="tablerow1" align="center">'.$log['action'].'</td>
                    <td class="tablerow1" align="center">'.$log['message'].'</td>
                    <td class="tablerow1" align="center">'.$log['note'].'</td>
                    <td class="tablerow1" align="center">'.Users::idToName($log['userid']).'</td>
                    <td class="tablerow1" align="center">'.date('d-m-Y H:i', $log['timestamp']).'</td>
                </tr>
            ';
        }
    }
    
    /**
     * De huidige medewerkers voor het dashboard
     */
    public static function staffRow() {
        $getStaff = DB::query("SELECT * FROM ".Emu::Get('tablename.Users')." WHERE rank > 3 ORDER BY id");
        foreach($getStaff as $staff) {
            echo '
                <tr>
                    <td class="tablerow1" align="center">
                        <div style="font-size:12px">
                            '.$staff['username'].' (ID: '.$staff['id'].')
                        </div>
                    </td>
                    <td class="tablerow2">
                        <div style="margin-top:6px">
                            '.$staff[Emu::Get('table.Users.mail')].'
                        </div>
                    </td>
                    <td class="tablerow3">
                        <div style="margin-top:6px">
                            Rank '.$staff['rank'].', '.Core::getData(Emu::Get('table.Permissions.rank_name'), Emu::Get('tablename.Permissions'), Emu::Get('table.Permissions.level'), $staff['rank']).'
                        </div>
                    </td>
                </tr>
            ';
        }
    }
    
    /**
     * Meldingen voor de medewerkers? Laat het elkaar weten!
     */
    public static function adminNotes() {
        $notes = DB::queryFirstField("SELECT adminnotes FROM cms_system");
        if(isset($_POST['submit'])) {
            $notes = htmlspecialchars($_POST['notes']);
            DB::update('cms_system', array(
                "adminnotes" => $notes,
            ), 'id=1');
        }
        echo '
        <form method="POST">
            <textarea name="notes" style="background-color:#F9FFA2;border:1px solid #CCC;width:95%;font-family:verdana;font-size:10px" rows="8" cols="25">'.$notes.'</textarea>
            <div><br />
                <input type="submit" name="submit" value="Opslaan" class="realbutton" />
            </div>
        </form>
        ';
    }
    
    /**
     * De tekst pagina's die veranderd kunnen worden.
     * @param type $category De hoofd pagina.
     */
    public static function textPage($category = '') {
        $query = DB::query("SELECT category,page FROM cms_sitetexts WHERE category =%s", $category);
        foreach($query as $text) {
            echo '
            <a href="website_texts_'.$text['category'].'?page='.$text['page'].'">'.$text['page'].'.php</a><br />
            ';
        }
    }
    
    /**
     * Verander de tekst in het nederlands of engels.
     * @return type Return de tekst die veranderd kan worden.
     */
    public static function textEdit() {
        $pageName = isset($_GET['page']) ? $_GET['page'] : '';
        $query = DB::query("SELECT * FROM cms_sitetexts WHERE page =%s", $pageName);
        if(!isset($_GET['page'])) {
            return;
        } else {
            echo '
                <div>
                    <form method="POST">
                        <div class="tableborder">
                            <div class="tableheaderalt">De teksten van '.$pageName.'.php veranderen.</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                '; foreach($query as $text) {
                                    if(isset($_POST['submit'])) {
                                        $nltitle = htmlspecialchars($_POST['nltitle']);
                                        $entitle = htmlspecialchars($_POST['entitle']);
                                        $nl = htmlspecialchars($_POST['nl']);
                                        $en = htmlspecialchars($_POST['en']);
                                        DB::update("cms_sitetexts", array(
                                            "nltitle" => $nltitle,
                                            "entitle" => $entitle,
                                            "nl" => $nl,
                                            "en" => $en,
                                        ), "page =%s", $_GET['page']);
                                    }
                                echo '<tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>De title van de box</b>
                                        <div class="graytext">
                                            Dit wordt de titel van de box op de '.$pageName.'.php pagina.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="35%" valign="middle">
                                        <input type="text" name="nltitle" value="'.$text['nltitle'].'" />
                                    </td>
                                    <td class="tablerow2" width="35%" valign="middle">
                                        <input type="text" name="entitle" value="'.$text['entitle'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>De tekst van de pagina</b>
                                        <div class="graytext">
                                            Deze tekst kan je vinden op de '.$pageName.'.php pagina.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="35%" valign="middle">
                                        <textarea name="nl" cols="60" rows="5">'.$text['nl'].'</textarea>
                                    </td>
                                    <td class="tablerow2" width="35%" valign="middle">
                                        <textarea name="en" cols="60" rows="5">'.$text['en'].'</textarea>
                                    </td>
                                </tr>
                                ';
                                } echo '
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="3">
                                        <input name="submit" type="submit" value="Veranderen" class="realbutton" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div><br />
            ';
        }
    }
    
    /**
     * Haal de teksten van de opgevraagde pagina op.
     * @param type $page De pagina waar de teksten op te vinden zijn.
     */
    public static function getLanguages($page = '') {
        $query = DB::query("SELECT * FROM cms_languages WHERE page =%s", $page);
        foreach($query as $lang) {
            echo '
            <tr>
                <td class="tablerow1" width="15%" valign="middle">
                    <b>'.$lang['tag'].'</b>
                </td>
                <td class="tablerow1" width="30%" valign="middle">
                    <p>'.$lang['en'].'</p>
                </td>
                <td class="tablerow1" width="30%" valign="middle">
                    <p>'.$lang['nl'].'</p>
                </td>
                <td class="tablerow1" width="30%" valign="middle">
                    <a href="website_texts_index?tag='.$lang['tag'].'">
                        <img src="'.Config::R('siteLink').'cms/Templates/'.Config::R('cmsTemplate').Config::R('cmsTemplateStyle').'images/edit.gif" alt="Wijzigen">
                    </a>
                </td>
            </tr>
            ';
        }
    }
    
    /**
     * Wijzig de teksten met nieuwe vertalingen.
     * @return type Return niets als er niets is aangevraagd.
     */
    public static function editLanguages() {
        $tag = isset($_GET['tag']) ? $_GET['tag']: '';
        $editError = '';
        $query = DB::query("SELECT * FROM cms_languages WHERE tag =%s", $tag);
        if(!isset($_GET['tag'])) {
            return;
        } else {
            echo '
            <div>
                <form method="POST">
                    <div class="tableborder">
                        <div class="tableheaderalt">De teksten veranderen</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="5%" valign="middle"><b>Tag</b></td>
                                <td class="tablerow2" width="40%" valign="middle"><b>English definitions</b></td>
                                <td class="tablerow2" width="40%" valign="middle"><b>Nederlandse definities</b></td>
                            </tr>
                            ';
                            foreach($query as $lang) {
                                $enLang = $lang['en'];
                                $nlLang = $lang['nl'];
                                if(isset($_POST['submit'])) {
                                    $enText = htmlspecialchars($_POST['en']);
                                    $nlText = htmlspecialchars($_POST['nl']);
                                    DB::update('cms_languages', array(
                                        "en" => $enText,
                                        "nl" => $nlText,
                                    ), "tag =%s", $tag);
                                    $editError = '<b>Opgeslagen!</b>';
                                    $enLang = $enText;
                                    $nlLang = $nlText;
                                }
                                echo $editError.'
                                <tr>
                                    <td class="tablerow1" width="30%" valign="middle"><b>'.$tag.'</b>
                                        <div class="graytext">
                                            De tekst die je hier aanpast komt op de '.$lang['page'].'.php pagina.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="35%" valign="middle">
                                        <textarea name="en">'.$enLang.'</textarea>
                                    </td>
                                    <td class="tablerow2" width="35%" valign="middle">
                                        <textarea name="nl">'.$nlLang.'</textarea>
                                    </td>
                                </tr>
                                ';
                            } echo '<tr>
                                <td align="center" class="tablesubheader" colspan="3">
                                    <input name="submit" type="submit" value="Veranderen" class="realbutton" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div><br />
            ';
        }
    }

    /**
     * De vacatures die binnen zijn gekomen.
     */
    public static function staffApplications() {
        $getStaffApps = DB::query("SELECT * FROM cms_staffappform ORDER BY id DESC");
        foreach($getStaffApps as $form) {
            echo '
            <tr>
                <td class="tablerow1" align="center">#1</td>
            </tr>
            ';
        }
    }
}

// page end..