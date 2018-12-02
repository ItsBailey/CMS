<?php if(!class_exists('raintpl')){exit;}?>

    <div class="outerdiv" id="global-outerdiv">
        <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
            <tr>
                <td width="100%" valign="top" id="rightblock">
                    <div>
                        <div style="font-size:30px; padding-left:7px; letter-spacing:-2px; border-bottom:1px solid #EDEDED">Acell Housekeeping</div>
                    </div><br />
                    <div id="ipb-get-members" style="border:1px solid #000; background:#FFF; padding:2px;position:absolute;width:120px;display:none;z-index:100"></div>
                    <table border="0" width="100%" cellpadding="0" cellspacing="4">
                        <tr>
                            <td valign="top" width="75%">
                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <div class="homepage_pane_border">
                                                <div class="homepage_section">Statistieken en Taken</div>
                                                <table width="100%" cellspacing="0" cellpadding="4">
                                                    <tr>
                                                        <td width="50%" valign="top">
                                                            <div class="homepage_border">
                                                                <div class="homepage_sub_header">Systeem en Website overzicht</div>
                                                                <table width="100%" cellpadding="4" cellspacing="0">
                                                                    <tr>
                                                                        <td class="homepage_sub_row" width="60%"><strong>AcellCMS Version</strong> &nbsp;(<a href="http://acell.weszdev.com/_versions/about.htm" target="_blank">about.htm</a>)</td>
                                                                        <td class="homepage_sub_row" width="40%"><strong><?php echo $cmsP;?> :: <?php echo $cmsV;?>-<?php echo $cmsB;?></strong>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Spelers</strong></td>
                                                                        <td class="homepage_sub_row"><strong><?php echo Core::countData($users); ?></strong> spelers, waarvan er <strong><?php echo $onlineCount;?></strong> online zijn</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Kamers</strong></td>
                                                                        <td class="homepage_sub_row"><strong><?php echo Core::countData('rooms'); ?></strong> kamers aangemaakt</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Meubels</strong></td>
                                                                        <td class="homepage_sub_row"><strong><?php echo Core::countData('items'); ?></strong> meubels in het hotel</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Groepen</strong></td>
                                                                        <td class="homepage_sub_row"><strong><?php echo Core::countData($guilds); ?></strong> groepen aangemaakt</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Stafflogs</strong></td>
                                                                        <td class="homepage_sub_row"><strong><?php echo Core::countData('cms_stafflog'); ?></strong> medewerker logs</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Verbanningen</strong></td>
                                                                        <td class="homepage_sub_row"><strong><?php echo Core::countData('bans'); ?></strong> mensen verbannen</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                        <td width="50%" valign="top">
                                                            <div class="homepage_border">
                                                                <div class="homepage_sub_header">Server client overzicht</div>
                                                                <table width="100%" cellpadding="4" cellspacing="0">
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Hotel IP</strong></td>
                                                                        <td class="homepage_sub_row"><?php echo Core::getSystem('ip'); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>Hotel poort</strong></td>
                                                                        <td class="homepage_sub_row"><?php echo Core::getSystem('port'); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="homepage_sub_row"><strong>MUS poort</strong></td>
                                                                        <td class="homepage_sub_row"><?php echo Core::getSystem('musport'); ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr><td>&nbsp;</td></tr>
                                    <tr>
                                        <td>
                                            <div class="homepage_pane_border">
                                                <div class="homepage_section">Communicatie</div>
                                                <table width="100%" cellspacing="0" cellpadding="4">
                                                    <tr>
                                                        <td valign="top" width="50%">
                                                            <div class="homepage_border">
                                                                <div class="homepage_sub_header">Housekeeping notities</div><br />
                                                                <div align="center">
                                                                    <?php echo incCms::adminNotes(); ?>

                                                                </div><br />
                                                            </div>
                                                        </td>
                                                        <td width="50%" valign="top">
                                                            <div class="homepage_border">
                                                                <div class="homepage_sub_header">Medewerkers</div>
                                                                <table width="100%" cellpadding="4" cellspacing="0">
                                                                    <?php echo incCms::staffRow(); ?>

                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="25%">
                                <div id="acp-update-wrapper">
                                    <div class="homepage_pane_border" id="acp-update-normal">
                                        <div class="homepage_section">AcellCMS Updater</div>
                                        <div style="font-size:12px;padding:4px; text-align:center">
                                            <p>
                                                Op dit moment maak je gebruik van<br />
                                                <strong><?php echo $cmsP;?> :: <?php echo $cmsV;?>-<?php echo $cmsB;?></strong><br /><br />
                                                <a href="http://acell.weszdev.com/_versions/about.htm" target="_blank">Kijk op deze pagina</a><br />
                                                helemaal onderin om te controleren of er een nieuwe versie en build beschikbaar is zodat je altijd up-to-date blijft.
                                            </p>
                                        </div>
                                    </div><br />
                                </div>
                                <div id="acp-update-wrapper">
                                    <div class="homepage_pane_border" id="acp-update-normal">
                                        <div class="homepage_section">AcellCMS Support</div>
                                        <div style="font-size:12px;padding:4px; text-align:center">
                                            <p>
                                                Dit systeem is en zal altijd gratis blijven om te gebruiken.<br />
                                                Omdat ik hier niet betaald voor krijg geef ik dus geen volledige support bij het opzetten,
                                                dit lijkt me ook niet heel erg aangezien er een hele installatie prcedure bij zit.
                                                Mocht je nou een kleine vraag hebben omdat je iets niet kan vinden of omdat je iets niet snapt
                                                zou ik je altijd even willen helpen,<br />zoek dan contact met mij via de mail.<br /><br />
                                                
                                                Wesley@WeszDEV.com<br /><br />
                                                
                                                Bedankt voor het gebruik van AcellCMS <?php echo $cmsV;?><br />
                                                Veel plezier ermee!<br />
                                                - Wesz
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div align="center">
        <?php
            $mtime = explode(' ', microtime());
            $totaltime = $mtime[0] + $mtime[1] - time();
            printf('Pagina laad tijd: %.3f', $totaltime);
        ?>

        </div>
    </div>
</div>
<div class="copy" align="center">&copy; <strong>AcellCMS</strong> <?php echo $cmsV;?> [<?php echo $cmsP;?>]<br />
    <font size="1">
        Made with love by <a href="https://weszdev.com">Wesz</a><br />
    </font>
</div>
</body>
</html>