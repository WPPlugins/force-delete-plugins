=== Force Delete Plugins ===
Contributors: jancbeck
Tags: administration, plugin management, development, tools
Requires at least: 4.6
Tested up to: 4.6
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Changes the default behavior of the bulk delete plugin actions so it deletes plugins regardless whether they are active or not.

== Installation ==

To install the plugin and get it working:

1. Upload plugin files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Select plugins in the plugin table that you want to delete just like you would do normally.

== Frequently Asked Questions ==

= Why does this plugin exist? =
I was annoyed by the default behavior of WordPress and wanted to fix it. It's also an excuse to publish a WP plugin in the .org Repo and experiment with PHPunit.

== Changelog ==

= 1.0.5 =
* Added WP 4.6 compatibility
* WP 4.6 is now required for this plugin, because it relies on the new Shiny Updates

= 1.0.4 =
* Added WP 4.5 compatibility
* Added PHPunit tests

= 1.0.3 =
* Added WP 4.4 compatibility

= 1.0.2 =
* Added WP 4.3 compatibility

= 1.0.1 =
* Added WP.org repository assets

= 1.0 =
* Initial plugin version
