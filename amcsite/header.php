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
                <a href="#" data-activates="mobile-demo" class="button-collapse" style="color: #F17A21;"><i class="material-icons">menu</i></a>
                <?php
                $args = [
                    "menu" => 'menu-header',
                    'container' => false,
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'right hide-on-med-and-down'
                ];

                wp_nav_menu ( $args );

                ;?>
                <?php
                $args = [
                    "menu"              => 'menu-header',
                    'container'         => false,
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'left side-nav',
                    'menu_id'           =>  'mobile-demo'
                ];

                wp_nav_menu ( $args );

                ;?>
            </div>
        </nav>
    </header>