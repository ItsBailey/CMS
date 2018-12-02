                <td width="78%" valign="top" id="rightblock">
                    <div>
                        <div class="tableborder">
                            <div class="tableheaderalt">
                                {$siteName} gebruikers lijst
                            </div>
                            <table cellpadding="4" cellspacing="0" width="100%">
                                <tr>
                                    <td class="tablesubheader" width="1%" align="center">ID</td>
                                    <td class="tablesubheader" width="29%">Naam</td>
                                    <td class="tablesubheader" width="30%" align="center">E-Mailadres</td>
                                    <td class="tablesubheader" width="20%" align="center">Account gemaakt</td>
                                    <td class="tablesubheader" width="10%" align="center">Laatst actief</td>
                                    <td class="tablesubheader" width="10%" align="center">Meer info</td>
                                </tr>
                                {function="incCms::userRow()"}
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
<div class="copy" align="center">&copy; <strong>AcellCMS</strong> {$cmsV} [{$cmsP}]<br />
    <font size="1">
        Made with love by <a href="https://weszdev.com">Wesz</a><br />
    </font>
</div>
</body>
</html>