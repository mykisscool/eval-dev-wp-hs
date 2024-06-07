<?php get_header(); ?>

<div class="container">

<header class="header my-3 my-md-5">
    <h1 class="entry-title" itemprop="name"><?php the_archive_title(); ?></h1>
    <div class="archive-meta" itemprop="description"><?php if ( '' != get_the_archive_description() ) { echo get_the_archive_description(); } ?></div>
</header>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

<?php endwhile; else: ?>

<p><strong>No posts found.</strong></p>

<?php endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>

</div>

<?php get_footer(); ?>
