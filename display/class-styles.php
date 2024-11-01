<?php
$get_form_options = get_option( "nf_styler_form_id_".$css_form_id );
if ( isset( $get_form_options['form-wrapper']['font'] ) ) {
    $font_name = $get_form_options['form-wrapper']['font'];
    $font_name= str_replace( ' ', '+', $font_name );
    if ( $font_name !== 'Default' ) {
        echo "<link href='https://fonts.googleapis.com/css?family=".$font_name."' rel='stylesheet' type='text/css'>";
    }
} ?>
<style type="text/css">

body #nf-form-<?php echo $css_form_id ?>-cont {
    <?php echo 'border-style: solid;';?>
<?php echo $main_class_object->get_form_styles( $css_form_id, 'form-wrapper' );  ?>


<?php echo empty( $get_form_options['form-wrapper']['background-image'] )?'':'background-image:url("'. $get_form_options['form-wrapper']['background-image'].'");' ;  ?>


<?php
if ( !empty( $get_form_options['form-wrapper']['font'] ) ) {
    if ( $get_form_options['form-wrapper']['font'] == 'Default' ) {
        echo 'font-family:inherit;' ;
    }
    else {
        echo 'font-family:'. $get_form_options['form-wrapper']['font'].';' ;
    }
} 

if ( empty( $get_form_options['form-wrapper']['border-size'] ) ) {
    echo 'border-width: 0px;';
}?>


}


<?php if (isset($get_form_options['form-title'])){ ?>

    body #nf-form-title-<?php echo $css_form_id ?>  h3 {
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'form-title' );  ?>
    }
    
<?php } ?>


	body #nf-form-<?php echo $css_form_id ?>-cont .submit-container input[type=button]:hover {
    <?php echo isset($get_form_options['submit-button']['hover-color'])?'background-color:'. $get_form_options['submit-button']['hover-color'].';':''; ?>
    <?php echo isset($get_form_options['submit-button']['font-hover-color'])?'color:'. $get_form_options['submit-button']['font-hover-color'].';':''; ?>
   }
   
<?php if (isset($get_form_options['submit-button'])){ ?>

   body #nf-form-<?php echo $css_form_id ?>-cont .submit-container input[type=button] {
       <?php echo 'border-style: solid;';?>
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'submit-button' );  ?>
        <?php
            if ( empty( $get_form_options['submit-button']['border-size'] ) ) {
                echo 'border-width: 0px;';
            }
        ?>
    }  

<?php } ?> 

body #nf-form-<?php echo $css_form_id ?>-cont .submit-container .nf-field-element{
    <?php echo isset($get_form_options['submit-button']['text-align'])?'text-align:'. $get_form_options['submit-button']['text-align'].';':''; ?>
}

<?php if (isset($get_form_options['text-fields'])){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .textbox-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .email-container input[type="email"],
    body #nf-form-<?php echo $css_form_id ?>-cont .firstname-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .lastname-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .address-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .city-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .spam-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .date-container .nf-field-element input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .phone-container .nf-field-element input[type="tel"],
    body #nf-form-<?php echo $css_form_id ?>-cont .zip-container .nf-field-element input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .quantity-container .nf-field-element input,
    body #nf-form-<?php echo $css_form_id ?>-cont .number-container .nf-field-element input,
    body #nf-form-<?php echo $css_form_id ?>-cont .confirm-container .nf-field-element input{
        <?php echo 'border-style: solid;';?>
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'text-fields' );  ?>
        <?php
            if ( empty( $get_form_options['text-fields']['border-size'] ) ) {
                echo 'border-width: 1px;';
            }
        ?>
    }
<?php } ?> 

<?php if ( isset($get_form_options['paragraph-textarea']) ){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .textarea-container textarea {
        <?php echo 'border-style: solid;';?>
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'paragraph-textarea' );  ?>
        <?php
            if ( empty( $get_form_options['text-fields']['border-size'] ) ) {
                echo 'border-width: 1px;';
            }
        ?>
        <?php echo empty( $get_form_options['text-fields']['background-color'] )?'':'background:'. $get_form_options['text-fields']['background-color'].';'; ?>
        <?php echo empty( $get_form_options['text-fields']['border-size'] )?'':'border-width:'. $get_form_options['text-fields']['border-size'].$main_class_object->nf_styler_add_px_to_value($get_form_options['text-fields']['border-size']).';'; ?>
        <?php echo empty( $get_form_options['text-fields']['border-color'] )?'':'border-color:'. $get_form_options['text-fields']['border-color'].';'; ?>
        <?php echo empty( $get_form_options['text-fields']['border-type'] )?'':'border-style:'. $get_form_options['text-fields']['border-type'].';'; ?>
        <?php echo empty( $get_form_options['text-fields']['font-size'] )?'':'font-size:'. $get_form_options['text-fields']['font-size'].$main_class_object->nf_styler_add_px_to_value($get_form_options['text-fields']['font-size']).';'; ?>
        <?php echo empty( $get_form_options['text-fields']['font-color'] )?'':'color:'. $get_form_options['text-fields']['font-color'].';'; ?>
        <?php
            if ( !empty( $get_form_options['text-fields']['border-radius'] ) ) {
                echo 'border-radius:'.$get_form_options['text-fields']['border-radius'].$main_class_object->nf_styler_add_px_to_value($get_form_options['text-fields']['border-radius']).';';
                echo '-web-border-radius:'.$get_form_options['text-fields']['border-radius'].$main_class_object->nf_styler_add_px_to_value($get_form_options['text-fields']['border-radius']).';';
                echo '-moz-border-radius:'.$get_form_options['text-fields']['border-radius'].$main_class_object->nf_styler_add_px_to_value($get_form_options['text-fields']['border-radius']).';';
            } 
        ?>
    }

<?php } ?> 

<?php if ( isset($get_form_options['dropdown-fields']) ){ ?>

    body #nf-form-<?php echo $css_form_id ?>-cont .listcountry-container select,
    body #nf-form-<?php echo $css_form_id ?>-cont .liststate-container select,
    body #nf-form-<?php echo $css_form_id ?>-cont .listmultiselect-container select,
    body #nf-form-<?php echo $css_form_id ?>-cont .listselect-container select
    {
        <?php echo 'border-style: solid;';?>
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'dropdown-fields' );  ?>
            <?php
    if ( empty( $get_form_options['dropdown-fields']['border-size'] ) ) {
        echo 'border-width: 1px;';
    }
    ?>
    }
    body #nf-form-<?php echo $css_form_id ?>-cont .listmultiselect-container .listmultiselect-wrap .nf-field-element select{
        height:auto;
    }

<?php } ?> 

    
<?php if ( isset($get_form_options['radio-inputs']) ){ ?>

    body #nf-form-<?php echo $css_form_id ?>-cont .listradio-wrap .nf-field-element label {
    <?php echo $main_class_object->get_form_styles( $css_form_id, 'radio-inputs' );  ?>
        padding:0px;
    }
 
    body #nf-form-<?php echo $css_form_id ?>-cont .list-radio-wrap .nf-field-element > ul li{
        <?php if ( !empty( $get_form_options['radio-inputs']['padding-left'] ) ) {
            echo 'padding-left: '. $get_form_options['radio-inputs']['padding-left'] .''.$this->nf_styler_add_px_to_value( $get_form_options['radio-inputs']['padding-left'] ). '!important;';
        } ?>
        <?php if ( !empty( $get_form_options['radio-inputs']['padding-top'] ) ) {
            echo 'padding-top: '. $get_form_options['radio-inputs']['padding-top'] .''.$this->nf_styler_add_px_to_value( $get_form_options['radio-inputs']['padding-top'] ). '!important;';
        } ?>
        <?php if ( !empty( $get_form_options['radio-inputs']['padding-right'] ) ) {
            echo 'padding-right: '. $get_form_options['radio-inputs']['padding-right'] .''.$this->nf_styler_add_px_to_value( $get_form_options['radio-inputs']['padding-right'] ). '!important;';
        } ?>
        <?php if ( !empty( $get_form_options['radio-inputs']['padding-bottom'] ) ) {
            echo 'padding-bottom: '. $get_form_options['radio-inputs']['padding-bottom'] .''.$this->nf_styler_add_px_to_value( $get_form_options['radio-inputs']['padding-bottom'] ). '!important;';
        } ?>
    }

<?php } ?> 

<?php if ( isset($get_form_options['checkbox-inputs']) ){ ?>

    body #nf-form-<?php echo $css_form_id ?>-cont .listcheckbox-container .nf-field-element label {
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'checkbox-inputs' );  ?>
    padding: 0px;
    }

    body #nf-form-<?php echo $css_form_id ?>-cont .listcheckbox-container .nf-field-element > ul li{
        <?php if ( !empty( $get_form_options['checkbox-inputs']['padding-left'] ) ) {
            echo 'padding-left: '. $get_form_options['checkbox-inputs']['padding-left'] .''.$this->nf_styler_add_px_to_value( $get_form_options['checkbox-inputs']['padding-left'] ). '!important;';
        } ?>
        <?php if ( !empty( $get_form_options['checkbox-inputs']['padding-top'] ) ) {
            echo 'padding-top: '. $get_form_options['checkbox-inputs']['padding-top'] .''.$this->nf_styler_add_px_to_value( $get_form_options['checkbox-inputs']['padding-top'] ). '!important;';
        } ?>
        <?php if ( !empty( $get_form_options['checkbox-inputs']['padding-right'] ) ) {
            echo 'padding-right: '. $get_form_options['checkbox-inputs']['padding-right'] .''.$this->nf_styler_add_px_to_value( $get_form_options['checkbox-inputs']['padding-right'] ). '!important;';
        } ?>
        <?php if ( !empty( $get_form_options['checkbox-inputs']['padding-bottom'] ) ) {
            echo 'padding-bottom: '. $get_form_options['checkbox-inputs']['padding-bottom'] .''.$this->nf_styler_add_px_to_value( $get_form_options['checkbox-inputs']['padding-bottom'] ). '!important;';
        } ?>
    }
<?php } ?> 


<?php if ( isset($get_form_options['field-descriptions']) ){ ?>

    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description {
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'field-descriptions' );  ?>
    }
    
    <?php if ( !empty( $get_form_options['field-descriptions']['line-height'] ) ) { ?>
        body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > p,
        body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > div,
        body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > span,
        body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > li{
            <?php echo 'line-height: inherit;' ?>
        }
    <?php } ?>

<?php } ?> 

<?php if ( isset($get_form_options['field-labels']) ){ ?>

    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-label label {
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'field-labels' );  ?>
    }

<?php } ?> 

<?php if ( isset($get_form_options['confirmation-message']) ){ ?>

    body #nf-form-<?php echo $css_form_id ?>-cont .nf-response-msg  {
        <?php echo 'border-style: solid;';?>
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'confirmation-message' );  ?>
            <?php
        if ( empty( $get_form_options['confirmation-message']['border-size'] ) ) {
            echo 'border-width: 0px;';
        }
        ?>
    }

<?php } ?> 


<?php if ( isset($get_form_options['error-message']) ){ ?>
     body #nf-form-<?php echo $css_form_id ?>-cont .nf-error-msg{
        <?php echo 'border-style: solid;';?>
        <?php echo $main_class_object->get_form_styles( $css_form_id, 'error-message' );  ?>
              <?php
        if ( empty( $get_form_options['error-message']['border-size'] ) ) {
            echo 'border-width: 0px;';
        }
        ?>
    }
<?php } ?> 


/* Option to style placeholder */
body #nf-form-<?php echo $css_form_id ?>-cont  ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  <?php echo $main_class_object->get_form_styles( $css_form_id, 'placeholders' );  ?>
}
body #nf-form-<?php echo $css_form_id ?>-cont  ::-moz-placeholder { /* Firefox 19+ */
  <?php echo $main_class_object->get_form_styles( $css_form_id, 'placeholders' );  ?>
}
body #nf-form-<?php echo $css_form_id ?>-cont  :-ms-input-placeholder { /* IE 10+ */
  <?php echo $main_class_object->get_form_styles( $css_form_id, 'placeholders' );  ?>
}
body #nf-form-<?php echo $css_form_id ?>-cont  :-moz-placeholder { /* Firefox 18- */
  <?php echo $main_class_object->get_form_styles( $css_form_id, 'placeholders' );  ?>
}

/* Styling for Tablets */
@media only screen and (max-width: 800px) and (min-width:481px) {
    
    <?php if(nf_styler_isset_checker($get_form_options, 'form-wrapper', array('width-tab'))){ ?>
        body #nf-form-<?php echo $css_form_id ?>-cont{
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'form-wrapper');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'form-title', array('font-size-tab','line-height-tab'))){ ?>
    body #nf-form-title-<?php echo $css_form_id ?>  h3{
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'form-title');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'field-labels', array('font-size-tab','line-height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-label label {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'field-labels' );?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'field-descriptions', array('font-size-tab','line-height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'field-descriptions');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'field-descriptions', array('line-height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > p,
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > div,
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > span,
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > li{
        <?php echo 'line-height: inherit;'; ?>
    }
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'placeholders', array('font-size-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont  ::-webkit-input-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'placeholders');?>
        }
        body #nf-form-<?php echo $css_form_id ?>-cont  ::-moz-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'placeholders');?>
        }
        body #nf-form-<?php echo $css_form_id ?>-cont  :-ms-input-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'placeholders');?>
        }
        body #nf-form-<?php echo $css_form_id ?>-cont  :-moz-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'placeholders');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'text-fields', array('font-size-tab', 'width-tab', 'height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .textbox-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .email-container input[type="email"],
    body #nf-form-<?php echo $css_form_id ?>-cont .firstname-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .lastname-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .address-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .city-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .spam-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .date-container .nf-field-element input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .phone-container .nf-field-element input[type="tel"],
    body #nf-form-<?php echo $css_form_id ?>-cont .zip-container .nf-field-element input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .quantity-container .nf-field-element input,
    body #nf-form-<?php echo $css_form_id ?>-cont .number-container .nf-field-element input,
    body #nf-form-<?php echo $css_form_id ?>-cont .confirm-container .nf-field-element input{
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'text-fields');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'dropdown-fields', array( 'font-size-tab', 'width-tab', 'height-tab' ))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .listcountry-container select,
body #nf-form-<?php echo $css_form_id ?>-cont .liststate-container select,
body #nf-form-<?php echo $css_form_id ?>-cont .listmultiselect-container select,
body #nf-form-<?php echo $css_form_id ?>-cont .listselect-container select {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'dropdown-fields');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'radio-inputs', array('font-size-tab', 'width-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .listradio-wrap .nf-field-element label {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'radio-inputs');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'checkbox-inputs', array('font-size-tab', 'width-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .listcheckbox-container .nf-field-element label {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'checkbox-inputs');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'paragraph-textarea', array('width-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .textarea-container textarea {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'paragraph-textarea');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'confirmation-message', array('font-size-tab', 'width-tab', 'line-height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-response-msg {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'confirmation-message');?>
        }       
<?php } ?>


<?php if(nf_styler_isset_checker($get_form_options, 'error-message', array('font-size-tab', 'width-tab', 'line-height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-error-msg {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'error-message');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'submit-button', array('font-size-tab', 'width-tab','height-tab'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .submit-container input[type=button] {
         <?php echo $main_class_object->nf_styler_get_saved_styles_tab( $css_form_id, 'submit-button');?>
        }       
<?php } ?>

    }


/* Styling for phones */
@media only screen and (max-width: 480px){
    <?php if(nf_styler_isset_checker($get_form_options, 'form-wrapper', array('width-phone'))){ ?>
        body #nf-form-<?php echo $css_form_id ?>-cont{
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'form-wrapper');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'form-title', array('font-size-phone','line-height-phone'))){ ?>
    body #nf-form-title-<?php echo $css_form_id ?>  h3{
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'form-title');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'field-labels', array('font-size-phone','line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-label label {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'field-labels');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'field-descriptions', array('font-size-phone','line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'field-descriptions');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'field-descriptions', array('line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > p,
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > div,
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > span,
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-field-description > li{
        <?php echo 'line-height: inherit;'; ?>
    }
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'placeholders', array('font-size-phone','line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont  ::-webkit-input-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'placeholders');?>
        }
        body #nf-form-<?php echo $css_form_id ?>-cont  ::-moz-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'placeholders');?>
        }
        body #nf-form-<?php echo $css_form_id ?>-cont  :-ms-input-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'placeholders');?>
        }
        body #nf-form-<?php echo $css_form_id ?>-cont  :-moz-placeholder {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'placeholders');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'text-fields', array('font-size-phone', 'width-phone','height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .textbox-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .email-container input[type="email"],
    body #nf-form-<?php echo $css_form_id ?>-cont .firstname-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .lastname-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .address-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .city-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .spam-container input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .date-container .nf-field-element input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .phone-container .nf-field-element input[type="tel"],
    body #nf-form-<?php echo $css_form_id ?>-cont .zip-container .nf-field-element input[type="text"],
    body #nf-form-<?php echo $css_form_id ?>-cont .quantity-container .nf-field-element input,
    body #nf-form-<?php echo $css_form_id ?>-cont .number-container .nf-field-element input,
    body #nf-form-<?php echo $css_form_id ?>-cont .confirm-container .nf-field-element input {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'text-fields');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'dropdown-fields', array('font-size-phone', 'width-phone','height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .listcountry-container select,
body #nf-form-<?php echo $css_form_id ?>-cont .liststate-container select,
body #nf-form-<?php echo $css_form_id ?>-cont .listmultiselect-container select,
body #nf-form-<?php echo $css_form_id ?>-cont .listselect-container select {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'dropdown-fields');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'radio-inputs', array('font-size-phone', 'width-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .listradio-wrap .nf-field-element label {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'radio-inputs');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'checkbox-inputs', array('font-size-phone', 'width-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .listcheckbox-container .nf-field-element label {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'checkbox-inputs');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'paragraph-textarea', array('width-phone','line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .textarea-container textarea {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'paragraph-textarea');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'confirmation-message', array('font-size-phone', 'width-phone','line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-response-msg {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'confirmation-message');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'error-message', array('font-size-phone', 'width-phone','line-height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .nf-error-msg {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'error-message');?>
        }       
<?php } ?>

<?php if(nf_styler_isset_checker($get_form_options, 'submit-button', array('font-size-phone', 'width-phone', 'height-phone'))){ ?>
    body #nf-form-<?php echo $css_form_id ?>-cont .submit-container input[type=button] {
         <?php echo $main_class_object->nf_styler_get_saved_styles_phone( $css_form_id, 'submit-button');?>
        }       
<?php } ?>

}


    
        </style>