<!doctype html>
<html lang="en">
<head>
    <!-- ********** Page Meta ********** -->
    <meta charset="UTF-8">
    <meta name="robots" content="NOINDEX,NOFOLLOW,NOARCHIVE">
    <meta name="googlebot" content="noindex,nofollow,noarchive,nosnippet">
    <meta name="pinterest" content="nopin">
    <meta name="skype_toolbar" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="dcterms.dateCopyrighted" content="<?php echo $this->_file_template_year ?>">

    <title><?php echo $title ?></title>

    <!-- ********** Cascading Style Sheets ********** -->
<?php 
$urls   = $this->_additional_css_urls;
reset( $urls );
while( list( $urlKey, $url ) = each( $urls ) )    : ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $url ?>" />
<?php 
endwhile;   ?>

    <!-- ********** Javascript Includes ********** -->
    <!--[if lt IE 9]>
        <script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php 
$urls   = $this->_additional_js_urls;
reset( $urls );
while( list( $urlKey, $url ) = each( $urls ) )    : ?>
    <script type="text/javascript" src="<?php echo $url ?>"></script>
<?php 
endwhile;
unset( $urls ); ?>
          
</head>
<body>
<div id="main-content" class="main">
<?php echo $content; ?>
</div>
</body>
</html>
