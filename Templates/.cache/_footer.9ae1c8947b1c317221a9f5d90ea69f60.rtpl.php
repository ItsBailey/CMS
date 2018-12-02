<?php if(!class_exists('raintpl')){exit;}?>            <div id="footer">
                <p>
                    <a href="index" target="_self"><?php echo Core::getLanguage($siteLang, 'footer', 'homepage'); ?></a> | 
                    <a href="disclaimer" target="_self"><?php echo Core::getLanguage($siteLang, 'footer', 'disclaimer'); ?></a> | 
                    <a href="privacystatement" target="_self"><?php echo Core::getLanguage($siteLang, 'footer', 'privacy'); ?></a> | 
                    <a href="rules" target="_self"><?php echo Core::getLanguage($siteLang, 'footer', 'rules'); ?></a>
                </p>
                <p>
                    <strong><?php echo $siteShort;?> <?php echo Core::getLanguage($siteLang, 'footer', 'isCreatedBy'); ?> <?php echo $siteOwner;?></strong>
                </p>
                <p>
                    <strong><a href="//acell.weszdev.com/_versions/about.htm" target="_blank" style="text-decoration:none;">AcellCMS <?php echo $cmsV;?></a></strong> - Developed by Wesz.<br />
                    Powered by <a href="https://weszdev.com" target="_blank">wow</a> &copy; 2018
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    HabboView.run();
    </script>
</body>
</html>