<?php
// tests/AppBundle/Service/SubmitNewFortuneHandlerTest.php

namespace Tests\AppBundle\Service;

use AppBundle\Service\SaveNewFortune;
use AppBundle\Service\SubmitNewFortune;
use AppBundle\Service\SubmitNewFortuneHandler;

class SubmitNewFortuneHandlerTest extends \PHPUnit_Framework_TestCase
{
    const CONTENT = "It's just a flesh wound.";

    private $submitNewFortuneHandler;
    private $saveNewFortune;

    protected function setUp()
    {
        $this->saveNewFortune = $this->prophesize(SaveNewFortune::class);
        $this->submitNewFortuneHandler = new SubmitNewFortuneHandler(
            $this->saveNewFortune->reveal()
        );
    }

    /**
     * @test
     */
    public function it_submits_new_fortunes()
    {
        $submitNewFortune = new SubmitNewFortune(self::CONTENT);

        $this->saveNewFortune->save(array(
            'content' => self::CONTENT
        ))->shouldBeCalled();

        $this->submitNewFortuneHandler->handle($submitNewFortune);
    }
}
