<?php

namespace Flynt\Components\PostsList;

use Timber\Timber;

add_filter('Flynt/addComponentData?name=PostsList', function ($data, $componentName) {

    // Get posts
    $maxPosts = $data['options']['maxPosts'] ?: 5;
    $postArgs = [
        'post_status'         => 'publish',
        'post_type'           => 'post',
        'posts_per_page'      => $maxPosts,
        'ignore_sticky_posts' => 1,
        'has_password'        => false,

        // order by publish date
        'orderby'             => 'date',
    ];

    $data['posts'] = Timber::get_posts($postArgs);

    return $data;
}, 10, 2);

function getACFLayout()
{
    return [
        'name' => 'postsList',
        'label' => 'Posts List',
        'sub_fields' => [
            [
                'label' => 'Content',
                'name' => 'cotentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'infoMessage',
                'type' => 'message',
                'message' => 'Head over to <a href="/wp-admin/edit.php">Posts</a> to edit your posts.',
                'new_lines' => 'wpautop',
                'esc_html' => 0
            ],
            [
                'label' => __('Intro Text', 'flynt'),
                'instructions' => __('Text will be shown before the list.', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 0,
            ],
            [
                'label' => __('Outro Text', 'flynt'),
                'instructions' => __('Text will be shown before after list.', 'flynt'),
                'name' => 'afterContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 0,
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Max Posts',
                        'name' => 'maxPosts',
                        'type' => 'number',
                        'min' => -1,
                        'step' => 1,
                        'default_value' => 3,
                    ],
                ]
            ],
        ]
    ];
}
