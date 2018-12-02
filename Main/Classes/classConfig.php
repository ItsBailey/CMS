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
 * De Config class wordt gebruikt om een regel te schrijven en te lezen.
 * @example Config::W('readThis', 'Laat dit zien'); Dit is wat je schrijft.
 * @example Config::R('readThis'): Dit is om het aan te roepen.
 */
class Config {
    
    /**
     * Een static var.
     * @var type $config is voor de lees en schrijf regels.
     */
    static $config = array();
    
    /**
     * Schrijf een regel.
     * @param type $k Dit is hoe het aangeroepen moet worden.
     * @param type $v En dit is wat je wilt laten zien.
     */
    public static function W($k, $v) {
        self::$config[$k] = $v;
    }
    
    /**
     * Lees de geschreven regel.
     * @param type $k Dit is wat er aangeroepen moet worden.
     * @return type Die laat zien wat er geschreven is.
     */
    public static function R($k) {
        return self::$config[$k];
    }
}

// page end..