<?php
// tests/AppBundle/Service/ListAllFortunesTest.php

namespace Tests\AppBundle\Service;

use AppBundle\Service\ListAllFortunes;

class ListAllFortunesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_no_parameters()
    {
        $listAllFortunes = new ListAllFortunes();
    }
}
