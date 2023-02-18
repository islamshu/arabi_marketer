<?php

// $service = App\Models\Service::where('status',0)->count();
return array(
    // Documentation menu
    // 'documentation' => array(
    //     // Getting Started
    //     array(
    //         'heading' => 'Getting Started',
    //     ),

    //     // Overview
    //     array(
    //         'title' => 'Overview',
    //         'path'  => 'documentation/getting-started/overview',
    //         // 'role' => ['admin'],
    //         // 'permission' => [],
    //     ),

    //     // Build
    //     array(
    //         'title' => 'Build',
    //         'path'  => 'documentation/getting-started/build',
    //     ),

    //     array(
    //         'title'      => 'Multi-demo',
    //         'attributes' => array("data-kt-menu-trigger" => "click"),
    //         'classes'    => array('item' => 'menu-accordion'),
    //         'sub'        => array(
    //             'class' => 'menu-sub-accordion',
    //             'items' => array(
    //                 array(
    //                     'title'  => 'Overview',
    //                     'path'   => 'documentation/getting-started/multi-demo/overview',
    //                     'bullet' => '<span class="bullet bullet-dot"></span>',
    //                 ),
    //                 array(
    //                     'title'  => 'Build',
    //                     'path'   => 'documentation/getting-started/multi-demo/build',
    //                     'bullet' => '<span class="bullet bullet-dot"></span>',
    //                 ),
    //             ),
    //         ),
    //     ),

    //     // File Structure
    //     array(
    //         'title' => 'File Structure',
    //         'path'  => 'documentation/getting-started/file-structure',
    //     ),

    //     // Customization
    //     array(
    //         'title'      => 'Customization',
    //         'attributes' => array("data-kt-menu-trigger" => "click"),
    //         'classes'    => array('item' => 'menu-accordion'),
    //         'sub'        => array(
    //             'class' => 'menu-sub-accordion',
    //             'items' => array(
    //                 array(
    //                     'title'  => 'SASS',
    //                     'path'   => 'documentation/getting-started/customization/sass',
    //                     'bullet' => '<span class="bullet bullet-dot"></span>',
    //                 ),
    //                 array(
    //                     'title'  => 'Javascript',
    //                     'path'   => 'documentation/getting-started/customization/javascript',
    //                     'bullet' => '<span class="bullet bullet-dot"></span>',
    //                 ),
    //             ),
    //         ),
    //     ),

    //     // Dark skin
    //     array(
    //         'title' => 'Dark Mode Version',
    //         'path'  => 'documentation/getting-started/dark-mode',
    //     ),

    //     // RTL
    //     array(
    //         'title' => 'RTL Version',
    //         'path'  => 'documentation/getting-started/rtl',
    //     ),

    //     // Troubleshoot
    //     array(
    //         'title' => 'Troubleshoot',
    //         'path'  => 'documentation/getting-started/troubleshoot',
    //     ),

    //     // Changelog
    //     array(
    //         'title'            => 'Changelog <span class="badge badge-changelog badge-light-danger bg-hover-danger text-hover-white fw-bold fs-9 px-2 ms-2">v'.theme()->getVersion().'</span>',
    //         'breadcrumb-title' => 'Changelog',
    //         'path'             => 'documentation/getting-started/changelog',
    //     ),

    //     // References
    //     array(
    //         'title' => 'References',
    //         'path'  => 'documentation/getting-started/references',
    //     ),


    //     // Separator
    //     array(
    //         'custom' => '<div class="h-30px"></div>',
    //     ),

    //     // Configuration
    //     array(
    //         'heading' => 'Configuration',
    //     ),

    //     // General
    //     array(
    //         'title' => 'General',
    //         'path'  => 'documentation/configuration/general',
    //     ),

    //     // Menu
    //     array(
    //         'title' => 'Menu',
    //         'path'  => 'documentation/configuration/menu',
    //     ),

    //     // Page
    //     array(
    //         'title' => 'Page',
    //         'path'  => 'documentation/configuration/page',
    //     ),

    //     // Page
    //     array(
    //         'title' => 'Add NPM Plugin',
    //         'path'  => 'documentation/configuration/npm-plugins',
    //     ),


    //     // Separator
    //     array(
    //         'custom' => '<div class="h-30px"></div>',
    //     ),

    //     // General
    //     array(
    //         'heading' => 'General',
    //     ),

    //     // DataTables
    //     array(
    //         'title'      => 'DataTables',
    //         'classes'    => array('item' => 'menu-accordion'),
    //         'attributes' => array("data-kt-menu-trigger" => "click"),
    //         'sub'        => array(
    //             'class' => 'menu-sub-accordion',
    //             'items' => array(
    //                 array(
    //                     'title'  => 'Overview',
    //                     'path'   => 'documentation/general/datatables/overview',
    //                     'bullet' => '<span class="bullet bullet-dot"></span>',
    //                 ),
    //             ),
    //         ),
    //     ),

    //     // Remove demos
    //     array(
    //         'title' => 'Remove Demos',
    //         'path'  => 'documentation/general/remove-demos',
    //     ),


    //     // Separator
    //     array(
    //         'custom' => '<div class="h-30px"></div>',
    //     ),

    //     // HTML Theme
    //     array(
    //         'heading' => 'HTML Theme',
    //     ),

    //     array(
    //         'title' => 'Components',
    //         'path'  => '//preview.keenthemes.com/metronic8/demo1/documentation/base/utilities.html',
    //     ),

    //     array(
    //         'title' => 'Documentation',
    //         'path'  => '//preview.keenthemes.com/metronic8/demo1/documentation/getting-started.html',
    //     ),
    // ),

    // Main menu
    'main'=> array(
        //// Dashboard
        array(
            'title' => 'Dashboard',
            'path'  => '',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
        ),
        

        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Modules</span>',
        ),

        // Account
    
        array(
            'title'      => 'Category',
            'permission' => ['read-category'],

            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen009.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'Blog Cateory',
                        'path'       => 'blog_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Video Cateory',
                        'path'       => 'video_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Podcast Cateory',
                        'path'       => 'podcast_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Consoltion Cateory',
                        'path'       => 'consultation_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'User Cateory',
                        'path'       => 'user_index',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                ),   
                  
            ),
        ),
        array(
            'title'      => 'Configs',

            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'My fatoorah',
                        'path'       => 'myfatoorah_config',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
                    array(
                        'title'      => 'Admin Setting',
                        'path'       => 'admin_setting',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),


                    
                    array(
                        'title'      => 'Home Section frontend',
                        'path'       => 'first_section',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Price For Service',
                        'path'       => 'price_service',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Price for Consultiong',
                        'path'       => 'price_consultion',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Range Off follow',
                        'path'       => 'number_in_follower_range',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    
                    
               
                ),   
                  
            ),
        ),
        array(
            'title'      => 'Front Page',

            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'About',
                        'path'       => 'about_frontend',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'About Us',
                        'path'       => 'about',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Rights Guarantee',
                        'path'       => 'rights_guarantee',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'How Site Work',
                        'path'       => 'how_site_work',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    

                    
                    array(
                        'title'      => 'Return exchange policy',
                        'path'       => 'return_exchange_policy',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',                      
                    ),
                    array(
                        'title'      => 'Usage policy',
                        'path'       => 'usage_policy',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',                      
                    ),
                    array(
                        'title'      => 'Pay policy',
                        'path'       => 'pay_policy',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',                      
                    ),
                    array(
                        'title'      => 'Privacy policy',
                        'path'       => 'privacy_policy',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',                      
                    ),
                    array(
                        'title'      => 'FAQS',
                        'path'       => 'faqs',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',                      
                    ),
               
                ),   
                  
            ),
        ),
        array(
            'title' => 'Users',
            'path'  => 'users',
            'permission' => ['read-user'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Roles',
            'path'  => 'roles',
            'permission' => ['read-role'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        
        array(
            'title' => 'Countries',
            'path'  => 'countires',
            'permission' => ['read-countires'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Cities',
            'path'  => 'city',
            'permission' => ['read-city'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Payments',
            'path'  => 'payments',
            'permission' => ['read-payments'],
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Place of consoltion',
            'path'  => 'places',
            'permission' => ['read-places'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Creator',
            'path'  => 'creators',
            'permission' => ['read-marketers'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Order to be Creator',
            'path'  => 'creators_order',
            'permission' => ['read-marketers'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Customers',
            'path'  => 'customers',
            'permission' => ['read-marketers'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Tools',
            'path'  => 'tools',

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title'      => 'Orders',
            'permission' => ['read-service-orders','read-consulting-orders'],

            
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'Service Order',
                        'path'       => 'orders',
                        'permission' => ['read-service-orders'],
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
                    array(
                        'title'      => 'Consulting Booking',
                        'path'       => 'order_consulting',
                        'permission' => ['read-consulting-orders'],

                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
              
                ),   
                  
            ),
        ),
        array(
            'title'      => 'Service',
            'permission' => ['read-service'],
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'      => 'Service',
                        'path'       => 'services',
                        'permission' => ['read-service'],
                        'bullet'     => '<span class="bullet bullet-dot"></span>'
                    ), 
                    // array(
                    //     'title'      => 'Pending services',
                    //     'path'       => 'show_pending',
                    //     'permission' => ['read-service'],
                    //     'bullet'     => '<span class="bullet bullet-dot"></span>'
                    // ), 
                    array(
                        'title'      => 'Main Category',
                        'path'       => 'specialtys',
                        'permission' => ['read-specialty'],
                        'bullet'     => '<span class="bullet bullet-dot"></span>'
                    ), 
                    array(
                        'title'      => 'Sub Category',
                        'path'       => 'service_category',
                        'permission' => ['read-specialty'],
                        'bullet'     => '<span class="bullet bullet-dot"></span>'
                    ), 
                                
                ),   
                  
            ),
        ),
        // array(
        //     'title'      => 'Pending',
        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-layers fs-3"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'      => 'Service',
        //                 'path'       => 'show_pending',
        //                 'permission' => ['read-service'],
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>'
        //             ), 
        //             array(
        //                 'title'      => 'Blog',
        //                 'path'       => 'blog_pending',
        //                 'permission' => ['read-blog'],
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>'
        //             ), 
        //             array(
        //                 'title'      => 'Creator',
        //                 'path'       => 'creator_pending',
        //                 'permission' => ['read-marketers'],
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>'
        //             ),
        //             array(
        //                 'title'      => 'Video',
        //                 'path'       => 'video_pending',
        //                 'permission' => ['read-videos'],
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>'
        //             ), 

                    

                    
              
                                
        //         ),   
                  
        //     ),
        // ),
        array(
            'title' => 'Pending',
            'path'  => 'show_pending',

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Tickets',
            'path'  => 'tickets',
            'permission' => ['read-tickets'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        
        array(
            'title' => 'Blogs',
            'path'  => 'blogs',
            // 'role' => 'مسؤول المقالات',
            'permission' => ['read-blog'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Videos',
            'path'  => 'videos',
            'permission' => ['read-videos'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Podcasts',
            'path'  => 'podcasts',
            'permission' => ['read-podcasts'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),

        array(
            'title' => 'New Podcasts',
            'path'  => 'new_index',
            'permission' => ['read-podcasts'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        
        array(
            'title' => 'Consulting',
            'path'  => 'consloution',
            'permission' => ['read-consloution'],

            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        

        // array(
        //     'title'      => 'Keywords',
        //     'permission' => ['read-keywords'],

        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-layers fs-3"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'      => 'Service Keyword',
        //                 'path'       => 'service_keyword',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
        //             ),
        //             array(
        //                 'title'      => 'Blog Keyword',
        //                 'path'       => 'blog_keyword',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
        //             ),
        //             array(
        //                 'title'      => 'Vedio Keyword',
        //                 'path'       => 'video_index',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'      => 'Podcast Keyword',
        //                 'path'       => 'podcast_keyword_index',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'      => 'Consoltion Keyword',
        //                 'path'       => 'consoltion_keyword',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //             ),
        //         ),   
                  
        //     ),
        // ),
    ),

    // Horizontal menu
    'horizontal'    => array(
        // Dashboard
       
    ),
);
