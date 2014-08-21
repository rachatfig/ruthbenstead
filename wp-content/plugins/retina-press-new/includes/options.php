<?php

/* ----------------------------------------
* To retrieve a value use: $rp_options[$prefix.'var']
----------------------------------------- */

$prefix = 'rp_';

/* ----------------------------------------
* Create the TABS
----------------------------------------- */

$rp_custom_tabs = array(
		array(
			'label'=> __('Colour scheme', 'rp'),
			'id'	=> $prefix.'general'
		),
		
		array(
			'label'=> __('Buttons', 'rp'),
			'id'	=> $prefix.'custom'
		),
		array(
			'label'=> __('Dashboard Logo', 'rp'),
			'id'	=> $prefix.'logo'
		),
		array(
			'label'=> __('Login', 'rp'),
			'id'	=> $prefix.'login'
		)
		/*array(
			'label'=> __('Advanced', 'rp'),
			'id'	=> $prefix.'advanced'
		)*/
	);

/* ----------------------------------------
* Options Field Array
----------------------------------------- */

$rp_custom_meta_fields = array(

	/* -- TAB 1 -- */
	array(
		'id'	=> $prefix.'general', // Use data in $rp_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'	=> 'Primary colour',
		'desc'	=> 'Please select your primary colour',
		'id'	=> $prefix.'PrimaryColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'	=> 'Secondary colour',
		'desc'	=> 'Please select your secondary colour',
		'id'	=> $prefix.'SecondaryColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'	=> 'Tertiary colour',
		'desc'	=> 'Please select your tertiary colour',
		'id'	=> $prefix.'TertiaryColour',
		'type'	=> 'colorpicker',
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Selection background colour',
		'desc'	=> '',
		'id'	=> $prefix.'SelectionBackgroundColour',
		'type'	=> 'colorpicker',
	),
	array(
		'label'	=> 'Selection text colour',
		'desc'	=> '',
		'id'	=> $prefix.'SelectionTextColour',
		'type'	=> 'colorpicker',
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Sidebar link colour',
		'desc'	=> '',
		'id'	=> $prefix.'SidebarLinkColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'	=> 'Sidebar link colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'SidebarLinkHoverColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'	=> 'Sidebar link colour',
		'desc'	=> 'Please select current page colour',
		'id'	=> $prefix.'SidebarLinkCurrentColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Global Link colour',
		'desc'	=> '',
		'id'	=> $prefix.'LinkColour',
		'type'	=> 'colorpicker',
	),
	array(
		'label'	=> 'Global Link colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'LinkHoverColour',
		'type'	=> 'colorpicker',
	),
	/*array(
		'label'=> 'Text Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'textinput',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Password Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'password',
		'type'	=> 'password'
	),
	array(
		'label'=> 'Textarea',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'textarea',
		'type'	=> 'textarea'
	),
	array(
		'label'=> 'Checkbox Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'checkbox',
		'type'	=> 'checkbox'
	),
	array (
		'label' => 'Radio Group',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'radio',
		'type'	=> 'radio',
		'options' => array (
			'one' => array (
				'label' => 'Option One',
				'value'	=> 'one'
			),
			'two' => array (
				'label' => 'Option Two',
				'value'	=> 'two'
			),
			'three' => array (
				'label' => 'Option Three',
				'value'	=> 'three'
			)
		)
	)
	/*
	array (
		'label'	=> 'Checkbox Group',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'checkbox_group',
		'type'	=> 'checkbox_group',
		'options' => array (
			'one' => array (
				'label' => 'Option One',
				'value'	=> 'one'
			),
			'two' => array (
				'label' => 'Option Two',
				'value'	=> 'two'
			),
			'three' => array (
				'label' => 'Option Three',
				'value'	=> 'three'
			)
		)
	),
	array(
		'label' => 'Category',
		'id'	=> 'category',
		'type'	=> 'tax_select'
	),
	array(
		'label' => 'Post List',
		'desc' => 'A description for the field.',
		'id' 	=>  $prefix.'post_id',
		'type' => 'post_list',
		'post_type' => array('post','page')
	),*/
	
	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 1 -- */
	/* -- TAB 2 -- */
	
	array(
		'id'	=> $prefix.'custom', // Use data in $rp_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'	=> 'Primary button colour',
		'desc'	=> '',
		'id'	=> $prefix.'PrimaryButtonColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Primary button text colour',
		'desc'	=> '',
		'id'	=> $prefix.'PrimaryButtonTextColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Primary button colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'PrimaryButtonHoverColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Primary button text colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'PrimaryButtonTextHoverColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Secondary button colour',
		'desc'	=> '',
		'id'	=> $prefix.'SecondaryButtonColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Secondary button text colour',
		'desc'	=> '',
		'id'	=> $prefix.'SecondaryButtonTextColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Secondary button colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'SecondaryButtonHoverColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Secondary button text colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'SecondaryButtonTextHoverColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Tertiary button colour',
		'desc'	=> '',
		'id'	=> $prefix.'TertiaryButtonColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Tertiary button text colour',
		'desc'	=> '',
		'id'	=> $prefix.'TertiaryButtonTextColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Tertiary button colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'TertiaryButtonHoverColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Tertiary button text colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'TertiaryButtonTextHoverColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 2 -- */
	/* -- TAB 3 -- */
	
	array(
		'id'	=> $prefix.'logo', // Use data in $rp_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'	=> 'Dashboard login logo',
		'desc'	=> '',
		'id'	=> $prefix.'DashboardLogoImage',
		'type'	=> 'image'
	),
	array(
		'label'=> 'Logo width',
		'desc'	=> 'ie. 100px',
		'id'	=> $prefix.'DashboardLogoWidth',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Logo height',
		'desc'	=> 'ie. 35px',
		'id'	=> $prefix.'DashboardLogoHeight',
		'type'	=> 'text'
	),
	/*array(
		'id'	=> $prefix.'advanced', // Use data in $rp_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'	=> 'Repeatable',
		'desc'	=> 'A description for the field. The items inserted here are movable.',
		'id'	=> $prefix.'repeatable',
		'type'	=> 'repeatable'
	),
	
	array(
		'label'	=> 'Date',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'date',
		'type'	=> 'date'
	),
	array(
		'label'	=> 'Image',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'image',
		'type'	=> 'image'
	),
	array(
		'label'	=> 'Slider',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'slider',
		'type'	=> 'slider',
		'min'	=> '0',
		'max'	=> '100',
		'step'	=> '5'
	),
	
	array(
		'label'	=> 'Color Picker',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'colorpicker',
		'type'	=> 'colorpicker'
	),*/
	
	array(
		'type'	=> 'tab_end'
	),
	
	/* -- /TAB 3 -- */
	/* -- TAB 4 -- */
	
	array(
		'id'	=> $prefix.'login', // Use data in $rp_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'	=> 'Upload login logo',
		'desc'	=> 'Upload retina image',
		'id'	=> $prefix.'LogoImage',
		'type'	=> 'image'
	),
	array(
		'label'=> 'Logo width',
		'desc'	=> 'For retina image half the size (ie. if image is 200px, then display 100px)',
		'id'	=> $prefix.'LogoWidth',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Logo height',
		'desc'	=> 'For retina image half the size (ie. if image is 70px, then display 35px)',
		'id'	=> $prefix.'LogoHeight',
		'type'	=> 'text'
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'=> 'Input colour',
		'desc'	=> '',
		'id'	=> $prefix.'LoginInputColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> 'Input text colour',
		'desc'	=> '',
		'id'	=> $prefix.'LoginInputTextColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Primary button colour',
		'desc'	=> '',
		'id'	=> $prefix.'LoginPrimaryButtonColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Primary button text colour',
		'desc'	=> '',
		'id'	=> $prefix.'LoginPrimaryButtonTextColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Primary button colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'LoginPrimaryButtonHoverColour',
		'type'	=> 'colorpicker'
	),
	
	array(
		'label'	=> 'Primary button text colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'LoginPrimaryButtonTextHoverColour',
		'type'	=> 'colorpicker'
	),
	array(
		'label'=> '<hr />',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Link colour',
		'desc'	=> '',
		'id'	=> $prefix.'LoginLinkColour',
		'type'	=> 'colorpicker',
	),
	array(
		'label'	=> 'Link colour',
		'desc'	=> 'Please select a hover colour',
		'id'	=> $prefix.'LoginLinkHoverColour',
		'type'	=> 'colorpicker',
	),
	/*array(
		'id'	=> $prefix.'advanced', // Use data in $rp_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'	=> 'Repeatable',
		'desc'	=> 'A description for the field. The items inserted here are movable.',
		'id'	=> $prefix.'repeatable',
		'type'	=> 'repeatable'
	),
	
	array(
		'label'	=> 'Date',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'date',
		'type'	=> 'date'
	),
	array(
		'label'	=> 'Image',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'image',
		'type'	=> 'image'
	),
	array(
		'label'	=> 'Slider',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'slider',
		'type'	=> 'slider',
		'min'	=> '0',
		'max'	=> '100',
		'step'	=> '5'
	),
	
	array(
		'label'	=> 'Color Picker',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'colorpicker',
		'type'	=> 'colorpicker'
	),*/
	
	array(
		'type'	=> 'tab_end'
	)
	
	/* -- /TAB 4 -- */

);

?>