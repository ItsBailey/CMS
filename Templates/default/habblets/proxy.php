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

$hid = isset($_GET['hid']) ? htmlspecialchars($_GET['hid']) : '';
$first = isset($_GET['first']) ? htmlspecialchars($_GET['first']) : '';

if($hid == 'rooms') {
    ?>
    <div id="rooms-habblet-list-container-h120" class="recommendedrooms-lite-habblet-list-container">
        <ul class="habblet-list">
            <li class="even">
                <span class="clearfix enter-room-link room-occupancy-3" title="Go to room" roomid="1">
                    <span class="room-enter">Ga naar kamer</span>
                    <span class="room-name">Kamernaam</span>
                    <span class="room-description">Kamer beschrijving enzo, want ja het is een kamer met een kamer beschrijving toch..</span>
                    <span class="room-owner">Eigenaar: <a href="">Wesz</a></span>
                </span>
            </li>
            <li class="odd">
                <span class="clearfix enter-room-link room-occupancy-4" title="Go to room" roomid="1">
                    <span class="room-enter">Enter</span>
                    <span class="room-name">Kamernaam</span>
                    <span class="room-description">Kamer beschrijving enzo..</span>
                    <span class="room-owner">Eigenaar: <a href="">Wesz</a></span>
                </span>
            </li>
            <li class="even">
                <span class="clearfix enter-room-link room-occupancy-5" title="Go to room" roomid="1">
                    <span class="room-enter">Enter</span>
                    <span class="room-name">Kamernaam</span>
                    <span class="room-description">Kamer beschrijving enzo..</span>
                    <span class="room-owner">Eigenaar: <a href="">Wesz</a></span>
                </span>
            </li>
        </ul>
    </div>
    <?php
}

// page end..