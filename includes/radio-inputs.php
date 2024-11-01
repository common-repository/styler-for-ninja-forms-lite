<?php

$wp_customize->add_section( 'nf_styler_form_id_radio_inputs' , array(
    'title' => 'Radio Inputs',
    'panel' => 'nf_styler_panel',
  ) );

// Label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Width' ),
			'section'  => 'nf_styler_form_id_radio_inputs',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 800px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 800px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][width-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 800px',
)
))
);

  // Label.
$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize, // WP_Customize_Manager.
		'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size-label-only]', // Setting id.
		array( // Args, including any custom ones.
			'label'    => __( 'Font size' ),
			'section'  => 'nf_styler_form_id_radio_inputs',
			'settings' => array(),
		)
	)
);

$wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_styler_Desktop_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 20px',
)
)  )
);

//Tablet
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size-tab]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Tab_Text_Input_Option( $wp_customize,'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size-tab]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 18px',
)
))
);

//Mobile
 $wp_customize->add_setting( 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size-phone]' , array(
	'default'     => '',
	'transport'   => 'refresh',
	'type' => 'option'
) );

$wp_customize->add_control(new Nf_styler_Mobile_Text_Input_Option( $wp_customize, 'nf_styler_form_id_' . $current_form_id . '[radio-inputs][font-size-phone]',   array(
  'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
  'label' => __( '' ),
 'input_attrs' => array(
  'placeholder' => 'Ex: 16px',
)
))
);

// font style buttons
$wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[radio-inputs][font-style]' , array(
	'default'     => '',
	'transport'   => 'postMessage',
	'type' => 'option'
) );

$wp_customize->add_control( new Nf_Styler_Font_Style_Option ( $wp_customize, 'nf_styler_form_id_'.$current_form_id.'[radio-inputs][font-style]', array(
	'label'	      =>  'Font Style',
	'section'     => 'nf_styler_form_id_radio_inputs',
	'type'        => 'font_style',
	'choices'     => $font_style_choices,
) ) );

$wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[radio-inputs][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'nf_styler_form_id_'.$current_form_id.'[radio-inputs][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Font Color' ),
      'section' => 'nf_styler_form_id_radio_inputs',
    )
  )
);
  
//   $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[radio-inputs][margin]' , array(
//       'default'     => '',
//       'transport'   => 'postMessage',
//       'type' => 'option'
//   ) );

//   $wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[radio-inputs][margin]',   array(
//     'type' => 'text',
//     'priority' => 10, // Within the section.
//     'section' => 'nf_styler_form_id_radio_inputs', // Required, core or custom.
//     'label' => __( 'Margin' ),
//    'input_attrs' => array(
//     'placeholder' => 'Example: 5px 10px 5px 10px'
//   )
//   )
// );

$wp_customize->add_control(
	new WP_Customize_Label_Only(
		$wp_customize,
		'nf_styler_form_id_' . $current_form_id . '[radio-inputs][padding-label-only]', // Setting id
		array( // Args, including any custom ones.
			'label'    => __( 'Padding' ),
			'section'  => 'nf_styler_form_id_radio_inputs',
			'settings' => array(),
		)
	)
);

nf_styler_margin_padding_controls( $wp_customize, $current_form_id, 'nf_styler_form_id_radio_inputs', 'radio-inputs', 'padding', 'refresh');