<?php
/**
 * Active Callbacks
 *
 * @package Business_Vibes
 */

// Theme Options.
function business_vibes_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_pagination' )->value() );
}
function business_vibes_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_breadcrumb' )->value() );
}

function business_vibes_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'business_vibes_enable_topbar_section' )->value() );
}

// Color option.
function business_vibes_is_color_option_and_primary_color_enabled( $control ) {
	return ( $control->manager->get_Setting( 'business_vibes_primary_color_option' )->value() === 'primary-color' );
}

// Banner section.
function business_vibes_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_banner_section' )->value() );
}
function business_vibes_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_banner_content' )->value();
	return ( business_vibes_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function business_vibes_is_banner_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_banner_content' )->value();
	return ( business_vibes_is_banner_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Counter section.
function business_vibes_is_counter_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_counter_section' )->value() );
}

// Service section.
function business_vibes_is_service_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_service_section' )->value() );
}
function business_vibes_is_service_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_service_content_type' )->value();
	return ( business_vibes_is_service_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function business_vibes_is_service_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_service_content_type' )->value();
	return ( business_vibes_is_service_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// About section.
function business_vibes_is_about_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_about_section' )->value() );
}
function business_vibes_is_about_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_about_content_type' )->value();
	return ( business_vibes_is_about_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function business_vibes_is_about_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_about_content_type' )->value();
	return ( business_vibes_is_about_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Team section.
function business_vibes_is_team_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_team_section' )->value() );
}
function business_vibes_is_team_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_team_content_type' )->value();
	return ( business_vibes_is_team_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function business_vibes_is_team_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_team_content_type' )->value();
	return ( business_vibes_is_team_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Associate section.
function business_vibes_is_associate_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_associate_section' )->value() );
}

// Projects section.
function business_vibes_is_projects_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_projects_section' )->value() );
}
function business_vibes_is_projects_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_projects_content_type' )->value();
	return ( business_vibes_is_projects_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function business_vibes_is_projects_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_projects_content_type' )->value();
	return ( business_vibes_is_projects_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Blog section.
function business_vibes_is_blog_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_blog_section' )->value() );
}
function business_vibes_is_blog_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_blog_content_type' )->value();
	return ( business_vibes_is_blog_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function business_vibes_is_blog_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'business_vibes_blog_content_type' )->value();
	return ( business_vibes_is_blog_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Featured Video section.
function business_vibes_is_featured_video_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'business_vibes_enable_featured_video_section' )->value() );
}

// Check if static home page is enabled.
function business_vibes_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
