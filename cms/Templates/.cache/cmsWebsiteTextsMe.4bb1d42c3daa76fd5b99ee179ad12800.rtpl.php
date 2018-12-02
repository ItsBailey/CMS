<?php if(!class_exists('raintpl')){exit;}?>

                <td width="78%" valign="top" id="rightblock">
                    <?php echo $editError;?>

                    <?php echo incCms::textEdit(); ?>

                    <div>
                        <form method="POST">
                            <div class="tableborder">
                                <div class="tableheaderalt">De teksten van index.php veranderen.</div>
                                <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Kies een pagina</b>
                                            <div class="graytext">
                                                Kies een pagina waar je de teksten van wilt veranderen.
                                            </div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            <?php echo incCms::textPage('me'); ?>

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