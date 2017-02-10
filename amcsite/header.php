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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
       <?php wp_head(); ?>
    </head>
<body>
<main id="main">
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="<?= esc_url( home_url() ) ;?>" class="brand-logo"><img src="<?= get_template_directory_uri().'/assets/img/logo-amc.png' ;?>" alt="Logo AMC"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse" style="color: #F17A21;"><i class="material-icons">menu</i></a>
                <?php if(!is_front_page()):?>
                <ul id="menu-menu_principal" class="right hide-on-med-and-down"><li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a href="<?= esc_url( home_url() ) ;?>#home"><span>Accueil</span></a></li>
                    <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a class='dropdown-button' href='#' data-activates='dropdown1'><span>Qui sommes nous ?</span></a>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="<?php the_permalink(58); ?>">Présentation</a></li>
                            <li><a href="<?php the_permalink(62); ?>">Equipe</a></li>
                            <li><a href="<?php the_permalink(60); ?>"">Nos Engagements</a></li>
                            <li><a href="/nous-contacter">Nous Contacter</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="<?= esc_url( home_url() ) ;?>#type"><span>Types d&rsquo;intervention</span></a></li>
                    <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a href="<?= esc_url( home_url() ) ;?>#domain"><span>Domaines d&rsquo;expertise</span></a></li>
                    <li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="<?= esc_url( home_url() ) ;?>#reference"><span>Nos clients</span></a></li>
                    <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="https://bms.bluekango.com/amc/index.php" target="_blank"><span>Espace abonné</span></a></li>
                </ul>
                <ul id="mobile-demo" class="left side-nav"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a href="<?= esc_url( home_url() ) ;?>#home"><span></span>Accueil</span></a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a href="#"><span>Qui sommes nous ?</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="<?= esc_url( home_url() ) ;?>#type"><span>Types d&rsquo;intervention</span></a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a href="<?= esc_url( home_url() ) ;?>#domain"><span>Domaines d&rsquo;expertise</span></a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="<?= esc_url( home_url() ) ;?>#reference"><span>Nos clients</a><</span></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="https://bms.bluekango.com/amc/index.php" target="_blank""><span>Espace abonné</a></span></li>
                </ul>
                <?php else: ?>
                    <ul id="menu-menu_principal" class="right hide-on-med-and-down"><li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4 current-menu-item"><a href="#home"><span>Accueil</span></a></li>
                        <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a class='dropdown-button' href='#' data-activates='dropdown1'><span>Qui sommes nous ?</span></a>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="<?php the_permalink(58); ?>">Présentation</a></li>
                                <li><a href="<?php the_permalink(62); ?>">Equipe</a></li>
                                <li><a href="<?php the_permalink(60); ?>">Nos Engagements</a></li>
                                <li><a href="nous-contacter">Nous Contacter</a></li>
                            </ul>
                        <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="#type"><span>Types d&rsquo;intervention</span></a></li>
                        <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a href="#domain"><span>Domaines d&rsquo;expertise</span></a></li>
                        <li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="#reference"><span>Nos clients</span></a></li>
                        <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="#"><span>Espace abonné</span></a></li>
                    </ul>                <ul id="mobile-demo" class="left side-nav"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a href="#home">Accueil</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a href="#">Qui sommes nous ?</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a href="#type">Types d&rsquo;intervention</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a href="#domain">Domaines d&rsquo;expertise</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a href="#reference">Nos clients</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="#">Espace abonné</a></li>
                    </ul>
                <?php endif ?>
            </div>
        </nav>
    </header>