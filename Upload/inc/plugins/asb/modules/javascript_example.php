<?php
/**
 * @name  ASB Example Modules
 * @copyright  2011-2014 WildcardSearch
 *
 * this is an example of the an Advanced Sidebox add-on using a
 * simple text setting to control content
 */

// disallow direct access
if(!defined('IN_MYBB') || !defined('IN_ASB'))
{
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

/*
 * asb_javascript_example_info()
 *
 * provide info to ASB about the addon
 *
 * @return: (array) the module info
 */
function asb_javascript_example_info()
{
	return array(
		"title" => 'Javascript Example',
		"description" => 'An illustration of using external JavaScript in an ASB module',
		"wrap_content" => true,
		"version" => '1',
		"compatibility" => '2.1',
		"scripts" => array(
			'javascript_example',
		),
	);
}

/*
 * asb_javascript_example_build_template()
 *
 * handles display of children of this addon at page load
 *
 * @param - $args - (array) the specific information from the child box
 * @return: (bool) true on success, false on fail/no content
 */
function asb_javascript_example_build_template($args)
{
	extract($args);

	global $$template_var;

	$$template_var = <<<EOF
		<tr>
					<td class="trow1">
						<a href="javascript:ASB.modules.javascript_example.myMethod()">Click me!</a>
					</td>
				</tr>
EOF;

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

?>
