
   <hr>
    <footer class="page-footer font-small blue pt-4">
        <section class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="seccio sec1">
                                <p>logotipo</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="seccio sec2">
                            <h3 class="text-uppercase display-5">secció 2</h2>
                            <ul>
                                <li>items</li>
                                <li>items</li>
                                <li>items</li>
                                <li>items</li>
                            </ul>
                    </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="seccio sec3">
                            <h3 class="text-uppercase display-5">secció 2</h2>
                            <ul>
                                <li>items</li>
                                <li>items</li>
                                <li>items</li>
                                <li>items</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="copy-right">
            <div class="container">
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
            </div>
            </section>
    </footer>
    <?=wp_footer()?>
</body>
</html>