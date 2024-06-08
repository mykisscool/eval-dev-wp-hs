<?php
/**
 *
 * Template Name: Homepage Template
 *
 */

get_header();
?>

<section id="branding" class="container my-5">
    <div class="row">
        <div class="col-12 col-md-6 my-auto">
            <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <h1>
                    <?php echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span></a>'; ?>
                </h1>
            </div>
            <div id="site-description" itemprop="description">
                <?php echo bloginfo( 'description' ); ?>
            </div>
            <div class="d-md-none my-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-600x600.jpg" alt="Branding logo" class="rounded branding-image img-fluid" />
            </div>
            <a href="/contact/" class="btn btn-dark px-4 mt-3 cta">Contact Us</a>
        </div>
        <div class="d-none d-md-block col-md-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-600x600.jpg" alt="Branding logo" class="rounded branding-image desktop img-fluid" />
        </div>
    </div>
</section>

<section id="gutter-types" class="row bg-light mx-0 py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center pb-3">Types of Gutters</h2>
                <div class="row">

                    <?php foreach( get_gutter_category_array() as $gutter_type ) : ?>

                    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                        <strong><?php echo $gutter_type['name']; ?></strong>
                        <p class="text-secondary mb-0"><?php echo $gutter_type['description']; ?></p>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="col text-center mb-2">
                <span class="btn btn-light btn-sm">Testimonials</span>
            </div>
            <h2 class="text-center">What Our Customers Say</h2>
            <p class="text-center text-secondary">We're proud of the work we do. But don't just take our word for it, here's what our customers have to say.</p>

            <?php // @TODO Address the extra margin/padding with the nested grids ?>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="container">
                            <div class="row">

                                <?php foreach( get_testimonials_array() as $testimonial ) : ?>

                                <div class="col-12 col-md-6 pb-2 pb-md-4 testimonial">
                                    <p class="mb-1"><strong><?php echo $testimonial['name']; ?></strong></p>
                                    <p class="text-secondary"><em><?php echo $testimonial['quote']; ?></em></p>
                                </div>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-block col-md-6">

                        <?php // @TODO From the testimonials custom post type - select an image ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-600x600.jpg" alt="Testimonial image" class="rounded img-fluid" />

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
