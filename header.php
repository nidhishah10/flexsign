<?php if(!defined('ABSPATH')) exit; // exit if not defined ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="wrapper">
        <header id="header">
            <div class="wrap">
                <div class="header-row">
                    <a href="<?php echo home_url('/'); ?>" id="logo" title="<?php bloginfo('name'); ?>">
                    <?php $logo = get_field("flexysign_logo", "option");                     
                        if($logo) : ?>
                            <img src="<?php echo $logo; ?>" width="293" height="53" alt="<?php bloginfo('name'); ?>">
                        <?php else : ?>
                            <h4><?php bloginfo('name'); ?></h4>
                        <?php endif; ?>
                    </a>
                    <nav id="mainmenu">
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'container' => 'ul',
                                'menu_id' => 'mainmenu',
                            )
                        ); ?>                    
                    </nav>
                </div>
            </div><!--/.wrap-->
        </header><!--/#header-->

        <?php get_template_part('page-content/section', 'banner'); ?>

        <div id="main">
            <div id="primary" class="content-area one-column">
                <div id="content" class="site-content">