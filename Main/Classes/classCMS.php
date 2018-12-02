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
 * De Cms class wordt gebruikt voor alles wat met het cms gedeelte te maken heeft.
 * @example Cms::hkSession() Controleer of er een cms sessie aanwezig is.
 * @example Cms::Filter($data) Filter de ingevoerde data voor het nieuws.
 * @example Cms::updateLanguages Wijzig de taal defenities in de database.
 * @example Cms::getRankName Laat de rank naam zien van de opgevraagde id.
 */
class Cms {
    
    /**
     * Controleer of de gebruiker een sessie heeft.
     * @return boolean Return TRUE als er een sessie is, FALSE als het niet zo is.
     */
    public static function hkSession() {
        if(isset($_SESSION['USERHKID']) && isset($_SESSION['USERHKNAME'])) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Filter de input voor tekstverwerking.
     * @param type $data De ingevoerde tekst.
     * @return type Return de tekst, gefiltert.
     */
    public static function Filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    /**
     * Is er iets aangepast qua taal? Sla het op in de cms_languages
     * @param type $tag De tag van de pagina.
     * @param type $nl De nederlandse tekst.
     * @param type $en De engelse tekst.
     */
    public static function updateLanguages($tag, $nl, $en) {
        DB::update('cms_languages', array(
            'nl' => $nl,
            'en' => $en,
        ), 'tag =%s', $tag);
    }
    
    /**
     * Vraag de rank naam op met de rank level.
     * @param type $id Dit is het rank level.
     */
    public static function getRankName($id) {
        echo Core::getData(Emu::Get('table.Permissions.rank_name'), Emu::Get('tablename.Permissions'), Emu::Get('table.Permissions.level'), "$id");
    }
}

// page end..