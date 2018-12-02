                <td width="78%" valign="top" id="rightblock">
                    <div>
                        {$usersBanError}
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Gebruikers verbannen</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Gebruikers naam</b>
                                            <div class="graytext">De naam van de gebruiker die je wilt verbannen.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="username" size="30" class="textinput" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Ban reden</b>
                                            <div class="graytext">Geef een duidelijke en goede reden om iemand te verbannen!</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="reason" size="30" class="textinput" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Soort ban</b>
                                            <div class="graytext">Hoe wil je de gebruiker verbannen?</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <select name="sort" class="dropdown">
                                                <option value="account">Speler</option>
                                                <option value="ip">IP</option>
                                                <option value="super">Super ban</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Ban lengte</b>
                                            <div class="graytext">Voor hoelang wil je deze gebruiker verbannen?</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <select name="length" class="dropdown">
                                                <option value="3600">1 uur</option>
                                                <option value="7200">2 uur</option>
                                                <option value="14400">4 uur</option>
                                                <option value="43200">12 uur</option>
                                                <option value="86400">1 dag</option>
                                                <option value="172800">2 dagen</option>
                                                <option value="604800">1 week</option>
                                                <option value="1209600">2 weken</option>
                                                <option value="2629744">1 maand</option>
                                                <option value="15778463">6 maanden</option>
                                                <option value="31556926">1 jaar</option>
                                                <option value="788923149">permanent</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input name="submitBan" type="submit" value="Gebruiker verbannen" class="realbutton" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div><br />
                    <div>
                        {$usersUnbanError}
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Gebruikers ontbannen</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Gebruikers naam</b>
                                            <div class="graytext">De naam van de gebruiker die je wilt ontbannen.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="username" size="30" class="textinput" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input name="submitUnban" type="submit" value="Gebruiker verbannen" class="realbutton" />
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
            printf('Pagina geladen in: %.3fs', $totaltime);
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