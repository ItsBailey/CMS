                <td width="78%" valign="top" id="rightblock">
                    <div>
                        <div class="tableborder">
                            <div class="tableheaderalt">Recente staff logs</div>
                            <table cellpadding="4" cellspacing="0" width="100%">
                                <tr>
                                    <td class="tablesubheader" width="5%" align="center">ID</td>
                                    <td class="tablesubheader" width="20%" align="center">Actie</td>
                                    <td class="tablesubheader" width="40%" align="center">Omschrijving</td>
                                    <td class="tablesubheader" width="10%" align="center">Pagina</td>
                                    <td class="tablesubheader" width="15%" align="center">Medewerker</td>
                                    <td class="tablesubheader" width="10%" align="center">Tijd</td>
                                </tr>
                                {function="incCms::staffLog()"}
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