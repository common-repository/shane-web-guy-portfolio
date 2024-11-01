<?php 

 $p = new SWG_Portfolio;
 $model = new SWG_PORTFOLIOMODEL;
 $model->set_defaults(); 
 
 if(isset($_POST['swgp_update'])){ 
    $model->update_data($_POST);
  } 

include  PLUGIN_PATH . "/app/models/variables.php";

?>
<div class="wrap">
  <div id="icon-options-general" class="icon32"></div>
  <h1><?php esc_attr_e( 'General Settings', 'wp_admin_style' ); ?></h1>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <!-- main content -->
      <div id="post-body-content">
        <div class="meta-box-sortables ui-sortable">
          <div class="postbox" style="border:transparent;"> 
            <div class="inside">
                <div id="tabs-1">
                    <?php include PLUGIN_PATH . 'app/views/admin/form.php'; ?>
                </div>
              <!-- post-body-content -->
            </div>
            <!-- .inside -->
          </div>
          <!-- .postbox -->
        </div>
        <!-- .meta-box-sortables .ui-sortable -->
      </div>
      <!-- post-body-content -->
     
      <!-- sidebar -->
      <div id="postbox-container-1" class="postbox-container">
        <div class="meta-box-sortables">
          <div class="postbox">
            <div class="inside">
                <div id="AdminSideBarPreview">
                    <div  id="swgpreview" <?php echo $p->parseStyles($swgPreviewBoxStyles);?> >
                  <p class="swgPreviewTitle" <?php echo $p->parseStyles($swgPreviewTitle);?>> 
                      <span id="swgPreviewTextTitleLabel" class="swgPreviewTitleSpan"  <?php echo $p->parseStyles($swgPreviewTitleSpan);?>>
                       <?php echo get_option('swgPreviewTextTitleLabel'); ?>:
                      </span> 
                      <span id="swgp-title">Project Name</span>
                      <br />
                    <span id="swgPreviewTextTagLabel" class="swgPreviewTitleSpan" <?php echo $p->parseStyles($swgPreviewTitleSpan);?>>
                        <?php echo get_option('swgPreviewTextTagLabel'); ?>:
                    </span>
                    <span class="swgPreviewTitleSpan" id="swgp-type">
                        Tag 1, Tag2, Tag3
                    </span>
                  
                  <img id="swgp-img-url" class="img-responsive img-center swg-portfolio-image"  alt="preview site" src="<?php echo get_option('swgp_upload_image'); ?>">
                    <span id="swgPreviewTextDescriptionLabel" class="swgPreviewTitleSpan" <?php echo $p->parseStyles($swgPreviewTitleSpan);?>>
                         <?php echo get_option('swgPreviewTextDescriptionLabel'); ?>: Project Description here...
                    </span>
                     <br>
                     <span id="swgp-content"  class="swgPreviewTitleSpan" <?php echo $p->parseStyles($swgPreviewTitleSpan);?>></span>
                  </p>
                  <p class="swgpreviefont">
                    <a id="swgModal" class="swgp-btn" href="#" target="_blank" <?php echo $p->parseStyles($swgpreviewButtonStyles);?>>
                      <span id="swgpBtnTitle"> <?php echo get_option('swgpBtnTitle'); ?></span>
                    </a>
                  </p>
               </div>
            </div>
            <!-- .inside -->
          </div>
          <!-- .postbox -->
        </div>
        <!-- .meta-box-sortables -->
      </div>
      <!-- #postbox-container-1 .postbox-container -->
    </div>
    <!-- #post-body .metabox-holder .columns-2 -->
    <br class="clear">
  </div>
  <!-- #poststuff -->
</div> <!-- .wrap -->
