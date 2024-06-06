<?php
/**
 *
 * Template Name: Homepage Template
 *
 */

get_header();
?>

<div id="branding">
    <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <h1>
            <?php echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span></a>'; ?>
        </h1>
    </div>
    <div id="site-description" itemprop="description">
        <?php echo bloginfo( 'description' ); ?>
    </div>
</div>

<?php get_footer(); ?>
