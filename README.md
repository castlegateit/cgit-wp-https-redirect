# Castlegate IT WP HTTPS Redirect #

Allows easy and automatic redirection to HTTPS when activated and the `siteurl` in WordPress' options is configured to a URL with the https scheme.

## Options ##

To disable HTTPS redirection, simply define the following constant.

~~~ php
define('CGIT_HTTPS_REDIRECT', false);
~~~

## Considerations ##

Servers with load balancing often ommit the `HTTPS` environment variable, so WordPress cannot accurately determine the website is accessed over a https scheme. This results in infinite loops and incorrect permalinks. 

Load balanced environments will provide the `HTTP_X_FORWARDED_PROTO` environment variable instead, so the following code can be placed in `wp-config.php` to resolve the problem.

~~~ php
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $_SERVER['HTTPS'] = 'on';
}
~~~
