<?php

/**
 * Add theme options to customizer
 */

namespace Flynt\CustomizerLogo;

use WP_Customize_Image_Control;

add_action('customize_register', function ($wp_customize) {
    // Add option to replace header logo.
    $wp_customize->add_setting(
        'custom_logo',
        [
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options'
        ]
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'custom_logo',
        [
            'label' => __('Replace Logo'),
            'description' => 'Upload file to replace header logo. Accepted file formats: jpg, jpeg, png, svg, gif.',
            'section' => 'title_tagline',
            'settings' => 'custom_logo',
            'priority'   => 10,
        ]
    ));
});
