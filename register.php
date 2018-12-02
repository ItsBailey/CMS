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

// Al een sessie? Doorsturen dan maar.
if(Users::isLogged()) { Core::forcePage('me'); exit; }

// Is er een referral?
$referral = isset($_GET['referral']) ? (int)$_GET['referral'] : '';

// Controleer de referral.
if(!empty($referral)) {
    // Selecteer de naam en look van de referral.
    $query = DB::query("SELECT username,".Emu::Get('table.Users.look')." FROM ".Emu::Get('tablename.Users')." WHERE id =%i LIMIT 1", $referral);
    // Controleer of de referral wel bestaat.
    if(Core::countData(Emu::Get('tablename.Users')." WHERE id =".$referral." LIMIT 1") > 0) {
        // Zet de input er hidden bij met de userid van de referral.
        $referralInput = '<input type="hidden" name="referral" id="register-referrer" value="'.$referral.'" />';
        // De referral box.
        foreach($query as $user) {
            $userReferral = '
            <div id="inviter-info">
                <p>Je vriend '.$user['username'].' heeft je uitgenodigd voor '.$siteShort.'!</p>
                <img alt="'.$user['username'].'" title="'.$user['username'].'" src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$user[Emu::Get('table.Users.look')].'&size=s&direction=4&head_direction=4&gesture=" />
            </div>
            ';
        }
    // Bestaat deze niet? Lege inputs.
    } else {
        $referralInput = '';
        $userReferral = '';
    }
// Referral niet goed, Lege inputs.
} else {
    $referralInput = '';
    $userReferral = '';
}

// Registreren.
if(isset($_POST['submit'])) {
    // Defineer de ingevoerde gegevens.
    $userName = htmlspecialchars($_POST['username']);
    $userPass = htmlspecialchars($_POST['password']);
    $userPass2 = htmlspecialchars($_POST['password2']);
    $userMail = htmlspecialchars($_POST['mail']);
    $userMail2 = htmlspecialchars($_POST['mail2']);
    $userBornYear = $_POST['bornYear'];
    $bornDate = $_POST['bornDay'].'-'.$_POST['bornMonth'].'-'.$userBornYear;
    $userDob = strtotime($bornDate);
    $referId = isset($_POST['referral']) ? htmlspecialchars($_POST['referral']) : 0;
    // Zijn de basis velden leeg? Error!
    if(empty($userName) || empty($userPass) || empty($userMail)) {
        $template->assign('registerError', incWeb::loginRegError('Hey, velden niet leeg laten!'));
    // Naam langer dan 22 of korter dan 3? Error!
    } else if(strlen($userName) < 3 || strlen($userName) > 22) {
        $template->assign('registerError', incWeb::loginRegError('Oeps, je naam is te lang of kort!'));
    // Wachtwoord langer dan 32 of korter dan 6? Error!
    } else if(strlen($userPass) < 6 || strlen($userPass) > 32) {
        $template->assign('registerError', incWeb::loginRegError('Oeps, je wachtwoord is te lang of kort!'));
    // Wachtwoorden niet hetzelfde? Error!
    } else if($userPass != $userPass2) {
        $template->assign('registerError', incWeb::loginRegError('Oh oh, je wachtwoorden zijn niet hetzelfde!'));
    // Naam niet geldig of in gebruiker? Error!
    } else if(!Users::usernameValid($userName)) {
        $template->assign('registerError', incWeb::loginRegError('Helaas, deze naam is niet geldig of al in gebruik.'));
    // E-mailadres al in gebruik? Error!
    } else if(!Users::usermailValid($userMail)) {
        $template->assign('registerError', incWeb::loginRegError('Helaas, dit E-mailadres is niet geldig of al in gebruik.'));
    // Geboren na 2008? Veel te jong..
    } else if($userBornYear > 2008) {
        $template->assign('registerError', incWeb::loginRegError('Oeps, je bent te jong om dit te mogen spelen!'));
    // Alles goed? Opslaan, sessie geven controleren op de rerral en doorsturen.
    } else {
        $passHash = Users::hashPass($userPass);
        Users::Add($userName, $passHash, $userMail, $userDob, Core::getSystem('motto'), '1', Core::getSystem('credits'), Core::getSystem('pixels'), Core::getSystem('points'));
        $_SESSION['USERID'] = Users::nameToId($userName);
        // Is de referral goed? Update de points van de gebruiker en word vrienden met elkaar.
        if(Core::countData(Emu::Get('tablename.Users')." WHERE id=".$referId." LIMIT 1") > 0) {
            DB::query("UPDATE ".Emu::Get('tablename.Users')." SET ".Emu::Get('table.Users.points')." = ".Emu::Get('table.Users.points')." + 50 WHERE id =%i", $referId);
            Emulator::register_addFriends($_SESSION['USERID'], $referId);
            Emulator::register_addFriends($referId, $_SESSION['USERID']);
        }
        Core::forcePage('me');
        exit;
    }
}

// Basis assigns voor de pagina.
$varRegister = array(
    "siteTitle" => $siteShort." &bull; Registreren",
    "registerError" => "",
    "referral" => $userReferral,
    "referralInput" => $referralInput
);

// Defineer de pagina assigns.
$template->assign($varRegister);

// Maak de pagina.
$template->draw($siteTemplate.'Register');
$template->draw($siteTemplate.'_footer');

// page end..