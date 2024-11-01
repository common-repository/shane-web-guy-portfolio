<?php
class SWG_Info_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'swg_portfolio_info', // Unique ID
			__( 'Project Information', 'text_domain' ),  // Title
			array( $this, 'render_metabox' ),  // Callback function
			'swgportfolio', // Admin page (or post type)
			'advanced', // Context
			'high' // Priority
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'swg_info_nonce_action', 'swg_info_nonce' );

		// Retrieve an existing value from the database.
		$swg_info_description = get_post_meta( $post->ID, 'swg_info_description', true );
		$swg_info_url = get_post_meta( $post->ID, 'swg_info_url', true );
		$swg_info_keywords = get_post_meta( $post->ID, 'swg_info_keywords', true );
		$swg_info_no_follow = get_post_meta($post->ID, 'swg_info_no_follow', true);
		// Set default values.
		if( empty( $swg_info_description ) ) $swg_info_description = '';
		if( empty( $swg_info_url ) ) $swg_info_url = '';
		if( empty( $swg_info_keywords ) ) $swg_info_keywords = '';
		if( empty( $swg_info_no_follow)) $swg_info_no_follow= '';
		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="swg_info_description" class="swg_info_description_label">' . __( 'Project Description', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="swg_info_description" name="swg_info_description" class="swg_info_description_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $swg_info_description ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="swg_info_url" class="swg_info_url_label">' . __( 'Project Url', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="swg_info_url" name="swg_info_url" class="swg_info_url_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $swg_info_url ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="swg_info_keywords" class="swg_info_keywords">' . __( 'Keywords', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="swg_info_keywords" name="swg_info_keywords" class="swg_info_keywords" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $swg_info_keywords ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="swg_info_no_follow" class="swg_info_no_follow_label">' . __( 'No Follow Link', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		if($swg_info_no_follow != 1){
			echo '<input type="checkbox" id="swg_info_no_follow" name="swg_info_no_follow" class="swg_info_no_follow"  value="1" >';
		}else{
			echo '<input type="checkbox" id="swg_info_no_follow" name="swg_info_no_follow" class="swg_info_no_follow"  value="1" checked >';
		}
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = $_POST['swg_info_nonce'];
		$nonce_action = 'swg_info_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$swg_info_description = isset( $_POST[ 'swg_info_description' ] ) ? sanitize_text_field( $_POST[ 'swg_info_description' ] ) : '';
		$swg_info_url = isset( $_POST[ 'swg_info_url' ] ) ? sanitize_text_field( $_POST[ 'swg_info_url' ] ) : '';
		$swg_info_keywords = isset( $_POST[ 'swg_info_keywords' ] ) ? sanitize_text_field( $_POST[ 'swg_info_keywords' ] ) : '';
		$swg_info_no_follow = isset( $_POST[ 'swg_info_no_follow' ] ) ? $_POST[ 'swg_info_no_follow' ] : '';
		
		// Update the meta field in the database.
		update_post_meta( $post_id, 'swg_info_description', $swg_info_description );
		update_post_meta( $post_id, 'swg_info_url', $swg_info_url );
		update_post_meta( $post_id, 'swg_info_keywords', $swg_info_keywords );
		update_post_meta( $post_id, 'swg_info_no_follow', $swg_info_no_follow );
		

	}

}

new SWG_Info_Meta_Box;