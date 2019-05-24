<?php
/**
 * @name  ASB Example Modules
 * @copyright 2011-2019 Mark Vincent
 *
 * this is an example of the an Advanced Sidebox add-on using XMLHTTP
 */

// disallow direct access
if (!defined('IN_MYBB') ||
	!defined('IN_ASB')) {
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

/**
 * provide info to ASB about the addon
 *
 * @return array the module info
 */
function asb_ajax_example_info()
{
	global $lang;

	if (!$lang->asb_addon) {
		$lang->load('asb_addon');
	}

	return array(
		'title' => 'AJAX/XMLHTTP Example',
		'description' => 'This module shows how to enable AJAX Refresh for an ASB module',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' => '2',
		'compatibility' => '4.0',

		// required
		'xmlhttp' => true,
	);
}

/**
 * handles display of children of this addon at page load
 *
 * @param  array the specific information from the child box
 * @return bool true on success, false on fail/no content
 */
function asb_ajax_example_get_content()
{
	$this_time = my_date('h:i:s', TIME_NOW);

	return <<<EOF
		<div class="trow1">Current time: {$this_time}</div>
EOF;
}

?>
