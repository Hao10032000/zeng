;(function($) {
    "use strict";

    jQuery(document).ready(function(){
        //Header
        elementor.settings.page.addChangeCallback( 'style_header', handleReloadPreview );
        elementor.settings.page.addChangeCallback( 'style_footer', handleReloadPreview );
        elementor.settings.page.addChangeCallback( 'show_category_list', handleReloadPreview );
        elementor.settings.page.addChangeCallback( 'style_blog_single', handleReloadPreview );
        elementor.settings.page.addChangeCallback( 'style_category_list', handleReloadPreview );
        //Page
        elementor.settings.page.addChangeCallback( 'sidebar_layout', handleReloadPreview );
        
    });

    function handleReloadPreview ( newValue ) {
        elementor.saver.saveEditor({
            status: elementor.settings.page.model.get('post_status'),
            onSuccess: () => {
                elementor.reloadPreview();

                elementor.once("preview:loaded", function() {
                    elementor.getPanelView().setPage("page_settings");
                });
            }
        })
    }

})(jQuery);