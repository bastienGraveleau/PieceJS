<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Jewel Store
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#content-wrapper-full">
<?php esc_html_e('Skip to content', 'jewel-store' ); ?>
</a>
<?php
$jewel_store_show_topbookbtn_section 	   	= esc_attr( get_theme_mod('jewel_store_show_topbookbtn_section', false) );  
$jewel_store_show_frontpage_slidersection 	  		= esc_attr( get_theme_mod('jewel_store_show_frontpage_slidersection', false) );
$jewel_store_show_3pagebox_sections      	= esc_attr( get_theme_mod('jewel_store_show_3pagebox_sections', false) );
$jewel_store_show_welcome_sections      	= esc_attr( get_theme_mod('jewel_store_show_welcome_sections', false) );
?>
<div id="SiteWrapper" <?php if( get_theme_mod( 'jewel_store_layoutoption' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($jewel_store_show_frontpage_slidersection)) {
	 	$innerpage_cls = '';
	}
	else {
		$innerpage_cls = 'innerpage_header';
	}
}
else {
$innerpage_cls = 'innerpage_header';
}
?>

<div id="masthead" class="site-header <?php echo esc_attr($innerpage_cls); ?> "> 
  <?php if( $jewel_store_show_topbookbtn_section != ''){ ?> 
      <div class="top-bar-100">
       <div class="container">        
        <div class="top-align-right">
         <div class="header-request-quote">
           <?php
                $jewel_store_tablebookbtn = get_theme_mod('jewel_store_tablebookbtn');
                if( !empty($jewel_store_tablebookbtn) ){ ?>        
                <?php $jewel_store_tablebookbtnlink = get_theme_mod('jewel_store_tablebookbtnlink');
                if( !empty($jewel_store_tablebookbtnlink) ){ ?>              
                    <div class="custombtn">
                       <a target="_blank" href="<?php echo esc_url($jewel_store_tablebookbtnlink); ?>">
                        <?php echo esc_html($jewel_store_tablebookbtn); ?>            
                        </a>
                    </div>                 
          <?php }} ?> 
          </div><!-- .header-request-quote --> 
         </div><!-- .top-align-right --> 
         <div class="clear"></div>   
       </div><!-- .container -->
      </div><!-- .hdr-topstrip --> 
    <?php } ?>  
      <div class="container"> 
      <div class="logo-and-menu">      
        <div class="logo">
           <?php jewel_store_the_custom_logo(); ?>
            <div class="site_branding">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
         </div><!-- logo --> 
         
          <div class="RightNavMenu"> 
             <div id="navigationpanel"> 
                 <nav id="main-navigation" class="header-navigation" role="navigation" aria-label="Primary Menu">
                    <button type="button" class="menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                    ) );
                    ?>
                </nav><!-- #main-navigation -->  
            </div><!-- #navigationpanel -->   
          </div><!-- .RightNavMenu --> 
         <div class="clear"></div>   
       </div><!-- .logo-and-menu --> 
      </div><!-- .container -->           
 <div class="clear"></div> 
</div><!--.site-header --> 
 
<?php 
if ( is_front_page() && !is_home() ) {
if($jewel_store_show_frontpage_slidersection != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('jewel_store_frontslider'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('jewel_store_frontslider'.$i,true));
	  }
	}
?> 
<div class="HomepageSlider">              
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
     <h2><?php the_title(); ?></h2>
     <p><?php $excerpt = get_the_excerpt(); echo esc_html( jewel_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewel_store_excerpt_length_frontslider','0')))); ?></p>
		<?php
        $jewel_store_frontslider_btntext = get_theme_mod('jewel_store_frontslider_btntext');
        if( !empty($jewel_store_frontslider_btntext) ){ ?>
            <a class="slidermorebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($jewel_store_frontslider_btntext); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
</div><!-- .HomepageSlider -->    
<?php } } ?> 

<?php if ( is_front_page() && ! is_home() ) { ?> 
  <?php if( $jewel_store_show_3pagebox_sections != ''){ ?> 
   <section id="services-section1">
     <div class="container"> 
			<?php
                $jewel_store_lefttitle = get_theme_mod('jewel_store_lefttitle');
                if( !empty($jewel_store_lefttitle) ){ ?>              
                    <h2 class="sectiontitle"><?php echo esc_html($jewel_store_lefttitle); ?></h2>              
            <?php } ?>            
        <div class="box-equal-height">
          <?php 
                for($n=1; $n<=3; $n++) {    
                if( get_theme_mod('jewel_store_3pagebox'.$n,false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('jewel_store_3pagebox'.$n,true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
                     <div class="col-lg-30 <?php if($n % 3 == 0) { echo "last_column"; } ?>">   
							 <?php if(has_post_thumbnail() ) { ?>
                                <div class="icon-lx">
                                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>                                
                                </div>        
                             <?php } ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                                <p><?php $excerpt = get_the_excerpt(); echo esc_html( jewel_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewel_store_excerpt_length_for3pagebox','10')))); ?></p> 
                                <a class="more-bgbtn" href="<?php the_permalink(); ?>"></a>
                      </div>
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } } ?>   
                                              
               <div class="clear"></div>  
            </div>  
      </div><!-- .container -->
    </section><!-- #services-section1 -->
  <?php } ?>   

   <?php if( $jewel_store_show_welcome_sections != ''){ ?>  
    <section id="services-section2">
    <div class="container">                               
		<?php 
        if( get_theme_mod('jewel_store_2colwelcomepage',false)) {     
        $queryvar = new WP_Query('page_id='.absint(get_theme_mod('jewel_store_2colwelcomepage',true)) );			
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>            
            <div class="Short-descPart">
			    <h3><?php the_title(); ?></h3>              
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( jewel_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewel_store_2colwelcomepage_excerpt_length','40')))); ?></p>       
              </div> 
             <div class="HalfimgBX">
                <?php the_post_thumbnail();?>   
              </div>                                          
            <?php endwhile;
             wp_reset_postdata(); ?>                                    
            <?php } ?>                                 
      <div class="clear"></div>                       
     </div><!-- .container -->
    </section><!-- #welcome_section-->
 <?php } ?>  
<?php } ?>