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
 * Bans tabel.
 */
Emu::Set('table.Bans.type', 'type');
Emu::Set('table.Bans.user_id', 'user_id');
Emu::Set('table.Bans.type.account', 'account');

/**
 * Permissions tabel.
 */
Emu::Set('tablename.Permissions', 'permissions');
Emu::Set('table.Permissions.level', 'level');
Emu::Set('table.Permissions.rank_name', 'rank_name');

/**
 * Users tabel.
 */
Emu::Set('tablename.Users', 'users');
Emu::Set('table.Users.username', 'username');
Emu::Set('table.Users.mail', 'mail');
Emu::Set('table.Users.look', 'look');
Emu::Set('table.Users.pixels', 'pixels');
Emu::Set('table.Users.points', 'points');
Emu::Set('table.Users.account_created', 'account_created');
Emu::Set('table.Users.last_login', 'last_login');
Emu::Set('table.Users.last_online', 'last_online');
Emu::Set('table.Users.ip_register', 'ip_register');
Emu::Set('table.Users.ip_current', 'ip_current');

/**
 * Users_badges tabel.
 */
Emu::Set('tablename.Users_badges', 'users_badges');
Emu::Set('table.Users_badges.user_id', 'user_id');
Emu::Set('table.Users_badges.slot_id', 'slot_id');
Emu::Set('table.Users_badges.badge_code', 'badge_code');

/**
 * Guilds tabel.
 */
Emu::Set('tablename.Guilds', 'guilds');
Emu::Set('table.Guilds.user_id', 'user_id');
Emu::Set('table.Guilds.date_created', 'date_created');

/**
 * Guilds_members table.
 */
Emu::Set('tablename.Guilds_members', 'guilds_members');
Emu::Set('table.Guilds_members.user_id', 'user_id');
Emu::Set('table.Guilds_members.guild_id', 'guild_id');
Emu::Set('table.Guilds_members.level_id', 'level_id');

/**
 * Rooms table.
 */
Emu::Set('table.rooms.owner_id', 'owner_id');
Emu::Set('table.rooms.name', 'name');

/**
 * Custom query's.
 */
Emu::Set('query.quickmenu.friends', 'SELECT user_two_id FROM messenger_friendships WHERE user_one_id =%i ORDER BY friends_since LIMIT 100');

class Emulator {
    
    public static function users_Add($username, $password, $mail, $born, $motto = '', $rank = '1', $credits = '100000', $pixels = '100000', $points = '10000') {
        $authTicket = 'Acell-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
        DB::insert(Emu::Get('tablename.Users'), array(
            'username' => $username,
            'password' => $password,
            'mail' => $mail,
            'account_created' => time(),
            'account_day_of_birth' => $born,
            'last_login' => time(),
            'motto' => $motto,
            'rank' => $rank,
            'credits' => $credits,
            'pixels' => $pixels,
            'points' => $points,
            'auth_ticket' => $authTicket,
            'ip_register' => $_SERVER['REMOTE_ADDR'],
            'ip_current' => $_SERVER['REMOTE_ADDR']
        ));
    }
    
    public static function register_addFriends($userid, $referid) {
        DB::insert("messenger_friendships", array(
            "user_one_id" => $userid,
            "user_two_id" => $referid,
            "relation" => 0,
            "friends_since" => time()
        ));
    }
    
    public static function grouppurchase_addGuild($userid, $guildname, $guilddesc) {
        DB::insert('guilds', array(
            "user_id" => $userid,
            "name" => $guildname,
            "description" => $guilddesc,
            "badge" => "b0503Xs09114s05013s05015",
            "date_created" => time(),
        ));
    }
    
    public static function grouppurchase_guildMember($groupid, $userid) {
        DB::insert('guilds_members', array(
            "guild_id" => $groupId,
            "user_id" => $userID,
            "level_id" => 3,
            "member_since" => time(),
        ));
    }
}

// page end..