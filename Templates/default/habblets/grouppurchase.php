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

$groupName = isset($_POST['name']) ? $_POST['name'] : '';
$groupDesc = isset($_POST['description']) ? $_POST['description'] : '';
$do = isset($_GET['do']) ? $_GET['do'] : '';
DB::query("SELECT COUNT(*) FROM ".Emu::Get('tablename.Guilds')." WHERE ".Emu::Get('table.Guilds.user_id')." =%i LIMIT 10", $userID);
$countGroups = DB::count();

if(Users::getData('credits', $userID) < 200) {
    ?>
        <p id="purchase-result-error">Je kan helaas geen groep kopen..</p>
        <div id="purchase-group-errors">
            <p>Je hebt niet genoeg credits!<br /></p>
        </div>
        <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
        <div class="clear"></div>
    <?php
    exit;
} else if($countGroups > 10) {
    ?>
        <p id="purchase-result-error">Je kan helaas geen groep kopen..</p>
        <div id="purchase-group-errors">
            <p>Je mag er maximaal 10 maken!<br /></p>
        </div>
        <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
        <div class="clear"></div>
    <?php
    exit;
}

if($do != 'purchase_confirmation') {
    ?>
        <p>
            <img src="<?php echo $siteLink ?>/habbo-imaging/badge-fill/b0503Xs09114s05013s05015.gif" border="0" align="left">
            Vul het formulier hieronder in om een groep te maken, dit kost je dan wel <b>200</b> credits.
        </p>
        <p>
            <b>Groep naam</b><br />
            <input type="text" name="name" id="group_name" value="" length="10" maxlength="25">
        </p>
        <p>
            <b>Groep beschrijving</b><br />
            <textarea name="description" id="group_description" maxlength="200"></textarea>
        </p>
        <p>Je kan deze keuze later altijd nog veranderen.</p>
        <p>
            <a href="#" class="new-button" onclick="GroupPurchase.confirm(); return false;"><b>Kopen</b><i></i></a>
            <a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Annuleren</b><i></i></a>
        </p>
    <?php
    exit;
} else if($do == 'purchase_confirmation') {
    if(empty($groupName) || empty($groupDesc)) {
        ?>
        <p>Vul alsjeblieft alle velden in!</p>
        <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
        <?php
    } else if(strlen($groupName > 25) && !is_numeric($groupName)) {
        ?>
        <p>De groep naam die je hebt gekozen is te lang of geen geldige naam!</p>
        <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
        <?php
    } else if(strlen($groupDesc) > 200) {
        ?>
        <p>Groeps beschrijving te lang!</p>
        <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
        <?php
    } else {
        DB::query("SELECT id FROM ".Emu::Get('tablename.Guilds')." WHERE name =%s LIMIT 1", $groupName);
        $count = DB::count();
        
        if($count > 0) {
            ?>
            <p>Deze groepsnaam bestaat al</p>
            <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
            <?php
            exit;
        } else {
            Emulator::grouppurchase_addGuild($userID, $groupName, $groupDesc);
            $groupId = DB::queryFirstField("SELECT id FROM ".Emu::Get('tablename.Guilds')." WHERE ".Emu::Get('table.Guilds.user_id')." =%i LIMIT 1", $userID);
            Emulator::grouppurchase_guildMember($groupId, $userID);
            DB::query("UPDATE ".Emu::Get('tablename.Users')." SET credits = credits - 200 WHERE id =%i LIMIT 1", $userID);
            ?>
            <p>
                <strong>Groep aangemaakt en gekocht!</strong>
                <img src="<?php echo $siteLink ?>/habbo-imaging/badge-fill/b0503Xs09114s05013s05015.gif" border="0" align="left" />
                Gefeliciteerd! Je bent nu eigenaar van de groep <?php echo $groupName; ?>!
            </p>
            <p><a href="#" class="new-button" onclick="GroupPurchase.close(); return false;"><b>Sluiten</b><i></i></a></p>
            <?php
        }
    }
}

// page end..