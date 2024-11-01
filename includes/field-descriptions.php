<?php
//form  section
$wp_customize->add_section( 'nf_styler_form_id_field_descriptions' , array(
    'title' => 'Field Description',
    'panel' => 'nf_styler_panel',
  ) );

// Hide description.
  $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[field-descriptions][display]' , array(
    'default'     => false,
    'transport'   => 'refresh',
    'type' => 'option'
) );

$wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[field-descriptions][display]',   array(
  'type' => 'checkbox',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
  'label' => __( 'Hide Description' ),
)
);

// font align style buttons
$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id .'[field-descriptions][text-align]' , array(
	'default'     => '',
	'transport'   => 'postMessage',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_Styler_Text_Alignment_Option ( $wp_customize, 'nf_styler_form_id_' . $current_form_id.'[field-descriptions][text-align]', array(
	'label'	      =>  'Font Alignment',
	'section'     => 'nf_styler_form_id_field_descriptions',
	'type'        => 'text_alignment',
	'choices'     => $align_pos,
) ) );

// font style buttons
$wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[field-descriptions][font-style]' , array(
	'default'     => '',
	'transport'   => 'postMessage',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_Styler_Font_Style_Option ( $wp_customize, 'nf_styler_form_id_'.$current_form_id.'[field-descriptions][font-style]', array(
	'label'	      =>  'Font Style',
	'section'     => 'nf_styler_form_id_field_descriptions',
	'type'        => 'font_style',
	'choices'     => $font_style_choices,
) ) );

// Label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Font size' ),
			'section'  => 'nf_styler_form_id_field_descriptions',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 20px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 18px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][font-size-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
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
		'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Line Height' ),
			'section'  => 'nf_styler_form_id_field_descriptions',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 20px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 18px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[field-descriptions][line-height-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 16px',
)
))
);

 $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[field-descriptions][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'nf_styler_form_id_'.$current_form_id.'[field-descriptions][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Description Text Font Color' ),
      'section' => 'nf_styler_form_id_field_descriptions',
    )
  )
);

 
//   $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[field-descriptions][margin]' , array(
//       'default'     => '',
//       'transport'   => 'postMessage',
//       'type' => 'option'
//   ) );

//   $wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[field-descriptions][margin]',   array(
//     'type' => 'text',
//     'priority' => 10, // Within the section.
//     'section' => 'nf_styler_form_id_field_descriptions', // Required, core or custom.
//     'label' => __( 'Margin' ),
//    'input_attrs' => array(
//     'placeholder' => 'Example: 5px 10px 5px 10px'
//   )
//   )
// );

$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[field-descriptions][padding-label-only]', // Setting id
		array( // Args, including any custom ones.
			'label'    => __( 'Padding' ),
			'section'  => 'nf_styler_form_id_field_descriptions',
			'settings' => array(),
		)
	)
);

nf_styler_margin_padding_controls( $wp_customize, $current_form_id, 'nf_styler_form_id_field_descriptions', 'field-descriptions', 'padding' );