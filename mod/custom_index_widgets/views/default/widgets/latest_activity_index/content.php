<?php
	$num_items = $vars['entity']->num_items;
	if (!isset($num_items)) $num_items = 10;

	$widget_group = $vars["entity"]->widget_group;
	if (!isset($widget_group)) $widget_group = 0;
/*
	$site_categories = $vars['config']->site->categories;
	$widget_categorie = $vars['entity']->widget_categorie;
	$widget_context_mode = $vars['entity']->widget_context_mode;
	if (!isset($widget_context_mode)) $widget_context_mode = 'search';
	elgg_set_context($widget_context_mode);

	$widget_datas = elgg_list_river(0, $widget_group, '', '', '', '', $num_items,0,0,false);
		//GCChange - incorrectly called elgg_list_river above; correctly called below
*/
	$options = array(
		'limit' => $num_items,
	); //GCChange - create options array for the elgg_list_river

	$widget_datas = elgg_list_river( $options ); //GCChange - the correct way of calling elgg_list_river

	echo $widget_datas;
?>
