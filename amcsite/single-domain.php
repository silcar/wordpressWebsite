<?php get_header(); ?>

<div class="row main-domain">
        <?php while (have_posts()) : the_post();
                $thumb_id = get_post_thumbnail_id();
        $cover = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
        ?>
    <div class="row">
        <?php if($cover): ?>
        <img class="responsive-img" src="<?= $cover['url']; ?>" alt="illustration-<?php the_title(); ?>">
        <?php endif; ?>
    </div>
    <div class="container">
        <h1 class="center-align domain-title"><span><?php the_title(); ?></span></h1>
        <div class="domain-content">
            <?php the_content(); ?>
        </div>
            <?php endwhile; ?>
    </div>
    <div class="row related-type">

    </div>
</div>

<?php get_footer(); ?>
