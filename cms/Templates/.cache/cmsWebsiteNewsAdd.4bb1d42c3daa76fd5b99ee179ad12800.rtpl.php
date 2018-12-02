<?php if(!class_exists('raintpl')){exit;}?>                <td width="78%" valign="top" id="rightblock">
                    <div>
                        <?php echo $addNewsError;?>

                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Maak een nieuws artikel</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Titel</b>
                                            <div class="graytext">Gebruik een krachtige en korte titel.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="title" size="30" class="textinput">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Categorie</b>
                                            <div class="graytext">Dit zorgt voor het organiseren van het archief.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <select name="category" class="dropdown">
                                                <option value="AcellCMS">AcellCMS</option>
                                                <option value="Nieuws">Nieuws</option>
                                                <option value="Meubels">Meubels</option>
                                                <option value="Updates">Updates</option>
                                                <option value="Server">Server</option>
                                                <option value="Onderhoud">Onderhoud</option>
                                                <option value="Evenementen">Evenementen</option>
                                                <option value="Veiligheid">Veiligheid</option>
                                                <option value="Tips">Tips</option>
                                                <option value="Anders">Anders</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Plaatjes</b>
                                            <div class="graytext">`Kies een plaatje uit de map:<br/><u>AcellCMS/Templates/default/web-gallery/images/top-story/</u>.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="file" name="topstory" onchange="document.getElementById('topstory').src = window.URL.createObjectURL(this.files[0])">
                                            <img id="topstory" alt="Kies een topstory" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Artikel intro</b>
                                            <div class="graytext">Een kleine intro voor het nieuws artikel.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <textarea name="shortstory" cols="60" rows="2" wrap="soft" id="sub_desc" class="multitext"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Verhaal</b>
                                            <div class="graytext">
                                                Het hele nieuws artikel, houd het netjes!
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <textarea name="story" rows="5" id="editor" class="form-control"></textarea>
                                            <script type="text/javascript">
                                            CKEDITOR.replace('editor', {
                                                height: 250,
                                            });
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Author</b>
                                            <div class="graytext">Uit naam van wie komt dit artikel?</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="author" value="<?php echo $userName;?>" size="30" class="textinput">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="tablesubheader" colspan="2">
                                            <input name="submit" type="submit" value="Artikel plaatsen" class="realbutton" accesskey="s">
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