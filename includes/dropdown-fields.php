<?php
//form dropdown section

$wp_customize->add_section( 'nf_styler_form_id_dropdown_fields' , array(
		'title' => 'Dropdown Fields',
		'panel' => 'nf_styler_panel',
	) );

// Label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Width' ),
			'section'  => 'nf_styler_form_id_dropdown_fields',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 300px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 300px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][width-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 300px',
)
))
);

  // Label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Font size' ),
			'section'  => 'nf_styler_form_id_dropdown_fields',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 20px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 18px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-size-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 16px',
)
))
);

// Line height label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Height' ),
			'section'  => 'nf_styler_form_id_dropdown_fields',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 20px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 18px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][height-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_dropdown_fields', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 16px',
)
))
);

// font style buttons
$wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[dropdown-fields][font-style]' , array(
	'default'     => '',
	'transport'   => 'postMessage',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_Styler_Font_Style_Option ( $wp_customize, 'nf_styler_form_id_'.$current_form_id.'[dropdown-fields][font-style]', array(
	'label'	      =>  'Font Style',
	'section'     => 'nf_styler_form_id_dropdown_fields',
	'type'        => 'font_style',
	'choices'     => $font_style_choices,
) ) );

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-color]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'type' => 'option'
	) );

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, // WP_Customize_Manager
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][font-color]', // Setting id
		array( // Args, including any custom ones.
			'label' => __( 'Font Color' ),
			'section' => 'nf_styler_form_id_dropdown_fields',
		)
	)
);

// Border label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Border' ),
			'section'  => 'nf_styler_form_id_dropdown_fields',
			'settings' => array(),
		)
	)
);

// Border size.
$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-size]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);


$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-size]',
	array(
		'type'     => 'text',
		'priority' => 10,
		'label'    => 'Size',
		'section'  => 'nf_styler_form_id_dropdown_fields',
		'input_attrs' => array(
			'placeholder' => 'Ex: 5px',
		  )
	)
);

// Border type.
$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-type]',
	array(
		'default'   => 'solid',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-type]',
	array(
		'type'     => 'select',
		'priority' => 10,
		'section'  => 'nf_styler_form_id_dropdown_fields',
		'label'    => __( 'Type' ),
		'choices'  => $border_types,
	)
);

// Border radius.
$wp_customize->add_setting(
	'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-radius]',
	array(
		'default'   => '',
		'transport' => 'postMessage',
		'type'      => 'option',
	)
);

$wp_customize->add_control(
	'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-radius]',
	array(
		'type'     => 'text',
		'priority' => 10,
		'label'    => 'Radius',
		'section'  => 'nf_styler_form_id_dropdown_fields',
		'input_attrs' => array(
			'placeholder' => 'Ex: 10px',
		  )
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-color]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'type' => 'option'
	) );

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, // WP_Customize_Manager
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][border-color]', // Setting id
		array( // Args, including any custom ones.
			'label' => __( 'Border Color' ),
			'section' => 'nf_styler_form_id_dropdown_fields',
		)
	)
);


$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][background-color]' , array(
		'default'     => '',
		'transport'   => 'postMessage',
		'type' => 'option'
	) );

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, // WP_Customize_Manager
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][background-color]', // Setting id
		array( // Args, including any custom ones.
			'label' => __( 'Background Color' ),
			'section' => 'nf_styler_form_id_dropdown_fields',
		)
	)
);


$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][padding-label-only]', // Setting id
		array( // Args, including any custom ones.
			'label'    => __( 'Padding' ),
			'section'  => 'nf_styler_form_id_dropdown_fields',
			'settings' => array(),
		)
	)
);

nf_styler_margin_padding_controls( $wp_customize, $current_form_id, 'nf_styler_form_id_dropdown_fields', 'dropdown-fields', 'padding' );

$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[dropdown-fields][margin-label-only]', // Setting id
		array( // Args, including any custom ones.
			'label'    => __( 'Margin' ),
			'section'  => 'nf_styler_form_id_dropdown_fields',
			'settings' => array(),
		)
	)
);

nf_styler_margin_padding_controls( $wp_customize, $current_form_id, 'nf_styler_form_id_dropdown_fields', 'dropdown-fields', 'margin' );
