<?php 

  $swgPreviewBoxStyles = array(
    'background-color' => get_option('swgpreviewBackgroundColor'),
    'padding' => get_option('swgpreviewPadding'),
    'width' => '100%',
    'border-radius' => '3px',
  );
  
  $swgpreviewBoxTitleStyles = array(
    'color' => get_option('swgPreviewTextFontColor'),
    'font-weight' => get_option('swgPreviewTextFontWeight'),
    'font-size'   => get_option('swgPreviewTextFontSize'),
    'text-align' => get_option('swgPreviewTextTitleAlign'),
  );
  $swgPreviewTitle = array(
    'color' => get_option('swgPreviewTextFontColor'),
    'font-weight' => get_option('swgPreviewTextFontWeight'),
    'font-size'   => get_option('swgPreviewTextFontSize'),
    'text-align' => get_option('swgPreviewTextTitleAlign'),
    'padding'    => get_option('swgPreviewTextPadding'),
    'margin'      => '0',
    'text-indent' => 'inherit',
    'text-align'   => 'left',
    'line-height'  => '20px'
  );
  $swgPreviewTitleSpan = array(
    'font-weight' => get_option('swgPreviewTextTitleWeight'),
    'color' => get_option('swgPreviewTextFontColor'),
    'text-indent' => 'inherit'
  );
  
  $swgpreviewButtonStyles = array(
    'color' => get_option('swgpBtnFontColor'),
    'font-size' => get_option('swgpBtnFontSize'),
    'text-align' => get_option('swgpBtnTextAlign'),
    'background' => get_option('swgpBtnBackgroundColor'),
    'width' => '100%',
    'display' => 'block',
    'border-radius' => '0px',
    'border' => '0'
  );
  $btns = array(
    'color' => get_option('swgpBtnFontColor'),
    'background' => get_option('swgpBtnBackgroundColor'),
  );
    $btnLg = array(
    'color' => get_option('swgpBtnFontColor'),
    'background' => get_option('swgpBtnBackgroundColor'),
    'margin' => '0 auto',
    'display' => 'block',
    'padding' => '10px 20px'
  );
