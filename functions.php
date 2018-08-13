<?php 
    function Task_Links(){
        
    /*********** Add All Styles By using wp_enqueue_style ***********/
        
        // Custom Style Sheet
        wp_enqueue_style('custom-style', get_stylesheet_uri() ); 
        
        // Bootstrap CSS File
        wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css'  ); 

    /********** Add All Scripts By using wp_enqueue_script **********/
        
        // Jquery Script File
        wp_enqueue_script('JqueryScript', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js' , array() , false , true); 
        
        // Popper Script File
        wp_enqueue_script('PopperScript', get_template_directory_uri() . '/assets/js/popper.min.js' , array() , false , true); 
        
        // Bootstrap Script File
        wp_enqueue_script('BootstrapScript', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array() , false , true);
        
        // FontAwsome Script File
        wp_enqueue_script('FontAwsomeScript', get_template_directory_uri() . '/assets/js/all.js' , array() , false , true); 
        
        // Custom Script File
        wp_enqueue_script('CustomScript', get_template_directory_uri() . '/assets/js/custom-js.js' ,array(),false,true); 

    }

    add_action( 'wp_enqueue_scripts', 'Task_Links' );


	function Task_Setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
        
		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
        
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		//Make Custom Navigation Bar By Using wp_nav_menu() in one location.
		register_nav_menus( array(
			'Primary' => esc_html__( 'Primary Navigation Bar', 'Task' ),
		) );
        
		//Switch default core markup for comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'Task_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
       
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

    add_action( 'after_setup_theme', 'Task_Setup' );

    //Function To Add Custom Search Form 
    function My_Search_Form(){ ?>

        <form role="search" method="get" class="form-inline my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>">
            
            <input type="search" class="search-field search"
                placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            
          <button class="btn search-submit" type="submit"><i class="fas fa-search"></i></button>
            
        </form>
    <?php
    }

    /****************** Start Register Widgets Area ********************/

   function Task_widgets_init() {
       
       // The SideBar
        register_sidebar( array(
            'name'          => esc_html__( 'SideBar', 'Task' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'Task' ),
            'before_widget' => '',
            'after_widget'  => '',
        ) );
       
       // The Banner Above The Navigation Bar In The Header
        register_sidebar( array(
            'name'          => esc_html__( 'Banner Above Navigation Bar', 'Task' ),
            'id'            => 'sidebar-2',
            'description'   => esc_html__( 'Add widgets here.', 'Task' ),
            'before_widget' => '',
            'after_widget'  => '',
        ) );
       
           // The Square Banner Next To The 3 Main Posts
        register_sidebar( array(
            'name'          => esc_html__( 'The Square Banner Next To The 3 Main Posts', 'Task' ),
            'id'            => 'sidebar-3',
            'description'   => esc_html__( 'Add widgets here.', 'Task' ),
            'before_widget' => '',
            'after_widget'  => '',
        ) );
       
           // The Side Banner In The Left
        register_sidebar( array(
            'name'          => esc_html__( 'The Side Banner In The Left', 'Task' ),
            'id'            => 'sidebar-4',
            'description'   => esc_html__( 'Add widgets here.', 'Task' ),
            'before_widget' => '',
            'after_widget'  => '',
        ) );
       
    }
    add_action( 'widgets_init', 'Task_widgets_init' );

    /****************** End Register Widgets Area ********************/


    //Function To Detect Post Views Count And Store It as a Custom Field For Each Post
    function count_post_views($postID) {
        
        $count_key = 'wpb_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        
        if($count==''){
            
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            
        }else{
            
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
    //To keep the count accurate, lets get rid of prefetching
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

    function add_custom_meta_box()
    {
        add_meta_box("demo-meta-box", "Post Appear and Type", "custom_meta_box", "post", "side", "high", null);
    }

    add_action("add_meta_boxes", "add_custom_meta_box");

   
    // Function To Add Custom Meta Box In Posts
    function custom_meta_box($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>
        <div class="MetaHeader"><p><b>Appear Post</b></p>
            <div>

                <label for="Main_Posts">Main Posts</label>
                <?php
                    /*------- Add CheckBox To Appear The Post In Main Posts Area --------*/
                    $Main_value = get_post_meta($object->ID, "Main_Posts", true);

                    if($Main_value == "")
                    {
                        ?>
                            <input name="Main_Posts" type="checkbox" value="main">
                        <?php
                    }
                    else if($Main_value == "main")
                    {
                        ?>  
                            <input name="Main_Posts" type="checkbox" value="main" checked>
                        <?php
                    }
                ?>
            </div>

            <div>

                <label for="Features_Posts">Features Posts</label>
                <?php
                    /*------- Add CheckBox To Appear The Post In Feature Posts Area --------*/
                    $Feature_value = get_post_meta($object->ID, "Features_Posts", true);

                    if($Feature_value == "")
                    {
                        ?>
                            <input name="Features_Posts" type="checkbox" value="feature">
                        <?php
                    }
                    else if($Feature_value == "feature")
                    {
                        ?>  
                            <input name="Features_Posts" type="checkbox" value="feature" checked>
                        <?php
                    }
                ?>
            </div>
            <p><b>Type Of Post</b></p>
            <div>

                <label for="Local_Posts">Local Posts</label>
                <?php
                    /*------- Add CheckBox To Check If The Type Of The Post Is Local --------*/
                    $Local_value = get_post_meta($object->ID, "Local_Posts", true);

                    if($Local_value == "")
                    {
                        ?>
                            <input name="Local_Posts" type="checkbox" value="local">
                        <?php
                    }
                    else if($Local_value == "local")
                    {
                        ?>  
                            <input name="Local_Posts" type="checkbox" value="local" checked>
                        <?php
                    }
                ?>
              </div>

            <div>

                <label for="World_Posts">World Posts</label>
                <?php
                    /*------- Add CheckBox To Check If The Type Of The Post Is World --------*/
                    $World_value = get_post_meta($object->ID, "World_Posts", true);
        
                    if($World_value == "")
                    {
                        ?>
                            <input name="World_Posts" type="checkbox" value="world">
                        <?php
                    }
                    else if($World_value == "world")
                    {
                        ?>  
                            <input name="World_Posts" type="checkbox" value="world" checked>
                        <?php
                    }
                ?>
            </div>
         </div>
        <?php  
    } 
    // Save The Values Of The MetaBox
    function save_custom_meta_box($post_id, $post, $update)
    {
        if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
            return $post_id;

        if(!current_user_can("edit_post", $post_id))
            return $post_id;

        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;

        $slug = "post";
        if($slug != $post->post_type)
            return $post_id;
        
        $Main_checkbox_value = ""; //Empty Variable To Save Main Posts Meta In It
        $Feature_checkbox_value = ""; //Empty Variable To Save Feature Posts Meta In It
        $Local_checkbox_value = ""; //Empty Variable To Save Local Posts Meta In It
        $World_checkbox_value = ""; //Empty Variable To Save World Posts Meta In It


        if(isset($_POST["Main_Posts"]))
        {
            $Main_checkbox_value = $_POST["Main_Posts"];
        }  
        //Update The Value Of Main Posts Meta Box
        update_post_meta($post_id, "Main_Posts", $Main_checkbox_value);
        
        
        if(isset($_POST["Features_Posts"]))
        {
            $Feature_checkbox_value = $_POST["Features_Posts"];
        }  
        //Update The Value Of Feature Posts Meta Box
        update_post_meta($post_id, "Features_Posts", $Feature_checkbox_value);
        
        
        if(isset($_POST["Local_Posts"]))
        {
            $Local_checkbox_value = $_POST["Local_Posts"];
            
        }  
        //Update The Value Of Local Posts Meta Box
        update_post_meta($post_id, "Local_Posts", $Local_checkbox_value);
        
        
        if(isset($_POST["World_Posts"]))
        {
            $World_checkbox_value = $_POST["World_Posts"];
            
        }   
        //Update The Value Of World Posts Meta Box
        update_post_meta($post_id, "World_Posts", $World_checkbox_value);
        
    }

    add_action("save_post", "save_custom_meta_box", 10, 3);

    require_once('class-wp-bootstrap-navwalker.php');

?>