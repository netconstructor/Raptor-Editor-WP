<?php
/*
Plugin Name: Raptor Editor
Plugin URI: http://raptor-editor.com/wordpress/
Description: Edit your content in style with Raptor Editor, this generation's WYSIWYG editor.
Version: 1.0
Author: Michael Robinson, PANmedia
Author URI: http://pagesofinterest.net/, http://panmedia.co.nz/
License: http://www.gnu.org/licenses/gpl.html
*/

include __DIR__.'/classes/Raptor.php';
include __DIR__.'/classes/RaptorStates.php';
include __DIR__.'/classes/RaptorSave.php';
include __DIR__.'/classes/RaptorAdmin.php';
include __DIR__.'/classes/RaptorInitialiser.php';

$raptor = new RaptorInitialiser();
