<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    // This is your option name where all the Redux data is stored.
    $opt_name = $theme->get( 'Name' );
    $opt_name = str_replace(' child', '', strtolower($opt_name));
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => $theme->get( 'Template' ),
        'page_title'           => $theme->get( 'Template' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'c4d-admin-menu-icon',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => get_template_directory_uri().'/menu-admin-icon-20x20.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'tet30' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'tet30' ),
    );

    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-extensions',
    //     'href'  => 'reduxframework.com/extensions',
    //     'title' => __( 'Extensions', 'tet30' ),
    // );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    // $args['share_icons'][] = array(
    //     'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    //     'title' => 'Visit us on GitHub',
    //     'icon'  => 'el el-github'
    //     //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    //     'title' => 'Like us on Facebook',
    //     'icon'  => 'el el-facebook'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        // $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'tet30' ), $v );
    } else {
        // $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'tet30' );
    }

    // Add content after the form.
    // $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'tet30' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */
    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Global Options', 'tet30' ),
        'id'               => 'global',
        'desc'             => __( 'These are really basic fields!', 'tet30' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Dimensions', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'opt-dimension',
                'type'     => 'dimensions',
                'title'    => __( 'Main Width', 'tet30' ),
                'height'   => false,
                'units'    => 'px',
                'default'  => array(
                    'width'   => '1200'
                ),
                'output'    => array(
                    'width' => '.tet30-main-width'
                )
            )
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'tet30' ),
        'id'               => 'header',
        'desc'             => __( 'These are really basic fields!', 'tet30' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Global', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header-global-layout',
                'type'     => 'select',
                'title'    => __('Header Layout', 'tet30'), 
                'options'  => array(
                    'header-default' => 'Default',
                    'header-logo-menu-buttons' => 'Logo Menu Buttons',
                    'header-big-search' => 'Big Search'
                ),
                'default'  => 'header-default',
            ),
            array(
                'id'       => 'header-global-fullwidth',
                'type'     => 'button_set',
                'title'    => __( 'Header Fullwidth', 'tet30' ),
                'options' => array(
                    'yes' => __('Yes', 'tet30'),
                    'no' => __('No', 'tet30')
                 ), 
                'default'  => 'no'
            ),
            array(
                'id'       => 'header-global-sticky',
                'type'     => 'button_set',
                'title'    => __( 'Header Sticky', 'tet30' ),
                'options' => array(
                    'yes' => __('Yes', 'tet30'),
                    'no' => __('No', 'tet30')
                 ), 
                'default'  => 'no'
            ),
            array(
                'id'       => 'header-global-transparent',
                'type'     => 'button_set',
                'title'    => __( 'Header Transparent', 'tet30' ),
                'options' => array(
                    'yes' => __('Yes', 'tet30'),
                    'no' => __('No', 'tet30')
                 ), 
                'default'  => 'no'
            ),
            array(
                'id'       => 'header-global-backgound-color',
                'type'     => 'color',
                'title'    => __('Header Background Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('background-color' => '.site-header-main')
            ),
            array(
                'id'       => 'header-global-text-color',
                'type'     => 'color',
                'title'    => __('Header Text Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('color' => '.site-header-main')
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Menu', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header-menu-color',
                'type'     => 'color',
                'title'    => __('Text Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('color' => '.tet30-menu ul li a')
            ),
            array(
                'id'       => 'header-menu-color-hover',
                'type'     => 'color',
                'title'    => __('Text Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('color' => '.tet30-menu ul li a:hover')
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Promo', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header-promo',
                'type'     => 'text',
                'title'    => __( 'Header Promo', 'tet30' ),
                'default'  => '25% Off Site-Wide! Use Promo Code: SPRING25'
            ),
            array(
                'id'       => 'header-free-ship',
                'type'     => 'text',
                'title'    => __( 'Header Free Ship', 'tet30' ),
                'default'  => 'FREE US SHIPPING OVER $50 | FREE EXCHANGES & RETURNS'
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Buttons', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header-button-cart',
                'type'     => 'button_set',
                'title'    => __( 'Show Cart', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 0
            ),
            array(
                'id'       => 'header-button-compare',
                'type'     => 'button_set',
                'title'    => __( 'Show Compare', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 0
            ),
            array(
                'id'       => 'header-button-wishlist',
                'type'     => 'button_set',
                'title'    => __( 'Show Wishlist', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 0
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog', 'tet30' ),
        'id'               => 'blog',
        'desc'             => __( 'Blog Setting', 'tet30' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Archive Page', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'blog-style',
                'type'     => 'button_set',
                'title'    => __( 'Blog Style', 'tet30' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3
                 ), 
                'default'  => 1
            ),
            array(
                'id'       => 'blog-sidebar-left',
                'type'     => 'button_set',
                'title'    => __( 'Left Sidebar Width', 'tet30' ),
                'options' => array(
                    '4' => '1/3',
                    '3' => '1/4',
                    '2' => '1/5',
                 ), 
                'default'  => 2
            ),
            array(
                'id'       => 'blog-sidebar-right',
                'type'     => 'button_set',
                'title'    => __( 'Right Sidebar Width', 'tet30' ),
                'options' => array(
                    '4' => '1/3',
                    '3' => '1/4',
                    '2' => '1/5',
                 ), 
                'default'  => 3
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Woocommerce', 'tet30' ),
        'id'               => 'woocommerce',
        'desc'             => __( 'Woocommerce Setting', 'tet30' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Product Page', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'single-buttons',
                'type'     => 'checkbox',
                'title'    => __( 'Buttons', 'tet30' ),
                'options' => array(
                    'wishlist' =>  __('Wish List', 'tet30'),
                    'compare' =>  __('Quick View', 'tet30'),
                ), 
                'default' => array(
                    'wishlist' =>  1,
                    'compare' =>  1
                )
            ),
            array(
                'id'       => 'single-share',
                'type'     => 'button_set',
                'title'    => __( 'Share Button', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 1
            ),
            array(
                'id'       => 'single-review',
                'type'     => 'button_set',
                'title'    => __( 'Review List', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 1
            ),
            array(
                'id'       => 'single-review-form',
                'type'     => 'button_set',
                'title'    => __( 'Review Form', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 1
            ),
            array(
                'id'       => 'single-related',
                'type'     => 'button_set',
                'title'    => __( 'Related Products', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 1
            ),
            array(
                'id'       => 'single-upsell',
                'type'     => 'button_set',
                'title'    => __( 'Upsell Products', 'tet30' ),
                'options' => array(
                    '1' => __('Yes', 'tet30'),
                    '0' => __('No', 'tet30')
                 ), 
                'default'  => 1
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Archive Product Page', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'listing-column',
                'type'     => 'button_set',
                'title'    => __( 'Column', 'tet30' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6
                 ), 
                'default'  => 4
            ),
            array(
                'id'    => 'listing-paginate-info',
                'type'  => 'info',
                'style' => 'warning',
                'desc'  => __('Please use option in C4D Plugin Manager -> Woo Fillter -> Load More for Paginate Style', 'tet30')
            ),
            array(
                'id'       => 'listing-paginate',
                'type'     => 'button_set',
                'title'    => __( 'Paginate', 'tet30' ),
                'options' => array(
                    'default' => __('Default', 'tet30'), 
                    'loadmore' =>  __('Load More', 'tet30'),
                    'scrollload' =>  __('Scroll Load', 'tet30')
                 ), 
                'default' => 'default'
            ),
            array(
                'id'       => 'listing-buttons',
                'type'     => 'checkbox',
                'title'    => __( 'Buttons', 'tet30' ),
                'subtitle'    => __( 'Buttons', 'tet30' ),
                'options' => array(
                    'addtocart' => __('Add To Cart', 'tet30'), 
                    'wishlist' =>  __('Wish List', 'tet30'),
                    'compare' =>  __('Compare', 'tet30'),
                    'quickview' =>  __('Quick View', 'tet30'),
                    'countdown' =>  __('Count Down', 'tet30')
                 ), 
                'default' => array(
                    'addtocart' => 1, 
                    'wishlist' =>  1,
                    'compare' =>  1,
                    'quickview' =>  1,
                    'countdown' => 1
                )
            ),
            array(
                'id'       => 'listing-sidebar-left',
                'type'     => 'button_set',
                'title'    => __( 'Left Sidebar Width', 'tet30' ),
                'options' => array(
                    '4' => '1/3',
                    '3' => '1/4',
                    '2' => '1/5',
                 ), 
                'default'  => 2
            ),
            array(
                'id'       => 'listing-sidebar-right',
                'type'     => 'button_set',
                'title'    => __( 'Right Sidebar Width', 'tet30' ),
                'options' => array(
                    '4' => '1/3',
                    '3' => '1/4',
                    '2' => '1/5',
                 ), 
                'default'  => 3
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Typography', 'tet30' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Body & Heading', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'          => 'typography-body',
                'type'        => 'typography', 
                'title'       => __('body', 'tet30'),
                'output'      => array('body'),
                'units'       =>'px',
                'text-align'  => false,
                'text-transform' => true,
                'letter-spacing' => true,
                'line-height' => false
            ),
            array(
                'id'          => 'typography-h1',
                'type'        => 'typography', 
                'title'       => __('H1', 'tet30'),
                'output'      => array('h1'),
                'units'       =>'px',
                'text-align'  => false,
                'text-transform' => true,
                'letter-spacing' => true,
                'line-height' => false
            ),
            array(
                'id'          => 'typography-h2',
                'type'        => 'typography', 
                'title'       => __('H2', 'tet30'),
                'output'      => array('h2'),
                'units'       =>'px',
            ),
            array(
                'id'          => 'typography-h3',
                'type'        => 'typography', 
                'title'       => __('H3', 'tet30'),
                'output'      => array('h3'),
                'units'       =>'px',
                'text-align'  => false,
            ),
            array(
                'id'          => 'typography-h4',
                'type'        => 'typography', 
                'title'       => __('H4, H5, H6', 'tet30'),
                'output'      => array('h4', 'h5', 'h6'),
                'units'       =>'px',
                'text-align'  => false,
            )
         )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Color', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'       => 'typo-color',
                'type'     => 'color',
                'title'    => __('Theme Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array(
                    'border-bottom-color' => '.widget-title, .comment-reply-title',
                    'background' => '.c4d-woo-cgz .zoom-button.active, .c4d-woo-cgz .zoom-button:hover, .c4d-woo-cgz .layout-button.active, .c4d-woo-cgz .layout-button:hover, .c4d-woo-cgz-layout .zoom-button.active, .c4d-woo-cgz-layout .zoom-button:hover, .c4d-woo-cgz-layout .layout-button.active, .c4d-woo-cgz-layout .layout-button:hover, .c4d-woo-qv__link:hover, .c4d-woo-wishlist-button:hover, .c4d-woo-compare-button:hover, .woocommerce ul.products li.product .addtocart > a:hover, .woocommerce-page ul.products li.product .addtocart > a:hover, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .tet30-feature-buttons .c4d-woo-qv__link:hover, .tet30-feature-buttons .c4d-woo-wishlist-button:hover, .tet30-feature-buttons .c4d-woo-compare-button:hover, .product_meta > * a:hover, .woocommerce-product-gallery__wrapper .slick-prev:hover, .woocommerce-product-gallery__wrapper .slick-next:hover, .c4d-woo-vs-gallery .slick-prev:hover, .c4d-woo-vs-gallery .slick-next:hover, .c4d-woo-bundle-badge, .hesperiden.tparrows:hover',
                    'color' => '.tet30-menu ul li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a .count, .woocommerce .woocommerce-breadcrumb a:hover'
                )
            ),
            array(
                'id'       => 'typo-text-color',
                'type'     => 'color',
                'title'    => __('Text Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array(
                    'color' => 'body'
                )
            ),
            array(
                'id'       => 'typo-link-color',
                'type'     => 'color',
                'title'    => __('Link Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('a')
            ),
            array(
                'id'       => 'typo-link-color-hover',
                'type'     => 'color',
                'title'    => __('Link Hover Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('a:hover')
            )
         )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Button', 'tet30' ),
        'subsection'       => true,
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'       => 'typo-button-color',
                'type'     => 'color',
                'compiler' => true,
                'title'    => __('Main Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'typo-button-color-hover',
                'type'     => 'color',
                'compiler' => true,
                'title'    => __('Main Hover Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false
            )
         )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'tet30' ),
        'id'               => 'footer',
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'footer-global-layout',
                'type'     => 'select',
                'title'    => __('Footer Layout', 'tet30'), 
                'options'  => array(
                    'footer-default' => 'Default',
                    'footer-simple' => 'Simple'
                ),
                'default'  => 'footer-default'
            ),
            array(
                'id'       => 'footer-backgound-color',
                'type'     => 'color',
                'title'    => __('Footer Background Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('background-color' => 'footer.site-footer')
            ),
            array(
                'id'       => 'footer-text-color',
                'type'     => 'color',
                'title'    => __('Footer Text Color', 'tet30'), 
                'validate' => 'color',
                'transparent' => false,
                'output'    => array('color' => 'footer.site-footer')
            ),
            array(
                'id'       => 'copyright',
                'type'     => 'text',
                'title'    => __( 'Copyright', 'tet30' ),
                'default'  => 'All Rights Reserved.'
            ),
            array(
                'id'       => 'footer-social',
                'type'     => 'textarea',
                'title'    => __( 'Social Logo', 'tet30' ),
                'default'  => '<div class="tet30-socials"><a herf="#"><i class="fa fa-youtube"></i></a><a herf="#"><i class="fa fa-facebook"></i></a><a herf="#"><i class="fa fa-twitter"></i></a><a herf="#"><i class="fa fa-instagram"></i></a></div>'
            ),
            array(
                'id'       => 'footer-global-go-to-top',
                'type'     => 'button_set',
                'title'    => __( 'Go To Top', 'tet30' ),
                'options' => array(
                    'no' => __('No', 'tet30'),
                    'yes' => __('Yes', 'tet30')
                 ), 
                'default'  => 'no'
            )
        )
    ) );

    
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'tet30_remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'tet30_compiler_action', 2, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'tet30' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'tet30' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'tet30_remove_demo' ) ) {
        function tet30_remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

