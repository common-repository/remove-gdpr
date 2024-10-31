=== Remove GDPR ===
Contributors: johndeebdd
Donate link: https://generalchicken.net/
Tags: rollback, gdpr, feature
Requires at least: 4.9.6
Tested up to: 4.9.8
Requires PHP: 5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

In version 4.9.6. WordPress added certain privacy "features" to core. These include a Privacy Policy page, and an opt-in check box in the comments field. 4.9.8. removed the comment field, but also removed comment cookies from not logged in users, causing some sites to break. Useful for testing, IoT, sites in Nevada USA, or for other sites that do not need GDPR related features.

== Description ==
In version 4.9.6. WordPress added certain privacy "features" to core. These include a Privacy Policy page, and an opt-in check box in the comments field. 4.9.8. removed the comment field, but also removed comment cookies from not logged in users, causing some sites to break. Useful for testing, IoT, sites in Nevada USA, or for other sites that do not need GDPR related features.

## Usage
Once activated, navigate to Settings >> Privacy. New controls have been added.

== Installation ==
Clone or copy the file into your plugins directory, then activate the plugin from the admin menu. 

== Frequently Asked Questions ==

= What is going on with the dissapearing comment check box? =
	
No one knows for sure. The comment check box was added in WordPress version 4.9.6, then removed in version 4.9.8. However, the latest version disables comment cookies by default, breaking the ability for unlogged in users to detect when their comments have been submitted.

= Do I need a privacy policy on my site? =

No! GDPR is a European law. The plugin author, for instance, is located in Nevada, USA and GDPR doesn't apply here.
== Screenshots ==
	
1. Go to the Privacy tab
2. The comment form worked fine in 4.9.5
3. Forced the check box in 4.9.6
4. It vanished again in 4.9.8
5. Comment cookies acting weird in 4.9.8
	
== Changelog ==

= 1.0.0 - 2018-08-14 =
* INIT 