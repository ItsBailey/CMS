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
        $seconds = 2629800;
        break;
    case 3:
        $price = 200;
        $valid = 1;
        $seconds = 7889400;
        break;
    case 6:
        $price = 400;
        $valid = 1;
        $seconds = 15778800;
        break;
}

if($valid != 1) {
    $price = 100;
    $months = 1;
    $valid = 1;
    $seconds = 2629800;
}

$clubTime = DB::queryFirstField("SELECT club_expire_timestamp FROM users_settings WHERE user_id =%i LIMIT 1", $userID);

if($clubTime > 0) {
    DB::query("UPDATE users_settings SET club_expire_timestamp = club_expire_timestamp + %s WHERE user_id =%i", $seconds, $userID);
    DB::query("UPDATE users SET credits = credits - %s WHERE id =%i LIMIT 1", $price, $userID);
} else {
    DB::query("UPDATE users_settings SET club_expire_timestamp = %s + %s WHERE user_id =%i", $time, $seconds, $userID);
    DB::query("UPDATE users SET credits = credits - %s WHERE id =%i LIMIT 1", $price, $userID);
    DB::insert("users_badges", array(
        "badge_code" => 'HC1',
        "user_id" => $userID
    ));
}

echo '
<div id="hc_confirm_box">
    <img src="'.$siteLink.$siteDir.'album1/piccolo_happy.gif" alt="" align="left" style="margin:10px;" />
    <p><b>Gelukt!</b></p>
    <p>Je hebt nu '.$months.' maand(en) '.$siteShort.' Club gekocht!</p>
    <p>
    <a href="#" class="new-button" onclick="habboclub.closeSubscriptionWindow(); return false;"><b>Klaar</b><i></i></a>
    </p>
</div>
<div class="clear"></div>
';

// page end..