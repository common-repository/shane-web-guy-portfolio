<?php 

/**
*  SWG_ORTFOLIOMODEL
*/
class SWG_PORTFOLIOMODEL {

	

	public function update_data($post){

		update_option('swgp_upload_image', $post['swgp_upload_image']); 
		update_option('swgpreviewBackgroundColor', $post['swgpreviewBackgroundColor']);
		update_option('swgpreviewPadding', $post['swgpreviewPadding']);
		update_option('swgp_follow', $post['swgp_follow']);
		#
		update_option('swgPreviewTextTitleLabel',$post['swgPreviewTextTitleLabel']);
		update_option('swgPreviewTextTagLabel',$post['swgPreviewTextTagLabel']);
		update_option('swgPreviewTextDescriptionLabel',$post['swgPreviewTextDescriptionLabel']);
		update_option('swgPreviewTextFontColor',$post['swgPreviewTextFontColor']);
		update_option('swgPreviewTextPadding',$post['swgPreviewTextPadding']);
		update_option('swgPreviewTextFontSize',$post['swgPreviewTextFontSize']);
		update_option('swgPreviewTextTitleAlign',$post['swgPreviewTextTitleAlign']);
		update_option('swgPreviewTextTitleWeight',$post['swgPreviewTextTitleWeight']);
		#
		update_option('swgpBtnTitle',$post['swgpBtnTitle']);
		update_option('swgpBtnFontColor',$post['swgpBtnFontColor']);
		update_option('swgpBtnFontSize',$post['swgpBtnFontSize']);
		update_option('swgpBtnTextAlign',$post['swgpBtnTextAlign']);
		update_option('swgpBtnBackgroundColor',$post['swgpBtnBackgroundColor']);
	}

	public function set_defaults(){
		$array = array(
			'swgp_upload_image' => PLUGIN_URL . '/public/img/portfoliopointer-250x300.jpg',
			'swgpreviewBackgroundColor' => '#000',
			'swgpreviewPadding' => '5px',
			'swgp_follow' => '1',
			'swgPreviewTextTitleLabel' => 'Title',
			'swgPreviewTextTagLabel' => 'Tags',
			'swgPreviewTextDescriptionLabel' => 'Description',
			'swgPreviewTextFontColor' => '#fff',
			'swgPreviewTextPadding' => '0',
			'swgPreviewTextFontSize' => '12px',
			'swgPreviewTextTitleAlign' => 'Left',
			'swgPreviewTextTitleWeight' => 'Normal',
			'swgpBtnTitle' => 'View Details',
			'swgpBtnFontColor' => '#fff',
			'swgpBtnFontSize' => '12px',
			'swgpBtnTextAlign' => 'Center',
			'swgpBtnBackgroundColor' => '#820101',
		);

		foreach ($array as $key => $value) {
			if(get_option($key) == ""){
				update_option($key,$value);	
			}
		} 			
	}

	public function is_defined($name){
		$var = get_option($name);
		if($var == ""){
			return false;
		}else{
			return true;
		}
	}
}