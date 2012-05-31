<?php

class RaptorInitialiser {

    public $raptor = null;

    public function __construct() {

        $this->raptor = new Raptor();

        add_action('plugins_loaded', array(&$this, 'initialise'));
    }

    public function initialise() {

        // add_filter('wp_print_scripts', array(&$raptor, 'raptorEnable'));

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
