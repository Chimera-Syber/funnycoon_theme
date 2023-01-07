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
    
    <input type="search" id="<?php echo esc_attr( $funnycoon_unique_id ); ?>" class="header_search_input" value="<?php echo get_search_query(); ?>" name="s">

	<button type="submit" class="header_search_button">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.6415 19.1354L17.6013 15.3021C19.1696 13.4317 19.9291 11.0576 19.7236 8.66801C19.5181 6.27843 18.3633 4.05497 16.4965 2.45483C14.6298 0.854686 12.193 -0.000518389 9.68734 0.0650654C7.18165 0.130649 4.79745 1.11204 3.02499 2.80743C1.25253 4.50283 0.226533 6.78337 0.157968 9.18012C0.0894031 11.5769 0.98348 13.9077 2.65636 15.6932C4.32924 17.4788 6.65376 18.5834 9.15196 18.78C11.6502 18.9766 14.1321 18.2501 16.0876 16.75L20.0951 20.5833C20.1964 20.681 20.3168 20.7585 20.4495 20.8113C20.5822 20.8642 20.7246 20.8914 20.8683 20.8914C21.0121 20.8914 21.1545 20.8642 21.2872 20.8113C21.4199 20.7585 21.5403 20.681 21.6415 20.5833C21.8378 20.3891 21.9476 20.1295 21.9476 19.8594C21.9476 19.5892 21.8378 19.3296 21.6415 19.1354V19.1354ZM9.9782 16.75C8.47049 16.75 6.99664 16.3223 5.74302 15.5211C4.48941 14.7199 3.51234 13.5811 2.93536 12.2487C2.35839 10.9163 2.20742 9.45024 2.50156 8.03579C2.7957 6.62135 3.52173 5.3221 4.58784 4.30234C5.65396 3.28258 7.01226 2.58812 8.491 2.30677C9.96974 2.02542 11.5025 2.16981 12.8954 2.7217C14.2884 3.27359 15.4789 4.20818 16.3166 5.40729C17.1542 6.6064 17.6013 8.01617 17.6013 9.45833C17.6013 11.3922 16.7982 13.2469 15.3685 14.6143C13.9389 15.9818 12 16.75 9.9782 16.75V16.75Z" fill="white"/>
        </svg>
    </button>
</form>
<?php }
    elseif ($args['aria_label'] === 'search_page_search_form') {
?>
    <form role="search" <?php echo $funnycoon_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="archive_search_form" action="<?php echo esc_url( home_url('/') ); ?>">
        <input type="search" id="<?php echo esc_attr( $funnycoon_unique_id ); ?>" class="archive_search_input" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="archive_search_button">
            <svg width="20" height="22" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.6415 19.1354L17.6013 15.3021C19.1696 13.4317 19.9291 11.0576 19.7236 8.66801C19.5181 6.27843 18.3633 4.05497 16.4965 2.45483C14.6298 0.854686 12.193 -0.000518389 9.68734 0.0650654C7.18165 0.130649 4.79745 1.11204 3.02499 2.80743C1.25253 4.50283 0.226533 6.78337 0.157968 9.18012C0.0894031 11.5769 0.98348 13.9077 2.65636 15.6932C4.32924 17.4788 6.65376 18.5834 9.15196 18.78C11.6502 18.9766 14.1321 18.2501 16.0876 16.75L20.0951 20.5833C20.1964 20.681 20.3168 20.7585 20.4495 20.8113C20.5822 20.8642 20.7246 20.8914 20.8683 20.8914C21.0121 20.8914 21.1545 20.8642 21.2872 20.8113C21.4199 20.7585 21.5403 20.681 21.6415 20.5833C21.8378 20.3891 21.9476 20.1295 21.9476 19.8594C21.9476 19.5892 21.8378 19.3296 21.6415 19.1354V19.1354ZM9.9782 16.75C8.47049 16.75 6.99664 16.3223 5.74302 15.5211C4.48941 14.7199 3.51234 13.5811 2.93536 12.2487C2.35839 10.9163 2.20742 9.45024 2.50156 8.03579C2.7957 6.62135 3.52173 5.3221 4.58784 4.30234C5.65396 3.28258 7.01226 2.58812 8.491 2.30677C9.96974 2.02542 11.5025 2.16981 12.8954 2.7217C14.2884 3.27359 15.4789 4.20818 16.3166 5.40729C17.1542 6.6064 17.6013 8.01617 17.6013 9.45833C17.6013 11.3922 16.7982 13.2469 15.3685 14.6143C13.9389 15.9818 12 16.75 9.9782 16.75V16.75Z" fill="white"/>
            </svg>
        </button>
</form>
<?php
}


