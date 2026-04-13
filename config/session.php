<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Session Name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the cookie or header that will be used
    | to identify a session instance with the user of the application. This
    | can be changed after the user has been logged in.
    |
    */

    'name' => env('SESSION_NAME', 'LARAVEL_SESSION'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to immediately expire on the browser closing, set that option.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily encrypt all session data before
    | it is stored. Raw encryption will even encrypt the session ID.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | HTTP Path
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
    | HTTP Domain
    |--------------------------------------------------------------------------
    |
    | Here you may change the domain of the cookie used to identify a unique
    | session in your application. This will determine which hosts the cookie
    | is viewable by. Typically, this should be left as an empty value.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
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
