<?
	include($_SERVER['DOCUMENT_ROOT']."/includes/pagetop.php");
?>



    <body class="page-wrapper">
    <!-- � body ������ ���� ������ ��� ������ �������: header, main � footer -->
            

        <header class="page-header">
            <div class="container">
                <a href="/" class="logo"></a>
                <nav class="nav-main">
                    <div class="nav-main__buttons">
                        <div class="btn-menu js-open-menu">
                            <i class="btn-menu__burger-bar"></i>
                            <i class="btn-menu__burger-bar"></i>
                            <i class="btn-menu__burger-bar"></i>
                        </div>
                        <div class="btn-home"></div>
                    </div>
                    <ul class="nav-main__links">
<?
	include($_SERVER['DOCUMENT_ROOT']."/includes/mainmenu.php");
?>
                    </ul>                    
                </nav>
                
                <div class="weather">
                    <i class="icon icon_sun"></i><span>����, +15</span>
                </div>
            </div>
            <div id="progress"></div>
        </header>
        <main class="page-content page-content_stick-top" role="main">
