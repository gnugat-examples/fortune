<?php
// src/AppBundle/Service/ListAllFortunesHandler.php

namespace AppBundle\Service;

class ListAllFortunesHandler
{
    private $findAllFortunes;

    public function __construct(FindAllFortunes $findAllFortunes)
    {
        $this->findAllFortunes = $findAllFortunes;
    }

    public function handle(ListAllFortunes $listAllFortunes)
    {
        return $this->findAllFortunes->findAll();
    }
}

