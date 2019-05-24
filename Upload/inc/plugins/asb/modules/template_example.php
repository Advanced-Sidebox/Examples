<?php
/**
 * @name  ASB Example Modules
 * @copyright 2011-2019 Mark Vincent
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
		'title' => 'Template Example',
		'description' => 'This is a simple example of using a template with an ASB module',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' =>	'1.0.1',
		'compatibility' => '4.0',
		'installData' => array(
			'templates' => array(
				array(
					'title' => 'asb_template_example',
					'template' => <<<EOF
				<div class="trow2">
					<img src="images/logo.png" alt="logo" title="example" style="width: 79%; margin: 21%;"/>
				</div>
EOF
				),
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
function asb_template_example_get_content()
{
	global $templates;

	// then eval() the template variable with the template and you are done
	eval("\$content = \"{$templates->get('asb_template_example')}\";");

	// return true if your box has something to show, or false if it doesn't.
	return $content;
}

?>
