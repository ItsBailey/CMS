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
 * De Users class is voor alles wat met een gebruiker te maken heeft.
 * @example Users::usernameExists($username) Controleer of de gebruikersnaam al in gebruik is.
 * @example Users::usernameValid($username) Controleer of de gebrukersnaam wel geldig is.
 * @example Users::usermailExists($usermail) Controleer of het e-mailadres al in gebruik is.
 * @example Users::usermailValid($usermail) Controleer of het e-mailadres wl geldig is.
 * @example Users::hashPass($password Hash the pass!
 * @example Users::Add($username, $password, $mail, $born, $motto, $rank, $credits, $pixels, $points) Voeg een gebruiker toe met heel wat types.
 * @example Users::nameToId($username) Zet de gebruikersnaam om naar zijn/haar id.
 * @example Users::IdToName($userid) Zet de id om naar een gebruikersnaam.
 * @example Users::Validate($username, $password) Controleer de inloggegevens.
 * @example Users::updateUser($userid, $key, $value) Wijzig de gebruiker met de inegegeven id zijn keys met de values.
 * @example Users::isLogged() Controleer of de gebruiker een sessie heeft.
 * @example Users::getData($data, $userid) Krijg de data van de userid.
 * @example Users::isUserBanned($userid) Controleer of de userid verbannen is.
 * @example Users::createSso($key) Maak een sso auth_ticket voor de gebruiker.
 * @example Users::countBadges($userid) Krijg de aantal badges van de userid.
 * @example Users::countGuilds($userid) Krijg de aantal groepen van de userid.
 */
class Users {
    
    /**
     * Controleer of de gekozen gebruikersnaam al bestaat.
     * @param type $username De gebruikersnaam.
     * @return boolean Return True als het account bestaad, FALSE als het niet zo is.
     */
    public static function usernameExists($username) {
        DB::query("SELECT null FROM ".Emu::Get('tablename.Users')." WHERE ".Emu::Get('table.Users.username')." =%s LIMIT 1", $username);
        $count = DB::count();
        
        if($count != 0) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Controleer of de gekozen gebruikersnaam wel geldig is.
     * @param type $username De gebruikersnaam.
     * @return boolean Return FALSE als de naam niet geldig is, TRUE als de naam wel geldig is.
     */
    public static function usernameValid($username) {
        if(!preg_match('/^[a-z0-9]+$/i', $username)) {
            return FALSE;
        } else if(Users::usernameExists($username)) {
            return FALSE;
        }
        return TRUE;
    }
    
    /**
     * Controleer of het gekozen E-mailadres al bestaat.
     * @param type $usermail Het e-mailadres.
     * @return boolean Return TRUE als het e-mailadres bestaat.
     */
    private static function usermailExists($usermail) {
        DB::query("SELECT null FROM ".Emu::Get('tablename.Users')." WHERE ".Emu::Get('table.Users.mail')." =%s LIMIT 1", $usermail);
        $count = DB::count();
        
        if($count != 0) {
            return TRUE;
        }
    }
    
    /**
     * Controleer of het gekozen E-mailadres wel geldig is.
     * @param type $usermail Het e-mailadres
     * @return boolean Return FALSE als het e-mailadres niet geldig is, TRUE als het wel zo is.
     */
    public static function usermailValid($usermail) {
        if(Users::usermailExists($usermail)) {
            return FALSE;
        }
        return TRUE;
    }
    
    /**
     * Hash the pass! <!! NOOIT MEESTUREN MET EEN RELEASE !!>
     * @param type $password Het wachtwoord.
     * @return type The hashed pass.
     */
    public static function hashPass($password) {
        return sha1(md5($password).'hbtr^%ujrsFEAW32r$#ujRFTb_dfHY*&@g5*Hkj&5%$WeszDEV'.'');
    }
    
    /**
     * Voeg de gebruiker toe in de database.
     * @param type $username De gebruikersnaam van de gebruiker.
     * @param type $password Het wachtwoord van de gebruiker, al hashed.
     * @param type $mail Het e-mailadres van de gebruiker.
     * @param type $born Geboorte tijd van de gebruiker.
     * @param type $motto De motto van de gebruiker.
     * @param type $rank De rank van de gebruiker, 1 bij registratie, 7 bij installeren.
     * @param type $credits Standaard credits van de gebruiker.
     * @param type $pixels Standaard pixels van de gebruiker.
     * @param type $points Standaard points van de gebruiker.
     */
    public static function Add($username, $password, $mail, $born, $motto = '', $rank = '1', $credits = '100000', $pixels = '100000', $points = '10000') {
        Emulator::users_Add($username, $password, $mail, $born, $motto, $rank, $credits, $pixels, $points);
    }
    
    /**
     * Zet de naam om in een id.
     * @param type $username De gebruikersnaam.
     * @return type Return het id van de gebruiker.
     */
    public static function nameToId($username) {
        return DB::queryFirstField("SELECT id FROM ".Emu::Get('tablename.Users')." WHERE ".Emu::Get('table.Users.username')." =%s LIMIT 1", $username);
    }
    
    /**
     * Zet het id om in een naam.
     * @param type $id Het id.
     * @return type Return de gebruikersnaam.
     */
    public static function idToName($id) {
        return DB::queryFirstField("SELECT ".Emu::Get('table.Users.username')." FROM ".Emu::Get('tablename.Users')." WHERE id =%i LIMIT 1", $id);
    }
    
    /**
     * Valideer of de gebruiker met de juiste gegevens inlogd.
     * @param type $username De gebruikersnaam
     * @param type $password Het wachtwoord.
     * @return boolean Return TRUE als het goed is, FALSE als het niet zo is.
     */
    public static function Validate($username, $password) {
        DB::query("SELECT null FROM ".Emu::Get('tablename.Users')." WHERE ".Emu::Get('table.Users.username')." =%s AND password =%s LIMIT 1", $username, Users::hashPass($password));
        $count = DB::count();
        
        if($count != 0) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Update een gebruik met een key en value.
     * @param type $userid De id van de gebruiker.
     * @param type $key Wat moet er geüpdate worden?
     * @param type $value De waarde wat geüpdate moet worden.
     */
    public static function updateUser($userid, $key, $value) {
        DB::update(Emu::Get('tablename.Users'), array(
            $key => $value
        ), 'id =%i', $userid);
    }
    
    /**
     * Controleer of de gebruiker een sessie heeft.
     * @return boolean Return TRUE als de gebruiker een sessie heeft, FALSE als het niet zo is.
     */
    public static function isLogged() {
        if(isset($_SESSION['USERID'])) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Vraag data uit de users tabel.
     * @param type $data Welke data wil je hebben?
     * @param type $userid De id van de gebruiker.
     * @return type Return de data die je wilt hebben.
     */
    public static function getData($data, $userid) {
        return DB::queryFirstField("SELECT ".$data." FROM ".Emu::Get('tablename.Users')." WHERE id =%i", $userid);
    }
    
    /**
     * Controleer of de gebruikr verbannen is.
     * @param type $userid Welke gebruikers id moeten we controleren?
     * @return boolean Return TRUE als de gebruiker verbannen is, FALSE als het niet zo is.
     * 
     * @todo WERKT NOG NIET VOLLEDIG!
     */
    public static function isUserBanned($userid) {
        DB::query("SELECT * FROM bans WHERE ".Emu::Get('table.Bans.type')." = '".Emu::Get('table.Bans.type.account')."' AND ".Emu::Get('table.Bans.user_id')." =%i LIMIT 1", $userid);
        $count = DB::count();
        
        if($count != 0) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Maak een sso aan, spcifiek voor de gebruiker.
     * @param type $key De gebruikers id van de gebruiker.
     */
    public static function createSso($key) {
        $authTicket = 'wowCMS-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
        Users::updateUser($key, 'auth_ticket', $authTicket);
        unset($authTicket);
    }
    
    /**
     * Roep de aantal badges op van de gebruikers id
     * @param type $userid De id van de gebruiker.
     * @return type Return de aantal badges.
     */
    public static function countBadges($userid) {
        DB::query("SELECT null FROM ".Emu::Get('tablename.Users_badges')." WHERE ".Emu::Get('table.Users_badges.user_id')." =%i", $userid);
        $count = DB::count();
        return $count;
    }
    
    /**
     * Tel de aantal groepen van de gebruiker.
     * @param type $userid De gebruiker id.
     * @return type Return de aantal groepen van de gebruiker.
     */
    public static function countGuilds($userid) {
        DB::query("SELECT null FROM ".Emu::Get('tablename.Guilds')." WHERE ".Emu::Get('table.Guilds.user_id')."", $userid);
        $count = DB::count();
        return $count;
    }
    
    /**
     * Kijk tot wanneer de gebruiker nog een Club lidmaatschap heeft.
     * @param type $userid De gebruikers id
     * @return int Return de datum tot wanneer de gebruiker lid is.
     */
    public static function getClubDays($userid) {
        if(Core::getData('club_expire_timestamp', 'users_settings', 'user_id', $userid) > 0) {
            $query = DB::queryFirstField("SELECT club_expire_timestamp FROM users_settings WHERE user_id =%i", $userid);
            return strftime("%A %e %B %Y %H:%M", $query);
        }
        return 0;
    }
}

// page end..