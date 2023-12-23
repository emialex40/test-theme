<?php

/*
 *  Colorpicker admin functions
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('pa_colors_add_form_fields', 'add_colorpicker_to_taxonomy', 10, 1);
add_action('pa_colors_edit_form_fields', 'add_colorpicker_to_taxonomy', 10, 1);
add_action('created_pa_colors', 'save_colorpicker_value', 10, 1);
add_action('edited_pa_colors', 'save_colorpicker_value', 10, 1);
function add_colorpicker_to_taxonomy($term) {
	$colorpicker_value = get_term_meta($term->term_id, 'colorpicker_value', true);

	echo '<tr class="form-field">
        <th scope="row"><label for="colorpicker_value">Colorpicker</label></th>
        <td>
            <input type="text" name="colorpicker_value" class="colorpicker" value="' . esc_attr($colorpicker_value) . '" />
            <p class="description">Ваш опис тут.</p>
        </td>
    </tr>';
}

// A function to save the value of the colorpicker field
function save_colorpicker_value($term_id) {
	if (isset($_POST['colorpicker_value'])) {
		$colorpicker_value = sanitize_text_field($_POST['colorpicker_value']);
		update_term_meta($term_id, 'colorpicker_value', $colorpicker_value);
	}
}


// add the "Color" column to the beginning of the attribute table
add_filter('manage_edit-pa_colors_columns', 'add_color_column_at_start');

// change the order of the columns
add_filter('manage_edit-pa_colors_sortable_columns', 'add_color_column_sortable');
add_action('pre_get_terms', 'sort_pa_colors_by_color');

// Output the value of the "Color" column
add_action('manage_pa_colors_custom_column', 'display_color_column_value', 10, 3);

function add_color_column_at_start($columns) {
	$new_columns = array('color' => 'Color') + $columns;
	return $new_columns;
}

function add_color_column_sortable($columns) {
	$columns['color'] = 'color';
	return $columns;
}

function sort_pa_colors_by_color($query) {
	if (isset($_REQUEST['orderby']) && $_REQUEST['orderby'] === 'color') {
		$query->query_vars['meta_key'] = 'colorpicker_value';
		$query->query_vars['orderby'] = 'meta_value';
	}
}

// Output the value of the "Color" column
function display_color_column_value($content, $column, $term_id) {
	if ($column === 'color') {
		$color = get_term_meta($term_id, 'colorpicker_value', true);
		$color_html = '<div style="width: 20px; height: 20px; background-color: ' . esc_attr($color) . ';"></div>';
		$color_html .= '<style>.widefat td {vertical-align: middle;}</style>';
		return $color_html;
	}
	return $content;
}






