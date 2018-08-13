<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
      
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
      
    <div class="container">
        
    <!-- Start Header -->
      <header>
          
          <!-- Start The Upper section -->
          <div class="row FirstHeader">
              
              <div class="offset-md-2"></div>
              
              <!-- Center Banner-->
              <div class="col-md-8">
                   <?php dynamic_sidebar( 'sidebar-2' ); ?>
              </div>
              
              <div class="offset-md-2"></div>
              
          </div>
          <!-- End The Upper section -->
          
          <!-- Start The NavBar -->
          <nav class="navbar navbar-expand-lg navbar-dark">
              
              <a class="navbar-brand" href="#"></a> <!-- Brand of The Website -->
              
              <!--Start Button Tag OF NavBar In Mobile -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  
                <span class="navbar-toggler-icon"></span>
                  
              </button>
              <!--End Button Tag OF NavBar In Mobile -->
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php   // Get All Links From Dashboard
                        wp_nav_menu( array(
                            'theme_location' => 'Primary',
                            'container' => 'ul',
                            'menu_class'=> 'navbar-nav mr-auto' ,
                            'depth' => 2 ,
                            'walker'            => new WP_Bootstrap_Navwalker()
                         ) );
                  
                        // ADD Search Form In Navigation Bar
                        My_Search_Form(); ?>
                
              </div>
              
            </nav>
          <!-- End The NavBar -->
      </header>
     <!-- End Header -->
     <!-- Start Side Banner --> 
     <div class="SideBanner">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
     </div>
     <!-- End Side Banner --> 