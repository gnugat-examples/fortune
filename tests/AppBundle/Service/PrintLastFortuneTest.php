<?php
// tests/AppBundle/Service/PrintLastFortuneTest.php

namespace Tests\AppBundle\Service;

use AppBundle\Service\PrintLastFortune;

class PrintLastFortuneTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_no_parameters()
    {
        $printLastFortune = new PrintLastFortune();
    }
}

