## Michael Petruniak

### Design decisions:

- Bootstrap 4
- Created custom post type "gutter" with custom category taxonomy "gutter-category"
    - Navigation and homepage content driven from these custom post types
- Created custom post type "testimonial"
- Created a custom homepage template
- Used the [slick](https://kenwheeler.github.io/slick/) carousel on product page
- Used the [Basic Lightbox](https://github.com/electerious/basicLightbox) on the home page and product page

### Caveats due to time-constraints:

- I would have added a basic webpack to minify (and concatenate) any CSS and Javascript
    - Bootstrap natively provides a lot of the styles required to complete this design
- The top navigation breaks on certain breakpoints
- CDNs were used for third-party Javascript as opposed to npm or similar
- The provided theme had some rich snippets pre-configured; however, I did not validate them or complete them
- Third-party styles and scripts added directly to header.php template (not via wp_enqueue_scripts)
- Lightbox opacity issue
- The custom "gutter" category is missing a thumbnail image (missing from homepage design)
- I didn't spend as much time designing and developing in mobile as I would have liked to
- Used `!important` a couple of times
- Sticky footer not perfect on short posts/pages

### Custom Block:
- "Dynamic Content" will display basic content based on device (desktop, mobile, ios, etc.)
