<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<body>
<div id="wrapper">
<div style="line-height: 0;"><img src="<?php print get_stylesheet_directory_uri() ; ?>/img/top-purp.gif" alt="" /></div>
<div style="background:url('<?php print get_stylesheet_directory_uri() ; ?>/img/bg-purp.gif') repeat-y">

<?php get_sidebar('left'); ?>

<div id="main"><div>
    <img src="<?php print get_stylesheet_directory_uri() ; ?>/img/logo.gif" alt="Families For Families  Standing Strong against domestic violence" /><br/>
    
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content', get_post_format() );

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                'next_text'          => __( 'Next page', 'twentyfifteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->


</div></div>
<?php get_sidebar('right'); ?>




<br clear="all" />
<div id="mission"> 
    <p><em>Families for Families believes all people deserve to live free from the repercussions of domestic violence. Through raising public awareness, advocacy, and direct support to survivors, Families for Families aims to helping women and children rebuild their lives after violence, while instilling an ethic of service in our youth.</p>
    <p>Families for Families is a 501(c)3 non-profit registered with the State of Ohio. We gratefully accept your tax-deductible contribution (facilitated through PayPal).</em></p>
</div>
<br clear="all" />

</div><!-- end div id="background" -->
<div style="background:url(<?php print get_stylesheet_directory_uri() ; ?>/img/btm-purp.gif) no-repeat; height:15px"></div>
</div><!-- end div id="wrapper" -->


<br clear="all" />
<div id="footer">
    <p>&copy; 2009 Families For Families. All rights reserved.</p>
</div><!-- end div id="footer" -->
<?php wp_footer(); ?>
</body></html>
    
