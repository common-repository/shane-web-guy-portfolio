<?php get_header();
include  PLUGIN_PATH . "/app/models/variables.php";
$p = new SWG_Portfolio();
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$imgUrl = wp_get_attachment_url( get_post_thumbnail_id());
$catList = get_the_terms( $post->ID, 'swg_cats');
$tags = $p->split_tags(get_post_meta($post->ID, 'swg_info_keywords', true));
$link = get_post_meta($post->ID, 'swg_info_url', true);
$nf = get_post_meta($post->ID, 'swg_info_no_follow', true);
?>
<div class="container swgpContainer fadeInUp animated">
<div class="section group">
	<div class="col span_5_of_12  span_xs_12_of_12">
		<?php if($imgUrl != ""): ?>
			<img src="<?php echo $imgUrl; ?>" alt="<?php echo $post->post_title; ?>" class="img-responsive  swg-single-img img-center">	
		<?php else: ?>
			<img src="<?php echo PLUGIN_URL . 'public/img/placeholder.png'; ?>" alt="<?php echo $post->post_title; ?>" class="img-responsive swg-single-img img-center">	
		<?php endif; ?>
	</div>
	<div class="col span_5_of_12 span_xs_12_of_12">
		<div class="swgp-content">
			<h1 class="swgp-title"><?php echo $post->post_title; ?></h1>
			<?php if(!empty($catList)) :?>
				<h4 class="swgp-headings"><strong><i class="fa fa-folder-open"></i> Category:</strong> 
					<?php  foreach ($catList as $cat) :?>
						&nbsp;<a class="label label-success"><?php echo $cat->slug; ?></a>	
					<?php endforeach; ?>
				</h4>
			<?php endif; ?>
			<hr>
			<div>
				<?php echo $post->post_content; ?>	
			</div>
			
			<?php if($link != ""): ?>
					<hr>
					<a href="<?php echo $link; ?>" <?php echo $nf == 1 ?  'rel="nofollow"' : ''; ?> class="swgp-btn" <?php echo $p->parseStyles($btnLg);?> target="_blank"><i class="fa fa-sitemap"></i> Visit Site</a> 
			<?php endif; ?>
			<?php
			 if($tags[0] != "") :?>
			<h4 class="swgp-headings"><strong><i class="fa fa-hashtag"></i> Project Tags:</strong>
			<?php  foreach ($tags as $tag) :?>
				&nbsp;<span class="label label-warning"><?php echo $tag; ?></span>	
			<?php endforeach; ?>
			 </h4>	
			<?php endif; ?>
		</div>
	</div>
</div>
</div>
<?php get_footer();?>