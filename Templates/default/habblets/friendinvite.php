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

?>
<h3><?php echo $siteShort ?> is leuker met wat échte vrienden!</h3>
<div class="copytext">
    <p>Stuur deze link naar je vrienden om ze uit te nodigen naar dit hotel, als je dit doet krijg je 50 diamanten!</p>
    <textarea cols='50' rows='2' onclick="this.focus(); this.select()" readonly='readonly' style='width: 100%'><?php echo $siteLink.'register?referral='.$userID ?></textarea>
</div>