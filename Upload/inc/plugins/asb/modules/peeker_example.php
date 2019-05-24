<?php
/**
 * @name  ASB Example Modules
 * @copyright 2011-2019 Mark Vincent
 *
 * this module demonstrates using the built-in ACP Peeker JavaScript
 * object to hide/show setting(s) based on the value of another setting
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
function asb_peeker_example_info()
{
	return array	(
		'title' => 'Setting Peeker Example',
		'description' => 'This module demonstrates using the built-in ACP Peeker JavaScript object to hide/show setting(s) based on the value of another setting',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' => '1.0.1',
		'compatibility' => '4.0',
		'settings' => array(
			'first_setting' => array(
				'name' => 'first_setting',
				'title' => 'First Setting',
				'description' => 'set this setting to YES to view the next setting or NO (default) to hide it',
				'optionscode' => 'yesno',
				'value' => '0',
			),
			'second_setting' => array(
				'name' => 'second_setting',
				'title' => 'Second Setting',
				'description' => 'this setting will only display when the above setting is set to YES but the module may still use its value',
				'optionscode' => 'text',
				'value' => 'some text',
			),
		),
	);
}

/**
 * handles display of children of this addon at page load
 *
 * @param  array information from child box
 * @return bool success/fail
 */
function asb_peeker_example_get_content()
{
	return <<<EOF
		<div class="trow1">This box does nothing in the way of demonstration on the forum side. It only demonstrates a feature in the ACP.</div>
EOF;
}

/**
 * used to output custom content/scripts just after the settings are displayed
 * and just before the modal finished loading
 *
 * @return void
 */
function asb_peeker_example_settings_load()
{
	echo <<<EOF

	<script type="text/javascript">
	new Peeker($('.setting_first_setting'), $('#setting_second_setting'), /1/, true);
	</script>
EOF;
}

?>
