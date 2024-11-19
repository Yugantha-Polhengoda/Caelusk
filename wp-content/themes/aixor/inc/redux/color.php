<?php 
if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
// Output Customize CSS
function aixor_customize_css() { 
    global $aixor_options;  {
?>

<style>

:root {

    --primary: <?php echo esc_html($aixor_options['colorcode1']); ?>;

    --secondary: <?php echo esc_html($aixor_options['colorcode2']); ?>;
    
    --tertiary: <?php echo esc_html($aixor_options['colorcode3']); ?>;

    
}
body{
        background-color: <?php echo esc_html($aixor_options['colorcode']); ?>;
    }

</style>

<?php }
}

  
add_action('wp_head', 'aixor_customize_css');
}
?>