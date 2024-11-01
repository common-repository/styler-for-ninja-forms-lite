<?php
/* Template Name: Stla Preview Template */ 
$form_id = sanitize_text_field( $_GET['sfnf_form_id'] );
?>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
<div class="sfnf-preview" id="sfnf-preview" style="width:80%; margin:auto; margin-top: 80px;">
    <?php 
		if( $form_id === 'new' ) {
			echo 'This form hasn\'t been published yet.';
		}
		else{
			echo do_shortcode('[ninja_form id="'.$form_id.'" ]'); 
		} ?>
</div>

<?php wp_footer(); ?>

	</body>
</html>