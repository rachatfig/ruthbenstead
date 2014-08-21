<?php
/*
Template Name: Contact Template */
?>

<?php get_header(); ?>
			
					
		<div class="mainBody">
		 	
		 	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 	   
			 	<div class="row pageIntro">
			 		<h1><?php echo get_the_title(  ); ?></h1>
			 	</div>
		 	   
		 	    <div class="row extraMargin">
		 	   		<div class="small-12 medium-12 large-8 columns extraMargin">
					
					    	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">			
								    <?php the_content(); ?>
								    <?php wp_link_pages(); ?>
								
								<?php // comments_template(); ?>
												
							</article> <!-- end article -->
		 	   		</div>
		 	   		 	    
		 	    	
			 	
			 		<div class="small-12 medium-12 large-4 columns paddingLeft" style="padding-right: 0;">
			 			<div class=" sections--section-inner">
					 			
					 			<img src="<?php the_field('right_hand_side_image'); ?>"/>
					 	</div>
			 		</div>
			 		
			 	</div><!-- end .row -->
		 	   		

					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>

		 	
	 </div><!-- end .mainBody-->
			

<?php get_footer(); ?>