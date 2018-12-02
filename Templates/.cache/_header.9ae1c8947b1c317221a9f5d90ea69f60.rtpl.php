<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang=nl>
<head>
    <!-- Resources - META -->
    <meta charset=UTF-8 />
    <meta name=author content="<?php echo $siteAuthor;?>" />
    <meta name=description content="<?php echo $siteName;?> - Het leukste hotel waar je ooit bent geweest!" />
    <meta name=build content="Alpha <?php echo $cmsV;?>-<?php echo $cmsB;?>" />
    <meta name=copyright content="Made by WeszDEV.com" />
    
    <?php echo $loadCss;?>

    
    <?php echo $loadJs;?>

    
    <!-- Resources - EXTRA JS -->
    <script type="text/javascript">
    <?php echo $extraJs;?>

    </script>
    
    <!-- Resources - TITLE AND ICON -->
    <title><?php echo $siteTitle;?></title>
    <link rel="shortcut icon" href="<?php echo $siteLink;?><?php echo $siteTemplateStyle;?>images/favicon.ico" />
</head>
