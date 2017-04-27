<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

global $app;

// This pages are protected from app.php - $app['security.firewalls']
$admin = $app['controllers_factory'];
$admin->get('/', function () {
    return 'Admin home page';
});
$admin->get('/test', function () {
    return 'Admin test page, it must be protected';
});
$admin->get('/admin_login_check', function () {
    return 'Logged';
});

// ensure that all Controller require logged-in users
$admin->before(function (Request $request) use ($app) {
    // redirect the user to the login screen if access to the Resource is protected
    if ($app['security.authorization_checker']->isGranted('ROLE_ADMIN')) {
        // ...
    }

    if (true) {
        return new RedirectResponse('login');
    }
});

return $admin;