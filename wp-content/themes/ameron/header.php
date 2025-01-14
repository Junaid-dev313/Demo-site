<?php
/**
 * @package Ameron
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="pxl-page" class="pxl-page">
        <div class="pxl-page-overlay"></div>
        <?php ameron()->page->get_site_loader(); ?>
        <?php ameron()->header->getHeader(); ?>
        <?php ameron()->pagetitle->get_page_title(); ?>
        <div id="pxl-main" class="pxl-main">
