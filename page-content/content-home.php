<?php if (!defined('ABSPATH')) {
	exit;
}
// exit if not defined
/**
 * This page contains the sections to display in home page template
 */
$heading = get_field("what_we_do_heading");
$description = get_field("what_we_do_description");
$works = get_field("our_works");
if ($heading || $description || $works): ?>

<div class="about-sec" id="wat-we-doen">
<div class="wrap">
<div class="title title-info">
<?php if ($heading): ?>
<h2><?php echo $heading; ?></h2>
<?php endif;?>
<?php echo $description; ?>
</div>
<?php if ($works): ?>
<div class="about-work-row">
<?php foreach ($works as $work):
	if ($work['title'] || $work['description']): ?>
			<div class="work-info-block">
			<?php if ($work['image']): ?>
			<figure>
			<?php
	$image = $work['image'];
	$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
	if ($image) {
		echo wp_get_attachment_image($image, $size);
	}
	?>
			<img src="<?php echo $work['image']; ?>" alt="<?php echo $work['title']; ?>">
			</figure>
			<?php endif;?>
<div class="about-desc">
<i class="<?php echo $work['icon']; ?>"></i>
<?php if ($work['title']): ?>
<h3><?php echo $work['title']; ?></h3>
<?php endif;?>
</div>
<div class="about-content">
<a href="#" class="close"><i class="icon-close"></i></a>
<div class="content-head">
<i class="<?php echo $work['icon']; ?>"></i>
<?php if ($work['title']): ?>
<h3><?php echo $work['title']; ?></h3>
<?php endif;?>
</div>
<?php echo $work['description']; ?>
</div>
</div>
<?php endif;endforeach;?>
</div>
<?php endif;?>
</div><!--/.wrap-->
</div><!--/.about-sec-->
<?php endif;?>

<?php

$heading = get_field("materials_heading");
$description = get_field("materials_description");
$materials = get_terms(array(
	'taxonomy' => 'project_material',
	'hide_empty' => false,
));
if ($heading || $description):
?>
<div class="material-sec" id="materialen">
<div class="wrap">
<div class="title title-info">
<?php if ($heading): ?>
<h2><?php echo $heading; ?></h2>
<?php endif;?>
<?php echo $description; ?>
</div>
<?php if ($materials): ?>
<div class="material-inner">
<div class="material-row">
<?php foreach ($materials as $material):
	$image = get_field("feature_image", $material);
	$description = get_field("description", $material);
	?>
			<div class="mtr-details">
			<?php if ($image): ?>
			<?php
	$image = $image;
	$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
	if ($image) {
		echo wp_get_attachment_image($image, $size);
	}
	?>
			<figure><img src="<?php echo $image; ?>" alt="<?php echo $material->name; ?>"></figure>
			<?php endif;?>
<h6><?php echo $material->name; ?></h6>
<div class="mtr-info">
<a href="#" class="close"><i class="icon-close"></i></a>
<?php if ($image): ?>
<?php
$image = $image;
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
if ($image) {
	echo wp_get_attachment_image($image, $size);
}
?>
<figure><img src="<?php echo $image; ?>" alt="<?php echo $material->name; ?>"></figure>
<?php endif;?>
<h6><?php echo $material->name; ?></h6>
<p><?php echo $material->description; ?></p>
</div>
</div>
<?php endforeach;?>
</div><!--/.material-row-->
<div class="see-more">
<a href="#"><i class="icon-arrow-down"></i></a>
</div>
</div>
<?php endif;?>
</div><!--/.wrap-->
</div><!--/.material-sec-->
<?php endif;?>

<?php
$title = get_field("about_title");
$heading = get_field("about_heading");
$description = get_field("about_description");
$image = get_field('about_image');
$background = get_field("about_background_image");
$style = $background ? 'style="background-image:url(' . $background . ')"' : null;
if ($title || $heading || $description || $image):
?>
<div class="over-on-sec" id="over-ons">
<?php if ($title): ?>
<h1 class="main-title"><?php echo $title; ?></h1>
<?php endif;?>
<div class="over-inner" <?php echo $style; ?>>
<div class="wrap">
<div class="over-info-row">
<div class="over-desc">
<?php if ($heading): ?>
<h2><?php echo $heading; ?></h2>
<?php endif;?>
<?php echo $description; ?>
</div>
<?php if ($image): ?>
<div class="over-fig">
<figure><img src="<?php echo $image; ?>" alt="<?php basename($image);?>"></figure>
</div>
<?php endif;?>
</div>
</div><!--/.wrap-->
</div>
</div><!--/.over-on-sec-->
<?php endif;?>

<?php
$heading = get_field("project_heading");
$description = get_field("project_description");
$background_image = get_field("background_image");
$projects = get_field("projects");
if ($heading || $description || $projects): ?>
<div class="project-sec" id="projecten" <?php echo $background_image ? 'style="background-image: url(' . $background_image . ');"' : null; ?>>
<div class="wrap">
<div class="title title-info">
<?php if ($heading): ?>
<h2><?php echo $heading; ?></h2>
<?php endif;?>
<?php echo $description; ?>
</div>
<?php if ($projects): ?>
<div class="project-inner-row owl-carousel project-main-slide">
<?php foreach ($projects as $projectID):
	$images = get_field('gallery', $projectID) ? get_field('gallery', $projectID) : null;
	$title = get_the_title($projectID);
	$excerpt = get_the_excerpt($projectID);
	$permalink = get_the_permalink($projectID);
	?>
			<div class="item">
			<div class="prj-detail-block">
			<?php if ($images): ?>
			<div class="prj-fig">
			<div class="owl-carousel prj-img-slide">
			<?php foreach ($images as $image): ?>
			<div class="item">
			<figure>
			<img src="<?php echo $image; ?>" alt="<?php basename($image);?>">
			</figure>
			</div>
			<?php endforeach;?>
</div>
</div>
<?php endif;?>

<?php if ($title): ?>
<h5><?php echo $title; ?></h5>
<?php endif;?>
<p>
<?php echo $excerpt; ?>
</p>
<a href="<?php echo $permalink; ?>" class="read-more readmore-trigger"><?php _e("Lees meer", 'flexysign');?> <i class="icon-arrow-right"></i></a>

</div>
</div>
<?php endforeach;?>
</div>
<?php endif;?>
</div><!--/.wrap-->
</div><!--/.project-sec-->
<?php endif;?>

<?php
$heading = get_field("contact_heading");
$description = get_field("contact_description");
$form_shortcode = get_field("contact_form_shortcode");
$address_heading = get_field("address_heading");
$contact_details = get_field("contact_details");
$map_link = get_field("contact_map_link");
$map = get_field("contact_map_iframe");
$background = get_field("contact_background_image");
$style = $background ? 'style="background-image:url(' . $background . ')"' : null;
if ($heading || $form_shortcode):
?>
<div class="contact-sec" id="contact" <?php echo $style; ?>>
<div class="wrap">
<div class="contact-inner">
<div class="title title-info">
<?php if ($heading): ?>
<h2><?php echo $heading; ?></h2>
<?php endif;?>
<?php echo $description; ?>
</div>
<div class="contact-info-row">
<div class="contact-form">
<?php echo do_shortcode($form_shortcode); ?>
</div>
<div class="contact-location">
<?php if ($contact_details):
	foreach ($contact_details as $index => $contact): ?>
			<div class="contact-place">
			<?php if ($index == 0 && $address_heading): ?>
			<h6><?php echo $address_heading; ?></h6>
			<?php endif;?>
<ul>
<?php if ($contact['contact_address']): ?>
<li>
<?php if ($contact['contact_map_link']): ?>
<a href="<?php echo $contact['contact_map_link']; ?>" target="_blank"><address><?php echo $contact['contact_address']; ?></address></a>
<?php else: ?>
<?php echo $contact['contact_address']; ?>
<?php endif;?>
</li>
<?php endif;?>
<?php if ($contact['contact_phone']): ?>
<li>
<a target="_blank" href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $contact['contact_phone']); ?>"><?php echo $contact['phone_before_text'] . $contact['contact_phone']; ?></a>
</li>
<?php endif;?>
<?php if ($contact['contact_email']): ?>
<li>
<a target="_blank" href="mailto:<?php echo $contact['contact_email']; ?>"><?php echo $contact['email_before_text'] . $contact['contact_email']; ?></a>
</li>
<?php endif;?>
</ul>
</div>
<?php endforeach;
endif;?>
<?php if ($address2 || $phone2 || $email2): ?>
<div class="contact-place">
<ul>
<?php if ($address2): ?>
<li>
<?php echo $address2; ?>
</li>
<?php endif;?>
<?php if ($phone2): ?>
<li>
<a target="_blank" href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $phone2); ?>"><?php echo __('M: ', 'flexysign') . $phone2; ?></a>
</li>
<?php endif;?>
<?php if ($email2): ?>
<li>
<a target="_blank" href="mailto:<?php echo $email2; ?>"><?php echo $email2; ?></a>
</li>
<?php endif;?>
</ul>
</div>
<?php endif;?>
<?php if ($map): ?>
<div class="map-block">
<?php echo $map; ?>
</div>
<?php endif;?>
</div>
</div>
</div>
</div><!--/.wrap-->
</div><!--/.contact-sec-->
<?php endif;?>