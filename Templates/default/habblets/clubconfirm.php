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

$months = isset($_POST['optionNumber']) ? (int)$_POST['optionNumber']: 0;

switch($months) {
    case 1:
        $price = 100;
        $valid = 1;
        break;
    case 3:
        $price = 200;
        $valid = 1;
        break;
    case 6:
        $price = 400;
        $valid = 1;
        break;
}

if($valid != 1) {
    $price = 100;
    $months = 1;
    $valid = 1;
}

echo '
<div id="hc_confirm_box">
    <img src="'.$siteLink.$siteDir.'album1/piccolo_happy.gif" alt="" align="left" style="margin:10px;" />
    <p><b>Ik bevestig,</b></p>
    <p>Dat ik '.$months.' maand(en) aan '.$siteShort.' Club lidmaatschap koop.</p>
    <p>Dit kost mij '.$price.' credits (en ik heb nu: '.Users::getData('credits', $userID).' credits).</p>
    <p>
    <a href="#" class="new-button" onclick="habboclub.closeSubscriptionWindow(); return false;"><b>Annuleren</b><i></i></a>
    <a href="#" ondblclick="habboclub.showSubscriptionResultWindow('.$months.', \'Habbo CLUB\'); return false;" onclick="habboclub.showSubscriptionResultWindow('.$months.', \'Habbo CLUB\'); return false;" class="new-button"><b>Koop</b><i></i></a>
    </p>
</div>
<div class="clear"></div>
';

// page end..