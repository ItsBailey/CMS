
                <td width="78%" valign="top" id="rightblock">
                    <div>
                        {$basisError}
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Basis instellingen</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel naam</b>
                                            <div class="graytext">
                                                De naam van je hotel, dit wordt overal automatisch geüpdate!<br />
                                                Hetzelfde geld voor het 'Hotel' gedeelte, typ dit dus niet in.
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelname" size="30" value="{$siteShort}" class="textinput" /> Hotel
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel eigenaar</b>
                                            <div class="graytext">
                                                De naam van de eigenaar zodat dit overal kan worden toegepast, waar nodig.<br />
                                                Hetzelfde geld voor de footer, deze hoef je dus niet te wijzigen!
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelowner" size="30" value="{$hotelOwner}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel taal</b>
                                            <div class="graytext">
                                                Welke taal moet je hotel hebben?<br />
                                                Gebruik 'nl' of 'en'
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <select name="hotellang" class="dropdown">
                                                {$langCheck}
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel onderhoud</b>
                                            <div class="graytext">
                                                Bezig met de site of hotel? Zet hem in onderhoud.<br />
                                                Wees er zeker van dat er geen verkeerde dingen kunnen gebeuren.
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <select name="hotelmaintenance" class="dropdown">
                                                {$maintenanceCheck}
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input name="submit" type="submit" value="Wijzingen opslaan" class="realbutton" />
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
<div class="copy" align="center">&copy; <strong>AcellCMS</strong> {$cmsV} [{$cmsP}]<br />
    <font size="1">
        Made with love by <a href="https://weszdev.com">Wesz</a><br />
    </font>
</div>
</body>
</html>