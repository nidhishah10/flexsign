<?php if(!defined('ABSPATH')) exit; // exit if not defined
/**
 * Template name: Home Page
 * Description : This template is used to display the contents in home page layout
 */

get_header();

if(have_posts()) {
    // Include content file to diplay the contents
    get_template_part('page-content/content', 'home');
} 

get_footer();