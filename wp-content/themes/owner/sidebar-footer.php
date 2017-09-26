<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package Mystery Themes
 * @subpackage Owner
 * @since 1.0.0
 */
?>

<?php
/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
 
if( !is_active_sidebar( 'owner_footer_sidebar' ) &&
	!is_active_sidebar( 'owner_footer_sidebar-2' ) &&
    !is_active_sidebar( 'owner_footer_sidebar-3' ) &&
    !is_active_sidebar( 'owner_footer_sidebar-4' ) ) {
	   return;
}
$owner_footer_layout = get_theme_mod( 'footer_widget_layout', 'column_three' );
?>
<div id="top-footer" class="footer-widgets-wrapper footer_<?php echo esc_attr( $owner_footer_layout ); ?> clearfix">
    <div class="mt-container">
        <div class="footer-widgets-area clearfix">
            <div class="mt-footer-widget-wrapper mt-column-wrapper clearfix">
          		<div class="owner-footer-widget wow fadeInLeft" data-wow-duration="0.5s">
          			<?php
              			if ( !dynamic_sidebar( 'owner_footer_sidebar' ) ):
              			endif;
          			?>
          		</div>
      		    <?php if( $owner_footer_layout != 'column_one' ){ ?>
                <div class="owner-footer-widget wow fadeInLeft" data-woww-duration="1s">
          		<?php
          			if ( !dynamic_sidebar( 'owner_footer_sidebar-2' ) ):
          			endif;
          		?>
          		</div>
                <?php } ?>
                <?php if( $owner_footer_layout == 'column_three' || $owner_footer_layout == 'column_four' ){ ?>
                <div class="owner-footer-widget wow fadeInLeft" data-wow-duration="1.5s">
                <?php
                    if ( !dynamic_sidebar( 'owner_footer_sidebar-3' ) ):
                    endif;
                ?>
                </div>
                <?php } ?>
                <?php if( $owner_footer_layout == 'column_four' ){ ?>
                <div class="owner-footer-widget wow fadeInLeft" data-wow-duration="2s">
                <?php
                    if ( !dynamic_sidebar( 'owner_footer_sidebar-4' ) ):
                    endif;
                ?>
                </div>
            <?php } ?>
            </div><!-- .mt-footer-widget-wrapper -->
        </div><!-- .footer-widgets-area -->
    </div><!-- .mt-container -->
</div><!-- .footer-widgets-wrapper -->