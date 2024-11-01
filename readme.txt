=== Plugin Name ===
Contributors: aliasbdi
Donate link: n/a
Tags: social, networking, seo, user, user profile, facebook, flickr, gplus, instagram, linkedin, pinterest, tumbler, twitter, vimeo, vine, youtube
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple way to add social networking links to your user profiles and display any where on your site with shortcode.

== Description ==

The User Social Fields plugin will allow users to add their social networking accounts to their user profile. Then, using a shortcode, 
a list of the user's social web site links will appear on the page. The user can be specified or magically set (when viewing a page or single post). Additionally,
the shortcode allows you to choose which social web sites to list and in which order.

== Installation ==

1. Upload `user-social-fields` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the shortcode where you want the list to appear by using `<?php do_shortcode('[userfields]'); ?>` in your templates or `[userfields]` in your post content.

== Frequently Asked Questions ==

= How do I set the user? =

In the shortcode, add the attribute "user" with a value of either the user's id or login (example: [userfields user="johndoe"]).

= How do I specify the user fields? =

To specify the user fields to display, use the attribute "fields" in the shortcode with no spaces and separate them by commas. For exmaple, [userfields fields="facebook,gplus"] will only display Facebook and Google Plus.

= What if the user has not set their user fields in their profile settings? =

If the shortcode requests a field that the user has not set, it will not display.

= How do I sort the user fields? =

In the shortcode, you can specify which fields to display. In doing so, the fields will be listed in the same order you specifiy them. For example,
[userfields fields="youtube,gplus,facebook"] will list the fields in this order: YouTube, Google Plus, Facebook.

= Do I have to specify the fields to display? =

No. If the "fields" attribute is unset, all social fields will display in alphabetical order.

= What fields are available? =

The following fields are avialable to display (and their field strings are in parenthesis): Facebook (facebook), Flickr (flickr), Google+ (gplus), Instagram (instagram), LinkedIn (linkedin), 
Pinterst (pinterest), Tumbler (tumbler), Twitter (twitter), Vimeo (vimeo), Vine (vine), YouTube (youtube)

== Changelog ==

= 1.0.1 =
* Enabled shortcode use in text widgets.
* Allowed uppercase field names.

= 1.0 =
* Added Vine and Vimeo fields.