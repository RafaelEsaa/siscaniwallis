  </body>

<?php

// $your_token = '6679894764.b0a4d90.d0905fb3e7e4490cbd886573ab2afa0b'; 
// // if your app is not approved - always use 'self'
// $ig_user_id = '6679894764';
// // Instagram API connection
// $remote_wp = wp_remote_get( "https://api.instagram.com/v1/users/".$ig_user_id."/media/recent/?access_token=".$your_token);
// // Instagram response is JSON encoded, let's convert it to an object
// $instagram_response = json_decode( $remote_wp['body'] );

// var_dump($instagram_response);
// // 200 OK
// if( $remote_wp['response']['code'] == 200 ) {
//     // echo '<pre>';
//     // var_dump($instagram_response->data[0]->id);
//     // echo '</pre>';

//     foreach($instagram_response->data as $key => $data){
//         echo '<img src='.$data->images->low_resolution->url.'/>';
//         echo '<pre>';
//         var_dump($data);
//         echo '</pre>';
//         echo '<br>';
//         echo '<h1>'.'asd :'.$key.'</h1>';
//     }

// // 400 Bad Request
// } elseif ( $remote_wp['response']['code'] == 400 ) {
// 	echo '<b>' . $remote_wp['response']['message'] . ': </b>' . $instagram_response->meta->error_message;
// }
?>
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
            <div class="row full-width no-margin copyright">
                <div class="col-12">
                    <p class="text-center no-margin">SiscaniWallis 2018 &#169; Design AT</p>
                </div>
            </div>
            <?php wp_footer();?>
        </footer>
    </body>
</html>