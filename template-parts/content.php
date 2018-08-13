<?php // Template part for displaying posts

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="container">
        <header class="entry-header">
            <?php
            if ( is_singular() ) :

                the_title( '<h1 class="entry-title">', '</h1>' );

            else :

                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            endif;

            if ( 'post' === get_post_type() ) : 
            ?>
            <div class="entry-meta">

                <i class="fa fa-calendar"></i><?php the_date('d-m-Y', ' ', ', '); ?>

                <i class="fa fa-user"></i> <?php the_author(); ?> 

            </div><!-- .entry-meta -->

            <?php
            endif; ?>

        </header><!-- .entry-header -->

        <?php the_post_thumbnail(); ?>

        <div class="entry-content">
            <?php
                the_content();
            ?>
        </div><!-- .entry-content -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->