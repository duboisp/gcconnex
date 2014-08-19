<?php
/*****************************************************************************
 * Phloor Favicon                                                            *
 *                                                                           *
 * Copyright (C) 2011 Alois Leitner                                          *
 *                                                                           *
 * This program is free software: you can redistribute it and/or modify      *
 * it under the terms of the GNU General Public License as published by      *
 * the Free Software Foundation, either version 2 of the License, or         *
 * (at your option) any later version.                                       *
 *                                                                           *
 * This program is distributed in the hope that it will be useful,           *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of            *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             *
 * GNU General Public License for more details.                              *
 *                                                                           *
 * You should have received a copy of the GNU General Public License         *
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.     *
 *                                                                           *
 * "When code and comments disagree both are probably wrong." (Norm Schryer) *
 *****************************************************************************/
?>
<?php
$action_buttons = '';

$save_button = elgg_view('input/submit', array(
	'value' => elgg_echo('save'),
	'name' => 'save',
));

$action_buttons = $save_button ;

$content = '';

/* FROM SETUP */
$forms = array('favicon' => array());

// if favicon is set - offer the option to delete it
if (phloor_custom_favicon_favicon_has_image()) {
	$forms['favicon']['delete_image'] =  elgg_view('input/checkbox', array(
		'name' => 'delete_image',
		'value' => 'true',
	));
}

// favicon file input view
$forms['favicon']['image'] = elgg_view('input/file', array(
	'name' => 'image',
	'value' => $vars['image']
));

/* FROM SETUP - END */

// view each section
foreach($forms as $section_name => $section) {
	// display section title
	$content .= elgg_view_title(elgg_echo('phloor_custom_favicon:form:section:'.$section_name));
	// view each form of a section
	foreach($section as $key => $view) {
		$label = elgg_echo('phloor_custom_favicon:'.$key.':label');
		$description = elgg_echo('phloor_custom_favicon:'.$key.':description');

		// append to content
		$content .= <<<____HTML
<div class="form-item">
 <label>{$label}</label> {$view}
 <div class="description">{$description}</div>
</div>
____HTML;
	}
}

// append form foot
$content .= <<<____HTML
<div class="elgg-foot">
	$action_buttons
</div>
____HTML;

echo $content;

