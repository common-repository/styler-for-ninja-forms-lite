<?php
$wp_customize->add_section( 'nf_styler_select_form_section' , array(
		'title' => 'Select Ninja Form',
		'panel' => 'nf_styler_panel',
	) );

$wp_customize->add_setting( 'nf_styler_select_form_id' , array(
		'default'     => '-1',
		'transport'   => 'postMessage',
		'type' => 'option'
	) );

//get all gravity forms created by user
if ( function_exists( 'Ninja_Forms' ) ) {
	$forms = Ninja_Forms()->form()->get_forms();
	
	$select_form = array( -1 => '---Select form --' );
	foreach ( $forms as $form ) {
	
		$select_form[$form->get_id()] = $form->get_setting( 'title' );
	}
}
else {
	$select_form['form not installed'] = 'Ninja Forms not installed';
}

$wp_customize->add_control( 'nf_styler_select_form_id', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'nf_styler_select_form_section', // Required, core or custom.
		'label' => __( 'Select Ninja Form' ),
		'choices'        => $select_form,

	) );
