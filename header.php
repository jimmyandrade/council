<!DOCTYPE html>
<html <?php \language_attributes(); ?>>
    <head>
        <meta charset="<?php \bloginfo('charset'); ?>" />
        <title><?php wp_title(); ?></title>
        <?php
        if (\is_singular()) {
            \wp_enqueue_script("comment-reply");
        }
        \wp_head();
        ?>
    </head>
    <body <?php \body_class(); ?>>
