<?php
/**
 * @name  ASB Example Modules
 * @copyright 2011-2019 Mark Vincent
 *
 * this is the simplest possible addon module, it does nothing that
 * can't be done with a static custom box
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
function asb_simple_example_info()
{
	return array	(
		'title' => 'Simple Example',
		'description' => 'This is the simplest possible addon module, it does nothing that can\'t be done with a static custom box.',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' => '2',
		'compatibility' => '4.0',
	);
}

/**
 * handles display of children of this addon at page load
 *
 * @param  array info from child box
 * @return bool success/fail
 */
function asb_simple_example_get_content()
{
	return <<<EOF
		<div class="trow1">Sample content</div>
EOF;
}

?>
