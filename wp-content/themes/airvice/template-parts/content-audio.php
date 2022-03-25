<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package airvice
 */

$airvice_audio_url = function_exists('get_field') ? get_field( 'fromate_style' ) : NULL;

if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('ablog ablog-4 mb-55 format-image'); ?>>
        <?php 
        if( !empty($airvice_audio_url) ) : ?>
            <div class="postbox__audio embed-responsive embed-responsive-16by9">
                <?php echo wp_oembed_get( $airvice_audio_url ); ?>
            </div>
        <?php 
        endif; ?>

        <div class="ablog__text ablog__text4">
            <h3 class="blog-title">
                <?php the_title(); ?>
            </h3>
            <div class="ablog__meta ablog__meta4">
                <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <div class="post-text mb-20">
               <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'airvice' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <div class="blog__deatails--tag">
                <?php print airvice_get_tag(); ?>
            </div>
        </div>
    </article>
<?php
else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('ablog ablog-4 mb-55 format-audio'); ?>>
        <?php 
        if( !empty($airvice_audio_url) ) : ?>
            <div class="postbox__audio embed-responsive embed-responsive-16by9">
                <?php echo wp_oembed_get( $airvice_audio_url ); ?>
            </div>
        <?php 
        endif; ?>
        <div class="ablog__text ablog__text2">

            <h4 class="ablog__text--title4 mb-20">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="ablog__meta">
                <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <div class="post-text mb-30">
                <?php the_excerpt(); ?>
            </div>
            <!-- blog btn -->

            <?php 
                if (rtl_enable()) {
                    $airvice_blog_btn_rtl = get_theme_mod('airvice_blog_btn_rtl','Read More'); 
                 }
                else { 
                    $airvice_blog_btn = get_theme_mod('airvice_blog_btn','Read More'); 
                }
                
                $airvice_blog_btn_switch     = get_theme_mod('airvice_blog_btn_switch', true);  
            ?>
            <?php if(!empty($airvice_blog_btn_switch)) : ?>
                <div class="ablog__btn4">
                    <a href="<?php the_permalink(); ?>" class="theme-btn">
                        <?php print esc_html($airvice_blog_btn); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </article>

<?php
endif; ?>


