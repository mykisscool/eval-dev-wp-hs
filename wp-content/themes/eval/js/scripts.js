;(function() {
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelector('.branding-image').onclick = function() {
            let source = this.getAttribute('src');
            basicLightbox.create(`<img src="${source}" alt="" class="basicLightbox" />`).show()
        }

    });
})();
