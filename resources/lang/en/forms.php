<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lara(b)log forms language lines
    |--------------------------------------------------------------------------
    |
    */

    'edit-post' => [
        'id-title'  => 'Post id: :id',
        'title'     => 'Editing Post',
        'labels'    => [
            'post-title'            => 'Post Title',
            'post-subtitle'         => 'Post Subtitle',
            'post-post_image'       => 'Post Image',
            'post-image-url'        => 'Post Image Path\Url',
            'post-slug'             => 'Post Slug',
            'post-content'          => 'Post Content',
            'post-publish_date'     => 'Publish Date',
            'post-publish_time'     => 'Publish Time',
            'post-is_draft'         => 'Is Draft?',
            'post-tags'             => 'Post Tags',
            'post-layout'           => 'Post Layout',
            'post-author'           => 'Post Author',
            'post-meta_description' => 'Meta Description',
            'post-parent-category'  => 'Post Category',
            'post-subcategories'    => 'Post Subcategories',
            'mark-as-popular'       => 'Mark As Popular',
            'mark-as-latest'        => 'Mark As Latest',
            'show-in-category'      => 'Show In Category'

        ],
        'buttons' => [
            'save-finished'     => '<i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Save',
            'save-continue'     => '<i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Save',
            'delete'            => '<i class="fa fa-times-circle fa-fw" aria-hidden="true"></i> Delete',
            'choose-image'      => '<i class="nc-icon nc-album-2" aria-hidden="true"></i> Choose Post Image',
        ],
    ],

    'create-post' => [
        'title'     => 'Creating New Post',
        'badge'     => 'Not Saved',
    ],

    'create-tag' => [
        'title'     => '<i class="fa fa-tag fa-fw" aria-hidden="true"></i> Create New Tag',
        'labels'    => [
            'tag'                   => 'Tag',
            'title'                 => 'Tag Title',
            'subtitle'              => 'Tag Subtitle',
            'meta_description'      => 'Tag Meta Description',
            'tag-post_image'        => 'Tag Image',
            'tag-image-url'         => 'Tag Image Path\Url',
            'tag-layout'            => 'Tag Layout',
            'reverse_direction'     => 'Sort Direction',
            'sort-direction'        => [
                'normal'    => 'Normal',
                'reversed'  => 'Reversed',
            ],
        ],
        'buttons' => [
            'add-new'       => '<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Tag',
            'choose-image'  => '<i class="nc-icon nc-album-2" aria-hidden="true"></i> Choose Tag Image',
        ],
    ],
    
    'create-category' => [
        'title'     => '<i class="fa fa-category fa-fw" aria-hidden="true"></i> Create New Category',
        'labels'    => [
            'category'                   => 'Category',
            'name'                 => 'Category Name',
            'slug'              => 'Category Slug',
            'meta_description'      => 'Category Meta Description',
            'category-image'        => 'Category Image',
            'category-image-url'         => 'Category Image Path\Url',
            'mark_as_menu'          => 'Mark as Menu',
            'parent_category'          => 'Parent Category',
            'show_on_homepage'      => 'Show on Homepage',
            'status'                => 'Status',
            'sort-direction'        => [
                'normal'    => 'Normal',
                'reversed'  => 'Reversed',
            ],
        ],
        'buttons' => [
            'add-new'       => '<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Category',
            'choose-image'  => '<i class="nc-icon nc-album-2" aria-hidden="true"></i> Choose Category Image',
        ],
    ],

    'update-tag' => [
        'title'     => '<i class="fa fa-tag fa-fw" aria-hidden="true"></i> Updating Tag <strong>:tag</strong>',
        'buttons'   => [
            'update'        => '<i class="fa fa-check fa-fw" aria-hidden="true"></i> Update Tag',
            'choose-image'  => '<i class="nc-icon nc-album-2" aria-hidden="true"></i> Choose Tag Image',
        ],
    ],
    
    'update-category' => [
        'title'     => '<i class="fa fa-category fa-fw" aria-hidden="true"></i> Updating Category <strong>:category</strong>',
        'buttons'   => [
            'update'        => '<i class="fa fa-check fa-fw" aria-hidden="true"></i> Update Category',
            'choose-image'  => '<i class="nc-icon nc-album-2" aria-hidden="true"></i> Choose Category Image',
        ],
    ],

    'contact' => [
        'labels' => [
            'firstname' => 'Firstname *',
            'lastname'  => 'Lastname',
            'email'     => 'Email *',
            'phone'     => 'Phone Number',
            'message'   => 'Message *',
        ],
        'placeholders' => [
            'firstname' => 'Please enter your firstname *',
            'lastname'  => 'Please enter your lastname ',
            'email'     => 'Please enter your email  *',
            'phone'     => 'Please enter your phone number ',
            'message'   => 'Please enter your message  *',
        ],
        'buttons' => [
            'send' => 'Send Message',
        ],
        'messages' => [
            'required'  => '<strong>*</strong> Required fields.',
            'sent'      => 'Thank you for your message. It has been sent.',
        ],
        'validation' => [
            'captcha' => 'Captcha is required',
        ],
    ],
    
    'comment' => [
        'messages' => [
            'saved' => 'Your comment has been saved.'
        ]
    ],

    'sitemap' => [
        'buttons' => [
            'generate'  => 'Generate Sitemap',
            'view'      => 'View Sitemap',
        ],
        'placeholders' => [
            'limit' => 'Page Limit',
        ],
        'messages' => [
            'success'  => 'Sitemap Generated',
        ],
    ],

];
