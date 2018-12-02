<?php if(!class_exists('raintpl')){exit;}?>                <td width="78%" valign="top" id="rightblock">
                    <?php echo $editError;?>

                    <?php echo $userEdit;?>

                    <div>
                        <div class="tableborder">
                            <div class="tableheaderalt">
                                <?php echo $siteName;?> gebruiker wijzigen
                            </div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                
                                <form method="POST">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Gebruikersnaam</b>
                                        <div class="graytext">De gebruikersnaam van de persoon die je wilt wijzigen.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                      <input type="text" name="username" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="searchName" value="Wijzig gebruiker" class="realbutton" />
                                    </td>
                                </tr>
                                </form>
                            </table>
                        </div>
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