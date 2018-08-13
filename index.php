<?php // The main template file 

get_header(); // Include Header File 

?>

 <!-- Start Main Posts Section -->
<section class="MainPosts">
    
   <div class="container"> 

      <div class="row">
          
          <div class="col-lg-8">
              
              <div class="row">
                  
                <div class="OnePost col-md-8">
                  <?php 
                    //Select The Lasted Post That Have [ Main ] Meta Box 
                    $args = array( 
                        'meta_query' => array(
                                            array(
                                                'key' => 'Main_Posts',
                                                'value' => 'main'
                                            ) ),
                        
                        'posts_per_page' => 1 );
                    
                    $the_query = new WP_Query( $args ); ?>
                    <?php
                    while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    
                        <div class="BigPost">
                            
                            <!-- Get The Feature Image Of Post -->
                            <a href="<?php the_permalink() ?>">
                                <?php if ( has_post_thumbnail() ) {
                                          echo  get_the_post_thumbnail();
                                      }
                                ?>
                            </a>
                            
                            <!-- Get Information Of The Post -->
                             <div class="PostInfo">
                                <!-- We Have 2 Category of Our Posts 
                                  -- Local & World -->
                                
                                <!-- If Post Has Meta Box [Local]  -->
                             <?php 
                                $local = get_post_meta( get_the_ID(), "Local_Posts", true );
                                $world = get_post_meta( get_the_ID(), "World_Posts", true );
                                if ( $local == "local" ) { ?>
                                      <p class="local">Local</p><br>
                            <?php } 
                                
                                 /* If Post Has Meta Box [World] */
                                  if ( $world == "world" ) { ?>
                                      <br><p class="world">Wolrd</p><br>
                            <?php } ?>
                                
                                    <!-- Get The Title Of The Post -->
                                  <a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a>
                              </div>
                        </div>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    ?>
                  </div>
                  <div class="TwoPost col-md-4">
                    <?php 
                    //Select The 2 Lasted Post That Have [ Main ] Meta Box After The Lasted 
                    $args = array( 
                        'meta_query' => array(
                                            array(
                                                'key' => 'Main_Posts',
                                                'value' => 'main'
                                            ) ),
                        'offset' =>1 ,
                        'posts_per_page' => 2 );
                    
                    $the_query = new WP_Query( $args ); ?>
                    <?php
                    while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                      
                        <div class="SmallPost h-50">
                            
                            <!-- Get The Feature Image Of Post -->
                            <a href="<?php the_permalink() ?>">
                                <?php if ( has_post_thumbnail() ) {
                                          echo  get_the_post_thumbnail();
                                      }
                                ?>
                            </a>
                            
                            <!-- Get Information Of The Post -->
                            <div class="PostInfo">
                                <!-- We Have 2 Category of Our Posts 
                                  -- Local & World -->
                                
                                <!-- If Post Has Meta Box [Local]  -->
                             <?php 
                                $local = get_post_meta( get_the_ID(), "Local_Posts", true );
                                $world = get_post_meta( get_the_ID(), "World_Posts", true );
                                
                                if ( $local == "local" ) { ?>
                                      <p class="local"><?php echo $local;?></p><br>
                            <?php } 
                                
                                 /* If Post Has Meta Box [Local] */
                                  if ( $world == "world" ) { ?>
                                      <br><p class="world">Wolrd</p><br>
                            <?php } ?>
                                
                                    <!-- Get The Title Of The Post -->
                                  <a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a>
                              </div>
                        </div>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    ?>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 SquareBanner text-center">
             <?php dynamic_sidebar( 'sidebar-3' ); ?>
          </div>
      </div>
    </div>
</section>
<!-- End Main Posts Section -->
<!-- Start Egypt News Section -->
<section class="EgyptNews">
  <div class="container">
      
      <div>
       <?php // Get the ID  of Egypt News Category
          $egypt_id = get_cat_ID( 'Egypt News' ); ?>
          <a href="<?php echo get_category_link( $egypt_id )?>" class="SectionTitle">Egypt News</a>
      </div>
      
      <div class="SliderNews">
          
          <!-- Slider Egypt News -->
          <div class="row mx-auto my-auto">
              
            <div id="Carousel" class="carousel slide w-100" data-ride="carousel">
                
                <div class="carousel-inner w-100" role="listbox">
                <?php 
                //Select The 10 Lasted Post That Published In Egypt News Category
                $args = array( 'category_name' => 'Egypt News', 'offset' =>1 , 'posts_per_page' => 10 );

                $the_query = new WP_Query( $args ); ?>
                <?php
                while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    
                    <div class="carousel-item">
                        
                        <div class="col-lg-3 col-md-4 col-12">
                            
                            <a href="<?php the_permalink() ?>">
                                <?php if ( has_post_thumbnail() ) {
                                          echo  the_post_thumbnail('full' , array( 'class' => 'd-block img-fluid' ));
                                      }
                                ?>
                            </a>
                            
                            <a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a>
                        </div>
                        
                    </div>
                    
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
                </div>
                
                <!-- Carousel Control To Move Previous -->
                <a class="carousel-control-prev" href="#Carousel" role="button" data-slide="prev">
                    
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    
                </a>
                <!-- Carousel Control To Move Next  -->
                <a class="carousel-control-next" href="#Carousel" role="button" data-slide="next">
                    
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    
                </a>
                
            </div>
        </div>
    </div>
 </div>
</section>
    <!-- End Egypt News Section -->
    <!-- Start Features And SideBar -->
<section class="Feature-And-SideBar">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-8 col-12">
                
                <div class="feature">
                    
                    <div>
                      <p class="SectionTitle">Features</p>
                    </div>
                    
                    <div class="row">
                         <?php 
                    //Select The 2 Lasted Post That Have [ Feature ] Meta Box
                    $args = array( 
                        'meta_query' => array(
                                            array(
                                                'key' => 'Features_Posts',
                                                'value' => 'feature'
                                            ) ),
                        'posts_per_page' => 2 );
                    
                    $the_query = new WP_Query( $args ); ?>
                    <?php
                    while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                        
                        <div class="col-md-6 col-12">
                            <div class="FeaturePost">
                                <!-- Get The Feature Image Of Post -->
                                <a href="<?php the_permalink() ?>">
                                    <?php if ( has_post_thumbnail() ) {
                                              echo  get_the_post_thumbnail();
                                          }
                                    ?>
                                </a>
                                <a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></a>
                            </div>
                        </div>
                        
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    ?>
                        
                    </div>
                    
                </div>
                
            </div>
            <?php //Start SideBar  
                  get_sidebar(); 
                 // End SideBar ?>
        </div>
        
    </div>
    
</section>
<!-- End Features And SideBar -->
<?php
get_footer(); //Include Footer File
?>