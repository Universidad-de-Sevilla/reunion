<?php

use Silex\Application;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use US\Reunion\Controller\ApiMeetingController;
use US\Reunion\Controller\GroupController;
use US\Reunion\Controller\MeetingController;
use US\Reunion\Controller\PersonController;
use US\Reunion\Repository\GroupRepository;
use US\Reunion\Repository\MeetingRepository;
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

$app['repository.group'] = function ($app) {
    return new GroupRepository($app['orm.em'], $app['orm.em']->getClassMetadata('US\Reunion\Entity\Group'));
};
$app['repository.meeting'] = function ($app) {
    return new MeetingRepository($app['orm.em'], $app['orm.em']->getClassMetadata('US\Reunion\Entity\Meeting\Meeting'));
};
$app['repository.person'] = function ($app) {
    return new PersonRepository($app['orm.em'], $app['orm.em']->getClassMetadata('US\Reunion\Entity\Person'));
};

// Register controllers as Silex services
$app['controller.apiMeeting'] = function ($app) {
    return new ApiMeetingController($app['repository.meeting']);
};
$app['controller.group'] = function ($app) {
    return new GroupController($app['repository.group']);
};
$app['controller.meeting'] = function ($app) {
    return new MeetingController($app['repository.meeting']);
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
