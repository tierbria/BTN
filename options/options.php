<?php

/*
@package _s
admin page 
*/

function btn_add_submenu() {
		add_submenu_page( 'themes.php', 'Theme Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'btn_add_submenu' );
	

function btn_settings_init() { 
	register_setting( 'theme_options', 'btn_options_settings' );
	
	add_settings_section(
		'btn_options_page_section', 
		'Page', 
		'btn_options_page_section_callback', 
		'theme_options'
	);
	
	function btn_options_page_section_callback() { 
		echo 'Add your Text.';
	}

	add_settings_field( 
		'btn_text_field', 
		'Enter your text', 
		'btn_text_field_render', 
		'theme_options', 
		'btn_options_page_section' 
	);

	add_settings_field( 
		'btn_checkbox_field', 
		'Choose preference', 
		'btn_checkbox_field_render', 
		'theme_options', 
		'btn_options_page_section'  
	);

	add_settings_field( 
		'btn_radio_field', 
		'Choose an option', 
		'btn_radio_field_render', 
		'theme_options', 
		'btn_options_page_section'  
	);
	
	add_settings_field( 
		'btn_textarea_field', 
		'Enter content', 
		'btn_textarea_field_render', 
		'theme_options', 
		'btn_options_page_section'  
	);
	
	add_settings_field( 
		'btn_select_field', 
		'Pick an Option', 
		'btn_select_field_render', 
		'theme_options', 
		'btn_options_page_section'  
	);


	function btn_text_field_render() { 
		$options = get_option( 'btn_options_settings' );
		?>
		<input type="text" name="btn_options_settings[btn_text_field]" value="<?php if (isset($options['btn_text_field'])) echo $options['btn_text_field']; ?>" />
		<?php
	}
	
	function btn_checkbox_field_render() { 
		$options = get_option( 'btn_options_settings' );
	?>
		<input type="checkbox" name="btn_options_settings[btn_checkbox_field]" <?php if (isset($options['btn_checkbox_field'])) checked( 'on', ($options['btn_checkbox_field']) ) ; ?> value="on" />
		<label>On</label> 
		<?php	
	}
	
	function btn_radio_field_render() { 
		$options = get_option( 'btn_options_settings' );
		?>
		<input type="radio" name="btn_options_settings[btn_radio_field]" <?php if (isset($options['btn_radio_field'])) checked( $options['btn_radio_field'], 1 ); ?> value="1" /> <label>First Option</label><br />
		<input type="radio" name="btn_options_settings[btn_radio_field]" <?php if (isset($options['btn_radio_field'])) checked( $options['btn_radio_field'], 2 ); ?> value="2" /> <label>Second Option</label><br />
		<input type="radio" name="btn_options_settings[btn_radio_field]" <?php if (isset($options['btn_radio_field'])) checked( $options['btn_radio_field'], 3 ); ?> value="3" /> <label>Third Option</label>
		<?php
	}
	
	function btn_textarea_field_render() { 
		$options = get_option( 'btn_options_settings' );
		?>
		<textarea cols="40" rows="5" name="btn_options_settings[btn_textarea_field]"><?php if (isset($options['btn_textarea_field'])) echo $options['btn_textarea_field']; ?></textarea>
		<?php
	}

	function btn_select_field_render() { 
		$options = get_option( 'btn_options_settings' );
		?>
		<select name="btn_options_settings[btn_select_field]">
			<option value="1" <?php if (isset($options['btn_select_field'])) selected( $options['btn_select_field'], 1 ); ?>> First Option </option>
			<option value="2" <?php if (isset($options['btn_select_field'])) selected( $options['btn_select_field'], 2 ); ?>> Second Option </option>
			<option value="3" <?php if (isset($options['btn_select_field'])) selected( $options['btn_select_field'], 3 ); ?>> Third Option </option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Theme Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'btn_settings_init' );
