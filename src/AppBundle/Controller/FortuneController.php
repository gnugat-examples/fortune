<?php
// src/AppBundle/Controller/FortuneController.php

namespace AppBundle\Controller;

use AppBundle\Service\ListAllFortunes;
use AppBundle\Service\ListAllFortunesHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FortuneController
{
    private $listAllFortunesHandler;

    public function __construct(ListAllFortunesHandler $listAllFortunesHandler)
    {
        $this->listAllFortunesHandler = $listAllFortunesHandler;
    }

    public function listAll(Request $request)
    {
        $listAllFortunes = new ListAllFortunes(
        );
        $fortunes = $this->listAllFortunesHandler->handle($listAllFortunes);

        return new Response('', 200);
    }
}
