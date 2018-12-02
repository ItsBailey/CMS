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

$tag1 = isset($_POST['tag1']) ? $_POST['tag1'] : '';
$tag2 = isset($_POST['tag2']) ? $_POST['tag2'] : '';

DB::query("SELECT id FROM cms_tags WHERE tag =%s", $tag1);
$countTag1 = DB::count();

DB::query("SELECT id FROM cms_tags WHERE tag =%s", $tag2);
$countTag2 = DB::count();

if($countTag1 == $countTag2) {
    $end = 0;
} else if($countTag1 > $countTag2) {
    $tag1 = $tag1;
    $end = 2;
} else if($countTag1 < $countTag2) {
    $tag2 = $tag2;
    $end = 1;
}

?>

<div id="fightResultCount" class="fight-result-count">
    <?php echo ($end == 0 ? '<b>Gelijkspel!</b><br />' : '<b>De winnaar is:</b><br />'); ?><br />
    <b><?php echo ($tag1); ?></b> (<?php echo $countTag1 ?>) volgers <br />
    <b><?php echo ($tag2); ?></b> (<?php echo $countTag2 ?>) volgers <br />
</div>
<div class="fight-image">
    <img src="<?php echo $siteDir; ?>images/tagfight/tagfight_end_<?php echo $end; ?>.gif" alt="" name="fightanimation" id="fightanimation" />
    <a id="tag-fight-button-new" href="#" class="new-button" onclick="TagFight.newFight(); return false;"><b>Opnieuw?</b><i></i></a>
    <a id="tag-fight-button" href="#" style="display:none" class="new-button" onclick="TagFight.init(); return false;"><b>Start</b><i></i></a>
</div>