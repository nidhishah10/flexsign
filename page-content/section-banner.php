<?php if(!defined('ABSPATH')) exit; // exit if not defined 

$banner_video = get_field("banner_video");
if($banner_video) : ?>

<div class="home-banner-sec vid">
    <video autoplay muted loop>
        <source src="<?php echo $banner_video['url']; ?>" type="<?php echo $banner_video['mimetype']; ?>">
    </video>
</div>

<?php endif; ?>