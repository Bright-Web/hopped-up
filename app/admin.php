<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

    $wp_customize->remove_panel( 'widgets' );
    $wp_customize->remove_section( 'static_front_page' );

    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
    $wp_customize->get_section('title_tagline')->title = __('Branding', 'sage');
    $wp_customize->get_section('title_tagline')->priority = 1;

    $wp_customize->add_section('customize_index', array(
        'title' => __('Customize Home Page', 'sage'),
        'prioity' => 30
    ));

    //----- Intro Title -----//
    $wp_customize->add_setting('intro_section_title', [
        'default' => 'Welcome',
        'transport' => 'postMessage'
    ]);
    $wp_customize->add_control('intro_section_title_control', [
    'label' => __('Intro Section Title', 'sage'),
    'section' => 'customize_index',
    'settings' => 'intro_section_title',
    'type' => 'text',
    'default' => 'Welcome'
    ]);

    //----- Intro Lead Text -----//
    $wp_customize->add_setting('intro_section_lead', [
        'default' => 'Im baby palo santo art party taiyaki, skateboard freegan semiotics mumblecore kitsch everyday carry shabby chic unicorn. Everyday carry mustache iceland master cleanse, unicorn trust fund austin meh distillery messenger.',
        'transport' => 'postMessage'
    ]);
    $wp_customize->add_control('intro_section_lead_control', [
    'label' => __('Intro Section Lead', 'sage'),
    'section' => 'customize_index',
    'settings' => 'intro_section_lead',
    'type' => 'textarea',
    'default' => 'Welcome'
    ]);

    //----- Brews Title -----//
    $wp_customize->add_setting('brews_section_title', [
        'default' => 'New Brews',
        'transport' => 'postMessage'
    ]);
    $wp_customize->add_control('brews_section_title_control', [
    'label' => __('Brews Section Title', 'sage'),
    'settings' => 'brews_section_title',
    'section' => 'customize_index',
    'type' => 'text'
    ]);

    //----- Brews Lead Text -----//
    $wp_customize->add_setting('brews_section_lead', [
        'default' => 'Im baby palo santo art party taiyaki, skateboard freegan semiotics mumblecore kitsch everyday carry shabby chic unicorn. Everyday carry mustache iceland master cleanse, unicorn trust fund austin meh distillery messenger.',
        'transport' => 'postMessage'
    ]);
    $wp_customize->add_control('brews_section_lead_control', [
    'label' => __('Brews Section Lead', 'sage'),
    'settings' => 'brews_section_lead',
    'section' => 'customize_index',
    'type' => 'textarea'
    ]);

    //----- Articles Title -----//
    $wp_customize->add_setting('articles_section_title', [
        'default' => 'Articles',
        'transport' => 'postMessage'
    ]);
    $wp_customize->add_control('articles_section_title_control', [
    'label' => __('Articles Section Title', 'sage'),
    'settings' => 'articles_section_title',
    'section' => 'customize_index',
    'type' => 'text'
    ]);

    //----- Articles Lead Text -----//
    $wp_customize->add_setting('articles_section_lead', [
        'default' => 'Im baby palo santo art party taiyaki, skateboard freegan semiotics mumblecore kitsch everyday carry shabby chic unicorn. Everyday carry mustache iceland master cleanse, unicorn trust fund austin meh distillery messenger.',
        'transport' => 'postMessage'
    ]);
    $wp_customize->add_control('articles_section_lead_control', [
    'label' => __('Articles Section Lead', 'sage'),
    'settings' => 'articles_section_lead',
    'section' => 'customize_index',
    'type' => 'textarea'
    ]);


});


/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

