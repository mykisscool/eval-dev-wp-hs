;(function() {
    document.addEventListener('DOMContentLoaded', function() {
        if(document.querySelector('.branding-image.desktop, #product-image img')) {
            document.querySelector('.branding-image.desktop, #product-image img').onclick = function() {
                let source = this.getAttribute('src');
                basicLightbox.create(`<img src="${source}" alt="" class="basicLightbox" />`).show()
            }
        }
    });
})();
