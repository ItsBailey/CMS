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

$search = isset($_POST['searchString']) ? htmlspecialchars($_POST['searchString']) : '';

?>
<ul>
    <li class="even offline" homeurl="" style="background-image: url(http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo Users::getData('look', $userID) ?>&direction=2&head_direction=2&gesture=sml&size=s)">
        <div class="item"><b><?php echo $userName ?></b><br /></div>
        <div class="lastlogin"><b>Laatst ingelogd:</b><br /><span title="01-01-1001"><?php echo date('d-m-Y H:i', Users::getData('last_login', $userID)) ?></span></div>
        <div class="tools"><a href="#" class="add" avatarid="<?php echo $userID ?>" title="Stuur verzoek." ></a></div>
        <div class="clear"></div>
    </li>
</ul>