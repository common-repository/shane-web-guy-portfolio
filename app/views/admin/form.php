  <form action="" method="POST"  class="form-inline">
  <h2><strong><i class="fa fa-wrench"></i> Preview Image Settings</strong></h2>
  
  <input type="hidden" name="swgp_update" value="true" />
  <div class="form-group">
      <label><strong>Image Holder :</strong>
         <input class="form-control regular-text" data-target="#swgp-img-url" data-css-selector="background-url" id="upload_image" type="text"  size="36" name="swgp_upload_image" value="<?php echo get_option('swgp_upload_image'); ?>" />
         <input id="upload_image_button" type="button" value="Upload Image" class="btn btn-success" />  
      </label>
  </div>
  
  <div class="form-group">
    <div class="checkbox">
        <label><strong>Turn On Follow :</strong>
        <input type="checkbox" name="swgp_follow"  value="1" <?php if(get_option('swgp_follow') == 1){echo ' checked';} ?> > 
      </label>
    </div>
  </div>
   
  <div class="form-group">
    <label for="swgpreviewBackgroundColor"><strong>Background Color :</strong>
      <div data-target="#swgpreview" data-css-selector="background-color" class="input-group pick">
          <input type="text" value="<?php echo get_option('swgpreviewBackgroundColor'); ?><?php echo get_option('swgpreviewBackgroundColor'); ?>" name="swgpreviewBackgroundColor" placeholder="Pick a Color" class="form-control" />
          <span class="input-group-addon"><i></i></span>
      </div>
    </label>
  </div>
   
  <div class="form-group">
    <label><strong>Padding :</strong>
      <div class="input-group">
          <input data-target="#swgpreview" data-css-selector="padding" type="text" name="swgpreviewPadding" value="<?php echo get_option('swgpreviewPadding'); ?>" placeholder="5px default"/>
      </div>
    </label>
  </div>
  
  <h2><strong><i class="fa fa-wrench"></i> Title Settings</strong></h2>
  
 <div class="form-group">
    <label><strong>Title Label:</strong>
      <div class="input-group">
          <input data-target="#swgPreviewTextTitleLabel" data-css-selector="" data-text="true" type="text" name="swgPreviewTextTitleLabel" value="<?php echo get_option('swgPreviewTextTitleLabel'); ?>" placeholder="Title Label" />
      </div>
    </label>
  </div>
   <div class="form-group">
    <label><strong>Tag Label:</strong>
      <div class="input-group">
          <input data-target="#swgPreviewTextTagLabel" data-css-selector="" data-text="true" type="text" name="swgPreviewTextTagLabel" value="<?php echo get_option('swgPreviewTextTagLabel'); ?>" placeholder="Tag Label" />
      </div>
    </label>
  </div>
   <div class="form-group">
    <label><strong>Description Label:</strong>
      <div class="input-group">
          <input data-target="#swgPreviewTextDescriptionLabel" data-css-selector="" data-text="true" type="text" name="swgPreviewTextDescriptionLabel" value="<?php echo get_option('swgPreviewTextDescriptionLabel'); ?>" placeholder="Description Label" />
      </div>
    </label>
  </div>
  
  <br />
  
  <div class="form-group">
    <label><strong>Font Color :</strong>
      <div data-target=".swgPreviewTitle" data-css-selector="color"  class="input-group pick" >
          <input  type="text" value="<?php echo get_option('swgPreviewTextFontColor'); ?>" name="swgPreviewTextFontColor"  class="form-control" placeholder="#fff default" />
          <span class="input-group-addon"><i></i></span>
      </div>
    </label>
  </div>
  
  <div class="form-group">
    <label><strong>Font Size :</strong>
      <div class="input-group">
          <input data-target=".swgPreviewTitle" data-css-selector="font-size" type="text" name="swgPreviewTextFontSize" value="<?php echo get_option('swgPreviewTextFontSize'); ?>" placeholder="12px default" />
      </div>
    </label>
  </div>

  <div class="form-group">
    <label><strong>Padding :</strong>
      <div class="input-group">
          <input data-target=".swgPreviewTitle" data-css-selector="padding" type="text" name="swgPreviewTextPadding" value="<?php echo get_option('swgPreviewTextPadding'); ?>" placeholder="5px default" />
      </div>
    </label>
  </div>


   <div class="form-group">
    <label><strong>Title Bold :</strong>
      <select class="form-control" data-target=".swgPreviewTitleSpan" data-css-selector="font-weight" type="text" id="swgPreviewTextTitleWeight" name="swgPreviewTextTitleWeight" >
          <option value="Normal" <?php echo (get_option('swgPreviewTextTitleWeight') == "Normal" ) ?  "Selected" : "";?>>Normal</option>
          <option value="Bold" <?php echo (get_option('swgPreviewTextTitleWeight') == "Bold" ) ?  "Selected" : "";?>>Bold</option>
      </select>
    </label>
  </div>
  
  <div class="form-group">
    <label><strong>Text Align :</strong>
      <select class="form-control" type="text" id="swgPreviewTextTitleAlign" name="swgPreviewTextTitleAlign" data-target=".swgPreviewTitle" data-css-selector="text-align">
         <option value="Left" <?php echo (get_option('swgPreviewTextTitleAlign') == "Left" ) ?  "Selected" : "";?>>Left</option>
          <option value="Center" <?php echo (get_option('swgPreviewTextTitleAlign') == "Center" ) ? "Selected" : "";?>>Center</option>
          <option value="Right" <?php echo (get_option('swgPreviewTextTitleAlign') == "Right" ) ? "Selected" : "";?>>Right</option>
        </select>
    </label>
  </div>
  
  <h2><strong><i class="fa fa-wrench"></i> Button Settings</strong></h2>
  
   <div class="form-group">
    <label><strong>Button Title:</strong>
      <div class="input-group">
          <input data-target="#swgpBtnTitle" data-text="true" data-css-selector="" type="text" name="swgpBtnTitle" value="<?php echo get_option('swgpBtnTitle'); ?>" placeholder="Enter Title" />
      </div>
    </label>
  </div>
  <br />
  <div class="form-group">
    <label><strong>Background Color :</strong>
      <div class="input-group pick"  data-target=".swgp-btn" data-css-selector="background-color" data-text="false">
          <input type="text" value="<?php  echo get_option('swgpBtnBackgroundColor'); ?>" name="swgpBtnBackgroundColor"  placeholder="Pick a Color" class="form-control" />
          <span class="input-group-addon"><i></i></span>
      </div>
    </label>
  </div>
  
  <div class="form-group">
    <label><strong>Font Color :</strong>
      <div class="input-group pick" data-target=".swgp-btn" data-css-selector="color">
          <input type="text" value="<?php  echo get_option('swgpBtnFontColor'); ?>" name="swgpBtnFontColor"  data-text="false" placeholder="Pick a Color" class="form-control" />
          <span class="input-group-addon"><i></i></span>
      </div>
    </label>
  </div>
  
  <div class="form-group">
    <label><strong>Font Size :</strong>
      <div class="input-group">
          <input type="text" value='<?php echo get_option("swgpBtnFontSize"); ?>' name="swgpBtnFontSize" data-target=".swgp-btn" data-css-selector="font-size"  />
      </div>
    </label>
  </div>
  
  <div class="form-group">
    <label><strong>Text Align :</strong>
      <select class="form-control" type="text" id="swgpBtnTextAlign" name="swgpBtnTextAlign" data-target=".swgp-btn" data-css-selector="text-align">
          <option value="Left" <?php echo (get_option('swgpBtnTextAlign') == "Left" ) ?  "Selected" : "";?>>Left</option>
          <option value="Center" <?php echo (get_option('swgpBtnTextAlign') == "Center" ) ? "Selected" : "";?>>Center</option>
          <option value="Right" <?php echo (get_option('swgpBtnTextAlign') == "Right" ) ? "Selected" : "";?>>Right</option>
        </select>
    </label>
  </div>
  <br />
  <button type="submit" class="btn btn-primary">Save Changes</button>
</form>