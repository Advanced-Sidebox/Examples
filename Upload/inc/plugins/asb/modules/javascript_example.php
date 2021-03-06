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
function asb_javascript_example_info()
{
	return array(
		'title' => 'Javascript Example',
		'description' => 'An illustration of using external JavaScript in an ASB module',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' => '2',
		'compatibility' => '4.0',
		'scripts' => array(
			'javascript_example',
		),
	);
}

/**
 * handles display of children of this addon at page load
 *
 * @param  array info from child box
 * @return bool success/fail
 */
function asb_javascript_example_get_content()
{
	// return true if your box has something to show, or false if it doesn't.
	return <<<EOF
		<div class="trow1">
			<a href="javascript:ASB.modules.javascript_example.myMethod()">Click me!</a>
		</div>
EOF;
}

?>
