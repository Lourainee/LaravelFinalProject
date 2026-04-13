<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First, we need to get an application instance. This creates an instance
| of the Illuminate application which hooks into all of the bootstrap
| processes and is the IoC container for the system binding all.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Handle The Request
|--------------------------------------------------------------------------
|
| Now we're ready to handle the incoming request. The bootstrapped
| application will handle the request and send back a response to the
| browser, allowing them to enjoy this web application!
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
