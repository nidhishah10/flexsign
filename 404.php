<?php if(!defined('ABSPATH')) exit; // exit if not defined
/**
 * This template is used to show the 404 page
 * 
 * @package WordPress
 * @subpackage Flexysign
 * @since Flexysign 1.0
 */

get_header(); ?>

<div class="container">
    <div class="wrap">
        <div class="page-not-found">
            <h1><?php _e('404 Page not Found', 'flexysign'); ?></h1>
            <h3><?php _e("OOPS! We couldn't find were looking for", 'flexysign'); ?></h3>
            <p><?php _e("It Seems that you're lost. Let us help guide you out and get you back home", 'flexysign'); ?></p>
            <a href="<?php echo home_url('/'); ?>" class="button"> <?php _e("Home", 'flexysign'); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); //footer