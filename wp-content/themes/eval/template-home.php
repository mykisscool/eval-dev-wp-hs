<?php
/**
 *
 * Template Name: Homepage Template
 *
 */

get_header();
?>

<div class="container my-3 my-md-5">
    <div id="branding" class="row">
        <div class="col-12 col-md-6 my-auto">
            <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <h1>
                    <?php echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span></a>'; ?>
                </h1>
            </div>
            <div id="site-description" itemprop="description">
                <?php echo bloginfo( 'description' ); ?>
            </div>
            <div class="d-md-none">
                Test 1
            </div>
            <a href="/contact/" class="btn btn-dark px-4 mt-3 cta">Contact Us</a>
        </div>
        <div class="d-none d-md-block col-md-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-600x600.jpg" alt="Branding logo" class="rounded branding-image" />
        </div>
    </div>
</div>

<div id="gutter-types" class="row bg-light mx-0 py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center pb-3">Types of Gutters</h2>
                <div class="row">

                    <?php foreach(get_gutter_category_array() as $gutter_type) : ?>

                    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                        <strong><?php echo $gutter_type['name']; ?></strong>
                        <p class="text-secondary mb-0"><?php echo $gutter_type['description']; ?></p>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
