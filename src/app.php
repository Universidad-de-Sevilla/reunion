<?php

use Silex\Application;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use US\Reunion\Controller\ApiSesionController;
use US\Reunion\Controller\PlaceController;
use US\Reunion\Controller\PersonController;
use US\Reunion\Repository\PlaceRepository;
use US\Reunion\Repository\PersonRepository;

$app = new Application();
$app->register(new RoutingServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider());

// Options for Doctrine ORM
$app["orm.em.options"] = array(
    "mappings" => array(
        array(
            "type" => "annotation",
            "namespace" => "US\\Reunion\\Entity",
            "path" => realpath(__DIR__ . "/../src/Entity")
        )
    )
);
$app["orm.proxies_dir"] = __DIR__ . "/../var/cache/doctrine/proxies";

// Authentication and Security
$app['security.access_rules'] = array(
    array('^/admin', 'ROLE_ADMIN'),
    array('^.*$', 'ROLE_USER'),
);

$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^/admin/',
        'form' => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
        'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true),
        'users' => array(
            'admin' => array('ROLE_ADMIN', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg=='),
        ),
    ),
    'unsecured' => array(
        'anonymous' => true,
    ),
);
$app->register(new Silex\Provider\SecurityServiceProvider(), $app['security.firewalls']);

// Register repositories as Silex services

$app['repository.lugar'] = function ($app) {
    return new PlaceRepository($app['orm.em'], $app['orm.em']->getClassMetadata('US\Reunion\Entity\Comun\Lugar'));
};
$app['repository.person'] = function ($app) {
    return new PersonRepository($app['orm.em'], $app['orm.em']->getClassMetadata('US\Reunion\Entity\Person\Person'));
};
$app['repository.sesion'] = function ($app) {
    return new SesionRepository($app['orm.em'], $app['orm.em']->getClassMetadata('US\Reunion\Entity\Taller\Sesion'));
};

// Register controllers as Silex services
$app['controller.apiSesion'] = function ($app) {
    return new ApiSesionController($app['repository.sesion']);
};
$app['controller.place'] = function ($app) {
    return new PlaceController\($app['repository.place']);
};
$app['controller.person'] = function ($app) {
    return new PersonController($app['repository.person']);
};



// Options for Twig Template Engine
$app['twig.path'] = array(__DIR__ . '/../views');
$app['twig.options'] = array('cache' => __DIR__ . '/../var/cache/twig');

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...
    /** @var  Twig_Environment $twig */
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return $app['request_stack']->getMasterRequest()->getBasepath() . '/' . ltrim($asset, '/');
    }));

    return $twig;
});

// Translation
$app->register(new TranslationServiceProvider(), array(
    'locale' => 'es',
    'locale_fallbacks' => array('es'),
));

$app['translator'] = $app->extend('translator', function ($translator) {
    /** @var Symfony\Component\Translation\Translator  $translator */
    $translator->addLoader('yaml', new YamlFileLoader());
    $translator->addResource('yaml', __DIR__ . '/../locales/es.yml', 'es');
    return $translator;
});

return $app;
