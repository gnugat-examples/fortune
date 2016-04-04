<?php
// tests/AppBundle/Command/PrintLastFortuneCommandTest.php

namespace Tests\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\ApplicationTester;

class PrintLastFortuneCommandTest extends \PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $kernel = new \AppKernel('test', false);
        $application = new Application($kernel);
        $application->setAutoExit(false);
        $this->app = new ApplicationTester($application);
    }

    /**
     * @test
     */
    public function it_prints_last_fortune()
    {
        $input = array(
            'print-last-fortune',
        );

        $exitCode = $this->app->run($input);

        self::assertSame(0, $exitCode, $this->app->getDisplay());
    }
}

