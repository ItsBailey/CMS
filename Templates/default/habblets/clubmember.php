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

require_once '../../../Main/Framework.php';

echo '
<p>Je hebt nog Habbo Club tot<br /><b>'.Users::getClubDays($userID).'</p>
';

// page end..