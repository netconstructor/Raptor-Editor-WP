<?php

class RaptorInitialiser {

    public $raptor = null;
    public $save = null;

    public function __construct() {

        $this->raptor = new Raptor();
        $this->save = new RaptorSave();

        add_action('plugins_loaded', array(&$this, 'initialise'));
        add_action('wp_ajax_my'.RaptorSave::SAVE_POSTS, array(&$this->save, 'savePosts'));
        add_action('wp_ajax_my'.RaptorSave::SAVE_COMMENTS, array(&$this->save, 'saveComments'));
    }

    public function initialise() {
        if(RaptorStates::adminEditingPostOnBackend()){
            add_action('admin_print_scripts', array(&$this->raptor, 'addAdminPostJs'));
            add_action('admin_print_scripts', array(&$this->raptor, 'removeNativeEditors'));
        }

        if (RaptorStates::adminViewingPosts()) {
            add_filter('the_content', array(&$this->raptor, 'encloseEditablePosts'));
            add_action('wp_print_scripts', array(&$this->raptor, 'addInPlacePostJs'));
        }
    }
}
