<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('theme_color', '#C79B84')); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class('preload'); ?>>

    <?php get_template_part('partials/header'); ?>

    <main id="up">