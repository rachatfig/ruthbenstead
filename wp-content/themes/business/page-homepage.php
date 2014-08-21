<?php
/*
Template Name: Homepage Template */
?>

<?php get_header(); ?>
			
		<div role="main" class="row fullWidthSlider">
			<img src="<?php the_field('homepage_large_banner');?>" class="slider" style="width: 100%;"/>
		</div> 	ghjg
			
		<div class="mainBody">
		 	
		 	<div class="row">
		 		<div class="sectionsOuterPods">
		 			<div class="small-12 medium-12 large-7 columns">
			 			
			 			<div class="small-12 medium-6 large-6 columns">
			 				<div class="sections--section">
			 				<?php while ( have_posts() ) : the_post(); ?>
								<a href="<?php the_field('pod_1_link');?>">
									<h2 class="sections sections--hp"><?php the_field('pod_1_title'); ?></h2>
									<img src="<?php the_field('pod_1_image'); ?>"/>
									<p><?php the_field('pod_1_text'); ?></p>
								</a>
			 				</div>
		 				</div>
		 				
		 				<div class="small-12 medium-6 large-6 columns">
		 					<div class="sections--section">
		 						<a href="<?php the_field('pod_2_link');?>">
			 						<h2 class="sections sections--hp"><?php the_field('pod_2_title'); ?></h2>
				 					<img src="<?php the_field('pod_2_image'); ?>"/>
				 					<p><?php the_field('pod_2_text'); ?></p>
		 						</a>
			 				</div>
		 				</div>
		 						 				
		 			</div><!-- end .columns -->		 		
			 	
			 		<div class="small-12 medium-12 large-5 columns">
			 			<div class="sections--section">
			 				<a href="<?php the_field('pod_3_link');?>">
					 			<h2 class="sections sections--hp"><?php the_field('pod_3_title'); ?></h2>
			 					<img class="large" src="<?php the_field('pod_3_image'); ?>"/>
			 					<p><?php the_field('pod_3_text'); ?></p>
			 				</a>
					 	</div>
			 		</div>
			 	</div><!-- end .sectionsOuter -->
		 	</div><!-- end .row -->
		 	
		 	
		 	<div class="row">
		 		<div class="small-12 medium-12 large-12 columns sectionNext">
		 			<img src="<?php the_field('full_width_pod_image'); ?>"/>
		 			<h2 class="sectionNext"><?php the_field('full_width_pod_title'); ?></h2>
		 			<p><?php the_field('full_width_pod_text'); ?><span class="quote">F.I. Creative, Fig Creative</span></p>
		 		</div>
		 		<?php endwhile; // end of the loop. ?>
		 	</div><!-- end .row--> 
		 	
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