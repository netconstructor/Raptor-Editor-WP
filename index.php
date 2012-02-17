<?php 
/*
Plugin Name: jQuery Raptor
Plugin URI: http://jqueryui-raptor.com/
Description: The only WYSIWYG editor worth your time.
Version: 1.0
Author: PANmedia
Author URI: http://panmedia.co.nz/
*/  

define('RAPTOR_AJAX_ROOT', plugins_url('save.php', __FILE__));

add_filter('wp', 'raptor_enable');
add_filter('the_content', 'raptor_enclose_post_content');

/**
 * Insert jQuery Raptor JavaScript
 */
function raptor_enable() {
    if(is_user_logged_in()){
        wp_enqueue_script('jquery-raptor', plugins_url('javascript/jquery-raptor.js', __FILE__), '1.0.0', true);
        wp_enqueue_script('jquery-raptor-init', plugins_url('javascript/jquery-raptor-init.js.php', __FILE__), array(), '1.0.0', true);
    }
}

/**
 * Enclose posts that the author is allowed to edit with a div targeted by the editor
 * @param  {String} $value The post content to be wrapped
 * @return {String} The wrapped content, or the unmodified content if the author isn't allowed to edit this post
 */
function raptor_enclose_post_content($value) {
    global $post;
    if(current_user_can('edit_post', $post->ID)){
        $value = "<div class='raptor-editable-content' name='{$post->ID}'>{$value}</div>";
    }
    return $value;
}