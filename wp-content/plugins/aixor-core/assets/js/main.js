
// Wait for the window to load
window.addEventListener('DOMContentLoaded', function() {
    // Listen for 'elementor/frontend/init' event
    window.addEventListener('elementor/frontend/init', function() {
        // Define the action for 'frontend/element_ready/services.default'
        elementorFrontend.hooks.addAction('frontend/element_ready/services.default', function(scope) {

        });
    });
});
