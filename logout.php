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

// Defineer de gebruiker.
define('ISUSER', TRUE);

// Roep het framework aan.
require_once 'Main/Framework.php';

// Zet de sessie stop.
session_destroy();

// En weer terug naar de index.
Core::forcePage('index');
exit;

// page end..