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
 * asb_setting_example_info()
 *
 * provide info to ASB about the addon
 *
 * @return: (array) the module info
 */
function asb_setting_example_info()
{
	global $lang;

	if(!$lang->asb_addon)
	{
		$lang->load('asb_addon');
	}

	return array(
		"title" => 'Setting Example',
		"description" => 'This module illustrates using settings in ASB modules',
		"wrap_content" => true,
		"version" => '1',
		"compatibility" => '2.1',
		"settings" => array(
			"announcement_text" => array(
				"sid" => "NULL",
				"name" => 'announcement_text',
				"title" => 'Announcement Text',
				"description" => 'the text entered here will be displayed in the side box',
				"optionscode" => 'text',
				"value" => ''
			)
		)
	);
}

/*
 * asb_setting_example_build_template()
 *
 * handles display of children of this addon at page load
 *
 * @param - $args - (array) the specific information from the child box
 * @return: (bool) true on success, false on fail/no content
 */
function asb_setting_example_build_template($args)
{
	extract($args);

	global $$template_var, $lang;

	if(!$lang->asb_addon)
	{
		$lang->load('asb_addon');
	}

	if(!$settings['announcement_text'])
	{
		$settings['announcement_text'] = 'Enter text in the setting for this module in ACP to display it here';
	}

	$$template_var = <<<EOF
		<tr>
					<td class="trow1"><span style="color: red; font-size: 1.4em; font-weight: bold;">{$settings['announcement_text']}</span>
					</td>
				</tr>
EOF;

	// return true if your box has something to show, or false if it doesn't.
	return true;
}

?>