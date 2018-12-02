<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset=UTF-8 />
    <meta name=author content="{$siteAuthor}" />
    <meta name=description content="{$siteName} - Housekeeping" />
    <meta name=build content="AcellCMS {$cmsV}-{$cmsB}" />
    
    <link rel=stylesheet type="text/css" href="{$siteLink}{$cmsTemplateStyle}css/style.css" />
    
    <script type="text/javascript" src="{$siteLink}{$cmsTemplateStyle}js/js.js"></script>
    
    <title>{$siteTitle}</title>
    <link rel="shortcut icon" href="{$siteLink}{$cmsTemplateStyle}images/faviconW.ico" />
</head>

<body>
<div id="ipdwrapper">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div align="center">
        <div style="width:500px">
            <div class="outerdiv" id="global-outerdiv">
                <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
                    <tr>
                        <td id="rightblock">
                            <div>
                                <form id="loginform" method="POST">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="200" class="tablerow1" valign="top" style="border:0px;width:200px">
                                                <div style="text-align:center;padding-top:20px">
                                                    <img src="{$siteLink}{$cmsTemplateStyle}/images/acp-login-lock.gif" alt="Housekeeping" border="0" />
                                                </div><br />
                                                <div class="desctext" style="font-size:10px">
                                                    <div align="center"><strong>Welkom bij de Housekeeping</strong></div><br />
                                                    <div style="font-size:9px;color:gray">
                                                        Voor u verder kan gaan moet u eerst verifiëren dat u wel de eigenaar bent van het account.<br />
                                                        Doe dit doormiddel van even opnieuw in te loggen.<br /><br />
                                                        Onthoud dat wij altijd in de gaten houden wie, wanneer en hoelang iemand in de housekeeping zit!
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="300" style="width:300px" valign="top">
                                                <table width="100%" cellpadding="5" cellspacing="0" border="0">
                                                    <tr>
                                                        <td colspan="2" align="center"><br />
                                                            <h1>Acell Housekeeping</h1>
                                                            <div style="font-weight:bold;color:red">
                                                                {$loginError}
                                                            </div><br />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"><strong>Gebruikersnaam</strong></td>
                                                        <td>
                                                          <input type="text" name="username" value="{$userName}" style="border:1px solid #AAA" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"><strong>Wachtwoord</strong></td>
                                                        <td>
                                                            <input type="password" name="password" style="border:1px solid #AAA" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <input type="submit" name="submit" value="Inloggen" style="border:1px solid #AAA" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div><br />
    <div class="copy" align="center">AcellCMS {$cmsV}-{$cmsB} [{$cmsP}] <br />
        <font size="1">Based on &copy; <strong>wow</strong> by Wesz. </font>
    </div>
</div>
</body>
</html>