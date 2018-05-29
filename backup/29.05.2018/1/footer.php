        </main>

        <footer class="page-footer">
            <div class="container">

<?
    include($DOCUMENT_ROOT."/includes/dropdownmenu.php");
?>
                <div class="made-by">
                    Разработка сайта - e1media
                </div>
            </div>
        </footer>






        <div class="menu">
            <div class="container">

<?
    include($DOCUMENT_ROOT."/includes/dropdownmenu.php");
?>
            </div>
        </div>


        <div class="overlay js-overlay"></div>


            
        <!-- MODAL WINDOW 
        ======================-->
        <div id="overlay" style="display: none;">
        </div>

        <div class="modal" id="callback-window" style="display: none;">
            <a class="modal-close" href="#">
            </a>
            <div class="spinner">
            </div>
            <div class="modal-content">
                <h2>
                    Позвоним в течение 10 минут
                </h2>
                <div class="">
                    <form action="" data-file="callback" method="post">
                        <input autofocus="" name="name" placeholder="Ваше имя *" type="text">
                            <input name="phone" placeholder="Номер телефона *" type="text">
                                <textarea name="text" placeholder="Здесь вы можете оставить комментарий">
                                </textarea>
                                <div class="modal-controls">
                                    <button class="btn btn_gradient btn_x-small" type="submit">
                                        Отправить
                                    </button>
                                </div>
                                <div class="modal-errors">
                                </div>
                                <div class="modal-result">
                                </div>
                            </input>
                        </input>
                    </form>
                </div>
            </div>
            <div class="modal-content-copy">
            </div>
        </div>

        <div class="to-top js-scroll-to-top">
            <span class="to-top__text">Наверх</span>
        </div>
        
          

        <!-- scripts -->
        <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script -->
         <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
        <script src="/js/modernizr.custom.62035.js" type="text/javascript"></script>
        <script src="/js/swiper.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/lightbox.min.js"></script>
        <!-- <script src="/js/jquery.nice-select.min.js"></script> -->
        <script src="/js/script.js"></script>


    </body>
</html>