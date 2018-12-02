
                <td width="78%" valign="top" id="rightblock">
                    {function="incCms::editLanguages()"}
                    <div>
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Verander hier de teksten van de index</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="5%" valign="middle"><b>Tag</b></td>
                                        <td class="tablerow2" width="40%" valign="middle"><b>English definitions</b></td>
                                        <td class="tablerow2" width="40%" valign="middle"><b>Nederlandse definities</b></td>
                                        <td class="tablerow2" width="5%" valign="middle"><b>Wijzigen</b></td>
                                    </tr>
                                    {function="incCms::getLanguages('index')"}
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