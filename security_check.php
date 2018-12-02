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
require_once 'Main/Framework.php';

$error = '';
if(isset($_POST['submit'])) {
    $userName = htmlspecialchars($_POST['username']);
    $userPass = htmlspecialchars($_POST['password']);
    $staffPin = htmlspecialchars($_POST['pin']);
    
    if(empty($userName) || empty($userPass) || empty($staffPin)) {
        $error = 'Geen velden leeg laten!';
    } else if($staffPin != Core::getData('pincode', 'cms_staffinfo', 'userid', Users::nameToId($userName))) {
        $error = 'Verkeerde pincode!';
    } else if(Users::Validate($userName, $userPass)) {
        $_SESSION['USERID'] = Users::nameToId($userName);
        Users::updateUser($_SESSION['USERID'], Emu::Get('table.Users.last_login'), time());
        Users::updateUser($_SESSION['USERID'], Emu::Get('table.Users.ip_current'), $remoteIp);
        Core::forcePage('me');
        exit;
    } else {
        $error = 'Verkeerde inlog gegevens.';
    }
}

?>

<h1>Voer je pin in.</h1>
<p>Omdat je een medewerker bent van dit hotel, vragen wij jou om de pin code die je zelf hebt bedacht.</p>
<?php echo $error ?>
<form method="POST">
    <label>Gebruikersnaam</label><br />
    <input type="text" name="username" /><br /><br />
    <label>Wachtwoord</label><br />
    <input type="password" name="password" /><br /><br />
    <label>Pin code</label><br />
    <input type="text" name="pin" maxlength="4" /><br /><br />
    <input type="submit" name="submit" value="Doorgaan" />
</form>