<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package airvice
 */

/**
 *
 * airvice header
 */

function airvice_check_header()
{
    $airvice_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $airvice_default_header_style = get_theme_mod('choose_default_header', 'header-style-1');

    if ($airvice_header_style == 'header-style-1') {
        airvice_header_style_1();
    } else {
        airvice_header_style_1();
    }

}

add_action('airvice_header_style', 'airvice_check_header', 10);

/**
 * header style 1 + default
 */

function airvice_header_style_1()
{

    $airvice_topbar_switch = get_theme_mod('airvice_topbar_switch', false);
    $airvice_cart_hide = get_theme_mod('airvice_cart_hide', false);
    $airvice_show_button = get_theme_mod('airvice_show_button', false);
    $airvice_show_cta = get_theme_mod('airvice_show_cta', false);
    $airvice_hamburger_hide = get_theme_mod('airvice_hamburger_hide', false);
    $airvice_show_header_search = get_theme_mod('airvice_show_header_search', false);

    $airvice_mail_id = get_theme_mod('airvice_mail_id', __('info@sycho24.com', 'airvice'));
    $airvice_welcome_text = get_theme_mod('airvice_welcome_text', __(' Opening Time: Sunday to Thursday', 'airvice'));
    $airvice_phone = get_theme_mod('airvice_phone', __('02 (555) 520 890', 'airvice'));
    $airvice_phone_link = get_theme_mod('airvice_phone_link', __('876864764764', 'airvice'));
    $airvice_address = get_theme_mod('airvice_address', __('28/4 Palmal, London', 'airvice'));
    $airvice_open_hour = get_theme_mod('airvice_open_hour', __('Sunday to Thursday', 'airvice'));

    $airvice_header_right = get_theme_mod('airvice_header_right', false);
    $airvice_menu_col = $airvice_header_right ? 'col-xl-7 col-lg-6 col-4' : 'text-end col-xl-10 col-lg-9 col-4';
    $airvice_menu_right = $airvice_header_right ? 'text-center' : 'text-right';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('airvice_button_text_rtl', __('Get A Quote', 'airvice'));
    } else {
        $btn_text = get_theme_mod('airvice_button_text', __('Get A Quote', 'airvice'));
    }

    $btn_link = get_theme_mod('airvice_button_link', __('#', 'airvice'));

    ?>
    <!-- header area start here -->
    <header>
        <div class="header-area">
            <div class="custom-spacing pl-60 pr-60">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between">
                            <div class="header-logo">
                                <a href="#">
                                    <img src="<?php print get_theme_file_uri('/assets/img/logo/logo.png'); ?>"
                                         alt="logo">
                                </a>
                            </div>
                            <div class="main-menu fix d-none d-lg-inline-block">
                                <?php airvice_header_menu(); ?>
                            </div>

                            <div class="d-inline-block d-lg-none">
                                <div class="open-mobile-menu">
                                    <a href="#" class="">
                                        <i class="far fa-bars"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside class="slide-bar">
        <div class="close-mobile-menu">
            <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>
        <nav class="side-mobile-menu">
            <?php airvice_mobile_menu(); ?>
        </nav>
    </aside>
    <div class="body-overlay"></div>

    <?php
}

/**
 * header style 2
 */
function airvice_header_style_2()
{
    $airvice_topbar_switch = get_theme_mod('airvice_topbar_switch', false);
    $airvice_cart_hide = get_theme_mod('airvice_cart_hide', false);
    $airvice_show_button = get_theme_mod('airvice_show_button', false);
    $airvice_show_cta = get_theme_mod('airvice_show_cta', false);
    $airvice_hamburger_hide = get_theme_mod('airvice_hamburger_hide', false);
    $airvice_show_header_search = get_theme_mod('airvice_show_header_search', false);

    $airvice_mail_id = get_theme_mod('airvice_mail_id', __('info@sycho24.com', 'airvice'));
    $airvice_welcome_text = get_theme_mod('airvice_welcome_text', __(' We do not received extra charges', 'airvice'));
    $airvice_phone = get_theme_mod('airvice_phone', __('02 (555) 520 890', 'airvice'));
    $airvice_phone_link = get_theme_mod('airvice_phone_link', __('876864764764', 'airvice'));
    $airvice_address = get_theme_mod('airvice_address', __('28/4 Palmal, London', 'airvice'));

    $airvice_header_right = get_theme_mod('airvice_header_right', false);
    $airvice_menu_col = $airvice_header_right ? 'col-xxl-7 col-xl-8 col-lg-6 col-4' : 'col-xxl-10 col-xl-10 col-lg-9 col-4';
    $airvice_menu_right = $airvice_header_right ? 'text-center' : 'text-right';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('airvice_button_text_rtl', __('Get Quote', 'airvice'));
    } else {
        $btn_text = get_theme_mod('airvice_button_text', __('Get A Quote', 'airvice'));
    }

    $btn_link = get_theme_mod('airvice_button_link', __('#', 'airvice'));

    ?>
    <!-- header area start here -->
    <header>
        <?php if (!empty($airvice_topbar_switch)) : ?>
            <div class="header-top black-soft-bg d-none d-lg-block">
                <div class="custom-container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-4">
                            <div class="header-top-left header-top-left-2">
                                <?php if (!empty($airvice_welcome_text)) : ?>
                                    <span><i class="flaticon-return-of-investment"></i><?php print esc_html($airvice_welcome_text); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="header-top-right header-top-right-2">
                                <ul>
                                    <?php if (!empty($airvice_address)) : ?>
                                        <li><i class="flaticon-pin"></i><?php print esc_html($airvice_address); ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($airvice_mail_id)) : ?>
                                        <li><i class="fal fa-envelope"></i><a
                                                    href="mailto:<?php print esc_url($airvice_mail_id); ?>"><?php print esc_html($airvice_mail_id) ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php airvice_header_social_profiles(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="header-menu header-sticky header-menu-2">
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-8">
                        <div class="header-logo pt-15 pb-15">
                            <?php airvice_header_logo(); ?>
                        </div>
                    </div>
                    <div class="<?php print esc_attr($airvice_menu_col); ?>">
                        <div class="main-menu d-none d-lg-block">
                            <nav id="mobile-menu">
                                <?php airvice_header_menu(); ?>
                            </nav>
                        </div>
                        <div class="side-menu-icon d-lg-none text-end">
                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                    <?php if (!empty($airvice_header_right)) : ?>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="header-right header-right-2 text-end">
                                <ul class="z-index">
                                    <?php airvice_header_lang_defualt(); ?>
                                    <?php if (!empty($btn_text)) : ?>
                                        <li><a href="<?php print esc_url($btn_link); ?>"
                                               class="theme-btn"><?php print esc_html($btn_text); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <?php airvice_mobile_sidebar(); ?>

    <?php
}

/**
 * header style 3
 */
function airvice_header_style_3()
{
    $airvice_topbar_switch = get_theme_mod('airvice_topbar_switch', false);
    $airvice_cart_hide = get_theme_mod('airvice_cart_hide', false);
    $airvice_show_button = get_theme_mod('airvice_show_button', false);
    $airvice_show_cta = get_theme_mod('airvice_show_cta', false);
    $airvice_hamburger_hide = get_theme_mod('airvice_hamburger_hide', false);
    $airvice_show_header_search = get_theme_mod('airvice_show_header_search', false);

    $airvice_mail_id = get_theme_mod('airvice_mail_id', __('info@sycho24.com', 'airvice'));
    $airvice_welcome_text = get_theme_mod('airvice_welcome_text', __(' We do not received extra charges', 'airvice'));
    $airvice_phone = get_theme_mod('airvice_phone', __('02 (555) 520 890', 'airvice'));
    $airvice_phone_link = get_theme_mod('airvice_phone_link', __('876864764764', 'airvice'));
    $airvice_address = get_theme_mod('airvice_address', __('28/4 Palmal, London', 'airvice'));

    $airvice_header_right = get_theme_mod('airvice_header_right', false);
    $airvice_menu_col = $airvice_header_right ? 'col-xl-8 col-lg-8 col-4' : 'col-12';
    $airvice_menu_right = $airvice_header_right ? 'text-center' : 'text-right';
    $airvice_topbar_switch = get_theme_mod('airvice_topbar_switch', false);
    $airvice_cart_hide = get_theme_mod('airvice_cart_hide', false);
    $airvice_show_button = get_theme_mod('airvice_show_button', false);
    $airvice_show_cta = get_theme_mod('airvice_show_cta', false);
    $airvice_hamburger_hide = get_theme_mod('airvice_hamburger_hide', false);
    $airvice_show_header_search = get_theme_mod('airvice_show_header_search', false);
    $btn_text_from_page = get_post_meta(get_the_ID(), 'button_text_from_page', true);
    $airvice_header_right = get_theme_mod('airvice_header_right', false);


    if (rtl_enable()) {
        $btn_text = get_theme_mod('airvice_button_text_rtl', __('Get A Quote', 'airvice'));
    } else {
        $btn_text = get_theme_mod('airvice_button_text', __('Get A Quote', 'airvice'));
    }

    $btn_link = get_theme_mod('airvice_button_link', __('#', 'airvice'));


    ?>


    <!-- header area start here -->
    <header>
        <?php if (!empty($airvice_topbar_switch)) : ?>
            <div class="header-top header-top-3 black-soft-bg d-none d-lg-block">
                <div class="custom-container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-4">
                            <div class="header-top-left header-top-left-3">
                                <?php if (!empty($airvice_welcome_text)) : ?>
                                    <span><i class="flaticon-return-of-investment"></i> <?php print esc_html($airvice_welcome_text); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="header-top-right header-top-right-3">
                                <ul>
                                    <li class="header--terms">
                                        <?php airvice_top_menu(); ?>
                                    </li>
                                    <?php airvice_header_social_profiles(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="header-bottom-3 d-none d-lg-block">
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="col-xxl-2 col-xl-2 col-lg-3">
                        <div class="header-logo pt-30 pb-30">
                            <?php airvice_header_logo(); ?>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9">
                        <div class="header-bottom-right text-end">
                            <div class="header__widget text-start">
                                <div class="header__widget--icon">
                                    <i class="flaticon-pin"></i>
                                </div>
                                <?php if (!empty($airvice_address)) : ?>
                                    <div class="header__widget--text">
                                        <span>Free Contact</span>
                                        <h4><?php print esc_html($airvice_address); ?></h4>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($airvice_mail_id)) : ?>
                                <div class="header__widget text-start">
                                    <div class="header__widget--icon">
                                        <i class="flaticon-email"></i>
                                    </div>
                                    <div class="header__widget--text">
                                        <span>Online Support</span>
                                        <h4>
                                            <a href="mailto:<?php print esc_url($airvice_mail_id); ?>"><?php print esc_html($airvice_mail_id); ?></a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($airvice_phone)) : ?>
                                <div class="header__widget text-start">
                                    <div class="header__widget--icon header__widget--icon__phone">
                                        <i class="flaticon-contact"></i>
                                    </div>
                                    <div class="header__widget--text">
                                        <span>Free Contact</span>
                                        <h4>
                                            <a href="tel:<?php print esc_url($airvice_phone_link); ?>"><?php print esc_html($airvice_phone); ?></a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-menu header-sticky header-menu-2 header-menu-3 z-index d-none d-lg-block">
            <div class="custom-container">
                <div class="header-menu-bg-3">
                    <div class="row align-items-center">
                        <div class="<?php print esc_attr($airvice_menu_col); ?>">
                            <div class="main-menu main-menu-3 d-none d-lg-block">
                                <nav id="mobile-menu">
                                    <?php airvice_header_menu(); ?>
                                </nav>
                            </div>
                            <div class="side-menu-icon d-lg-none text-end">
                                <button class="side-toggle side-toggle-3"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                        <?php if (!empty($airvice_header_right)) : ?>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="header-right header-right-2 text-end">
                                    <ul class="z-index">
                                        <?php airvice_header_lang_defualt(); ?>
                                        <?php if (!empty($btn_text)) : ?>
                                            <li><a href="<?php print esc_url($btn_link); ?>"
                                                   class="theme-btn"><?php print esc_html($btn_text); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-header header-sticky z-index d-lg-none">
            <div class="custom-container">
                <div class="header-menu-bg-33">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="header-logo pt-30 pb-30">
                                <?php airvice_header_logo(); ?>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-4">
                            <div class="main-menu main-menu-3 d-none d-lg-block">
                                <nav>
                                    <?php airvice_header_menu(); ?>
                                </nav>
                            </div>
                            <div class="side-menu-icon d-lg-none text-end">
                                <button class="side-toggle side-toggle-3"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <?php airvice_mobile_sidebar(); ?>


    <?php
}

// header 4
function airvice_header_style_4()
{

    $airvice_topbar_switch = get_theme_mod('airvice_topbar_switch', false);
    $airvice_cart_hide = get_theme_mod('airvice_cart_hide', false);
    $airvice_show_button = get_theme_mod('airvice_show_button', false);
    $airvice_show_cta = get_theme_mod('airvice_show_cta', false);
    $airvice_hamburger_hide = get_theme_mod('airvice_hamburger_hide', false);
    $airvice_show_header_search = get_theme_mod('airvice_show_header_search', false);

    $airvice_mail_id = get_theme_mod('airvice_mail_id', __('info@sycho24.com', 'airvice'));
    $airvice_welcome_text = get_theme_mod('airvice_welcome_text', __(' We do not received extra charges', 'airvice'));
    $airvice_phone = get_theme_mod('airvice_phone', __('02 (555) 520 890', 'airvice'));
    $airvice_phone_link = get_theme_mod('airvice_phone_link', __('876864764764', 'airvice'));
    $airvice_address = get_theme_mod('airvice_address', __('28/4 Palmal, London', 'airvice'));
    $airvice_open_hour = get_theme_mod('airvice_open_hour', __('Sunday to Thursday', 'airvice'));

    $airvice_header_right = get_theme_mod('airvice_header_right', false);
    $airvice_menu_col = $airvice_header_right ? 'col-xxl-6 col-xl-8 col-lg-6 col-4' : 'col-xxl-10 col-xl-10 col-lg-9 col-4';
    $airvice_menu_right = $airvice_header_right ? 'text-center' : 'text-right';

    if (rtl_enable()) {
        $btn_text = get_theme_mod('airvice_button_text_rtl', __('Get Quote', 'airvice'));
    } else {
        $btn_text = get_theme_mod('airvice_button_text', __('Get Quote', 'airvice'));
    }

    $btn_link = get_theme_mod('airvice_button_link', __('#', 'airvice'));

    ?>
    <?php
}


/**
 * [airvice_extra_info description]
 * @return [type] [description]
 */
function airvice_extra_info()
{
    $airvice_extra_info_logo = get_theme_mod('airvice_extra_info_logo', get_template_directory_uri() . '/assets/images/logo/logo.png');

    // about title
    $airvice_extra_about_text = get_theme_mod('airvice_extra_about_text', __('We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain was born and I will give you a completed accounts of the system and expound.', 'airvice'));
    $airvice_extra_button = get_theme_mod('airvice_extra_button', __('Contact Us', 'airvice'));
    $airvice_extra_button_url = get_theme_mod('airvice_extra_button_url', __('#', 'airvice'));

    // address
    $airvice_extra_address = get_theme_mod('airvice_extra_address', __('Ave 14th Street, Mirpur 210, San Franciso, USA 3296.', 'airvice'));

    // phone 
    $airvice_extra_phone = get_theme_mod('airvice_extra_phone', __('+0989 7876 9865 9', 'airvice'));

    // email 
    $airvice_extra_email = get_theme_mod('airvice_extra_email', __('info@example.com', 'airvice'));

    ?>

    <!-- sidebar area start -->
    <section class="sidebar__area d-none">
        <div class="sidebar__wrapper">
            <div class="sidebar__close">
                <button class="sidebar__close-btn" id="sidebar__close-btn">
                    <span><i class="fal fa-times"></i></span>
                    <span><?php print esc_html__('close', 'airvice'); ?></span>
                </button>
            </div>
            <div class="sidebar__tab">
                <ul class="nav nav-tabs" id="sidebar-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab"
                           aria-controls="menu" aria-selected="true"><?php print esc_html__('menu', 'airvice'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                           aria-selected="false"><?php print esc_html__('info', 'airvice'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__content">
                <div class="tab-content" id="sidebar-tab-content">
                    <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                        <?php if (!empty($airvice_extra_info_logo)) : ?>
                            <div class="logo mb-40">
                                <a href="<?php print esc_url(home_url('/')); ?>">
                                    <img src="<?php print esc_url($airvice_extra_info_logo); ?>"
                                         alt="<?php print esc_attr('Logo', 'airvice'); ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="sidebar__info">
                            <?php if (!empty($airvice_extra_info_logo)) : ?>
                                <div class="logo mb-40">
                                    <a href="<?php print esc_url(home_url('/')); ?>">
                                        <img src="<?php print esc_url($airvice_extra_info_logo); ?>"
                                             alt="<?php print esc_attr__('Logo', 'airvice'); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($airvice_extra_about_text)) : ?>
                                <p><?php print esc_html($airvice_extra_about_text); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($airvice_extra_button)) : ?>
                                <a href="<?php print esc_url($airvice_extra_button_url); ?>"
                                   class="z-btn z-btn-white"><?php print esc_html($airvice_extra_button); ?></a>
                            <?php endif; ?>

                            <div class="sidebar__search">
                                <form action="#">
                                    <input type="text"
                                           placeholder="<?php print esc_attr__('Your Keywords', 'airvice'); ?>">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                            <div class="sidebar__contact mt-30">
                                <ul>
                                    <?php if (!empty($airvice_extra_address)) : ?>
                                        <li>
                                            <div class="icon">
                                                <i class="fal fa-map-marker-alt"></i>
                                            </div>
                                            <div class="text">
                                                <span><?php print esc_html($airvice_extra_address); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($airvice_extra_email)) : ?>
                                        <li>
                                            <div class="icon">
                                                <i class="fal fa-envelope"></i>
                                            </div>
                                            <div class="text ">
                                                <span><a href="mailto:<?php print esc_url($airvice_extra_email); ?>"><?php print esc_html($airvice_extra_email); ?></a></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($airvice_extra_phone)) : ?>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div class="text">
                                                <span><a href="tel:<?php print esc_url($airvice_extra_phone); ?>"><?php print esc_html($airvice_extra_phone); ?></a></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="body-overlay"></div>
    <!-- sidebar area end -->


<?php }


// airvice_mobile_sidebar
function airvice_mobile_sidebar()
{
    $airvice_mail_id = get_theme_mod('airvice_mail_id', __('info@sycho24.com', 'airvice'));
    $airvice_address = get_theme_mod('airvice_address', __('28/4 Palmal, London', 'airvice'));
    $airvice_open_hour = get_theme_mod('airvice_open_hour', __('Sunday to Thursday', 'airvice'));
    $airvice_contact_label = get_theme_mod('airvice_contact_label', __('Contact Info', 'airvice'));
    $airvice_mobile_info = get_theme_mod('airvice_mobile_info', false);
    ?>

    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>
            <div class="side-info-content">
                <?php if (!empty($airvice_mobile_info)) : ?>
                    <div class="contact-infos mb-30">
                        <div class="contact-list mb-30">
                            <h4><?php print esc_html($airvice_contact_label); ?></h4>
                            <ul>
                                <?php if (!empty($airvice_open_hour)) : ?>
                                    <li><i class="flaticon-history"></i><?php print esc_html($airvice_open_hour); ?>
                                    </li>
                                <?php endif; ?>
                                <?php if (!empty($airvice_address)) : ?>
                                    <li><i class="flaticon-pin"></i><?php print esc_html($airvice_address); ?></li>
                                <?php endif; ?>
                                <?php if (!empty($airvice_mail_id)) : ?>
                                    <li><i class="fal fa-envelope"></i><a
                                                href="mailto:<?php print esc_url($airvice_mail_id); ?>"><?php print esc_html($airvice_mail_id); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <div class="sidebar__menu--social">
                                <?php airvice_mobile_social_profiles(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>


<?php }

/**
 * [airvice_header_lang description]
 * @return [type] [description]
 */
function airvice_header_lang_defualt()
{
    $airvice_header_lang = get_theme_mod('airvice_header_lang', false);
    if ($airvice_header_lang): ?>


        <li class="language"><?php print esc_html__('Eng', 'airvice'); ?></a>
            <?php do_action('airvice_language'); ?>
        </li>


    <?php endif; ?>
    <?php
}

/**
 * [airvice_language_list description]
 * @return [type] [description]
 */
function _airvice_language($mar)
{
    return $mar;
}

function airvice_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<a class="' . $active . '" href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<div class="language-dropdown">';
        $mar .= '<a href="#">' . esc_html__('Fre', 'airvice') . '</a>';
        $mar .= '<a href="#">' . esc_html__('Chi', 'airvice') . '</a>';
        $mar .= '<a href="#">' . esc_html__('Jap', 'airvice') . '</a>';
        $mar .= '<a href="#">' . esc_html__('Rus', 'airvice') . '</a>';
        $mar .= ' </div>';
    }
    print _airvice_language($mar);
}

add_action('airvice_language', 'airvice_language_list');

// favicon logo
function airvice_favicon_logo_func()
{
    $airvice_favicon = get_template_directory_uri() . '/assets/images/logo/favicon.png';
    $airvice_favicon_url = get_theme_mod('favicon_url', $airvice_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url($airvice_favicon_url); ?>">

    <?php
}

add_action('wp_head', 'airvice_favicon_logo_func');

// header logo
function airvice_header_logo()
{
    ?>
    <?php
    $airvice_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
    $airvice_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
    $airvice_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.png';

    $airvice_site_logo = get_theme_mod('logo', $airvice_logo);
    $airvice_secondary_logo = get_theme_mod('seconday_logo', $airvice_logo_white);
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {

        if (!empty($airvice_logo_on)) { ?>
            <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($airvice_secondary_logo); ?>"
                     alt="<?php print esc_attr__('logo', 'airvice'); ?>"/>
            </a>
            <?php
        } else { ?>
            <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($airvice_site_logo); ?>"
                     alt="<?php print esc_attr__('logo', 'airvice'); ?>"/>
            </a>
            <?php
        }
    }
    ?>
    <?php
}

// header logo
function airvice_header_sticky_logo()
{
    ?>
    <?php
    $airvice_logo = get_template_directory_uri() . '/assets/images/logo/logo-gradient.png';

    $airvice_site_logo = get_theme_mod('logo_sticky', $airvice_logo);
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        ?>

        <a class="standard-logo-white" href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($airvice_site_logo); ?>" alt="<?php print esc_attr__('logo', 'airvice'); ?>"/>
        </a>
        <?php

    }
    ?>
    <?php
}


/**
 * [airvice_header_social_profiles description]
 * @return [type] [description]
 */
function airvice_header_social_profiles()
{
    $airvice_topbar_fb_url = get_theme_mod('airvice_topbar_fb_url', __('#', 'airvice'));
    $airvice_topbar_twitter_url = get_theme_mod('airvice_topbar_twitter_url', __('#', 'airvice'));
    $airvice_topbar_instagram_url = get_theme_mod('airvice_topbar_instagram_url', __('#', 'airvice'));
    $airvice_topbar_linkedin_url = get_theme_mod('airvice_topbar_linkedin_url', __('#', 'airvice'));
    $airvice_topbar_youtube_url = get_theme_mod('airvice_topbar_youtube_url', __('#', 'airvice'));
    ?>
    <li class="header--social">
        <?php if (!empty($airvice_topbar_fb_url)): ?>
            <a href="<?php print esc_url($airvice_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>

        <?php if (!empty($airvice_topbar_twitter_url)): ?>
            <a href="<?php print esc_url($airvice_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>

        <?php if (!empty($airvice_topbar_instagram_url)): ?>
            <a href="<?php print esc_url($airvice_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>

        <?php if (!empty($airvice_topbar_linkedin_url)): ?>
            <a href="<?php print esc_url($airvice_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
        <?php endif; ?>

        <?php if (!empty($airvice_topbar_youtube_url)): ?>
            <a href="<?php print esc_url($airvice_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
    </li>
    <?php
}

// airvice_mobile_social_profiles
function airvice_mobile_social_profiles()
{
    $airvice_topbar_fb_url = get_theme_mod('airvice_topbar_fb_url', __('#', 'airvice'));
    $airvice_topbar_twitter_url = get_theme_mod('airvice_topbar_twitter_url', __('#', 'airvice'));
    $airvice_topbar_instagram_url = get_theme_mod('airvice_topbar_instagram_url', __('#', 'airvice'));
    $airvice_topbar_linkedin_url = get_theme_mod('airvice_topbar_linkedin_url', __('#', 'airvice'));
    $airvice_topbar_youtube_url = get_theme_mod('airvice_topbar_youtube_url', __('#', 'airvice'));
    ?>
    <?php if (!empty($airvice_topbar_fb_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_twitter_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_instagram_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_linkedin_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_youtube_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
<?php endif; ?>
    <?php
}

// airvice_footer_social_profiles
function airvice_footer_social_profiles()
{
    $airvice_topbar_fb_url = get_theme_mod('airvice_topbar_fb_url', __('#', 'airvice'));
    $airvice_topbar_twitter_url = get_theme_mod('airvice_topbar_twitter_url', __('#', 'airvice'));
    $airvice_topbar_instagram_url = get_theme_mod('airvice_topbar_instagram_url', __('#', 'airvice'));
    $airvice_topbar_linkedin_url = get_theme_mod('airvice_topbar_linkedin_url', __('#', 'airvice'));
    $airvice_topbar_youtube_url = get_theme_mod('airvice_topbar_youtube_url', __('#', 'airvice'));
    ?>
    <?php if (!empty($airvice_topbar_fb_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_twitter_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_instagram_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_linkedin_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a>
<?php endif; ?>

    <?php if (!empty($airvice_topbar_youtube_url)): ?>
    <a href="<?php print esc_url($airvice_topbar_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
<?php endif; ?>
    <?php
}


/**
 * [airvice_header_menu description]
 * @return [type] [description]
 */
function airvice_header_menu()
{ ?>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_class' => '',
        'container' => '',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class
    ));
    ?>
    <?php
}

/**
 * [airvice_header_menu description]
 * @return [type] [description]
 */
function airvice_mobile_menu()
{ ?>
    <?php
    $airvice_menu = wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_class' => '',
        'container' => '',
        'menu_id' => 'mobile-menu-active',
        'echo' => false
    ));

    $airvice_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $airvice_menu);
    echo wp_kses_post($airvice_menu);
    ?>
    <?php
}

/**
 * [airvice_footer_menu description]
 * @return [type] [description]
 */
function airvice_top_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'top-menu',
        'menu_class' => 'm-0',
        'container' => '',
        'fallback_cb' => 'Navwalker_Class::fallback',
        'walker' => new Navwalker_Class
    ));
}

/**
 *
 * airvice footer
 */
add_action('airvice_footer_style', 'airvice_check_footer', 10);

function airvice_check_footer()
{
    $airvice_footer_style = function_exists('get_field') ? get_field('footer_style') : NULL;
    $airvice_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1');

    if ($airvice_footer_style == 'footer-style-1') {
        airvice_footer_style_1();
    } elseif ($airvice_footer_style == 'footer-style-2') {
        airvice_footer_style_2();
    } else {

        /** default footer style **/
        if ($airvice_default_footer_style == 'footer-style-2') {
            airvice_footer_style_2();
        } else {
            airvice_footer_style_1();
        }

    }
}

/**
 * footer  style_defaut
 */
function airvice_footer_style_1()
{
    $footer_bg_img = get_theme_mod('airvice_footer_bg');
    $airvice_footer_social = get_theme_mod('airvice_footer_social');
    $airvice_footer_top_space = function_exists('get_field') ? get_field('airvice_footer_top_space') : '0';
    $airvice_copyright_center = $airvice_footer_social ? 'col-md-7' : 'col-lg-12 pt-20 pb-20 text-center';
    $airvice_footer_bg_url_from_page = function_exists('get_field') ? get_field('airvice_footer_bg') : '';
    $airvice_footer_bg_color_from_page = function_exists('get_field') ? get_field('airvice_footer_bg_color') : '';
    $footer_bg_color = get_theme_mod('airvice_footer_bg_color');

    $footer_style_2_switch = get_theme_mod('footer_style_2_switch');

    // bg image
    $bg_img = !empty($airvice_footer_bg_url_from_page['url']) ? $airvice_footer_bg_url_from_page['url'] : $footer_bg_img;
    // bg color
    $bg_color = !empty($airvice_footer_bg_color_from_page) ? $airvice_footer_bg_color_from_page : $footer_bg_color;

    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for ($num = 1; $num <= $footer_widgets; $num++) {
        if (is_active_sidebar('footer-' . $num)) {
            $footer_columns++;
        }
    }


    switch ($footer_columns) {
        case '1':
            $footer_class[1] = 'col-lg-12';
            break;
        case '2':
            $footer_class[1] = 'col-lg-6 col-md-6';
            $footer_class[2] = 'col-lg-6 col-md-6';
            break;
        case '3':
            $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
            $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
            $footer_class[3] = 'col-xl-4 col-lg-6';
            break;
        case '4':
            $footer_class[1] = 'col-lg-3 col-sm-6';
            $footer_class[2] = 'col-lg-3 col-sm-6';
            $footer_class[3] = 'col-lg-3 col-sm-6';
            $footer_class[4] = 'col-lg-3 col-sm-6';
            break;
        default:
            $footer_class = 'col-xl-4 col-lg-4 col-md-6';
            break;
    }

    ?>

    <!-- footer area start here -->
    <footer data-background="assets/img/footer/footer-bg.jpg">
        <section class="footer-area pt-120 pb-90 black-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 wow fadeInUp" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?php print get_theme_file_uri('/assets/img/logo/logo.png'); ?>"
                                         alt="Footer Logo">
                                </a>
                            </div>

                            <div class="d-none">
                                <h4 class="footer__widget--title">About Us</h4>
                                <p>Maecens rhoncus molese conubia lores mauris class etiam potenti been nonum lectus
                                    folish consequat</p>
                                <div class="emg__number">
                                    <h5>Emergency :</h5>
                                    <h4><a href="tel:01254987596">02 (650) 365 2560</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 pl-80 wow fadeInUp" data-wow-delay=".6s">
                            <h4 class="footer__widget--title">Services</h4>
                            <ul class="widget__links">
                                <li><a href="service-details.html">Heating Service</a></li>
                                <li><a href="service-details.html">Installation</a></li>
                                <li><a href="service-details.html">Quality Testing</a></li>
                                <li><a href="service-details.html">Compressure</a></li>
                                <li><a href="service-details.html">Maintanence</a></li>
                                <li><a href="service-details.html">Cooler Cleaning</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 pl-30 wow fadeInUp" data-wow-delay=".9s">
                            <h4 class="footer__widget--title">Contact Info</h4>
                            <ul class="widget__contact">
                                <li>20/B, Collarado Demos<br>
                                    Beach, New York
                                </li>
                                <li><span>Support:</span> <a href="tel:54841871487">02 (305) 898 3265</a></li>
                                <li><span>Email:</span> <a href="mailto:info@airvice24.com">info@airvice24.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 wow fadeInUp" data-wow-delay="1.2s">
                            <h4 class="footer__widget--title">Newsletter</h4>
                            <p>Get every week update from airvice</p>
                            <form action="#" class="widget__subscribe">
                                <div class="field">
                                    <input type="email" placeholder="Enter Email">
                                </div>
                                <button type="submit" class="theme-btn">Subscirbe Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="copyright-area copyright-border black-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="copyright__text">
                            <span>Copyright © 2021 <a href="#">Bombo</a>. All Rights Reserved.</span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="copyright__social text-end">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end here -->


    <!-- footer area start here -->
    <footer class="footer-bg-color d-none" data-top-space="<?php print esc_attr($airvice_footer_top_space); ?>px"
            data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')): ?>
            <section class="footer-area pt-115 pb-90">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-1');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-2');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-3');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-' . $num)) continue;
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <div class="copyright-area copyright-border">
            <div class="container">
                <div class="row align-items-center">
                    <div class="<?php print esc_attr($airvice_copyright_center); ?>">
                        <div class="copyright__text">
                            <span><?php print airvice_copyright_text(); ?></span>
                        </div>
                    </div>
                    <?php if (!empty($airvice_footer_social)) : ?>
                        <div class="col-md-5">
                            <div class="copyright__social text-end">
                                <?php airvice_footer_social_profiles(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end here -->


    <?php
}

/**
 * footer  style 2
 */
function airvice_footer_style_2()
{

    $footer_bg_img = get_theme_mod('airvice_footer_bg');
    $airvice_footer_logo = get_theme_mod('airvice_footer_logo');
    $airvice_footer_social = get_theme_mod('airvice_footer_social');
    $airvice_footer_top_space = function_exists('get_field') ? get_field('airvice_footer_top_space') : '0';
    $airvice_copyright_center = $airvice_footer_social ? 'col-md-7' : 'col-lg-12 pt-20 pb-20 text-center';
    $airvice_footer_bg_url_from_page = function_exists('get_field') ? get_field('airvice_footer_bg') : '';
    $airvice_footer_bg_color_from_page = function_exists('get_field') ? get_field('airvice_footer_bg_color') : '';


    $footer_bg_color = get_theme_mod('airvice_footer_bg_color');

    // bg image
    $bg_img = !empty($airvice_footer_bg_url_from_page['url']) ? $airvice_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty($airvice_footer_bg_color_from_page) ? $airvice_footer_bg_color_from_page : $footer_bg_color;

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for ($num = 1; $num <= $footer_widgets; $num++) {
        if (is_active_sidebar('footer-2-' . $num)) {
            $footer_columns++;
        }
    }

    switch ($footer_columns) {
        case '1':
            $footer_class[1] = 'col-lg-12';
            break;
        case '2':
            $footer_class[1] = 'col-lg-6 col-md-6';
            $footer_class[2] = 'col-lg-6 col-md-6';
            break;
        case '3':
            $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
            $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
            $footer_class[3] = 'col-xl-4 col-lg-6';
            break;
        case '4':
            $footer_class[1] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-1 ';
            $footer_class[2] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-2 pl-50';
            $footer_class[3] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-3 pl-20';
            $footer_class[4] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6 footer-col-4 pl-20';
            break;
        default:
            $footer_class = 'col-xl-4 col-lg-4 col-md-6';
            break;
    }

    ?>
    <!-- footer area start here -->
    <footer class="footer-bg-color footer-style-2"
            data-top-space="<?php print esc_attr($airvice_footer_top_space); ?>px"
            data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <?php if (is_active_sidebar('footer-2-1') or is_active_sidebar('footer-2-2') or is_active_sidebar('footer-2-3') or is_active_sidebar('footer-2-4')): ?>
            <section class="footer-area pt-115 pb-90">
                <div class="custom-container">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-2-1');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-2-2');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-2-3');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-2-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-2-' . $num)) continue;
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-2-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <div class="copyright-area copyright-border">
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="<?php print esc_attr($airvice_copyright_center); ?>">
                        <div class="copyright__text">
                            <span><?php print airvice_copyright_text(); ?></span>
                        </div>
                    </div>
                    <?php if (!empty($airvice_footer_social)) : ?>
                        <div class="col-md-5">
                            <div class="copyright__social text-end">
                                <?php airvice_footer_social_profiles() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end here -->
    <?php
}


// airvice_copyright_text
function airvice_copyright_text()
{
    if (rtl_enable()) {
        print get_theme_mod('airvice_copyright_rtl', __('Copyright ©2021 Theme_Pure. All Rights Reserved', 'airvice'));
    } else {
        print get_theme_mod('airvice_copyright', __('Copyright ©2021 Theme_Pure. All Rights Reserved', 'airvice'));
    }
}


/**
 * [airvice_breadcrumb_func description]
 * @return [type] [description]
 */
function airvice_breadcrumb_func()
{

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'airvice'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'airvice'));
        $breadcrumb_show = 0;

    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        if (rtl_enable())
            $title = get_theme_mod('breadcrumb_blog_title_details_rtl', __('Blog', 'airvice'));
        else
            $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'airvice'));
    } elseif (is_single() && 'bdevs-services' == get_post_type()) {
        if (rtl_enable())
            $title = get_theme_mod('breadcrumb_department_details_rtl', __('Services', 'airvice'));
        else
            $title = get_the_title();
    } elseif (is_single() && 'bdevs-doctor' == get_post_type()) {
        if (rtl_enable())
            $title = get_theme_mod('breadcrumb_doctor_details_rtl', __('Doctor Details', 'airvice'));
        else
            $title = get_theme_mod('breadcrumb_doctor_details', __('Doctor Details', 'airvice'));

    } elseif (is_single() && 'bdevs-cases' == get_post_type()) {
        if (rtl_enable())
            $title = get_theme_mod('breadcrumb_case_study_details_rtl', __('Gallery', 'airvice'));
        else
            $title = get_the_title();

    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'airvice') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'airvice');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'airvice'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }


    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb') : '';

    $_id = get_the_ID();
    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    }
    // if ( is_single() && 'bdevs-services' == get_post_type() ) { 
    //     $_id = $post->ID;
    // } 
    elseif (function_exists("is_shop")) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }


    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');


        if ($hide_bg_img) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        } ?>

        <?php
        $breadcrumb_shape_switch = get_theme_mod('breadcrumb_shape_switch', true);
        ?>

        <!-- page title start here -->
        <div class="page-title-area pt-190 pb-200 <?php print esc_attr($breadcrumb_class); ?>"
             data-background="<?php print esc_attr($bg_img); ?>">
            <div class="container">
                <?php if (!empty($breadcrumb_shape_switch)) : ?>
                    <div class="page-title-icon">
                        <i class="flaticon-air-conditioner hero__icon hero__icon1"></i>
                        <i class="flaticon-heating hero__icon hero__icon2"></i>
                        <i class="flaticon-vacuum-cleaner hero__icon hero__icon3"></i>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2 class="breadcrumb-title"><?php echo wp_kses_post($title); ?></h2>
                            <div class="breadcrumb-menu">
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <?php airvice_breadcrumb_callback(); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page title end here -->


        <?php
    }
}

// add_action('airvice_before_main_content', 'airvice_breadcrumb_func');


function airvice_breadcrumb_callback()
{
    $args = array(
        'show_browse' => false,
        'post_taxonomy' => array('product' => 'product_cat')
    );
    $breadcrumb = new Breadcrumb_Class($args);

    return $breadcrumb->trail();
}


// gru_search_form
function airvice_search_form()
{ ?>
    <!-- Modal Search -->
    <div class="search-wrap d-none">
        <div class="search-inner">
            <i class="fal fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                    <div class="search-field-holder">
                        <input type="search" name="s" class="main-search-input"
                               value="<?php print esc_attr(get_search_query()) ?>"
                               placeholder="<?php print esc_attr__('Search Your Keyword...', 'airvice'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
}

add_action('airvice_before_main_content', 'airvice_search_form');

/**
 *
 * pagination
 */
if (!function_exists('airvice_pagination')) {

    function _airvice_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function airvice_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks())
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

        if (!empty($wp_query->query_vars['s']))
            $pagination['add_args'] = array('s' => get_query_var('s'));

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _airvice_pagi_callback($pagi);
    }
}

// rtl_enable
function rtl_enable()
{
    $my_current_lang = apply_filters('wpml_current_language', NULL);
    $rtl_enable = get_theme_mod('rtl_switch', false);
    if ($my_current_lang != 'en' && $rtl_enable) {
        return true;
    } else {
        return false;
    }
}

// header top bg color
function airvice_breadcrumb_bg_color()
{
    $color_code = get_theme_mod('airvice_breadcrumb_bg_color', '#222');
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('airvice-breadcrumb-bg', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_breadcrumb_bg_color');

// breadcrumb-spacing top
function airvice_breadcrumb_spacing()
{
    $padding_px = get_theme_mod('airvice_breadcrumb_spacing', '160px');
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('airvice-breadcrumb-top-spacing', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_breadcrumb_spacing');

// breadcrumb-spacing bottom
function airvice_breadcrumb_bottom_spacing()
{
    $padding_px = get_theme_mod('airvice_breadcrumb_bottom_spacing', '160px');
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('airvice-breadcrumb-bottom-spacing', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_breadcrumb_bottom_spacing');


// scrollup
function airvice_scrollup_switch()
{
    $scrollup_switch = get_theme_mod('airvice_scrollup_switch', false);
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('airvice-scrollup-switch', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_scrollup_switch');


// Theme color
function airvice_custom_color()
{
    $color_code = get_theme_mod('airvice_color_option', '#ff5e14');
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".ddddd { background: " . $color_code . "}";

        $custom_css .= ".dddd { color: " . $color_code . "}";

        $custom_css .= ".dddd { border-color: " . $color_code . "}";


        $custom_css .= ".aservice-box::after { border-color: " . $color_code . " transparent transparent transparent}";
        wp_add_inline_style('airvice-custom', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_custom_color');

// Prymary color
function airvice_primary_color()
{
    $color_code = get_theme_mod('airvice_primary_color', '#1d284b');
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".dddd { background: " . $color_code . "}";

        $custom_css .= ".ddf{ color: " . $color_code . "}";

        $custom_css .= ".dddddd { border-color: transparent transparent " . $color_code . " transparent;}";
        wp_add_inline_style('airvice-custom', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_primary_color');

// Secondary color
function airvice_secondary_color()
{
    $color_code = get_theme_mod('airvice_secondary_color', '#2371ff');
    wp_enqueue_style('airvice-custom', AIRVICE_THEME_CSS_DIR . 'airvice-custom.css', array());
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".dddd { background: " . $color_code . "}";

        $custom_css .= ".ddd { color: " . $color_code . "}";

        $custom_css .= ".dddd { border-color: " . $color_code . "}";
        wp_add_inline_style('airvice-custom', $custom_css);
    }
}

add_action('wp_enqueue_scripts', 'airvice_secondary_color');


// airvice_kses_intermediate
function airvice_kses_intermediate($string = '')
{
    return wp_kses($string, airvice_get_allowed_html_tags('intermediate'));
}

function airvice_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
        'a' => [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => []
        ]
    ];

    return $allowed_html;
}