<?php if(!class_exists('raintpl')){exit;}?>                <td width="78%" valign="top" id="rightblock">
                    <?php echo $editError;?>

                    <div>
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Geef meer informatie over jezelf.</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1"  width="20%"  valign="middle">
                                            <b>Pincode</b>
                                            <div class="graytext">Dit is jouw persoonlijke pin van 4 cijfers, onthoud deze goed!</div>
                                        </td>
                                        <td class="tablerow2"  width="30%"  valign="middle">
                                            <input type="number" name="pincode" value="<?php echo $staffPin;?>" min="1000" max="9999" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1"  width="20%"  valign="middle">
                                            <b>Speciale rank</b>
                                            <div class="graytext">Doe jij iets speciaals in het hotel? Laat het weten!</div>
                                        </td>
                                        <td class="tablerow2"  width="30%"  valign="middle">
                                            <input type="text" name="specialrank" value="<?php echo $staffRank;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1"  width="20%"  valign="middle">
                                            <b>Eigen verhaal - Titel</b>
                                            <div class="graytext">De titel van je eigen verhaal, te zien op: /staff_team</div>
                                        </td>
                                        <td class="tablerow2"  width="30%"  valign="middle">
                                            <input type="text" name="title" value="<?php echo $staffTitle;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1"  width="20%"  valign="middle">
                                            <b>Eigen verhaal - Verhaal</b>
                                            <div class="graytext">Laat in minder dan 500 woorden weten wie jij bent en wat je hier doet bijvoorbeeld.</div>
                                        </td>
                                        <td class="tablerow2"  width="30%"  valign="middle">
                                            <textarea name="story"><?php echo $staffStory;?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="4">
                                            <input type="submit" name="submit" value="Wijzigen" class="realbutton" accesskey="s">
                                        </td>
                                    </tr>
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