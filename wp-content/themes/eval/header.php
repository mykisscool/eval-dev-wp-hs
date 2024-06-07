<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/basicLightbox/5.0.0/basicLightbox.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/basicLightbox/5.0.0/basicLightbox.min.js" defer></script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="wrapper" class="hfeed">

<header id="header" role="banner" class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center text-md-left my-auto">
                <div id="geo-availability" class="font-weight-bold">
                    <p class="mb-1 mb-md-0"><?php echo get_city_available_message(); ?></p>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right my-auto">
                <nav role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>', 'menu_class' => 'mb-0' ) ); ?>
                </nav>
            </div>
        </div>
    </div>
</header>

<main id="content" role="main">
