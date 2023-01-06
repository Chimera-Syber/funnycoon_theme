<?php
/**
 * The searchform.php template
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */

$funnycoon_unique_id = wp_unique_id('search-form-');

$funnycoon_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';

if ($args['aria_label'] === 'header_search_form') {
?>
<form role="search" <?php echo $funnycoon_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="header_2_search_form" action="<?php echo esc_url( home_url('/') ); ?>">
    <input type="search" id="<?php echo esc_attr( $funnycoon_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'funnycoon' ); ?>" />
</form>
<?php }
    elseif ($args['aria_label'] === 'search_page_search_form') {
?>
    <form role="search" <?php echo $funnycoon_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="header_2_search_form" action="<?php echo esc_url( home_url('/') ); ?>">
    <label for="<?php echo esc_attr( $funnycoon_unique_id ); ?>">
        <?php _e( 'Search&hellip;', 'funnycoon' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
    <input type="search" id="<?php echo esc_attr( $funnycoon_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'funnycoon' ); ?>" />
</form>
<?php
}


