<?php get_header(); ?>
<!-- Content Bulles-->

<!-- Content -->
<?php
$args = array(
    'post_type' => 'actualite',
    'posts_per_page' => 100,
    'orderby' => array(
        'id' => 'DESC'
    )
);
$actualite = new WP_Query( $args );
?>
<div class="main-content">
    <img class="responsive-img" src="<?= get_template_directory_uri().'/assets/img/header_img.jpg' ;?>" alt="Header Image">
</div>
<div class="col s12 news">
    <h1 class="center-align news-title"><a href="#">Actualites</a></h1>
    <div class="bxslider">
        <?php if($actualite->have_posts() === true): ?>
            <?php
            while ( $actualite->have_posts() ) : $actualite->the_post();
                $desc = get_the_content();
                ?>
                <div class="news-description">
                    <?= $desc;?>
                    <a href="" class="news-more">Lire la suite</a></div>
                <?php
            endwhile;
            wp_reset_postdata(); ?>
        <?php else: ?>
            <div class="news-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ad iure odit officia? A aliquam autem cupiditate dolorem, doloribus ea eligendi incidunt ipsam itaque iure mollitia neque optio praesentium ...
                <a href="" class="news-more">Lire la suite</a></div>
            <div class="news-description">Dolor sit amet, consectetur adipisicing elit. Corporis culpa doloribus, ea impedit iusto nisi quo. Accusantium architecto dicta dolor ipsam iste itaque, nisi optio quis rem veritatis. Repellendus, voluptatem.
                upiditate igendi incidunt ipsam itaque iure mollitia neque optio praesentium ...
                <a href="" class="news-more">Lire la suite</a></div>
        <?php endif; ?>
    </div>

</div>
<div class="col s12 news" style="color: #FFF; background-color: #14669B; padding:10px">
    <h1 class="center-align news-title"><a href="#" style="color: #FFF;">Types d'intervention</a></h1>
    <div class="col s12 in__content"><?php
        $args = array(
            'post_type' => 'expertise',
            'posts_per_page' => 100,
            'orderby' => array(
                'id' => 'DESC'
            )
        );
        $t_expertise = new WP_Query( $args );

        $get_experts = wp_count_posts('expertise');
        $count_expert = $get_experts->publish;
        $j = intval($count_expert);
        $i = 1;?><?php
        while ( $t_expertise->have_posts() ) : $t_expertise->the_post();
            if($i == 1 ){
                echo "<div class=\"col s6 right-align wow slideInLeft\"><ul class=\"col-left\">";
            }
            ?>
            <li><a href=""><?= the_title(); ?></a></li>
            <?php
            if ($i == $j/2){
                echo "</ul>
                </div>
                <div class=\"col s6 left-align wow slideInRight\">
                    <ul class=\"col-right\">";
            }
            if ($i == $j){
                echo "</ul>
                </div>";
            }
            $i++;
            ?>
            <?php
        endwhile;
        wp_reset_postdata(); ?>

    </div>
    <div class="clearfix"></div>
</div>
<div class="parallax-container">
    <div class="parallax"><img src="<?= get_template_directory_uri().'/assets/img/img_content.jpg' ;?>" style="opacity: .8;"></div>
</div>
<div class="section wow bounceInUp" style="background-color: #F17A21;">
    <div class="row" style="margin-bottom:0px">
        <h1 class="center-align dn-title"><a href="#">Domaines d'expertise</a></h1>
        <div class="row" style="padding:15px; margin-bottom: -15px;">
            <?php
            $args = array(
                'post_type' => 'domain',
                'posts_per_page' => 100,
                'orderby' => array(
                    'id' => 'DESC'
                )
            );
            $domain = new WP_Query( $args );
            $i = 1;?>
            <?php
            while ( $domain->have_posts() ) : $domain->the_post();
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
                ?>
                <div class="col s12 m6 l4" style="padding:15px">
                    <div class="white wow fadeIn" data-wow-delay="1s" style="padding:15px">
                        <div class="card-header valign-wrapper center-align"><img src="<?= $thumb_url ?>" alt=""> <?php the_title( '<h3>', '</h3>' ) ?></div>
                        <div class="card-content"><?php the_excerpt();?></div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<div class="row">
    <img class="responsive-img" src="<?= get_template_directory_uri().'/assets/img/img_bottom.jpg' ;?>" alt="Bottom image">
</div>
<div class="row white">
    <h1 class="center-align dn-title"><a href="#" style="color: #F17A21;">References</a></h1>
    <div class="slider valign-wrapper">
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/eurogerm_logo.png" alt=""></div>
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/gainde2000_logo.png" alt=""></div>
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/senegalaiseauto_logo.png" alt=""></div>
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/lcs_logo.png" alt=""></div>
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/matforce_logo.png" alt=""></div>
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/total_logo.jpg" alt=""></div>
        <div class="slide"><img src="<?= get_template_directory_uri() ?>/assets/img/logos/sedima_logo.png" alt=""></div>
    </div>

</div>
<?php get_footer(); ?>
</body>
</html>