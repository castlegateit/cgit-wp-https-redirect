<?php

/*

Plugin Name: Castlegate IT WP HTTPS Redirect
Plugin URI: http://github.com/castlegateit/cgit-wp-https-redirect
Description: Redirects HTTP request to HTTPS.
Version: 2.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

if (!isHttps() && optionsUrlIsHttps() && !isBlocked()) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit();
}

/**
 * Detects if the request was made over HTTPS.
 *
 * @return bool
 */
function isHttps()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ||
        (isset($_SERVER['REQUEST_SCHEME']) && $_SEVER['REQUEST_SCHEME']=='https');
}

/**
 * Returns false if CGIT_HTTPS_REDIRECT is defined and set to false.
 *
 * @return bool
 */
function isBlocked()
{
    return defined('CGIT_HTTPS_REDIRECT') && !CGIT_HTTPS_REDIRECT;
}

/**
 * Checks if the scheme of the WordPress options `siteurl` is https
 *
 * @return bool
 */
function optionsUrlIsHttps()
{
    return parse_url(get_option('siteurl'), PHP_URL_SCHEME) == 'https';
}
