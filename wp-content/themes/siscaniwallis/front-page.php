<?php get_header(); ?>
<div class="row full-width no-margin">
    <div class="col-12 no-padding">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php 
                $args = array( 'post_type' => 'carousel');
                $loop = new WP_Query( $args );
                $count = 0;
                while ( $loop->have_posts() ) : $loop->the_post();
                    $count ++; ?>
                    <div class="carousel-item <?php if($count == 1){ echo 'active'; }?>"
                        style="background-image: url('<?php the_field('imagen'); ?>');
                                background-position: center;
                                background-repeat: no-repeat;
                                background-size: cover;
                                height: 100vh;">
                        <div class="title-carousel-home">
                            <div class="text-carousel-home">
                                <?php the_content(); ?>
                            </div>
                            <button class="btn-carousel"><?php the_field('title_button')?></button>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
            
            <a class="arrow-left" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="" aria-hidden="true">
                    <img src="<?php echo get_site_url()?>/wp-content/uploads/2018/11/Artboard-25.png" alt="">
                </span>
            </a>
            <a class="arrow-right" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="" aria-hidden="true">
                    <img src="<?php echo get_site_url()?>/wp-content/uploads/2018/11/Artboard-24.png" alt="">
                </span>
            </a>
        </div>
    </div>
</div>

<div class="container mason-grid-home">
    <div class="row justify-content-center">
    <div class="col-8">
        <h1 class="title text-center">Las Marcas</h1>
        <hr class="line-title">
        <h2 class="sub-title text-center">Más exclusivas de europa</h2>
        <div class="card-columns">
        <?php 
        $args = array( 'post_type' => 'masongrid', 'posts_per_page' => 10 );
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
        $image = get_field('image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)?>
            <div class="card" onmouseover=overBgBlack(this) onmouseout=outBgBlack(this)>
                <img class="card-img" src="<?php the_field('image'); ?>" />
                <div class="bg-black"></div>
                <div class="card-img-hover" 
                    id="<?php the_title()?>" 
                    onmouseover="onMouse(this)" 
                    onmouseout="onMouseOut(this)">
                    <img class="img-hover" src="<?php the_field('icon'); ?>" style="visibility: hidden"/>
                </div>
            </div>
        <?php
        endwhile;
        ?>
        </div>
        </div>
    </div>
</div>


    <!-- Imprime contenido de la página -->
    <div class="row full-width no-margin">
        <div class="col-md-12 pt-5 pb-5">    
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            } ?>
        </div>
    </div>
<?php get_footer(); ?>