<?php
// src/AppBundle/Service/PrintLastFortuneHandler.php

namespace AppBundle\Service;

class PrintLastFortuneHandler
{
    private $findLastFortune;

    public function __construct(FindLastFortune $findLastFortune)
    {
        $this->findLastFortune = $findLastFortune;
    }

    public function handle(PrintLastFortune $printLastFortune)
    {
        return $this->findLastFortune->findLast();
    }
}
