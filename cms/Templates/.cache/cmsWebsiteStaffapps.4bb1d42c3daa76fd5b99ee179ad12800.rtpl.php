<?php if(!class_exists('raintpl')){exit;}?>

                <td width="78%" valign="top" id="rightblock">
                    <div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <form action="index.php?p=application_edit&do=jumpCategory" method="post" name="Jumper!" id="Jumper!">
                                <div class="tableborder">
                                    <div class="tableheaderalt">Kies een categorie</div>
                                    <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                        <tr>
                                            
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </table>
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