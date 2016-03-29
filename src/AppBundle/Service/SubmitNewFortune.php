<?php
// src/AppBundle/Service/SubmitNewFortune.php

namespace AppBundle\Service;

class SubmitNewFortune
{
    public $content;

    public function __construct($content)
    {
        if (null === $content) {
            throw new \DomainException('Missing required "content" parameter', 422);
        }
        if (false === is_string($content)) {
            throw new \DomainException('Invalid "content" parameter: it must be a string', 422);
        }
        $this->content = $content;
    }
}
