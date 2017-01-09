<!-- Header for home -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= get_template_directory_uri() ?>/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri() ?>/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri() ?>/assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= get_template_directory_uri() ?>/assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
<main id="main">
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><img src="<?= get_template_directory_uri().'/assets/img/logo-amc.png' ;?>" alt="Logo AMC"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse" style="color: #F17A21;"><i class="material-icons">MENU</i></a>
                <ul id="menu-menu_principal" class="right hide-on-med-and-down"><li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4 current-menu-item"><a href="#home">Accueil</a></li>
                    <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a href="#">Qui sommes nous ?</a></li>
                    <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="#type">Type d&rsquo;intervention</a></li>
                    <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a href="#domain">Domaines d&rsquo;expertise</a></li>
                    <li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="#reference">Nos clients</a></li>
                    <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="#">Espace abonné</a></li>
                </ul>                <ul id="mobile-demo" class="left side-nav"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a href="#home">Accueil</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a href="#">Qui sommes nous ?</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="#type">Type d&rsquo;intervention</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a href="#domain">Domaines d&rsquo;expertise</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="#reference">Nos clients</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="#">Espace abonné</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Header
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
    <div id="home"  class=" section scrollspy main-content">
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
                        <?= shorten_string($desc, 30);?>
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
    <div id="type" class="col s12 section scrollspy news" style="color: #FFF; background-color: #225D89; padding:10px">
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
                <li><a class="intervention-link" href="<?php the_permalink() ;?>"><?= the_title(); ?></a></li>
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
    <div id="domain" class="section scrollspy wow bounceInUp" style="background-color: #F17A21;">
        <div class="row" style="margin-bottom:0; padding-top:20px;">
            <h1 class="center-align dn-title"><a href="#">Domaines d'expertise</a></h1>
            <div class="row box-wrapper">
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
                    <div class="col s12 m6 l4 box">
                        <div class="white wow fadeIn" data-wow-delay="1s" style="padding: 10px 15px; position:relative">
                            <a href="<?php the_permalink();?>" style="position:absolute; display: block; width: 100%; height: 100%;"></a>
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
    <div class="row ">
        <img class="responsive-img" src="<?= get_template_directory_uri().'/assets/img/img_bottom.jpg' ;?>" alt="Bottom image">
    </div>
    <div id="reference"  class="section scrollspy row white" style="padding-top:20px;">
        <h1 class=" center-align dn-title"><a href="#" style="color: #F17A21;">References</a></h1>
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