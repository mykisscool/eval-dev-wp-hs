;(function() {
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelector('.branding-image.desktop').onclick = function() {
            let source = this.getAttribute('src');
            basicLightbox.create(`<img src="${source}" alt="" class="basicLightbox" />`).show()
        }

    });
})();
