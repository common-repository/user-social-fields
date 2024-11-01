<?php
/*
 * Plugin Name: User Social Fields
 * Plugin URI: www.jacobabshire.com/projects/user-social-fields/
 * Description: Adds extra user fields: facebook, flickr, gplus, instagram, linkedin, pinterest, tumbler, twitter, vimeo, vine, youtube.
 * Version: 1.0.1
 * Author: Jacob Abshire
 * Author URI: www.jacobabshire.com
 * License: GPL2
*/

defined('ABSPATH') or die("No script kiddies please!");

function ja_user_fields($profile_fields){
 
	// add fields
	$profile_fields['facebook'] = 'Facebook';
	$profile_fields['flickr'] = 'Flickr';
	$profile_fields['gplus'] = 'Google+';
	$profile_fields['instagram'] = 'Instagram';
	$profile_fields['linkedin'] = 'LinkedIn';
	$profile_fields['pinterest'] = 'Pinterest';
	$profile_fields['tumbler'] = 'Tumbler';
	$profile_fields['twitter'] = 'Twitter';
	$profile_fields['vimeo'] = 'Vimeo';
	$profile_fields['vine'] = 'Vine';
	$profile_fields['youtube'] = 'YouTube';
 
	return $profile_fields;
 
}

add_filter('user_contactmethods', 'ja_user_fields');

/* SHORT CODE */

function ja_userfields( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class' => '',
		'fields' => null,
		'user' => null, // id, login (only)
	), $atts));
	
	if (!$class):
		$class = '';
	endif;
	
	// set user fields to display
	
	if ($fields):
		$fields = strtolower($fields);
		$fields = explode(',', $fields);
	else:
		$fields = array(
			'facebook',
			'flickr',
			'gplus',
			'instagram',
			'linkedin',
			'pinterest',
			'tumbler',
			'twitter',
			'vimeo',
			'vine',
			'youtube',
			);
	endif;
	
	// set user id
	
	if ($user):
		if ($user && is_int($user)):
			$user_id = $userid;
		
		elseif ($user && is_string($user)):
			$user_data = get_user_by('login', $user);
			$user = $user_data->ID;
		
		endif;
		
	elseif (is_page() or is_single()):
		$user = get_the_author_meta('ID');
	
	endif;
	
	$ret = '';
	
	if ($fields): 
		
		$userfields = array(
			'twitter' 	=> get_user_meta($user, 'twitter', true),
			'facebook' 	=> get_user_meta($user, 'facebook', true),
			'gplus' 	=> get_user_meta($user, 'gplus', true),
			'linkedin' 	=> get_user_meta($user, 'linkedin', true),
			'pinterest' => get_user_meta($user, 'pinterest', true),
			'tumbler' 	=> get_user_meta($user, 'tumbler', true),
			'instagram' => get_user_meta($user, 'instagram', true),
			'flickr' => get_user_meta($user, 'flickr', true),
			'vimeo' => get_user_meta($user, 'vimeo', true),
			'vine' => get_user_meta($user, 'vine', true),
			'youtube' => get_user_meta($user, 'youtube', true),
			);
		
		$ret .= '<ul class="userfields">';
		
		foreach ($fields as $field):
			
			if (array_key_exists($field, $userfields) && $userfields[$field]):
				
				$ret .= '<li class="userfield userfield-'. $field .'"><a href="'. ja_userfields_addhttp($userfields[$field]) .'" target="_blank">'. $field .'</a></li>';
				
			endif;
			
		endforeach;
		
		$ret .= '</ul>';
		
	endif;
	
    return $ret;
}
add_shortcode('userfields', 'ja_userfields');
add_filter('widget_text', 'do_shortcode');

/* add HTTP when necessary */

function ja_userfields_addhttp($url){
	if (!preg_match('/http[s]?:\/\//', $url, $matches)):
		$url = 'http://'. $url;
	endif;
	return $url;
}
