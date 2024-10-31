<?php
/*
 Plugin Name: Remove GDPR
 Plugin URI: https://generalchicken.net/better-privacy/
 Description: Activate or deactivate GDPR / privacy related features.
 Version: 1.0
 Author: John Dee
 Author URI: https://generalchicken.net
 */

namespace RemoveGDPR;
/*
 * DEVELOPER NOTES: GDPR was recently released, and I am working to fix the issue for American companies who do not need GDPR. If you want a new 
 * feature, please just ask the plugin author!
 */

//This allows unlimited comments for development purposes:
//add_filter('comment_flood_filter', '__return_false');

require_once (plugin_dir_path(__FILE__). 'src/RemoveGDPR/autoloader.php');

if(\get_option('deactivateGdprCommentFieldFeature') == TRUE){
    add_filter('comment_form_default_fields', array(new GdprCommentFormFeatureRemover, 'removeCookiesAuthorizationFromDefaultCommentFields'));
 }else{
    add_filter('comment_form_default_fields', array(new GdprCommentFormFeatureRemover, 'addOptInToggle'));
}

add_action( 'admin_menu', 'RemoveGDPR\removeDefaultPrivacySubmenu', 999 );
function removeDefaultPrivacySubmenu() {
    $page = remove_submenu_page( 'options-general.php', 'privacy.php' );
    add_submenu_page( 'options-general.php', 'Privacy', 'Privacy', 'manage_privacy_options', 'values.php', 'RemoveGDPR\requireValuesPage');
}
function requireValuesPage(){
    require_once (plugin_dir_path(__FILE__) . 'src/RemoveGDPR/values.php');
}

//ACTIVATION AND DEACTIVATION:
function activatePlugin() {
    update_option('deactivateGdprCommentFieldFeature', FALSE);
    update_option('gdpr-comment-opt-in', TRUE);
}
register_activation_hook( __FILE__, 'RemoveGDPR\activatePlugin' );

function deactivatePlugin() {
    delete_option('deactivateGdprCommentFieldFeature');
    delete_option('gdpr-comment-opt-in');
}
register_deactivation_hook( __FILE__, 'RemoveGDPR\deactivatePlugin' );