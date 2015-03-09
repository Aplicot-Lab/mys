<?php 
/* 
Template Name: Full Width Page
*/
?>
<?php get_header();?>

<?php
$location = icore_get_location();   
$meta = icore_get_multimeta(array('Subheader')); 
?>

<div id="entry-full">
    <div id="page-top">	 
    	<h1 class="title"><?php  the_title();  ?></h1>
    	<?php if( isset($meta['Subheader'] ) && $meta['Subheader'] <> '') { ?>
        	<span class="subheader"><?php echo $meta['Subheader']; ?></span>
    	<?php } ?>
    </div> <!-- #page-top  -->

    <div id="left" class="full-width">
        <div class="post-full single full-width">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	 
                             <?php if ( has_post_thumbnail() && isset($options[$location . '_thumb']) && $options[$location . '_thumb'] == '1' ) :
								  	$thumbid = get_post_thumbnail_id($post->ID);
									$img = wp_get_attachment_image_src($thumbid,'full');
									$img['title'] = get_the_title($thumbid); ?>

		                            <div class="thumb loading"> 
		                            	<?php the_post_thumbnail("large"); ?>
		                            	<a href="<?php echo $img[0]; ?>" class="zoom-icon" rel="shadowbox" ></a>                                    		
									</div> <!-- .thumbnail  -->                        
							<?php endif; ?>
							    
                        	<?php the_content(); ?> 

							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>                         
					</article>

                    <div class="meta">
                        <?php the_time('M j, Y | ');  _e('Posted by ','InterStellar');  the_author_posts_link(); ?> | <?php comments_popup_link(__('0 comments','InterStellar'), __('1 comment','InterStellar'), '% '.__('comments','InterStellar')); ?>
                    </div>  <!-- .meta  -->
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','InterStellar'); ?></p>

<?php endif; ?>
            
         </div> <!-- .post-full  -->
    </div> <!-- #left  -->
</div> <!-- #entry-full  -->
<?php get_footer(); ?>