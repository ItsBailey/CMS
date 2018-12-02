                <td width="78%" valign="top" id="rightblock">
                    <div>
                        {$hotelError}
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">Client instellingen</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel IP</b>
                                            <div class="graytext">
                                                Het IP adres van je hotel, zit je op localhost? gebruik dan 127.0.0.1<br />
                                                Dit is nodig voor de client.
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelip" size="30" value="{$clientIp}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel poort</b>
                                            <div class="graytext">
                                                De poort van je hotel, normaal is dit 3000 of 30000.<br />
                                                Zo niet? Dan weet je wat je doet hoop ik.
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelport" size="30" value="{$clientPort}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Hotel mus poort</b>
                                            <div class="graytext">
                                                De poort van je hotel, normaal is dit 3001 of 30001.<br />
                                                Zo niet? Dan weet je wat je doet hoop ik.
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelmusport" size="30" value="{$clientMusPort}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client swf map</b>
                                            <div class="graytext">
                                                In welke map zitten alle bestanden?<br />
                                                Normaal is dit swf/
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelswf" size="30" value="{$clientSwf}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client Habbo.swf folder</b>
                                            <div class="graytext">
                                                Waar staat je Habbo.swf?<br />
                                                Normaal is dit gordon/PRODUCTION-....-..../
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelhabboswffolder" size="30" value="{$clientHabboswffolder}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client Habbo.swf</b>
                                            <div class="graytext">
                                                Hoe heet je Habbo.swf?<br />
                                                Normaal is dit Habbo.swf
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelhabboswf" size="30" value="{$clientHabboswf}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client external variables</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je external_variables.txt?<br />
                                                Normaal is dit gamedata/external_variables.txt
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelexternalvars" size="30" value="{$clientVars}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client external flash texts</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je external_flash_texts.txt?<br />
                                                Normaal is dit gamedata/external_flash_texts.txt
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelexternaltexts" size="30" value="{$clientTexts}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client external override variables</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je external_override_variables.txt?<br />
                                                Normaal is dit gamedata/override/external_override_variables.txt
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelexternaloverridevars" size="30" value="{$clientOverrideVars}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client external override flash texts</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je external_flash_override_texts.txt?<br />
                                                Normaal is dit gamedata/override/external_flash_override_texts.txt
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelexternaloverridetexts" size="30" value="{$clientOverrideTexts}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client figuredata</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je figuredata.xml?<br />
                                                Normaal is dit gamedata/figuredata.xml
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelfiguredata" size="30" value="{$clientFiguredata}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client productdata</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je productdata.txt?<br />
                                                Normaal is dit gamedata/productdata.txt
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelproductdata" size="30" value="{$clientProductdata}" class="textinput" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Client furnidata</b>
                                            <div class="graytext">
                                                Waar in de map {$clientSwf} zit je furnidata.xml?<br />
                                                Normaal is dit gamedata/furnidata.xml
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <input type="text" name="hotelfurnidata" size="30" value="{$clientFurnidata}" class="textinput" />
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
    </div>
</div>
</body>
</html>