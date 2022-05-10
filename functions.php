<?php
/**
 * @author : Martti Syber
 */

/**
 * 
 * Implement the core functions
 * 
 */
require trailingslashit( get_template_directory() ) . 'inc/funnycoon-core.php';

/**
 * 
 * Implement the option functions
 * 
 */
require trailingslashit( get_template_directory() ) . 'inc/funnycoon-options.php';
 

/**
 * 
 * Implement the customizer functions
 * 
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/funnycoon-customizer.php';