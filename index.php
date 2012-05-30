<?php
/*
Plugin Name: Raptor Editor
Plugin URI: http://raptor-editor.com/wordpress/
Description: The only WYSIWYG editor worth your time.
Version: 1.0
Author: PANmedia
Author URI: http://panmedia.co.nz/
*/

include __DIR__.'/raptor.php';

$raptor = new Raptor();

define('RAPTOR_AJAX_ROOT', plugins_url('save.php', __FILE__));

// add_filter('wp_print_scripts', array(&$raptor, 'raptorEnable'));
// add_filter('the_content', 'raptor_enclose_post_content');

if(is_admin()){
    // add_action('personal_options_update', array(&$ckeditor_wordpress, 'updateUserOptions'));
    add_action('admin_print_scripts', array(&$raptor, 'addAdminPostJs'));
    add_action('admin_print_scripts', array(&$raptor, 'removeNativeEditors'));
}
if (true) {
    add_action('the_content', array(&$raptor, 'addPostIdField'));
    add_action('wp_print_scripts', array(&$raptor, 'addInPlacePostJs'));
}
