<?php

/*

Plugin Name: Castlegate IT WP HTTPS Redirect
Plugin Name: Castlegate IT WP Tweak Tool
Plugin URI: http://github.com/castlegateit/cgit-wp-https-redirect
Description: Redirects HTTP request to HTTPS.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

if ($_SERVER['HTTPS'] != 'on' && defined('CGIT_HTTPS_REDIRECT') && CGIT_HTTPS_REDIRECT) {
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit();
}
