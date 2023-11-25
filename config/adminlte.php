<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Carte SIM',
    'title_prefix' => '',
    'title_postfix' => '',
    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    
*/
    'logo' => '<b>  SMS</b><br>',
    'logo_img' => 'images/usim.jpg',
    'logo_img_class' => 'brand-image img-circle elevation-5',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xl',
    'logo_img_alt' => '<br> SMS',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => 'bg-gradient-primary',
    'classes_auth_body' => 'bg-outline-primary',
    'classes_auth_footer' => 'text-center bg-gradient-primary',
    'classes_auth_icon' => 'fa-lg text-primary',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'navbar-white',
    'classes_brand' => 'navbar-info',
    'classes_brand_text' => 'navbar-info',
    'classes_content_wrapper' => 'navbar-white',
    'classes_content_header' => 'navbar-white',
    'classes_content' => 'navbar-white',
    'classes_sidebar' => 'sidebar-dark-info elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-dark text-white',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    // 'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' =>'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url'        => false,

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img'     => [
            'path'   => env('LOGO_PATH', 'images/usim.jpg'),
            'alt'    => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width'  => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',


    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

//***********************************************    admin-access      //***********************************************

    'menu' => [
        // 'PRINCIPAL',        
         [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],
        [
            'type'         => 'darkmode-widget',
            'topnav_right' => true,
        ],
        [
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],
        ['header' => 'Tableau de bord',
            // 'can' => 'superviseur',
            // 'can' => 'agents',
            // 'can' => 'Leader',
        ],
        [
            'type'  => 'sidebar-menu-item',
            'icon'  => 'fas fa-tachometer-alt',
            'text'  => 'Tableau de bord',
            'icon_color' => 'red',
            'route' => 'dashboard',
        ],
        ['header' => "Parametres",
            'can' => 'admin-access',
        ],  

        [
            'text'    => 'Service',
            'icon'    => 'fas fa-fw fa-user-ninja',
            'can' => 'admin-access',
            'icon_color' => 'yellow',
            'submenu' => [
                [
                    'text' => 'Liste',
                    'icon'    => 'fas fa-fw fa-users',
                    'icon_color' => 'yellow',
                    'url'  => '/services',
                ] ,
                // [
                //     'text' => 'Nouveau',
                //     'icon'    => 'fas fa-fw fa-plus',
                //     'icon_color' => 'yellow',
                //     'url'  => '/service/create',
                // ],
            ],
        ], 

        [
           'text'    => "Gestion caisse",
            'icon'    => 'fas fa-fw fa-cash-register',
            'can' => 'admin-access',
            'icon_color' => 'orange',
            'submenu' => [
                [
                ['header' => 'labels'],
                    'text'    => 'Caisses',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-fw fa-cash-register',
                    'icon_color' => 'yellow',
                    'submenu' => [
                        [
                            'text' => 'Liste',
                            'icon'    => 'fas fa-fw fa-list',
                            'icon_color' => 'yellow',
                            'url'  => '/caisses',
                        ],
                    ],  
                ],
                [
                ['header' => 'labels'],
                    'text'    => 'Soldes caisses',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-fw fa-money-bill',
                    'icon_color' => 'yellow',
                    'submenu' => [
                        [
                            'text' => 'Liste',
                            'icon'    => 'fas fa-fw fa-list',
                            'icon_color' => 'yellow',
                            'url'  => '/soldes',
                        ],
                    ],
                ],
            ],
        ], 
        [
            'text'    => 'P-D-V',
            'icon'    => 'fas fa-fw fa-user-ninja',
            'can' => 'admin-access',
            'icon_color' => 'yellow',
            'submenu' => [
                [
                    'text' => 'Liste',
                    'icon'    => 'fas fa-fw fa-users',
                    'icon_color' => 'yellow',
                    'url'  => '/pdvs',
                ] ,
                // [
                //     'text' => 'Nouveau',
                //     'icon'    => 'fas fa-fw fa-plus',
                //     'icon_color' => 'yellow',
                //     'url'  => '/pdvs/create',
                // ],
            ],
        ],
        [
            'text'    => 'Zone',
            'icon'    => 'fas fa-fw fa-user-ninja',
            'can' => 'admin-access',
            'icon_color' => 'yellow',
            'submenu' => [
                [
                    'text' => 'Liste',
                    'icon'    => 'fas fa-fw fa-users',
                    'icon_color' => 'yellow',
                    'url'  => '/zones',
                ] ,
                // [
                //     'text' => 'Nouveau',
                //     'icon'    => 'fas fa-fw fa-plus',
                //     'icon_color' => 'yellow',
                //     'url'  => '/zones/create',
                // ],
            ],
        ],
        ['header' => "Parametres d'accés",
            'can' => 'admin-access',
        ],
        [
           'text'    => "Parametres d'accés",
            'icon'    => 'fas fa-fw fa-cog',
            'can' => 'admin-access',
            'icon_color' => 'orange',
            'submenu' => [
                [
                ['header' => 'labels'],
                    'text'    => 'Utilisateurs',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-fw fa-users',
                    'icon_color' => 'yellow',
                    'submenu' => [
                        [
                            'text' => 'Liste',
                            'icon'    => 'fas fa-fw fa-users',
                            'icon_color' => 'yellow',
                            'url'  => '/users',
                        ] ,
                        [
                            'text' => 'Nouveau',
                            'icon'    => 'fas fa-fw fa-plus',
                            'icon_color' => 'yellow',
                            'url'  => '/users/create',
                        ] 
                    ],
                ],
            ],
        ], 
//***********************************************    citoyen-access      //***********************************************


        // [
        //     'text'    => 'Me déconnecter',
        //     'icon'    => 'fas fa-fw fa-user-ninja',
        //     'icon_color' => 'danger',
        //     'submenu' => [
        //         [
        //             'text' => 'Me déconnecter',
        //             'icon'    => 'fas fa-fw fa-users',
        //             'icon_color' => 'danger',
        //             'url' => 'logout',
        //         ] , 
        //     ],
        // ],

        // ['header' => "Statistique"],
        // [
        //     'text'    => 'Statistique',
        //     'icon'    => 'fas fa-chart-bar',
        //             'icon_color' => 'yellow',
        //     'submenu' => [
        //         [
        //             'text' => 'Liste',
        //             'icon'    => 'fas fa-fw fa-chart-simple',
        //             'icon_color' => 'yellow',
        //             'url'  => '/chart',
        //         ] ,
        //     ],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        // 'Datatables' => [
        //     'active' => false,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
        //         ],
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
        //         ],
        //         [
        //             'type' => 'css',
        //             'asset' => false,
        //             'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
        //         ],
        //     ],
        // ],
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/datatables/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/datatables/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/vendor/datatables/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],

        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        // 'Sweetalert2' => [
        //     'active' => false,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
        //         ],
        //     ],
        // ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/sweetalert2/sweetalert2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/vendor/sweetalert2/sweetalert2.min.css',
                ],
            ],
        ],
        'Pace' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
