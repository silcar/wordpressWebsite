<?php get_header();?>
<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></a></h2>
            <p><?php the_content(); ?></p>
        </article>
    <?php endwhile; ?>

<?php else: ?>
    <h3>Pas de post trouvé</h3>
<?php endif; ?>
<?php get_footer(); ?>