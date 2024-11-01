<?php 

require (PLUGIN_PATH ."/lib/Tax-meta-class/Tax-meta-class.php");

$config = array(
    "id" => "swg_meta_box",
    "title" => "Category Image",
    "pages" => array('swg_cats'),
    "context" => "normal",
    "fields" => array(),
    "local_images" => false,
    "use_with_theme" => false
);

/*
* Initiate Taxonomy
*/

$meta = new Tax_Meta_Class($config);

$meta->addImage('swgp_category_image', array('name' => "Category Image"));

$meta->Finish();