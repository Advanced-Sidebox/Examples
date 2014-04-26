<?php
/**
 * @name  ASB Example Modules
 * @copyright  2011-2014 WildcardSearch
 *
 * this is an example of the an Advanced Sidebox add-on using XMLHTTP
 */

// disallow direct access
if(!defined('IN_MYBB') || !defined('IN_ASB'))
{
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

/*
 * asb_ajax_example_info()
 *
 * provide info to ASB about the addon
 *
 * @return: (array) the module info
 */
function asb_ajax_example_info()
{
	global $lang;

	if(!$lang->asb_addon)
	{
		$lang->load('asb_addon');
	}

	return array(
		"title" => 'AJAX/XMLHTTP Example',
		"description" => 'This module shows how to enable AJAX Refresh for an ASB module',
		"wrap_content" => true,
		"version" => '1',
		"compatibility" => '2.1',

		// note the following AJAX requirements
		"xmlhttp" => true,
		"settings" => array(
			"xmlhttp_on" => array(
				"sid" => 'NULL',
				"name" => 'xmlhttp_on',
				"title" => $lang->asb_xmlhttp_on_title,
				"description" => $lang->asb_xmlhttp_on_description,
				"optionscode" => 'text',
				"value" => '0'
			)
		),
	);
}

/*
 * asb_ajax_example_build_template()
 *
 * handles display of children of this addon at page load
 *
 * @param - $args - (array) the specific information from the child box
 * @return: (bool) true on success, false on fail/no content
 */
function asb_ajax_example_build_template($args)
{
	extract($args);

	global $$template_var;

	$$template_var = asb_ajax_example_get_time();

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

/*
 * asb_ajax_example_xmlhttp()
 *
 * handles display of children of this addon via AJAX
 *
 * @return: n/a
 */
function asb_ajax_example_xmlhttp()
{
	/*
	 * get the content-- this is pointless and could be done much more
	 * easily with JS alone but is only for an example
	 */
	$this_time = asb_ajax_example_get_time();

	/*
	 * if this were an even remotely useful module, we would actually
	 * need this conditional; it is only here for an example
	 */
	if($this_time)
	{
		// if the content has changed simply return it
		return $this_time;
	}

	// otherwise return the no changes marker
	return 'nochange';
}

/*
 * asb_ajax_example_get_time()
 * 
 * an example of producing content in one intermediary function to be used by
 * standard and XMLHTTP routines
 */
function asb_ajax_example_get_time()
{
	global $mybb;
	$this_time = my_date('h:i:s', TIME_NOW);
	return <<<EOF
		<tr>
					<td class="trow1">
						Current time: {$this_time}
					</td>
				</tr>
EOF;
}

?>
