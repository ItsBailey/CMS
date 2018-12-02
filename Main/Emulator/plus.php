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
Emu::Set('table.Bans.type', 'bantype');
Emu::Set('table.Bans.user_id', 'value');
Emu::Set('table.Bans.type.account', 'user');

/**
 * Permissions tabel.
 */
Emu::Set('tablename.Permissions', 'permissions_groups');
Emu::Set('table.Permissions.level', 'id');
Emu::Set('table.Permissions.rank_name', 'name');

/**
 * Users tabel.
 */
Emu::Set('tablename.Users', 'users');
Emu::Set('table.Users.username', 'username');
Emu::Set('table.Users.mail', 'mail');
Emu::Set('table.Users.look', 'look');
Emu::Set('table.Users.pixels', 'activity_points');
Emu::Set('table.Users.points', 'vip_points');
Emu::Set('table.Users.account_created', 'account_created');
Emu::Set('table.Users.last_login', 'last_login');
Emu::Set('table.Users.last_online', 'last_online');
Emu::Set('table.Users.ip_register', 'ip_reg');
Emu::Set('table.Users.ip_current', 'ip_last');

/**
 * Users_badges tabel.
 */
Emu::Set('tablename.Users_badges', 'user_badges');
Emu::Set('table.Users_badges.user_id', 'user_id');
Emu::Set('table.Users_badges.slot_id', 'badge_slot');
Emu::Set('table.Users_badges.badge_code', 'badge_id');

/**
 * Guilds tabel.
 */
Emu::Set('tablename.Guilds', 'groups');
Emu::Set('table.Guilds.user_id', 'owner_id');
Emu::Set('table.Guilds.date_created', 'created');

/**
 * Guilds_members table.
 */
Emu::Set('tablename.Guilds_members', 'group_memberships');
Emu::Set('table.Guilds_members.user_id', 'user_id');
Emu::Set('table.Guilds_members.guild_id', 'group_id');
Emu::Set('table.Guilds_members.level_id', 'rank');

/**
 * Rooms table.
 */
Emu::Set('table.rooms.owner_id', 'owner');
Emu::Set('table.rooms.name', 'caption');

/**
 * Custom query's.
 */
Emu::Set('query.quickmenu.friends', 'SELECT user_two_id FROM messenger_friendships WHERE user_one_id =%i LIMIT 100');

class Emulator {
    
    public static function users_Add($username, $password, $mail, $born, $motto = '', $rank = '1', $credits = '100000', $pixels = '100000', $points = '10000') {
        $authTicket = 'Acell-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
        DB::insert(Emu::Get('tablename.Users'), array(
            'username' => $username,
            'password' => $password,
            'mail' => $mail,
            'account_created' => time(),
            'last_online' => time(),
            'motto' => $motto,
            'rank' => $rank,
            'credits' => $credits,
            'activity_points' => $pixels,
            'vip_points' => $points,
            'auth_ticket' => $authTicket,
            'ip_reg' => $_SERVER['REMOTE_ADDR'],
            'ip_last' => $_SERVER['REMOTE_ADDR']
        ));
    }
    
    public static function register_addFriends($userid, $referid) {
        DB::insert("messenger_friendships", array(
            "user_one_id" => $userid,
            "user_two_id" => $referid
        ));
    }
    
    public static function grouppurchase_addGuild($userid, $guildname, $guilddesc) {
        DB::insert('groups', array(
            "owner_id" => $userid,
            "name" => $guildname,
            "desc" => $guilddesc,
            "badge" => "b0503Xs09114s05013s05015",
            "created" => time(),
        ));
    }
    
    public static function grouppurchase_guildMember($groupid, $userid) {
        DB::insert('group_memberships', array(
            "group_id" => $groupid,
            "user_id" => $userid,
            "rank" => 2,
        ));
    }
}


// page end..