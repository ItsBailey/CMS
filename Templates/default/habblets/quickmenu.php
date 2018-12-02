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

// Roep het framework aan.
require_once '../../../Main/Framework.php';

// Is er duidelijk wat er opgevraagd is?
$key = isset($_GET['key']) ? $_GET['key'] : '';
$mode = '';
$oddeven = 0;

// Kijk welke tab is geopend.
switch($key) {
    // Vrienden:
    case "friends_all":
        $mode = 1;
        break;
    // Groepen:
    case "groups":
        $mode = 2;
        break;
    // Kamers:
    case "rooms";
        $mode = 3;
        break;
    // Default: kamers
    default:
        $mode = 1;
}

// In welke modes zitten we?
switch($mode) {
    case 1:
        $string = 'friends';
        DB::query(Emu::Get('query.quickmenu.friends'), $userID);
        $countFriends = DB::count();
        break;
    case 2:
        $string = 'groups';
        DB::query("SELECT * FROM ".Emu::Get('tablename.Guilds')." WHERE ".Emu::Get('table.Guilds.user_id')." =%i ORDER BY ".Emu::Get('table.Guilds.date_created')." LIMIT 10", $userID);
        $countGroups = DB::count();
        break;
    case 3:
        $string = 'rooms';
        DB::query("SELECT null FROM rooms WHERE ".Emu::Get('table.rooms.owner_id')." =%i ORDER BY id LIMIT 25", $userID);
        $countRooms = DB::count();
        break;
}

// Tab 1, vrienden.
if($mode == 1) {
    // Selecteer het id van de vrienden en zet die om in een naam.
    ?> <ul id="offline-friends"> <?php
    if(!$countFriends == 0) {
        $query = DB::query("SELECT user_two_id FROM messenger_friendships WHERE user_one_id =%i", $userID);
        foreach($query as $user) {
            $oddeven++;
            $even = (Core::isEven($oddeven)) ? 'odd' : 'even';
            echo '<li class="'.$even.'"><a href="profile?username='.Users::idToName($user['user_two_id']).'">'.Users::idToName($user['user_two_id']).'</a></li>';
        }
    // Heb je geen vrienden? ...
    } else {
        echo '<ul id="quickmenu-friends"><li class="even">Je hebt geen vrienden</li></ul>';
    } ?>
    </ul> <?php
// Tab 2, groepen.
} else if($mode == 2) {
    // Selecteer de huidige groepen van de gebruiker.
    if(!$countGroups == 0) {
        ?> <ul id="quickmenu-groups"> 
            <?php
            $query = DB::query("SELECT * FROM ".Emu::Get('tablename.Guilds_members')." WHERE ".Emu::Get('table.Guilds_members.user_id')." =%i", $userID);
            foreach($query as $guild) {
                $guildLevel = Core::getData(Emu::Get('table.Guilds_members.level_id'), Emu::Get('tablename.Guilds_members'), Emu::Get('table.Guilds_members.user_id'), $userID);
                if($guildLevel == '3') {
                    $guildDiv = '<div class="owned-group" title="Eigenaar"></div>';
                } else {
                    $guildDiv = '';
                }
                $oddeven++;
                $even = (Core::isEven($oddeven)) ? 'odd' : 'even';
                echo '
                    <li class="'.$even.'">
                        <a href="guild?guild='.$guild[Emu::Get('table.Guilds_members.guild_id')].'">'.Core::getGuildName($guild[Emu::Get('table.Guilds_members.guild_id')]).'</a>
                    </li>
                ';
            }
            ?>
        </ul> <?php
    // Heb je geen groepen? ...
    } else {
        echo '<ul id="quickmenu-groups"><li class="even">Je hebt geen groepen</li></ul>';
    }
    // Je kan ook een groep maken!
    echo '<p class="create-group"><a href="" onclick="GroupPurchase.open(); return false;">Maak een groep</a></p>';
// Tab 3, kamers.    
} else if($mode == 3) {
    // Selecteer de kamers van de gebruiker.
    if(!$countRooms == 0) {
        ?> <ul id="quickmenu-rooms">
            <?php
            $query = DB::query("SELECT * FROM rooms WHERE ".Emu::Get('table.rooms.owner_id')." =%i", $userID);
            foreach($query as $room) {
                $oddeven++;
                $even = (Core::isEven($oddeven)) ? 'odd' : 'even';
                echo '<li class="'.$even.'"><a href="">'.$room[Emu::Get('table.rooms.name')].'</a></li>';
            }
        ?> </ul> <?php
    // Heb je geen kamers?
    } else {
        echo '<ul id="quickmenu-rooms"><li class="even">Je hebt geen kamers</li></ul>';
    }
    // Je kan ook een kamer maken!
    echo '<p class="create-room"><a href="client" target="_blank">Maak een kamer</a></p>';
}

// page end..

?>