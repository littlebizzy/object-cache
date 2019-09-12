<?php
/*
Plugin Name: Object Cache
Plugin URI: https://www.littlebizzy.com/plugins/object-cache
Description: Drop-in persistent object cache for WordPress based on Redis in-memory storage that supports Predis, clusters, and WP-CLI (forked from PressJitsu).
Version: 1.1.1
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Forked from: Pressjitsu Redis Object Cache
PBP Version: n/a
WC requires at least: 3.3
WC tested up to: 3.5
Prefix: OBJCHE
*/

// Plugin namespace
namespace LittleBizzy\ObjectCache;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Plugin constants
const PREFIX = 'OBJCHE';
const VERSION = '1.1.1';
const REPO = 'https://github.com/littlebizzy/object-cache';

// Main class
Class LittleBizzyObjectCache {
	// instance
	private static $instance;

	// vars
	private $current_dir;

	// getInstance
	public static function getInstance() {
		if( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	private function __construct() {
		// set vars
		$this->current_dir = dirname( __FILE__ );
		$is_plugin_allowed = defined( 'OBJECT_CACHE' ) ? OBJECT_CACHE : true;

		// check if allowed and installed class Redis
		if( $is_plugin_allowed && class_exists( 'Redis' ) ) {
			require_once $this->current_dir . '/object-cache-lib.php';			
		}
	}
}

LittleBizzyObjectCache::getInstance();