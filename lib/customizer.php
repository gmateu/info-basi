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


     /*-----------------------------------------------------------------------------*/
     //SLIDER SECTION
     $wp_customize->add_section(
        'sec_slider',array(
            'title'        => 'Slider Settings',
            'description'  => 'Slider Section'
        )
    );

    $count=1;

    while($count<=3){
        //fiel 1 - Slider page number 1
        $wp_customize->add_setting(
            'set_slider_page'.$count,array(
                'type'                 => 'theme_mod',
                'default'              => '',
                'sanitize_callback'    => 'absint'
            )
        );
        
        $wp_customize->add_control(
            'set_slider_page'.$count,array(
                'label'        => 'Set slider page '.$count,
                'description'  => 'Set slider page '.$count,
                'section'      => 'sec_slider',
                'type'         => 'dropdown-pages'
            )
        );
        //fiel 2 - Slider button text 1
        $wp_customize->add_setting(
            'set_slider_button_text'.$count,array(
                'type'                 => 'theme_mod',
                'default'              => '',
                'sanitize_callback'    => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control(
            'set_slider_button_text'.$count,array(
                'label'        => 'Button Text for page '.$count,
                'description'  => 'Button Text for page '.$count,
                'section'      => 'sec_slider',
                'type'         => 'text'
            )
        );
        //fiel 3 - Slider button url 1
        $wp_customize->add_setting(
            'set_slider_button_url'.$count,array(
                'type'                 => 'theme_mod',
                'default'              => '',
                'sanitize_callback'    => 'esc_url_raw'
            )
        );
        
        $wp_customize->add_control(
            'set_slider_button_url'.$count,array(
                'label'        => 'Url for page '.$count,
                'description'  => 'Url for page '.$count,
                'section'      => 'sec_slider',
                'type'         => 'url'
            )
        );
        $count++;
    }

     //SLIDER SECTION

 }

 add_action('customize_register','info_basic_customizer');
