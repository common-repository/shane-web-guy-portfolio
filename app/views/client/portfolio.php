<?php 
/* 
* @app/controller.php
*/
$p = new SWG_Portfolio();
$count = 0;
$category = $p->get_category_list();
$portfolios = json_decode($p->get_portfolios());
include  PLUGIN_PATH . "/app/models/variables.php";
include  PLUGIN_PATH . "/app/models/css.php";
?>
<div id="mainPortfolio" style="margin-top:15px;">
<div id="filters" class="section group">
  <div class="col span_1_of_12">
    <div class="prevNextContainer">
      <a class="prev" href="javascript:void(0)">
          <img class="" src="<?php echo PLUGIN_URL; ?>/public/img/arrow-left.png" alt="">
        </a>
    </div>
  </div>
   <div class="col span_10_of_12">
   <div id="swgp-demo" class="swgp-carousel">
          <?php foreach ($category as $c):
            $cat_img = get_tax_meta($c->term_id, 'swgp_category_image');
              if($cat_img == ""){
                $cat_img['url'] = PLUGIN_URL . 'public/img/placeholder_thumb.jpg'; 
              }?>
               <div class="item">
                    <a href="javascript:void(0)" data-filter="<?php echo '.'.$c->slug; ?>">
                      <img src="<?php echo $cat_img['url']; ?>" alt="" class="swgp-img-item img-responsive img-center hvr-float-shadow grayscale" >
                      <span class="text-center swg-name"><?php echo $c->name; ?></span>
                    </a> 
               </div>
          <?php endforeach; ?>
        </div>
  </div>
   <div class="col span_1_of_12">
    <div class="prevNextContainer">
      <a class="prev" href="javascript:void(0)">
          <img class="" src="<?php echo PLUGIN_URL; ?>/public/img/arrow-right.png" alt="">
        </a>
    </div>
  </div>
  <p><button id="swgp-btnClick" class="swgp-btn swgp-btn-lg swgp-btn-settings-contrast" <?php echo $p->parseStyles($btnLg);?> data-filter="*">
      <i class="fa fa-sitemap"></i> View All</button>
    </p>
</div>
<div class="section group">
     <div  id="sortBy" class="swgp-btn-group" data-toggle="buttons">
        <button class="swgp-btn swgp-btn-settings-contrast" disabled><i class="fa fa-list"></i> Sort By:</button>
        <a  data-sort-by="name" data-sort-title="Project Title " data-order="false" class="swgp-btn  swgp-btn-settings" <?php echo $p->parseStyles($btns);?>><i class="fa fa-angle-down"></i>   Project Title</a>
        <a  data-sort-by="date" data-sort-title="Project Date " data-order="false" class="swgp-btn  swgp-btn-settings" <?php echo $p->parseStyles($btns);?>><i class="fa fa-angle-down"></i>   Project Date</a>
    </div>
  <div class="space"><p>&nbsp;</p></div>
</div>
<div class="section group">
<div id="swgpreviewContainer" class="col span_3_of_12 span_xs_3_of_12">
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
             <?php echo get_option('swgPreviewTextDescriptionLabel'); ?>:
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
</div><!--swgpreviewContainer-->
  <div id="portfolioGridContainer" class="col span_9_of_12 span_xs_5_of_12">
      <div id="loader" style='display:block; padding-top:25px; margin-top:15px;'></div>
      <div id="portfolio" class="section group"></div>
  </div><!--portfolio-->
</div>
</div><!--mainPortfolio-->
