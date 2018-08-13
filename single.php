<?php
//The template for displaying all single posts
 
 get_header(); ?>

<section class="PostContent">
    <div class="row">
      <div class="col-md-8 col-12">
        <div class="content_bottom_left">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

            //Function To Know Exactly Which Post Gets The Credit For The Views
            count_post_views(get_the_ID());
            
		endwhile; // End of the loop.
		?>
        </div>
      </div>
     <?php get_sidebar(); ?>
    </div>
  </section>
<?php
get_footer();
?>