<?php get_header(); ?>
						
		<div class="mainBody">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row pageIntro">
		 		<h1><?php echo get_the_title(  ); ?> </h1>
		 		<p><?php the_field('page_introduction'); ?></p>
		 	</div>
		 	
		 	<div class="row marginBottom">
		 		
		 			<div class="small-12 medium-12 large-8 columns" style="padding: 0;">
			 			
			 			<div class="sections--section-inner">
			 				<?php the_field('main_pods_content'); ?>
			 			</div>
		 			
		 			</div><!-- end .columns -->		 		
			 	
			 		<div class="small-12 medium-12 large-4 columns paddingLeft" style="padding-right: 0;">
			 			<div class="sections--section-inner-rhs">
					 			<h2 class="sections sections--inner"><?php the_field('right_hand_side_title'); ?></h2>
					 			<p><?php the_field('right_hand_side_text'); ?></p>
					 	</div>
			 		</div>
			 		
			 	</div><!-- end .row -->
		      	<?php endwhile; // end of the loop. ?>
			 </div><!-- end .mainBody-->
			 
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
													
								    <?php the_content(); ?>
								    <?php wp_link_pages(); ?>
								
								<?php // comments_template(); ?>
												
							</article> <!-- end article -->
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>
			

<?php get_footer(); ?>