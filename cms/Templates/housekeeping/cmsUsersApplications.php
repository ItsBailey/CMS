                <td width="78%" valign="top" id="rightblock">
                    <div>
                        <div class="tableborder">
                            <div class="tableheaderalt">
                                {$siteShort} vacatures aanpassen
                            </div>
                            <table cellpadding="4" cellspacing="0" width="100%">
                                <tr>
                                    <td class="tablesubheader" width="5%" align="center">ID</td>
                                    <td class="tablesubheader" width="25%">Gebruikersnaam</td>
                                    <td class="tablesubheader" width="20%" align="center">E-Mailadres</td>
                                    <td class="tablesubheader" width="20%" align="center">Opgestuurd</td>
                                    <td class="tablesubheader" width="10%" align="center">Meer inzien</td>
                                </tr>
                                {function="incCms::staffApplications()"}
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