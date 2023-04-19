<?php if(!defined('ABSPATH')) exit; // exit if not defined

get_header();

if(have_posts()) : ?>
<div class="about-sec" style="padding-top:100px"> 
    <div class="wrap">
        <h2><?php the_title(); ?></h2>
        <?php while(have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</div>

<?php endif; 

get_footer();