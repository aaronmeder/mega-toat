<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {

    $components = [
        Components\BlockAnchor\getACFLayout(),
        Components\BlockCollapse\getACFLayout(),
        Components\BlockImage\getACFLayout(),
        Components\BlockImageText\getACFLayout(),
        Components\BlockVideoOembed\getACFLayout(),
        Components\BlockWysiwyg\getACFLayout(),
        Components\GridImageText\getACFLayout(),
        Components\GridPostsLatest\getACFLayout(),
        Components\PostsList\getACFLayout(),
        Components\ListComponents\getACFLayout(),
        Components\SliderImages\getACFLayout(),
        Components\ReusableComponent\getACFLayout(),
    ];

    // sort components alphabetically
    usort($components, function ($a, $b) {
        return $a['label'] > $b['label'] ? 1 : -1;
    });


    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => __('Page Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => $components,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'reusable-components'
                ],
            ],
        ],
    ]);
});
