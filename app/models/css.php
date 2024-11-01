<?php 
echo '
<style>
  .grid figcaption {
    background-color: '.get_option("swgpreviewBackgroundColor").' !important;
  }
  .grid figcaption a {
    text-align: '.get_option('swgpBtnTextAlign').';
    padding: 5px 10px;
    border-radius: 2px;
    display: inline-block;
    font-size:'.get_option('swgpBtnFontSize').';
    background: '.get_option('swgpBtnBackgroundColor').';
    color: '.get_option('swgpBtnFontColor').';
  }
  .swg-name {
    color:'.get_option("swgpreviewBackgroundColor").' !important;
  }
  .swg-btn-settings {
    background-color:'.get_option("swgpreviewBackgroundColor").' !important;
    color:'.get_option("swgPreviewTextFontColor").' !important;
  }
  .swg-btn-settings-contrast {
    background-color:'.get_option("swgpBtnBackgroundColor").' !important;
    color:'.get_option("swgpBtnFontColor").' !important;
  }

  .swgPreviewTitleSpan, #swgp-title {
   color:'.get_option("swgPreviewTextFontColor").' !important; 
  }
</style>
';