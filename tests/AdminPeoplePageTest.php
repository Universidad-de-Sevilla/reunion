<?php

use \Silex\WebTestCase;

class AdminPeoplePageTest extends WebTestCase
{
    public function createApplication()
    {
        require __DIR__ . '/../vendor/autoload.php';
        $app = require __DIR__ . '/../src/app.php';
        require __DIR__ . '/../config/prod.php';
        require __DIR__ . '/../src/routes.php';
        $app['debug'] = true;
        $app['session.test'] = true;
        unset($app['exception_handler']);

        return $app;
    }
    
    public function testAdminPeoplePage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/personas');
        $this->assertTrue($client->getResponse()->isOk());
        //$this->assertCount(1, $crawler->filter('h1:contains("Contact us")'));
        //$this->assertCount(1, $crawler->filter('body:contains("Up and Running")'));
    }
}
