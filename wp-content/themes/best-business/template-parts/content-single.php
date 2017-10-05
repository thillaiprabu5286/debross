<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Best_Business
 */

?>

<div class="row">
<div class="col-sm-9">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1><?php the_title(); ?></h1>
	<?php
	/**
	 * Hook - best_business_single_image.
	 *
	 * @hooked best_business_add_image_in_single_display - 10
	 */
	// do_action( 'best_business_single_image' );
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php best_business_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'best-business' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php best_business_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
</div>

<div class="col-sm-3 sidebar-category-list">

    <h3 class="title">Other Post</h3>
    <span class="divider-left"></span>
    <?php
    // the query
    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

    <?php if ( $wpb_all_query->have_posts() ) : ?>

        <ul class="list-inline">

            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
            <!-- end of the loop -->

        </ul>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</div>
</div>