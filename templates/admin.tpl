<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head> 
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>IBD 2011/2012 - Panel administracyjny</title>

        <link href="css/styl2.css" type="text/css" rel="stylesheet" />
        <link href="css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" rel="stylesheet" />
        <link href="css/jquery.lightbox-0.5.css" type="text/css" rel="stylesheet" />

        <!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
    </head>
    <body>

        <div id="kontener">
            <div id="naglowek">
                <h1>Panel administracyjny</h1>
            </div>

            <ul id="menu">
				{foreach from=$menu item=it}
					<li><a href="{$it.plik}">{$it.nazwa}</a></li>
				{/foreach}
            </ul>

            <div id="srodek">
			{$srodek}
            </div>

            <div id="stopka">IBD 2011/2012</div>
        </div>

    </body>
</html>