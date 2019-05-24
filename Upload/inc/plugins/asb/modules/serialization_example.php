<?php
/**
 * @name  ASB Example Modules
 * @copyright 2011-2019 Mark Vincent
 *
 * this is an example of using a custom setting and managing its
 * serialization and use
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
function asb_serialization_example_info()
{
	return array(
		'title' => 'Setting Serialization Example',
		'description' => 'This is an example of using a custom setting and managing its serialization and use.',
		'module_site' => 'https://github.com/Advanced-Sidebox/Examples',
		'wrap_content' => true,
		'version' => '2',
		'compatibility' => '4.0',
		'settings' => array(
			'multi_setting' => array(
				'name' => 'multi_setting',
				'title' => 'Multiple Options Setting',
				'description' => '',
				'optionscode' => <<<EOF
php
<select multiple name=\"multi_setting[]\" size=\"3\">
<option value=\"1\" " . (is_array(unserialize(\$setting['value'])) ? (\$setting['value'] != "" && in_array("1", unserialize(\$setting['value'])) ? "selected=\"selected\"":""):"") . ">First</option>
<option value=\"2\" " . (is_array(unserialize(\$setting['value'])) ? (\$setting['value'] != "" && in_array("2", unserialize(\$setting['value'])) ? "selected=\"selected\"":""):"") . ">Second</option>
<option value=\"3\" " . (is_array(unserialize(\$setting['value'])) ? (\$setting['value'] != "" && in_array("3", unserialize(\$setting['value'])) ? "selected=\"selected\"":""):"") . ">Third</option>
</select>
EOF
				,
				'value' => '',
			),
		),
	);
}

/*
 * asb_serialization_example_get_content()
 *
 * handles display of children of this addon at page load
 *
 * @param  array info from child box
 * @return bool sucess/fail
 */
function asb_serialization_example_get_content($settings)
{
	// in order to use the values will have to unserialize now
	$choices = (array) unserialize($settings['multi_setting']);

	// do something with the values to illustrate the concept
	$sep = $content = '';
	foreach ($choices as $key => $val) {
		$content .= $sep . $val;
		$sep = ' and ';
		if (isset($choices[$key + 2])) {
			$sep = ', ';
		}
	}

	if ($content) {
		$verb = 'are';
		if (count($choices) == 1) {
			$verb = 'is';
		}

		$content .= " {$verb} selected\n";
	} else {
		$content = 'no items are selected';
	}

	return <<<EOF
		<div class="trow1">{$content}</div>
EOF;
}

/*
 * used to alter any setting values prior to being saved to the database
 *
 * @return array settings
 */
function asb_serialization_example_settings_save($settings)
{
	// here we are serializing our multiple select box before it saves
	$settings['multi_setting'] = serialize($settings['multi_setting']);
	return $settings;
}

?>
