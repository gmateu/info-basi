
    <footer>
        <section class="footer-widgets">
            <div class="container">
                <div class="row">
                    widgets del rodapeu
                </div>
            </div>
        </section>
        <div class="container">

            <section class="copy-right">
                <div class="row">
                    <div class="copy-right col-12 col-md-6">
                        copyright
                    </div>
                    <div class="footer-menu col-12 text-left text-md-right col-md-6">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'info_basic_footer_menu'
                            ));
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    <?=wp_footer()?>
</body>
</html>