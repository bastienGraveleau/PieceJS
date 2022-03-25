<?php
/**
 * Jewel Store About Theme
 *
 * @package Jewel Store
 */

//about theme info
add_action( 'admin_menu', 'jewel_store_abouttheme' );
function jewel_store_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'jewel-store'), __('About Theme Info', 'jewel-store'), 'edit_theme_options', 'jewel_store_guide', 'jewel_store_mostrar_guide');   
} 

//Info of the theme
function jewel_store_mostrar_guide() { 	
?>

<h1><?php esc_html_e('About Theme Info', 'jewel-store'); ?></h1>
<hr />  

<p><?php esc_html_e('Jewel Store is a brilliant WordPress theme is made exclusively to sell all sorts of products,  like jewellery, fashion, books, food, toys mare and more. It comes bundled with Elementor, and it is compatible with WooCommerce. Build any stunning shops related website the smooth way with this amazing theme. It is cross-browser compatible and implemented on bootstrap framework that makes it really handy to use. It comes with powerful admin interface. The theme is mobile-friendly that easily fits in any device screen size. Also, it is SEO-friendly that takes care of your website’s search engine ranking. It is highly customizable with no coding knowledge required. You can import demo content with one-click demo import option. You can add social media pages using widgets. It is fully responsive that fits perfectly in all devices, be it desktop, mobile or tabs. It comes with clean, secure and optimized codes. Also, the theme loads faster as the pages are optimized for speed. Demo: https://netnus.net/jewel/', 'jewel-store'); ?></p>

<h2><?php esc_html_e('Theme Features', 'jewel-store'); ?></h2>
<hr />  
 
<h3><?php esc_html_e('Theme Customizer', 'jewel-store'); ?></h3>
<p><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'jewel-store'); ?></p>


<h3><?php esc_html_e('Responsive Ready', 'jewel-store'); ?></h3>
<p><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'jewel-store'); ?></p>


<h3><?php esc_html_e('Cross Browser Compatible', 'jewel-store'); ?></h3>
<p><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'jewel-store'); ?></p>


<h3><?php esc_html_e('E-commerce', 'jewel-store'); ?></h3>
<p><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'jewel-store'); ?></p>

<hr />  	
<p><a href="https://netnus.com/Documentation/" target="_blank"><?php esc_html_e('Documentation', 'jewel-store'); ?></a></p>

<?php } ?>