<?php 
$titles = themesflat_get_page_titles();    
ob_start();
if ( $titles['title'] ) { printf( '%s', wp_kses_post($titles['title']) ); }
$title = ob_get_clean();
?>

<?php 

    if ( themesflat_get_opt( 'breadcrumb_enabled' ) == 1 ):
        themesflat_breadcrumb();
    endif;  
                                
    if ( themesflat_get_opt('page_title_heading_enabled') == 1 ) {
        echo sprintf('<h2 class="page-title-heading">%s</h2>', $title); 
    }
                          
?>