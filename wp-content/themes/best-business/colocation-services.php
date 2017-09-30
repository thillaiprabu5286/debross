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
$the_query = new WP_Query($args);
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

        We are Providing colocation services in which a business can rent Server , space and other computing hardware
        With a capacity of 3MVA, our primary datacentre is situated within an energy efficient enterprise grade ,250 sq.
        ft tier III facility which provides best in class colocation, network connectivity and disaster recovery hub for
        each of our clients.

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
                            <button class="btn btn-lg btn-default" id="myBtn-<?php the_title(); ?>">Get Started With
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
                <div id="myModal-<?php the_title(); ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <?php echo do_shortcode("[contact-form-7 id=\"606\" title=\"Colocation Packages\"]"); ?>
                    </div>

                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById('myModal-<?php the_title(); ?>');

                    // Get the button that opens the modal
                    var btn = document.getElementById('myBtn-<?php the_title(); ?>');

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName('close');

                    // When the user clicks on the button, open the modal
                    btn.onclick = function () {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function () {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            &nbsp;

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
