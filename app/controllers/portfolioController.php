<?php 
/**
* Main Class for SWG Portfolio
*/
class SWG_Portfolio  {
	
	public function __construct(){
		add_action( 'wp_ajax_nopriv_get_all_portfolio', array($this, 'get_all_portfolio'));
		add_action( 'wp_ajax_get_all_portfolio', array($this, 'get_all_portfolio'));
	}

	public function get_all_portfolio() {
		$get = $this->get_portfolios();
		echo $get;
		die();
	}

	public function split_tags($tags){
		$tags = explode(",", $tags);
		return $tags;
	}

	public function get_portfolios(){
		global $WP_Query;
		
		$args = array(
			'post_type'=> 'swgportfolio',
			'order'    => 'DESC',
			'posts_per_page' => -1
		);
		
		$array = array();
		query_posts( $args );
		// The Loop
		while ( have_posts() ) : the_post();
			$url = wp_get_attachment_url( get_post_thumbnail_id());
			if(!$url)
				$url = PLUGIN_URL . 'public/img/placeholder_thumb.jpg';
			$catList = get_the_terms( get_the_ID(), 'swg_cats');
			$post_thumbnail_id = get_post_thumbnail_id( $get_the_ID );
		    $array[] = array(
		    		'id' => get_the_ID(),
		    		'title' => get_the_title(),
		    		'image_id' =>  $post_thumbnail_id,
		    		'image_url' => $url,
		    		'description' => get_the_content(),
		    		'excerpt' => get_post_meta(get_the_ID(), 'swg_info_description' ,true),
		    		'project_url' => get_post_meta( get_the_ID(), 'swg_info_url' ,true),
		    		'project_tags' => get_post_meta( get_the_ID(), 'swg_info_keywords', true),
		    		'permalink' => get_the_permalink(),
		    		'categories' => $this->category_string($catList),
		    	);
		endwhile;
		wp_reset_query();
		return json_encode($array);
	}

	public function category_string($array){
		$catList = array();
		foreach ($array as $value) {
			$catList[] = $value->slug;
		}
		$comma_separated = implode(" ", $catList);
		return $comma_separated;
	}

	public function get_category_list(){
		$cat = get_terms('swg_cats');
		return $cat;
	}

	public function test(){
		return "This is a test";
	}

	public function get_terms($post){
		$terms = get_the_terms($post->ID, 'your_taxonomy_here' );
		if ($terms && ! is_wp_error($terms)) :
			$term_slugs_arr = array();
			foreach ($terms as $term) {
			    $term_slugs_arr[] = $term->slug;
			}
			$terms_slug_str = join( " ", $term_slugs_arr);
		endif;
		return $terms_slug_str;
	}

	public function parseStyles($styles){
	    if(empty($styles)) 
	      return "";
	    $string = 'style="';
	    foreach ($styles as $key => $value) {
	      $string .= $key.":".$value."; ";
	    }
	    $string .= '"';
	    return $string;
  }
}

$run = new SWG_Portfolio();