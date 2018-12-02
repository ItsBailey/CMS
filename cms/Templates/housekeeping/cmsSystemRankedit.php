                <td width="78%" valign="top" id="rightblock">
                    <div>
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Kies een rank om te wijzigen</div>
                                <table cellpadding="4" cellspacing="0" width="100%">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Welke rank ID wil je wijzigen?</b>
                                            <div class="graytext">Gebruik een krachtige en korte titel.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <select name="rankid">
                                                <option value="1">1, {function="Cms::getRankName(1)"}</option>
                                                <option value="2">2, {function="Cms::getRankName(2)"}</option>
                                                <option value="3">3, {function="Cms::getRankName(3)"}</option>
                                                <option value="4">4, {function="Cms::getRankName(4)"}</option>
                                                <option value="5">5, {function="Cms::getRankName(5)"}</option>
                                                <option value="6">6, {function="Cms::getRankName(6)"}</option>
                                                <option value="7">7, {function="Cms::getRankName(7)"}</option>
                                                <option value="8">8, {function="Cms::getRankName(8)"}</option>
                                                <option value="9">9, {function="Cms::getRankName(9)"}</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input name="submitChoose" type="submit" value="Aanpassen" class="realbutton" accesskey="s">
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