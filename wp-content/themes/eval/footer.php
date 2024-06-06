
</div>
</main>

<footer id="footer" role="contentinfo" class="fixed-bottom py-3 text-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 text-center text-md-left my-auto">
                <h6 class="mb-0 pb-1 font-weight-bold">Roofing Inc</h6>
                <p class="mb-3 mb-md-0">Expert Roofing Solutions</p>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right my-auto">
                <nav role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?php wp_nav_menu( array( 'name' => 'Footer' , 'link_before' => '<span itemprop="name">', 'link_after' => '</span>', 'menu_class' => 'mb-0' ) ); ?>
                </nav>
            </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>
