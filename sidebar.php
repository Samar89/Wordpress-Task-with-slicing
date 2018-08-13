<!-- Start SideBar -->
<div class="sidebar col-md-4 col-12">
    <!-- Start SideBar -->
    <div class="TopStories">
        <div>
          <a href="#" class="SectionTitle">Top 5 Stories</a>
        </div>
        <ul>
            <?php
            
            //Select The Top 5 Post That Have Getted The Most Viewed
            
                $i = 1;
                $popularpost = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
            
                while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>

                <li><span> <?php echo $i; ?> </span><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
             <?php 
                 $i++ ; 
            
                endwhile;
            ?>
        </ul>
    </div>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<!-- End SideBar -->