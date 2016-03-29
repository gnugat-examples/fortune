<?php
// tests/AppBundle/Service/SubmitNewFortuneTest.php

namespace Tests\AppBundle\Service;

use AppBundle\Service\SubmitNewFortune;

class SubmitNewFortuneTest extends \PHPUnit_Framework_TestCase
{
    const CONTENT = "Look, matey, I know a dead parrot when I see one, and I'm looking at one right now.";

    /**
     * @test
     */
    public function it_has_a_content()
    {
        $submitNewFortune = new SubmitNewFortune(self::CONTENT);

        self::assertSame(self::CONTENT, $submitNewFortune->content);
    }

    /**
     * @test
     */
    public function it_fails_if_the_content_is_missing()
    {
        $this->expectException(\DomainException::class);

        new SubmitNewFortune(null);
    }

    /**
     * @test
     */
    public function it_fails_if_the_content_is_not_a_string()
    {
        $this->expectException(\DomainException::class);

        new SubmitNewFortune(42);
    }
}
