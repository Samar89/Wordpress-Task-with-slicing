<?php
//The Template For Displaying The Category
 
 get_header(); ?>

<section class="PostContent">
    <div class="row">
      <div class="col-md-8 col-12">
        <div class="content_bottom_left">
         <?php
			while ( have_posts() ) : the_post(); ?>
                <ul>
                  <li>
                    <div> 
                        <!-- Get Feature Image Of Post -->
                        <a href="<?php the_permalink() ?>"><?php
                           if ( has_post_thumbnail() ) {
                              echo  get_the_post_thumbnail();
                            }?>
                        </a>
                    </div>
                      <!-- Get The Title Of Post -->
                    <h2> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                      <!-- Get The First Lines Of The Post Content  -->
                    <p><?php the_excerpt(); ?></p>
                  </li>
                </ul>
          <?php endwhile; // End of the loop.
			?>
        </div>
      </div>
     <?php get_sidebar(); ?>
    </div>
  </section>
<?php
get_footer();
?>