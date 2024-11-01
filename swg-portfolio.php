<?php 
/*
Plugin Name: Shane Web Guy Portfolio
Plugin URI: http://shanewebguy.com
Description: Customized Portfolio  Created with custom posts with quicksand integration and custom javascript. category thumbnails are 150x180, post featured images are set to 150x180px ratio or 1000x1213px. Use this ratio to preserve image aspect. Custom made from scratch by the coolest developer at www.shanewebguy.com
Version: 2.0.1
Author: Shane Clark
Author URI: http://shanewebguy.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
define(PLUGIN_PATH, plugin_dir_path( __FILE__ ));
define(PLUGIN_URL, plugins_url() . '/swg-portfolio/');
include 'app/models/portfolioModel.php';
include 'app/controllers/portfolioController.php';
include 'app/init.php';
include 'app/models/settings.php';
include 'app/models/metabox.php';