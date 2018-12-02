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
 * De Template class is een extensie op RainTPL.
 * @example $template->tplError($text) Een andere template error dan normaal.
 */
class Template extends RainTPL {
    
    /**
     * Maak een eigen error template.
     * @param type $text Wat is de error?
     */
    public function tplError($text = '') {
        exit('<center><font face="verdana" size="2"><p>wowCMS - Template Error!</b><hr>'.$text.'</font></center>');
    }
}

// page end..