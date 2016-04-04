<?php
// tests/AppBundle/Service/PrintLastFortuneHandlerTest.php

namespace Tests\AppBundle\Service;

use AppBundle\Service\FindLastFortune;
use AppBundle\Service\PrintLastFortune;
use AppBundle\Service\PrintLastFortuneHandler;

class PrintLastFortuneHandlerTest extends \PHPUnit_Framework_TestCase
{
    const CONTENT = 'Why do witches burn?';

    private $findLastFortune;
    private $printLastFortuneHandler;

    protected function setUp()
    {
        $this->findLastFortune = $this->prophesize(FindLastFortune::class);
        $this->printLastFortuneHandler = new PrintLastFortuneHandler(
            $this->findLastFortune->reveal()
        );
    }

    /**
     * @test
     */
    public function it_prints_last_fortuneS()
    {
        $printLastFortune = new PrintLastFortune();
        $lastFortune = array(
            'content' => self::CONTENT,
        );

        $this->findLastFortune->findLast()->willReturn($lastFortune);

        self::assertSame($lastFortune, $this->printLastFortuneHandler->handle($printLastFortune));
    }
}
