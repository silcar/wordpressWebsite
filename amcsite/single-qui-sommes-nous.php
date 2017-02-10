<?php get_header(); ?>
<style>
    h2{
        font-size: 1.5rem;
        line-height: 100%;
    }
</style>
<div class="row" style="max-height: 355px; overflow-y: hidden">
        <img class="responsive-img" src="<?= get_template_directory_uri() ?>/assets/img/header_image.jpg" alt="illustration-<?php the_title(); ?>">
</div>
<?php while (have_posts()) : the_post(); ?>
<div class="container">
    <h1 class="center-align domain-title"><span><?php the_title(); ?></span></h1>
    <div class="domain-content">
        <?php the_content(); ?>
    </div>
</div>

<?php if($post->post_name == 'equipe'): ?>
        <?php
        $args = array(
            'post_type' => 'equipe',
            'posts_per_page' => 100
        );
        $members = new WP_Query( $args );
        $i = 1;?>

        <?php endif; ?>
<?php endwhile; ?>
<?php if($members): ?>
    <div class="row" style="padding:60px;">
        <?php
        while ( $members->have_posts() ) : $members->the_post();
            $function = get_post_meta(get_the_ID(), 'member_function', true);
            $thumb_id = get_post_thumbnail_id();
            if($thumb_id){
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
            }else{
                $thumb_url = get_template_directory_uri() . "/assets/images/default_img.png";
            }
            ?>
            <div class="col s12 m6 l64">
                <div class="card-panel white z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s5">
                            <img src="<?= $thumb_url ;?>" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s7">
                            <span class="card-title" style="color:#F17A21; margin-left:.5em"><?= the_title() ?></span><br>
                            <span class="black-text">
                         <?= $function ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>
