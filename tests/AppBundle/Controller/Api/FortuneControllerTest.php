<?php
// tests/AppBundle/Controller/Api/FortuneControllerTest.php

namespace Tests\AppBundle\Controller\Api;

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
    public function it_cannot_submit_fortunes_without_content()
    {
        $headers = array(
            'CONTENT_TYPE' => 'application/json',
        );
        $request = Request::create('/api/v1/fortunes', 'POST', array(), array(), array(), $headers, json_encode(array(
        )));

        $response = $this->app->handle($request);

        self::assertSame(422, $response->getStatusCode(), $response->getContent());
    }

    /**
     * @test
     */
    public function it_cannot_submit_fortunes_with_non_string_content()
    {
        $headers = array(
            'CONTENT_TYPE' => 'application/json',
        );
        $request = Request::create('/api/v1/fortunes', 'POST', array(), array(), array(), $headers, json_encode(array(
            'content' => 42,
        )));

        $response = $this->app->handle($request);

        self::assertSame(422, $response->getStatusCode(), $response->getContent());
    }

    /**
     * @test
     */
    public function it_submits_new_fortunes()
    {
        $headers = array(
            'CONTENT_TYPE' => 'application/json',
        );
        $request = Request::create('/api/v1/fortunes', 'POST', array(), array(), array(), $headers, json_encode(array(
            'content' => 'Hello',
        )));

        $response = $this->app->handle($request);

        self::assertSame(201, $response->getStatusCode(), $response->getContent());
    }
}
