<?php

$wp_customize->add_section( 'nf_styler_form_id_form_outer_shadow' , array(
    'title' => 'Form Outer Shadow',
    'panel' => 'nf_styler_panel',
  ) );

 $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-horizontal-offset]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-horizontal-offset]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'nf_styler_form_id_form_outer_shadow', // Required, core or custom.
    'label' => __( 'Horizontal Offset' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

  $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-vertical-offset]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-vertical-offset]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'nf_styler_form_id_form_outer_shadow', // Required, core or custom.
    'label' => __( 'Vertical Offset' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

$wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-blur-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-blur-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'nf_styler_form_id_form_outer_shadow', // Required, core or custom.
    'label' => __( 'Blur Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

  $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-spread-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-spread-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'nf_styler_form_id_form_outer_shadow', // Required, core or custom.
    'label' => __( 'Spread Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

 $wp_customize->add_setting( 'nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-color]' , array(
      'default'     => '#000000',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'nf_styler_form_id_'.$current_form_id.'[box-shadow][outer-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Shadow Color' ),
      'section' => 'nf_styler_form_id_form_outer_shadow',
    )
  )
);