<?php
/**
 * @package Jewel Store
 */
?>
 <div class="article-Listing">
 <div class="blogin-bx">     
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>         
		  <?php if( get_theme_mod( 'jewel_store_hide_postfeatured_image' ) == '') { ?> 
			 <?php if (has_post_thumbnail() ){ ?>
                <div class="hg-blog-img <?php if( esc_attr( get_theme_mod( 'jewel_store_featuredimg_right' )) ) { ?>imgRight<?php } ?>">
                 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
             <?php } ?> 
          <?php } ?> 
       
        <header class="entry-header">
           <?php if ( 'post' == get_post_type() ) : ?>
                <div class="blog-postmeta">
                   <?php if( get_theme_mod( 'jewel_store_hide_blogdate' ) == '') { ?> 
                      <div class="post-date"> <i class="far fa-clock"></i>  <?php echo esc_html( get_the_date() ); ?></div><!-- post-date --> 
                    <?php } ?> 
                    
                    <?php if( get_theme_mod( 'jewel_store_hide_postcats' ) == '') { ?> 
                      <span class="blog-postcat"> <i class="far fa-folder-open"></i> <?php the_category( __( ', ', 'jewel-store' ));?></span>
                   <?php } ?>                                                   
                </div><!-- .blog-postmeta -->
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>                           
                                
        </header><!-- .entry-header -->          
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">           
         <p>
            <?php $jewel_store_arg = get_theme_mod( 'jewel_store_blogfullcontent','Excerpt');
              if($jewel_store_arg == 'Content'){ ?>
                <?php the_content(); ?>
              <?php }
              if($jewel_store_arg == 'Excerpt'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <?php $excerpt = get_the_excerpt(); echo esc_html( jewel_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewel_store_blogexcerptrange','30')))); ?>
                <?php }?>                
                 <a class="morebutton" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'jewel-store' ); ?></a>
              <?php }?>
           </p>
           
          
                    
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jewel-store' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'jewel-store' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </div><!-- .blogin-bx-->
    </article><!-- #post-## --> 
</div>