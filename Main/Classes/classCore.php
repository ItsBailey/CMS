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
 * De Core class wordt gebruikt voor alles wat met het systeem of de database te maken heeft.
 * @example Core::getSystem('key') Selecteer een key uit de cms_system tabel.
 * @example Core::getData('key', 'value', 'user_id', 1) Selecteer een key uit de value tabel waar de user_id 1 is.
 * @example Core::forcePage('page') Stuur door naar de betreffende pagina.
 * @example Core::getOnline() Krijg de aantal online gebruikers.
 * @example Core::countData($value) Tel alle gegevens uit de value tabel op.
 * @example Core::checkMaintenance() Comtroleer of we in onderhoud zijn of niet.
 * @example Core::getLastId($value) Krijg de laatst ingevoerde id van de value tabel.
 * @example Core::getSiteTexts($siteLang, $pageName) Haal de tekst regels op uit de database met huidige taal.
 * @example Core::getSiteTitle($siteLang, $pageName) Haal de titel op uit de database met huidige taal en pagina naam.
 * @example Core::getGuildName($id) Haal de guild naam op met de betreffende guild_id.
 * @example Core::isEven($int) Controleer of het getal even of on-even is.
 * @example Core::staffAppStatus() Controleer de status van de vacature.
 */
class Core {
    
    /**
     * Krijg een key uit de cms_system tabel.
     * @param type $key Wat wil je opgevraagd hebben?
     * @return type Return de key die je opvraagd.
     */
    public static function getSystem($key) {
        return DB::queryFirstField("SELECT ".$key." FROM cms_system");
    }
    
    /**
     * Vraag data op uit een tabel met een id als het nodig is.
     * @param type $key Selecteer deze rij.
     * @param type $value Van deze tabel.
     * @param type $id Waarbij je deze id nodig hebt.
     * @param type $userid En het gaat om deze user_id.
     * @return type Return de key die je opvraagd.
     */
    public static function getData($key = '', $value = '', $id, $userid) {
        return DB::queryFirstField("SELECT ".$key." FROM ".$value." WHERE ".$id." =%i LIMIT 1 ", $userid);
    }

    /**
     * Stuur door naar de opgegeven pagina.
     * @param type $page Welke pagina wil je opvragen?
     */
    public static function forcePage($page = '') {
        header('Location: '.$page);
    }
    
    /**
     * Toon het aantal online gebruikers.
     * @return type Return de aantal online gebruikers.
     */
    public static function getOnline() {
        DB::query("SELECT null FROM ".Emu::Get('tablename.Users')." WHERE online = '1'");
        $count = DB::count();
        return $count;
    }
    
    /**
     * Tel de aantal xx in de tabel.
     * @param type $value Tel de value data op.
     * @return type Return de opgetelde data.
     */
    public static function countData($value = '') {
        DB::query("SELECT null FROM $value");
        $count = DB::count();
        return $count;
    }
    
    /**
     * Controleer of we in onderhoud zijn.
     * @return boolean Return TRUE als we in onderhoud, FALSE als het niet zo is.
     */
    public static function checkMaintenance() {
        $maintenance = DB::queryFirstField("SELECT maintenance FROM cms_system LIMIT 1");
        if($maintenance == 1) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Vraag de laatste id op uit een tabel.
     * @param type $value Vraag de database tabel op.
     * @return type Return de laatst ingevoerde id.
     */
    public static function getLastId($value = '') {
        if(!isset($_GET['id'])) {
            $lastId = DB::queryFirstField("SELECT MAX(ID) FROM $value");
            $_GET['id'] = $lastId;
            return htmlspecialchars($_GET['id']);
        }
    }
    
    /**
     * Haal de tekst regels op uit de database met huidige taal.
     * @param type $siteLang De taal van de website.
     * @param type $pageName De pagina waar het om gaat.
     * @return type Return de tekst uit de database.
     */
    public static function getSiteTexts($siteLang = 'en', $pageName = '') {
        return DB::queryFirstField("SELECT $siteLang FROM cms_sitetexts WHERE page =%s", $pageName);
    }
    
    /**
     * Haal de titel van de betreffende pagina op uit de database.
     * @param type $siteLang De site taal.
     * @param type $pageName De pagina naam.
     * @return type Return de titel uit de database.
     */
    public static function getSiteTitle($siteLang = 'en', $pageName = '') {
        return DB::queryFirstField("SELECT ".$siteLang."title FROM cms_sitetexts WHERE page =%s", $pageName);
    }
    
    /**
     * Vraag de naam op van de guild met een id.
     * @param type $id De ig van de guild.
     * @return type Return de guild naam.
     */
    public static function getGuildName($id) {
        return DB::queryFirstField("SELECT name FROM ".Emu::Get('tablename.Guilds')." WHERE id =%i", $id);
    }
    
    /**
     * Kijk of het getal even of on-even is.
     * @param type $int Het getal.
     * @return boolean Return TRUE als deze even is, FALSE als dat niet zo is.
     */
    public static function isEven($int) {
        if($int%2 == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Krijg de taal definite van de pagina met bijbehorende tag.
     * @param type $siteLang De taal van de website.
     * @param type $page De pagina waar het om gaat.
     * @param type $tag De tag om te vervangen.
     * @return type Return de opgevraagde vertaling.
     */
    public static function getLanguage($siteLang = 'en', $page = '', $tag = '') {
        return DB::queryFirstField("SELECT $siteLang FROM cms_languages WHERE page =%s AND tag =%s", $page, $tag);
    }
    
    /**
     * Controleer de status van de vacatures.
     * @param type $id De rank id van de vacature.
     * @return boolean Return true als deze aan is, false als dat niet zo is.
     */
    public static function staffAppStatus($id) {
        $query = DB::queryFirstField("SELECT status FROM cms_staffapps WHERE rankid =%i LIMIT 1", $id);
        if($query == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// page end..