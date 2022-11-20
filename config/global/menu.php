<?php
use Auth;
if(Auth::user()->type =='Admin'){


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
            'title'   => 'Specialties',
            'path'    => 'specialtys',
            'classes' => array('item' => 'me-lg-1'),
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fa fa-user fs-3"></i>',
            ),
        ),
        array(
            'title'      => 'Category',
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
                        'title'      => 'Service Cateory',
                        'path'       => 'service_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
                    array(
                        'title'      => 'Blog Cateory',
                        'path'       => 'blog_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Vedio Cateory',
                        'path'       => 'video_category',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Podcast Cateory',
                        'path'       => 'podcast_index',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Consoltion Cateory',
                        'path'       => 'consultation_category',
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
               
                ),   
                  
            ),
        ),
        array(
            'title' => 'Users',
            'path'  => 'users',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Roles',
            'path'  => 'roles',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        
        array(
            'title' => 'Countries',
            'path'  => 'countires',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Cities',
            'path'  => 'city',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Payments',
            'path'  => 'payments',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Place of consoltion',
            'path'  => 'places',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Marketers',
            'path'  => 'marketers',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Customers',
            'path'  => 'customers',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title'      => 'Orders',
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
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
                    array(
                        'title'      => 'Consulting Booking',
                        'path'       => 'order_consulting',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
              
                ),   
                  
            ),
        ),
        array(
            'title' => 'Services',
            'path'  => 'services',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Tickets',
            'path'  => 'tickets',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Blogs',
            'path'  => 'blogs',
            'role' => 'مسؤول المقالات',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Videos',
            'path'  => 'videos',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        array(
            'title' => 'Podcasts',
            'path'  => 'podcasts',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),

        array(
            'title' => 'New Podcasts',
            'path'  => 'new_index',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        
        array(
            'title' => 'Consulting',
            'path'  => 'consloution',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
        ),
        

        array(
            'title'      => 'Keywords',
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
                        'title'      => 'Service Keyword',
                        'path'       => 'service_keyword',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
                    array(
                        'title'      => 'Blog Keyword',
                        'path'       => 'blog_keyword',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                       
                    ),
                    array(
                        'title'      => 'Vedio Keyword',
                        'path'       => 'video_index',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Podcast Keyword',
                        'path'       => 'podcast_keyword_index',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Consoltion Keyword',
                        'path'       => 'consoltion_keyword',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                    ),
                ),   
                  
            ),
        ),
    ),

    // Horizontal menu
    'horizontal'    => array(
        // Dashboard
       
    ),
);
}elseif(Auth::user()->type == 'staff' && Auth::user()->hasPermissionTo('read-blog')){
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
            array(
                'title' => 'Blogs',
                'path'  => 'blogs',
                'role' => 'مسؤول المقالات',
                'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-2"),
            ),
            
    
       
            
        ),
    
        // Horizontal menu
        'horizontal'    => array(
            // Dashboard
           
        ),
    );
}

