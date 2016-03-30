<?php
// tests/AppBundle/Controller/FortuneControllerTest.php

namespace Tests\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class FortuneControllerTest extends \PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $this->app = new \AppKernel('test', false);
    }

    /**
     * @test
     */
    public function it_lists_all_fortunes()
    {
        $request = Request::create('/');

        $response = $this->app->handle($request);

        self::assertSame(200, $response->getStatusCode(), $response->getContent());
    }
}
