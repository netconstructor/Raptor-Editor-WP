<?php
class RaptorAdmin {

    const RAPTOR_SETTINGS = 'raptor-settings';
    const RAPTOR_USAGE_AREAS = 'raptor-usage-areas';
    const RAPTOR_SETTINGS_INDEX = 'raptor-settings-index';

    const INDEX_ALLOW_IN_PLACE_EDITING = 'index-allow-in-place-editing';
    const INDEX_RAPTORIZE_QUICKPRESS = 'index-raptorize-quickpress';
    const INDEX_RAPTORIZE_ADMIN_EDITING = 'index-raptorize-admin-editing';

    public static $options = null;

    public function setupMenu() {
        add_options_page('Raptor', 'Raptor Editor', 1, 'Raptor', array(&$this, 'adminIndex'));
    }

    public function registerSettings() {
        register_setting(self::RAPTOR_SETTINGS, 'Raptor Settings', array(&$this, 'validateIndexOptions'));
    }

    public function adminIndex() {
        wp_register_style('raptor-admin-styles', plugins_url('raptor/css/admin.css'), false, '0.0.3');
        wp_enqueue_style('raptor-admin-styles');

        $options = self::getOptions();
        include __DIR__.'/../views/admin/index.php';
    }

    public function saveOptions() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            update_option(self::RAPTOR_SETTINGS, $_POST);
        }
    }

    // Option getters
    public static function getOptions($key = null) {
        self::$options = get_option(self::RAPTOR_SETTINGS);
        if(!is_array(self::$options)) {
            self::$options = array(
                self::INDEX_ALLOW_IN_PLACE_EDITING => '1',
                self::INDEX_RAPTORIZE_QUICKPRESS => '0',
                self::INDEX_RAPTORIZE_ADMIN_EDITING => '1'
            );
            update_option(self::RAPTOR_SETTINGS, self::$options);
        }
        if (is_null($key)) {
            return self::$options;
        }
        return self::$options[$key];
    }

    public static function allowInPlaceEditing() {
        return self::getOptions(self::INDEX_ALLOW_IN_PLACE_EDITING);
    }

    public function raptorizeQuickpress() {
        return self::getOptions(self::INDEX_RAPTORIZE_QUICKPRESS);
    }

    public function raptorizeAdminEditing() {
        return self::getOptions(self::INDEX_RAPTORIZE_ADMIN_EDITING);
    }
}
