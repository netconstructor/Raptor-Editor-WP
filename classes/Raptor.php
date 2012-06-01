<?php

class Raptor {

    public $raptorQueued = false;

    public function addRaptor() {
        if (!$this->raptorQueued) {

            // JavaScript
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-widget');
            wp_enqueue_script('jquery-ui-button');
            wp_enqueue_script('jquery-ui-dialog');
            wp_enqueue_script('jquery-ui-position');

            wp_enqueue_script('raptor', plugins_url('raptor/javascript/raptor.js'), 'jquery-ui', '0.0.3', true);

            // Theme
            wp_register_style('jquery-ui-smoothness', "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/smoothness/jquery-ui.css", false, '1.8.16');
            wp_enqueue_style('jquery-ui-smoothness');

            wp_register_style('jquery-raptor-theme', plugins_url('raptor/css/raptor-theme.css'), false, '0.0.3');
            wp_enqueue_style('jquery-raptor-theme');
        }
        $this->raptorQueued = true;
    }

    public function addAdminPostJs() {
        $this->addRaptor();
        wp_enqueue_script('raptor-admin-init', plugins_url('raptor/javascript/raptor-admin-init.js'), false, '1.0.0', true);
    }

    public function addAdminQuickPressJs() {
        $this->addRaptor();
        wp_enqueue_script('raptor-admin-quick-post-init', plugins_url('raptor/javascript/raptor-admin-quick-post-init.js'), false, '1.0.0', true);
    }

    public function addInPlacePostJs() {
        $this->addRaptor();
        wp_enqueue_script('raptor-in-place-init', plugins_url('raptor/javascript/raptor-in-place-init.js'), false, '1.0.0', true);
        wp_localize_script('raptor-in-place-init', 'raptorInPlaceSave',
                array(
                    'url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce(RaptorSave::SAVE_POSTS_NONCE),
                    'action' => RaptorSave::SAVE_POSTS,
                ));
    }

    public function addCommentsJs() {
        $this->addRaptor();
        wp_enqueue_script('raptor-comments', plugins_url('raptor/javascript/raptor-comments-init.js'), false, '1.0.0', true);
        wp_localize_script('raptor-comments', 'raptorCommentsSave',
                array(
                    'url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('myajax_nonce_val'),
                    'action' => RaptorSave::SAVE_COMMENTS,
                ));
    }

    /**
     * Remove tiny mce
     */
    public function removeNativeEditors() {
        wp_deregister_script('tiny_mce');
        wp_deregister_script('quicktags');
    }

    /**
     * Enclose posts that the author is allowed to edit with a div targeted by the editor
     * @param  {String} $value The post content to be wrapped
     * @return {String} The wrapped content, or the unmodified content if the author isn't allowed to edit this post
     */
    public function encloseEditablePosts($content) {
        global $post;

        if(current_user_can('edit_post', $post->ID)) {
            $content = "<div class='raptor-editable-post' data-post_id='{$post->ID}'>{$content}</div>";
        }

        return $content;
    }

}
