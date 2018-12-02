                <td width="78%" valign="top" id="rightblock">
                    {$editError}
                    <div>
                        <div class="tableborder">
                            <div class="tableheaderalt">
                                Geef een gebruiker een rank
                            </div>
                            <form method="POST">
                                <table cellpadding="4" cellspacing="0" width="100%">
                                    <tr>
                                        <td class="tablerow1"  width="20%"  valign="middle">
                                            <b>Gebruikersnaam</b>
                                            <div class="graytext">Vul de gebruikersnaam in van de gebruiker waar je de rank van wilt veranderen.</div>
                                        </td>
                                        <td class="tablerow2"  width="30%"  valign="middle">
                                            <input type="text" name="username" />
                                        </td>
                                        <td class="tablerow1"  width="20%"  valign="middle">
                                            <b>Rank</b>
                                            <div class="graytext">De rank die je de gebruiker wilt geven.</div>
                                        </td>
                                        <td class="tablerow2"  width="30%"  valign="middle">
                                            <select name="rank">
                                                <option value="1">{$rankName1}</option>
                                                <option value="2">{$rankName2}</option>
                                                <option value="3">{$rankName3}</option>
                                                <option value="4">{$rankName4}</option>
                                                <option value="5">{$rankName5}</option>
                                                <option value="6">{$rankName6}</option>
                                                <option value="7">{$rankName7}</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="4">
                                            <input type="submit" name="submit" value="Wijzigen" class="realbutton" accesskey="s">
                                        </td>
                                    </tr>
                                </table>
                            </form>
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
<div class="copy" align="center">&copy; <strong>AcellCMS</strong> {$cmsV} [{$cmsP}]<br />
    <font size="1">
        Made with love by <a href="https://weszdev.com">Wesz</a><br />
    </font>
</div>
</body>
</html>