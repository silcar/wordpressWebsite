<?php
 get_header(); ?>

<div class="row main-domain" style="padding-top:50px;">
    <?php while (have_posts()) : the_post();
    $thumb_id = get_post_thumbnail_id();
    $cover = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
    //$interventions = get_post_meta(get_the_ID(), 'expertise_intervention', true);

    $expStr = explode("/uploads/", $cover['url']);
    $uploads = wp_upload_dir();
    $upload_path = $uploads['baseurl'];
    $cover_url = $upload_path . '/' . $expStr[1];
    ?>
    <div class="row" style="max-height: 355px; overflow-y: hidden">
        <?php if($cover): ?>
            <img class="responsive-img" src="<?= $cover_url; ?>" alt="illustration-<?php the_title(); ?>">
        <?php endif; ?>
    </div>
    <div class="container">
        <h1 class="center-align domain-title"><span><?php the_title(); ?></span></h1>
        <div class="domain-content">
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="row related-type clearfix">
       <!-- <div class="container">
            <?php foreach ($interventions as $id):?>
                <?php $type = get_post( $id ); ?>
                <?php $uri = get_the_post_thumbnail_url( $type, $size = 'post-thumbnail' ); ?>

                <div class="col s6 m3">
                    <?php if($uri): ?>
                        <img src=" <?=$uri ?>" alt="" style="display: block;width:50px; height:auto; margin:0 auto">
                    <?php endif; ?>
                    <h3 class="title card-header" style=" margin-top: 5px; text-align: center; font-size: 1.15rem;font-weight: 600;">
                        <?= $type->post_title; ?>
                    </h3>
                    <div class="content">
                        <?= shorten_string(strip_tags($type->post_content), 20); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>-->
    </div>
</div>

<?php get_footer(); ?>
