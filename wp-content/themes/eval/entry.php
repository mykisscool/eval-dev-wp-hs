<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'my-5' ); ?>>
<div class="container">
    <div class="row">
        <div id="product-image" class="col-12 col-md-6">

            <?php $featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
            <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" class="img-fluid rounded" />
            <?php edit_post_link(); ?>

        </div>
        <div id="product-details" class="col-12 col-md-6">

            <?php //@TODO This should be a WordPress tag ?>
            <span class="btn btn-light btn-sm">Gutter Product</span>

            <header class="header py-1">
                <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></a></h1>
            </header>
            <div class="entry-content text-muted" itemprop="articleBody">

                <?php
                    $gutter_details = get_gutter_custom_fields( get_the_ID() );
                    $price = $gutter_details['price'] ? '<span class="font-weight-bold pr-3 text-dark">' . sprintf( 'Price: $%s', $gutter_details['price'] ) . '</span>': '';

                    // @TODO Could also use a WordPress custom field for the CTA text
                    $link = $gutter_details['affiliate_link'] ? sprintf( '<a href="%s" target="_blank" class="btn btn-dark btn-sm px-4 py-1">Buy Now</a>', $gutter_details['affiliate_link'] ) : '';
                ?>

                <?php the_content(); ?>

                <?php if ( $price || $link ) : ?>

                <div class="product-details mt-4">
                    <p><?php echo $price . $link ?></p>
                </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
</article>

<?php get_footer(); ?>
