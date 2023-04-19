<?php if(!defined('ABSPATH')) exit; // exit if not defined

function flexysign_year_shortcode($params) {
    return date('Y');
}
add_shortcode('year', 'flexysign_year_shortcode');