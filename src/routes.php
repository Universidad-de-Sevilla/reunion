<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

global $app;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->before(function () {
    // redirect the user to the login screen if access to the Resource is protected
    if (false) {
        return new RedirectResponse('/login');
    }
    return null;
});

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})->bind('homepage');

$app->get('/api/sesiones/{taller_id}', 'controller.apiSesion:indexAction');
$app->get('/api/sesion/{id}', 'controller.apiSesion:viewAction');
$app->post('/api/sesion', 'controller.apiSesion:addAction');
$app->put('/api/sesion/{id}', 'controller.apiSesion:editAction');
$app->delete('/api/sesion/{id}', 'controller.apiSesion:deleteAction');

$app->get('/personas', 'controller.person:indexAction')
    ->bind('people');
$app->get('/persona/crear', 'controller.person:addAction')
    ->bind("person_add");
$app->get('/persona/editar/{id}', 'controller.person:editAction')
    ->bind("person_edit");
$app->post('/persona/grabar', 'controller.person:saveAction')
    ->bind("person_save");
$app->get('/persona/borrar/{id}', 'controller.person:deleteAction')
    ->bind("person_delete");
$app->post('/personas', 'controller.person:searchAction')
    ->bind("people_search");
$app->get('/persona/{id}', 'controller.person:viewAction')
        ->bind("person_view");

$app->get('/grupos', 'controller.group:adminAction')
    ->bind('groups_admin');
$app->get('/grupo/{id}', 'controller.group:viewAction')
    ->bind('group');
$app->get('/grupo/crear', 'controller.group:addAction')
    ->bind("group_add");
$app->get('/grupo/borrar/{id}', 'controller.group:deleteAction')
    ->bind("group_delete");
$app->get('/grupo/editar/{id}', 'controller.group:editAction')
    ->bind("group_edit");
$app->post('/grupo/grabar', 'controller.group:saveAction')
    ->bind("group_save");
$app->get('/mis_grupos', 'controller.group:indexAction')
    ->bind('groups');

$app->get('/private_upload/{item_id}/{path}', function ($item_id, $path) use ($app) {
    if (!file_exists('../var/private_upload/' . $item_id . '/' . $path)) {
        $app->abort(404);
    }
    return $app->sendFile('../var/private_upload/' . $item_id . '/' . $path);
})
    ->assert('item', 'd+');

//$app->get('/login', 'controller.login:loginAction')
//    ->bind('login');

$app->get('/login', function (Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error' => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');

// Mounting admin routes
// $app->mount('/admin', include 'routes_admin.php');


// TESTS & SAMPLES //
$app->get('/prueba', function () use ($app) {
    return print_r($app['orm.ems']);
});


// ERROR MANAGEMENT
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return null;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
