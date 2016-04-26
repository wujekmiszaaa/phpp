<?php /* Smarty version 2.6.26, created on 2013-01-08 15:34:08 
         compiled from layout_main.tpl */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Rafal Talarek</title>
        <link href="css/styl.css" type="text/css" rel="stylesheet" />
        <link href="css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" rel="stylesheet" />
        <link href="css/styl.css" type="text/css" rel="stylesheet" />
        <link href="css/jquery.lightbox-0.5.css" type="text/css" rel="stylesheet" />
        
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
        
        <?php echo '
        <style type="text/css">
             body {
                 font-family: verdana;
                 font-size: 12px;
             }

             #main-window {
                 width: 1050px;
                 border: 2px solid black;
                 overflow: auto;
                 background-color: #6495ED;
             }

             #header {
                 width: 1000px;
                 height: 150px;
                 float: left;
                 padding: 0;
                 margin: 0;
                 list-style-type: none;
                 vertical-align: middle;
                 text-align: center;

             }
             
             #container {
                 width: 1050px;
                 border-top: 2px solid black;
                 overflow: auto;
             }
             
             #main-panel{
                 width: 780px;
                 float: right;
             }
             
             #main-panel table{
                 font-size: inherit;
                 font-weight: bold;
                 width: 95%;
                 margin: 25px;
             }
             
             tr {
                 text-align: center;
             }
             
             td {
                 border: 2px solid black;
                 text-align: center;
             }

             td.left {
                 text-align: left;
             }
             
             td.right{
                 text-align: right;
             }
             
             a.link{
                 display: table-cell;
                 font-style: normal;
                 font-size: 50px;
                 font-family: Verdana;
                 color: black;
             }
             
             ul.horizontal, ul.horizontal li.horizontal, ul.vertical, ul.vertical li.vertical {
                display: block;
                list-style: none;
                margin: 0;
                padding: 0;
            }

            ul.horizontal {
                border-bottom: 1px solid #888;
                float: right;
                width: 50%;
                padding-left: 20px;
            }

            ul.horizontal li.horizontal {
                float: left;
                margin-right: 10px;
            }

            ul.horizontal a:link, ul a:visited {
                text-decoration: none;
                display: block;
                background-color: #ccc;
                color: #000;
                padding: 5px 10px;
                border: 1px solid #888;
                position: relative;
                top: 1px;
            }

            ul.horizontal a:hover {
                background-color: #fff;
                border-bottom-color: #fff;
            }
            
            ul.vertical {
                float: left;
                width: 200px;
                padding: 2px 2px 1px 2px;
                background-color: #9ce;
                border: 3px double #28e;
            }

            ul.vertical li.vertical {
                border-bottom: 1px solid #9ce;
            }

            ul.vertical a:link, ul.vertical a:visited {
                display: block;
                width: 176px;
                text-decoration: none;
                padding: 7px;
                font-weight: bold;
                background-color: #27c;
                color: #def;
                border-left: 10px solid #25b;
            }

            ul.vertical a:hover {
                width: 166px;
                background-color: #28e;
                color: #fff;
                border-left: 20px solid #26d;
            }
         </style>
        '; ?>

    </head>
    
    <body>
        <div id="main-window">
            <div id="header">
                <a class="link" href="index.php"><img src="images/Projekt_-_Naglowek.JPG" /></a>
            </div> 
            <ul class="horizontal">
                <li class="horizontal"><a href="firma.php">O Firmie</a></li>
                <li class="horizontal"><a href="zespol.php">Nasz zespol</a></li>
                <li class="horizontal"><a href="kontakt.php">Kontakt</a></li>
            </ul>
            <div id="container">
                <ul class="vertical">
                    <li class="vertical"><a href="mieszkania.php">Mieszkania</a></li>
                    <li class="vertical"><a href="domy.php">Domy</a></li>
                    <li class="vertical"><a href="grunty.php">Grunty</a></li>
                    <li class="vertical"><a href="koszyk.php">Koszyk (<span id="liczbaOfert"><?php echo $this->_tpl_vars['lOfert']; ?>
</span>) </a> </li>
                </ul>
                <div id="main-panel">
                    <?php echo $this->_tpl_vars['obiekt']; ?>


                </div>
            </div>
        </div>
        
    </body>
</html>
