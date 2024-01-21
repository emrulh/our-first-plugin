<?php
/*
 * Plugin Name:       Our First Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

if ( !class_exists( "MyPlugin" ) ) {
    Class MyPlugin {
        public function __construct() {
            add_action( "init", array( $this, "init" ), 10, 2 );
        }
        public function init() {
            add_filter( "the_title", array( $this, "change_title" ), 10, 2 );
            add_filter( "the_content", array( $this, "change_content" ), 10, 2 );
        }
        public function change_title( $title ) {
            $title = $title . " hello test";
            return $title;
        }
        public function change_content( $content ) {
            $url = esc_url( get_the_permalink() );
            $title = esc_attr( get_the_title() );
            $content = $content . "<p><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&color=ff0000&data={$url}' alt='{$title}'></p>";
            return $content;
        }

    }
    new MyPlugin();
}
