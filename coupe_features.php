<?php
add_action( 'admin_menu', 'wfc_add_admin_menu' );
add_action( 'admin_init', 'wfc_settings_init' );


function wfc_add_admin_menu(  ) { 

	add_options_page( 'Web Font Coupe', 'Web Font Coupe', 'manage_options', 'web_font_coupe', 'wfc_options_page' );

}


function wfc_settings_init(  ) { 

	register_setting( 'pluginPage', 'wfc_settings' );

	add_settings_section(
		'wfc_pluginPage_section', 
		__( 'Streamline your web fonts with the Google Webfont Loader', 'wordpress' ), 
		'wfc_settings_section_callback', 
		'pluginPage'
	);

/*	add_settings_field( 
		'wfc_checkbox_field_0', 
		__( 'Google', 'wordpress' ), 
		'wfc_checkbox_field_0_render', 
		'pluginPage', 
		'wfc_pluginPage_section' 
	);
*/
	add_settings_field( 
		'wfc_text_field_1', 
		__( 'Google Fonts:', 'wordpress' ), 
		'wfc_text_field_1_render', 
		'pluginPage', 
		'wfc_pluginPage_section' 
	);

	/*add_settings_field( 
		'wfc_checkbox_field_2', 
		__( 'Settings field description', 'wordpress' ), 
		'wfc_checkbox_field_2_render', 
		'pluginPage', 
		'wfc_pluginPage_section' 
	);

	add_settings_field( 
		'wfc_text_field_3', 
		__( 'Settings field description', 'wordpress' ), 
		'wfc_text_field_3_render', 
		'pluginPage', 
		'wfc_pluginPage_section' 
	);

	add_settings_field( 
		'wfc_checkbox_field_4', 
		__( 'Settings field description', 'wordpress' ), 
		'wfc_checkbox_field_4_render', 
		'pluginPage', 
		'wfc_pluginPage_section' 
	);

	add_settings_field( 
		'wfc_text_field_5', 
		__( 'Settings field description', 'wordpress' ), 
		'wfc_text_field_5_render', 
		'pluginPage', 
		'wfc_pluginPage_section' 
	);
*/

}


/*function wfc_checkbox_field_0_render(  ) { 

	$options = get_option( 'wfc_settings' );
	?>
	<input type='checkbox' name='wfc_settings[wfc_checkbox_field_0]' <?php checked( $options['wfc_checkbox_field_0'], 1 ); ?> value='1'>
	<?php

}
*/

function wfc_text_field_1_render(  ) { 

	$options = get_option( 'wfc_settings' );
	?>
	<input type='text' name='wfc_settings[wfc_text_field_1]' value='<?php echo $options['wfc_text_field_1']; ?>'>
	<?php

}


function wfc_checkbox_field_2_render(  ) { 

	$options = get_option( 'wfc_settings' );
	?>
	<input type='checkbox' name='wfc_settings[wfc_checkbox_field_2]' <?php checked( $options['wfc_checkbox_field_2'], 1 ); ?> value='1'>
	<?php

}


function wfc_text_field_3_render(  ) { 

	$options = get_option( 'wfc_settings' );
	?>
	<input type='text' name='wfc_settings[wfc_text_field_3]' value='<?php echo $options['wfc_text_field_3']; ?>'>
	<?php

}


function wfc_checkbox_field_4_render(  ) { 

	$options = get_option( 'wfc_settings' );
	?>
	<input type='checkbox' name='wfc_settings[wfc_checkbox_field_4]' <?php checked( $options['wfc_checkbox_field_4'], 1 ); ?> value='1'>
	<?php

}


function wfc_text_field_5_render(  ) { 

	$options = get_option( 'wfc_settings' );
	?>
	<input type='text' name='wfc_settings[wfc_text_field_5]' value='<?php echo $options['wfc_text_field_5']; ?>'>
	<?php

}


function wfc_settings_section_callback(  ) { 

	echo __( 'Add the Google hosted fonts in the field below following this syntax. Ex: \'Roboto\', \'Acme\', \'Helvetica\'', 'wordpress' );

}


function wfc_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Web Font Coupe</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );?>
		

		<p> Save your changes then add the following code to your stylesheet:
		<pre>
		.wf-active h1 {
		font-family: "Roboto";
		}
		</pre>
		Replace the 'h1' with whichever element you wish to style.
		</p>

		<?php
		submit_button();
		?>

	</form>
	<?php

}

?>