<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Best_Business
 *
 * Template Name: colocation-services
 */

get_header(); ?>
<?php
$args = array('post_type' => 'colocation', 'posts_per_page' => 30);
$the_query = new WP_Query(array(
    'post_type' => $args,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
) );

global $post;
?>
<script src="<?php echo get_template_directory_uri() . '/js/jquery-1.12.4.js'; ?>"></script>
<!--<script src="<?php // echo get_template_directory_uri() . '/js/jquery-ui.js'; ?>"></script>-->
<script>
    $(function () {
        $("#tabs").tabs();
    });
</script>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile; else: ?>
            <p>Sorry, no content to display.</p>
        <?php endif; ?>

        <div class="row">
        <div class="col-sm-1 hidden-xs"></div>
        <div id="tabs" class="col-sm-10 packages-wrap">
            <ul>
                <h1>CHOOSE YOUR COLOCATION SOLUTION</h1>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) :
                        $the_query->the_post(); ?>
                        <li><a href="#<?php echo $post_slug=$post->post_name; ?>">
                                <i class="fa fa-server" aria-hidden="true"></i>
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </ul>


            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) :
                $the_query->the_post(); ?>

                <div id="<?php echo $post_slug=$post->post_name; ?>">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 detail-left">
                            <?php
                            $custom_fields = get_post_custom($post->ID);
                            $i = 0;
                            foreach ($custom_fields as $field_key => $field_values) {
                                if ($i == 8) break;
                                if (!isset($field_values[0])) continue;
                                if (in_array($field_key, array("Big Title", "Specs", "Price", "_edit_lock", "_edit_last", "_thumbnail_id"))) continue;
                                echo "<h5>$field_key:</h5> <pre>$field_values[0]</pre>";
                                $i++;
                            }
                            ?>
                        </div>

                        <div class="col-md-8 col-sm-12 detail-right">
                            <h2><?php echo get_post_meta($post->ID, "Big Title", true); ?></h2>
                            <?php echo get_the_post_thumbnail($page->ID); ?>
                            <ul class="list-inline specs">
                                <?php $specs_field = get_post_meta($post->ID); ?>
                                <?php $my_custom_field = $specs_field['Specs']; ?>
                                <?php foreach ($my_custom_field as $key => $value) { ?>
                                    <li>
                                        <pre><?php echo $value ?></pre>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="package-price">
                                <h3>
                                    <small>From:</small> AED <?php echo get_post_meta($post->ID, "Price", true); ?> P/m
                                </h3>
                            </div>
                            <button class="btn btn-lg btn-default" id="myBtn-<?php echo $post_slug=$post->post_name; ?>">Get Started With
                                This
                                Package
                            </button>
                            <button class="btn btn-lg btn-warning"
                                    onclick="location.href='<?php echo get_site_url() . '/contact-us'; ?>'">Contact Us
                                to
                                Get More Details
                            </button>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div id="myModal-<?php echo $post_slug=$post->post_name; ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close close-<?php echo $post_slug=$post->post_name; ?>">&times;</span>
                        <h2 class="form-signin-heading">Let's get your service configured</h2>
                        So, it looks like you selected the <strong><?php the_title(); ?> services</strong>.
                        To get started please leave your detail here and one of our representative will contact you soon to discuss further.
                        <hr />
                        <?php echo do_shortcode("[contact-form-7 id=\"606\" title=\"Colocation Packages\"]"); ?>
                    </div>

                </div>
                <script>

                    // When the user clicks on the button, open the modal
                    jQuery('#myBtn-<?php echo $post_slug=$post->post_name; ?>').click(function () {
                        jQuery('#myModal-<?php echo $post_slug=$post->post_name; ?>').css('display', 'block');
                    });

                    // When the user clicks on <span> (x), close the modal
                    jQuery('.close-<?php echo $post_slug=$post->post_name; ?>').click(function () {
                        jQuery('#myModal-<?php echo $post_slug=$post->post_name; ?>').css('display', 'none');
                    });

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            jQuery('#myModal-<?php echo $post_slug=$post->post_name; ?>').click(function () {
                                jQuery('#myModal-<?php echo $post_slug=$post->post_name; ?>').css('display', 'none');
                            });
                        }
                    }
                </script>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-sm-1 hidden-xs"></div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
/**
 * Hook - best_business_action_sidebar.
 *
 * @hooked: best_business_add_sidebar - 10
 */
do_action('best_business_action_sidebar');
?>

<?php get_footer(); ?>
