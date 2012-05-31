<?php
/*
Plugin Name: Raptor Editor
Plugin URI: http://raptor-editor.com/wordpress/
Description: The only WYSIWYG editor worth your time.
Version: 1.0
Author: Michael Robinson, PANmedia
Author URI: http://pagesofinterest.net/, http://panmedia.co.nz/
*/

include __DIR__.'/classes/Raptor.php';
include __DIR__.'/classes/RaptorStates.php';
include __DIR__.'/classes/RaptorInitialiser.php';

$raptor = new RaptorInitialiser();
