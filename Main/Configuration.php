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

// De config class zorgt voor het schrijven en lezen van vars.
require_once 'Classes/classConfig.php';

/**             <!! WARNING !!>
 * DON'T EDIT IF YOU DO NOT KNOW WHAT IT DOES! *
 * WIJZIG NIETS ALS JE NIET WEET WAT HET DOET! *
************************************************/

// Database instellingen.
Config::W('dbHost', 'localhost');
Config::W('dbUser', 'root');
Config::W('dbPass', '');
Config::W('dbName', 'clean');

// Website instellingen.
Config::W('siteLink', '//development/AcellCMS/');
Config::W('siteLang', 'en');
Config::W('siteTemplate', 'default/');
Config::W('siteTemplateStyle', 'web-gallery/');
Config::W('siteTimeout', 120);
Config::W('siteOverrideIp', array('127.0.0.1'));

// Cms instellingen.
Config::W('cmsTemplate', 'housekeeping/');
Config::W('cmsTemplateStyle', 'source/');

// Emulator instellingen.
Config::W('emuUsing', 'arcturus');

// page end..