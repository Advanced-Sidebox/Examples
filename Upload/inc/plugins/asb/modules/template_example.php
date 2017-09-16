<?php
/**
 * @name  ASB Example Modules
 * @copyright  2011-2014 WildcardSearch
 *
 * this is an example of the an ASB add-on using a MyBB standard
 * template to eval() content
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
function asb_template_example_info()
{
	return array(
		"title" => 'Template Example',
		"description" => 'This is a simple example of using a template with an ASB module',
		"module_site" => 'https://github.com/Advanced-Sidebox/Examples',
		"wrap_content" => true,
		"version" =>	'1.0.1',
		"compatibility" => '3',
		"templates" => array(
			array(
				"title" => 'asb_template_example',
				"template" => <<<EOF
				<tr>
					<td class="trow1">Image sized to side box column:</td>
				</tr>
				<tr>
					<td class="trow2">
						<img src="images/logo.png" alt="logo" title="example" width="{\$inner_width}px" style="margin: {\$margin}px;"/>
					</td>
				</tr>
EOF
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
function asb_template_example_build_template($args)
{
	extract($args);

	global $$template_var, $templates;

	// you can use the side box width to size HTML elements:
	$inner_width = (int) ($width * .79);
	$margin = (int) (($width - $inner_width) / 2);

	// then eval() the template variable with the template and you are done
	eval("\$" . $template_var . " = \"" . $templates->get('asb_template_example') . "\";");

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

?>
