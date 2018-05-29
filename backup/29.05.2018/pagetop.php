<!DOCTYPE html>
<html lang="ru">


    <head>
        <!-- initial -->
        <meta charset="utf-8" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />

<?
	include($DOCUMENT_ROOT."/tdk/tdk.php");
?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="/js/imagesloaded.js"></script>

	<title><?=($__page['TITLE']?$__page['TITLE']:$metas['TITLE'])?></title>
	<meta name="Description" content="<?=($__page['DESCRIPTION']?$__page['DESCRIPTION']:$metas['DESCRIPTION'])?>" />
	<meta name="Keywords" content="<?=($__page['KEYWORDS']?$__page['KEYWORDS']:$metas['KEYWORDS'])?>" />

        <!-- styles -->
        <link href="/css/swiper.min.css" rel="stylesheet"/>            
        <link href="/css/lightbox.css" rel="stylesheet"/>            
        <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

        <link href="/css/main.css" rel="stylesheet"/>        <!-- gulp -->
        <link href="/css/custom.css" rel="stylesheet"/>      <!-- css no preprocessor -->
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
    </head>

