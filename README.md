# Castlegate IT WP HTTPS Redirect #

Allows easy redirection to HTTPS when `$_SERVER['HTTPS'] == 'on'` and a constant is set instructing the plugin to do so.

## Options ##

To enable HTTPS redirection, simply define the following constant.

~~~ php
define('CGIT_HTTPS_REDIRECT', true);
~~~

## Considerations ##

When the constant is defined and set to `true` any pages accessed over HTTP will be redirected, therefore this constant should typically be defined on an environment specific configuration file to avoid redirecting on environments where HTTPS is not configured.
