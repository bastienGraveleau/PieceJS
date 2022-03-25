<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Jewel Store
 */

get_header(); ?>

<div class="container">
    <div id="content-wrapper-full">
        <div class="Site-Content-Left">
           <div class="article-Listing">
            <div class="blogin-bx"> 
             <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'jewel-store' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn....Dont worry... it happens to the best of us.', 'jewel-store' ); ?></p>  
            </div><!-- .page-content -->
           </div><!--.blogin-bx-->
          </div><!--.article-Listing-->      
       </div><!-- Site-Content-Left-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>