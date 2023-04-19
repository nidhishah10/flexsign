<?php if(!defined('ABSPATH')) exit; // exit if not defined 

$footer_1 = get_field("footer_1_heading", "option");
$contact_details = get_field("contact_details", "option");
$footer_2 = get_field("footer_2_heading", "option");
$schedules = get_field("schedule_list", 'option');
$footer_3 = get_field("footer_3_heading", "option");
$instagram = get_field("instagram", "option");
$facebook = get_field("facebook", "option");
$linkedin = get_field("linked_in", "option");
$poweredby = get_field("poweredby", "option");
$poweredby_image = get_field("poweredby_image", "option");
$copyrights = get_field("copyrights", "option");
?>

                </div><!-- #content -->
            </div><!-- #primary -->
        </div><!-- #main -->
        <footer id="footer">
            <div class="footer-top">
                <div class="wrap">
                    <div class="footer-inner">
                        <div class="footer-top-row cols cols3">
                            <?php if($footer_1 || $contact_details) : ?>
                            <div class="col">
                                <div class="footer-info">
                                    <?php if($footer_1) : ?>
                                    <h4><?php echo $footer_1; ?></h4>
                                    <?php endif; ?>
                                    <?php if($contact_details) : 
                                        foreach($contact_details as $contact) : ?>
                                            <ul class="ftr-contact">
                                                <?php if($contact['address']) : ?>
                                                <li>                     
                                                    <?php if($contact['map_link']) : ?>
                                                        <a href="<?php echo $map_link ? $map_link : 'javascript:void(0);' ?>" target="_blank"><address><?php echo $contact['address']; ?></address></a>
                                                    <?php else : ?>
                                                        <?php echo $contact['address']; ?>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>
                                                <?php if($contact['phone']) : ?>
                                                <li>
                                                    <a target="_blank" href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $contact['phone']); ?>"><?php echo $contact['phone_before_text'].$contact['phone']; ?></a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if($contact['email']) : ?>
                                                <li>
                                                    <a target="_blank" href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email_before_text'].$contact['email']; ?></a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endforeach; 
                                    endif; ?>                                    
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($footer_2 || $schedule) : ?>
                            <div class="col">
                                <div class="footer-info">
                                    <?php if($footer_2) : ?>
                                    <h4><?php echo $footer_2; ?></h4>
                                    <?php endif; ?>
                                    <?php if($schedules) : ?>
                                    <ul class="timing-list">
                                        <?php foreach($schedules as $schedule) : 
                                            if($schedule['day'] || $schedule['time']) : ?>
                                            <li><?php echo $schedule['day']; ?><span><?php echo $schedule['time']; ?></span></li>
                                        <?php endif; endforeach; ?>                                    
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($footer_3 || $instagram || $facebook || $linkedin || $poweredby || $poweredby_image) : ?>
                            <div class="col">
                                <div class="footer-info">
                                    <?php if($footer_3) : ?>
                                    <h4><?php echo $footer_3; ?></h4>
                                    <?php endif; ?>
                                    <ul class="ftr-social">
                                        <?php if($instagram) : ?>
                                        <li>
                                            <a target="_blank" href="<?php echo $instagram; ?>"><i class="icon-instagram"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($facebook) : ?>
                                        <li>
                                            <a target="_blank" href="<?php echo $facebook; ?>" class="facebook"><i class="icon-facebook"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($linkedin) : ?>
                                        <li>
                                            <a target="_blank" href="<?php echo $linkedin; ?>"><i class="icon-linked-in"></i></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="power-by">
                                        <?php if($poweredby) : ?>
                                        <h4><?php echo $poweredby; ?></h4>
                                        <?php endif; ?>
                                        <?php if($poweredby_image) : ?>
                                        <figure><img src="<?php echo $poweredby_image; ?>" alt="<?php echo basename($poweredby_image); ?>"></figure>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div><!--/.footer-top -->                        
                </div>
            </div><!--/.wrap -->
            <div class="footer-bottom">
                <div class="wrap">
                    <div class="footer-bottom-row">
                        <?php if($copyrights) : ?>
                            <p class="copyright"><?php echo do_shortcode($copyrights); ?></p>
                        <?php endif; ?>
                        <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => "privacy",
                                "container" => 'ul',
                                "menu_class" => 'privacy-link',
                            )
                        );
                        ?>                        
                    </div>
                </div><!--/.wrap -->
            </div><!--/.footer-bottom -->
            
        </footer><!--/#footer -->
    </div><!-- #wrapper -->
</body>