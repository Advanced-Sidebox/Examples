<?php
/**
 * @name  ASB Example Modules
 * @copyright 2011-2019 Mark Vincent
 *
 * this is an example of the an Advanced Sidebox add-on using a
 * simple text setting to control content
 */

// disallow direct access
if (!defined('IN_MYBB') ||
	!defined('IN_ASB')) {
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

/**
 * provide info to ASB about the addon
 *
 * @return array module info
 */
function asb_setting_example_info()
{
	global $lang;

	if (!$lang->asb_addon) {
		$lang->load('asb_addon');
	}

	return array(
		'title' => 'Setting Example',
		'description' => 'This module illustrates using settings in ASB modules',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' => '2',
		'compatibility' => '4.0',
		'settings' => array(
			'announcement_text' => array(
				'name' => 'announcement_text',
				'title' => 'Announcement Text',
				'description' => 'the text entered here will be displayed in the side box',
				'optionscode' => 'text',
				'value' => '',
			),
		),
	);
}

/**
 * handles display of children of this addon at page load
 *
 * @param  array info from child box
 * @return bool success/fail
 */
function asb_setting_example_get_content($settings)
{
	global $lang;

	if (!$lang->asb_addon) {
		$lang->load('asb_addon');
	}

	if (!$settings['announcement_text']) {
		$settings['announcement_text'] = 'Enter text in the setting for this module in ACP to display it here';
	}

	// return true if your box has something to show, or false if it doesn't.
	return <<<EOF
		<div class="trow1">
			<span style="color: red; font-size: 1.4em; font-weight: bold;">{$settings['announcement_text']}</span>
		</div>
EOF;
}

?>
