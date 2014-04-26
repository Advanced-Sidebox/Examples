<?php
/**
 * @name  ASB Example Modules
 * @copyright  2011-2014 WildcardSearch
 *
 * this is the simplest possible addon module, it does nothing that
 * can't be done with a static custom box
 */

// disallow direct access
if(!defined('IN_MYBB') || !defined('IN_ASB'))
{
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

/*
 * asb_simple_example_info()
 *
 * provide info to ASB about the addon
 *
 * @return: (array) the module info
 */
function asb_simple_example_info()
{
	return array	(
		"title" => 'Simple Example',
		"description" => "This is the simplest possible addon module, it does nothing that can't be done with a static custom box.",
		"wrap_content" => true,
		"version" => '1',
		"compatibility" => '2.1',
	);
}

/*
 * asb_simple_example_build_template()
 *
 * handles display of children of this addon at page load
 *
 * @param - $args - (array) the specific information from the child box
 * @return: (bool) true on success, false on fail/no content
 */
function asb_simple_example_build_template($args)
{
	extract($args);

	/*
	 * using variable variables (thanks Euan T.) we declare the template variable as global here and eval() its contents.
	 */
	global $$template_var; //<-- this is necessary

	/*
	 * note the structure, this content should appropriate (and validate) as the contents of an HTML <tbody> element in structure and content.
	 */
	$$template_var = <<<EOF
		<tr>
					<td class="trow1">Sample content</td>
				</tr>
EOF;

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

?>
