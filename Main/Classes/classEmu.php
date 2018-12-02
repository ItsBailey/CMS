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

class Emu {
    
    static $emu = array();

    public static function Set($k, $v) {
        self::$emu[$k] = $v;
    }
    
    public static function Get($k) {
        return self::$emu[$k];
    }
}

// page end..