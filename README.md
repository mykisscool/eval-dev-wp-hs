## Michael Petruniak

### Design decisions:

- Predominantly used [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
- Created custom post type "gutter" with custom category taxonomy "gutter-category"
    - Navigation and homepage content driven from these custom post types
- Created custom post type "testimonial"
- Created a custom homepage template
- Used the [Swiffy Slider](https://swiffyslider.com/) carousel on the product page
- Used the [Basic Lightbox](https://github.com/electerious/basicLightbox) on the home page and on the product page

### Caveats due to time-constraints:

- I would have added a basic webpack to minify (and concatenate) any CSS and Javascript
    - Bootstrap natively provides a lot of the styles required to complete this design
- The top navigation breaks on certain breakpoints
- Used `!important` a couple of times
- I didn't spend as much time designing and developing in mobile as I would have liked to
- The provided theme had some rich snippets pre-configured; however, I did not validate them or complete them
- Sticky footer not perfect on short posts/pages
- CDNs were used for third-party Javascript as opposed to npm or similar
- Third-party styles and scripts added directly to header.php template (not via wp_enqueue_scripts)
- Lightbox opacity issue
- The custom "gutter" category is missing a thumbnail image (missing from homepage design)
- I used native custom fields for the slider images on the product page; I would have preferred to use ACF or some native WordPress equivalent

### Custom block:
- *Dynamic Content* will display basic content based on device (desktop, mobile, ios, etc.)
