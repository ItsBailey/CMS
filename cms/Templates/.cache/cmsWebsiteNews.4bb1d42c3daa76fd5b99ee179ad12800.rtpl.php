<?php if(!class_exists('raintpl')){exit;}?>                <td width="78%" valign="top" id="rightblock">
                    <?php echo $editNewsError;?>

                    <?php echo $newsEdit;?>

                    <div>
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Nieuws wijzigen</div>
                                <table cellpadding="4" cellspacing="0" width="100%">
                                    <tr>
                                        <td class="tablesubheader" width="1%" align="center">ID</td>
                                        <td class="tablesubheader" width="28%">Titel</td>
                                        <td class="tablesubheader" width="10%" align="center">Geplaatst op</td>
                                        <td class="tablesubheader" width="10%" align="center">Auteur</td>
                                        <td class="tablesubheader" width="10%" align="center">Wijzigen</td>
                                        <td class="tablesubheader" width="12%" align="center">Verwijderen</td>
                                    </tr>
                                    <?php echo incCms::newsRow(); ?>

                                </table>
                            </div>
                        </form>
                    </div>
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