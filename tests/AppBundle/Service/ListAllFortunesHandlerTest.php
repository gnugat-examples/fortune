<?php
// tests/AppBundle/Service/ListAllFortunesHandlerTest.php

namespace Tests\AppBundle\Service;

use AppBundle\Service\FindAllFortunes;
use AppBundle\Service\ListAllFortunes;
use AppBundle\Service\ListAllFortunesHandler;

class ListAllFortunesHandlerTest extends \PHPUnit_Framework_TestCase
{
    const CONTENT = "It's just a flesh wound.";

    private $listAllFortunesHandler;
    private $findAllFortunes;

    protected function setUp()
    {
        $this->findAllFortunes = $this->prophesize(FindAllFortunes::class);
        $this->listAllFortunesHandler = new ListAllFortunesHandler(
            $this->findAllFortunes->reveal()
        );
    }

    /**
     * @test
     */
    public function it_submits_new_fortunes()
    {
        $listAllFortunes = new ListAllFortunes();

        $this->findAllFortunes->findAll()->shouldBeCalled();

        $this->listAllFortunesHandler->handle($listAllFortunes);
    }
}
