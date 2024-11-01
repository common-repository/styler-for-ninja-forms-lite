<?php
// form wrapper section
$wp_customize->add_section(
	'nf_styler_form_id_form_wrapper',
	array(
		'title' => 'Form Wrapper',
		'panel' => 'nf_styler_panel',
	)
);

// Form Wrapper.


// Label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Width' ),
			'section'  => 'nf_styler_form_id_form_wrapper',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_form_wrapper', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 40px or 90%',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_form_wrapper', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 40px or 90%',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[form-wrapper][width-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_form_wrapper', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 40px or 90%',
)
))
);


$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][font]',
	array(
		'default'   => 'Default',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][font]',
	array(
		'type'     => 'select',
		'priority' => 10,
		'section' => 'nf_styler_form_id_form_wrapper',
		'label' => __( 'Form Font Family' ),
		'choices' => $font_collection,
	)
);

$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][background-color]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][background-color]', // Setting id
		array(
			'label'   => __( 'Form Background Color' ),
			'section' => 'nf_styler_form_id_form_wrapper',
		)
	)
);

$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][background-image]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][background-image]',
		array(
			'label'   => 'Form Background Image',
			'section' => 'nf_styler_form_id_form_wrapper',
		)
	)
);

// Border label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Border' ),
			'section'  => 'nf_styler_form_id_form_wrapper',
			'settings' => array(),
		)
	)
);

// Border size.
$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-size]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);


$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-size]',
	array(
		'type'     => 'text',
		'priority' => 10,
		'label'    => 'Size',
		'section'  => 'nf_styler_form_id_form_wrapper',
		'input_attrs' => array(
			'placeholder' => 'Ex: 5px',
		  )
	)
);

// Border type.
$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-type]',
	array(
		'default'   => 'solid',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-type]',
	array(
		'type'     => 'select',
		'priority' => 10,
		'section'  => 'nf_styler_form_id_form_wrapper',
		'label'    => __( 'Type' ),
		'choices'  => $border_types,
	)
);

// Border radius.
$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-radius]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-radius]',
	array(
		'type'     => 'text',
		'priority' => 10,
		'label'    => 'Radius',
		'section'  => 'nf_styler_form_id_form_wrapper',
		'input_attrs' => array(
			'placeholder' => 'Ex: 10px',
		  )
	)
);

$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-color]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][border-color]', // Setting id
		array(
			'label'   => __( 'Form Border Color' ),
			'section' => 'nf_styler_form_id_form_wrapper',
		)
	)
);




$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[form-wrapper][margin]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);


$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][padding-label-only]', // Setting id
		array( // Args, including any custom ones.
			'label'    => __( 'Padding' ),
			'section'  => 'nf_styler_form_id_form_wrapper',
			'settings' => array(),
		)
	)
);

nf_styler_margin_padding_controls( $wp_customize, $current_form_id, 'nf_styler_form_id_form_wrapper', 'form-wrapper', 'padding' );

$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[form-wrapper][margin-label-only]', // Setting id
		array( // Args, including any custom ones.
			'label'    => __( 'Margin' ),
			'section'  => 'nf_styler_form_id_form_wrapper',
			'settings' => array(),
		)
	)
);

nf_styler_margin_padding_controls( $wp_customize, $current_form_id, 'nf_styler_form_id_form_wrapper', 'form-wrapper', 'margin' );



