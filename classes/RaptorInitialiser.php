<?php

/**
 * @class Handles bootstrapping basic actions
 */
class RaptorInitialiser {

    /**
     * @var Raptor The raptor object handles inclusion of raptor editor scripts
     */
    public $raptor = null;

    /**
     * @var RaptorSave The raptor save object handles post saving
     */
    public $save = null;

    /**
     * Add plugins_loaded action
     */
    public function __construct() {
        add_action('plugins_loaded', array(&$this, 'initialise'));
    }

    /**
     * Add admin actions if applicable, otherwise add in place editing actions
     */
    public function initialise() {

        $this->raptor = new Raptor();

        if(RaptorStates::admin()){

            // Admin page
            $this->admin = new RaptorAdmin();
            add_action('admin_menu', array(&$this->admin, 'setupMenu'));
            add_action('admin_init', array(&$this->admin, 'registerSettings'));

            // add_filter('plugin_action_links_wp-raptor', array(&$this->admin, 'pluginLinks') );

            // Post editing
            if (RaptorAdmin::raptorizeQuickpress() || RaptorAdmin::raptorizeAdminEditing()){
                add_action('admin_print_scripts', array(&$this->raptor, 'removeNativeEditors'));
                if (RaptorAdmin::raptorizeQuickpress()) {
                    add_action('admin_print_scripts', array(&$this->raptor, 'addAdminQuickPressJs'));
                }
                if (RaptorAdmin::raptorizeAdminEditing()) {
                    add_action('admin_print_scripts', array(&$this->raptor, 'addAdminPostJs'));
                }
            }
        }

        if (RaptorStates::adminViewingPosts() && RaptorAdmin::allowInPlaceEditing()) {
            add_filter('the_content', array(&$this->raptor, 'encloseEditablePosts'));
            add_action('wp_print_scripts', array(&$this->raptor, 'addInPlacePostJs'));

            $this->save = new RaptorSave();
            add_action('wp_ajax_'.RaptorSave::SAVE_POSTS, array(&$this->save, 'savePosts'));
        }

        // add_action('wp_ajax_nopriv_my'.RaptorSave::SAVE_POSTS, array(&$this->save, 'savePosts'));
        // add_action('wp_ajax_my'.RaptorSave::SAVE_COMMENTS, array(&$this->save, 'saveComments'));
    }
}
