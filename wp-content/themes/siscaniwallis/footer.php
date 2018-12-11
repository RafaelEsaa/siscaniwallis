  </body>
        <footer>
            <div class="row full-width justify-content-center no-margin">
                <div class="mx-auto social-network">
                    <?php 
                        $args = array( 'post_type' => 'socialnetwork', 'posts_per_page' => 10 );
                        $loop = new WP_Query( $args );

                        while ( $loop->have_posts() ) : $loop->the_post();
                        $size = 'thumbnail';?>
                            <a href="<?php the_field('url')?>">
                                <img class="text-center img-social-network" src="<?php the_field('imagen'); ?>"/>
                            </a>
                        <?php
                        endwhile;
                    ?>
                </div>
            </div>
            <nav class="navbar navbar-expand-md navbar-light bg-faded menu-footer">
                <?php
                wp_nav_menu([
                    'menu'            => 'bottom',
                    'theme_location'  => 'bottom',
                    'container'       => 'div',
                    'container_id'    => 'bs4navbar',
                    'container_class' => 'collapse navbar-collapse menu-footer-center',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 2,
                    'fallback_cb'     => 'bs4navwalker::fallback',
                    'walker'          => new bs4navwalker()
                ]);
                ?>
            </nav>
            <div class="row full-width no-margin">
                <div class="col-12">
                    <p class="text-center">SiscaniWallis 2018 &#169; Design AT</p>
                </div>
            </div>
            <?php wp_footer();?>
        </footer>
    </body>
</html>