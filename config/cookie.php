<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default HTTP Cookie Path
    |--------------------------------------------------------------------------
    |
    | The path for which the cookie will be regarded as available. Typically
    | this will be the root path of your application but you are free to
    | change this when you have a nested application or for security.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Default HTTP Cookie Domain
    |--------------------------------------------------------------------------
    |
    | Here you may change the domain of the cookie used to identify a unique
    | client session in your application. This will determine which hosts the
    | cookie is viewable by. Typically, this should be left as an empty value.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Default HTTPS Only
    |--------------------------------------------------------------------------
    |
    | By setting this value to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you if it can not be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIES', false),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. You are free to modify after the creation here.
    |
    */

    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
    | will set the SameSite attribute to "lax" since this is a safe default.
    |
    | Supported: "lax", "strict", "none"
    |
    */

    'same_site' => 'lax',

];
