<?php

/**
 * Info basic Them Customizer
 * 
 * @package Info Basic
 */

 function info_basic_customizer($wp_customize){
     //copyright section

     $wp_customize->add_section(
         'sec_copyright',array(
             'title'        => 'Copyright Settings',
             'description'  => 'Copyright Section'
         )
     );

     //Field 1 - copy right text box
     $wp_customize->add_setting(
         'set_copyright',array(
             'type'                 => 'theme_mod',
             'default'              => '',
             'sanitize_callback'    => 'sanitize_text_field'
         )
     );
     
     $wp_customize->add_control(
         'set_copyright',array(
             'label'        => 'Copyright',
             'description'  => 'Please, add your copyright information here',
             'section'      => 'sec_copyright',
             'type'         => 'text'
         )
     );

 }

 add_action('customize_register','info_basic_customizer');
