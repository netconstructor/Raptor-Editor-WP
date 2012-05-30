<?php

class Raptor {

    public $raptorQueued = false;

    public function addRaptorJs() {
        if (!$this->raptorQueued) {
            wp_enqueue_script('jquery-raptor', plugins_url('raptor/javascript/jquery-raptor.js'), false, '1.0.0', true);
        }
        $this->raptorQueued = true;
    }

    public function addAdminPostJs() {
        $this->addRaptorJs();
        wp_enqueue_script('jquery-raptor-admin-init', plugins_url('raptor/javascript/jquery-raptor-admin-init.js'), false, '1.0.0', true);
    }

    public function addInPlacePostJs() {
        $this->addRaptorJs();
        wp_enqueue_script('jquery-raptor-in-place-init', plugins_url('raptor/javascript/jquery-raptor-in-place-init.js'), false, '1.0.0', true);
    }

    public function addPostIdField($content) {
        global $post;
        return "<div data-post_id='{$post->ID}'>{$content}</div>";
    }

    // public function updateUserOptions() {
    //     global $current_user;
    //     update_user_option($current_user->id, 'rich_editing', 'false', true);
    // }

    /**
     * Remove tiny mce
     */
    public function removeNativeEditors() {
        wp_deregister_script('tiny_mce');
        wp_deregister_script('quicktags');
    }

    /**
     * @return boolean True if the user can edit any currently visible posts
     */
    function user_can_edit_visible_posts() {
        // @todo check if the logged in user can edit any currently visible posts
        return is_user_logged_in();
    }

    /**
     * @return boolean True if the visitor is able to comment on current page
     */
    function user_can_comment() {
        // @todo check if comments are enabled on this page & if so whether current visitor is elegible to comment
        return is_single();
    }

    /**
     * Insert Raptor Editor JavaScript
     */
    function raptor_enable() {
        $enableEditor = user_can_edit_visible_posts() || user_can_comment();
        if (!$enableEditor) {
            return;
        }

        wp_enqueue_script('jquery-raptor', plugins_url('raptor/javascript/jquery-raptor.js'), false, '1.0.0', true);

        // Enable comments on single pages
        if (is_single()) {
            wp_enqueue_script('jquery-raptor-comments', plugins_url('raptor/javascript/jquery-raptor-comments-init.js'), false, '1.0.0', true);
        }

        // Enable editor on posts relevant to current user

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

}
