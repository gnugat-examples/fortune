<?php
// src/AppBundle/Controller/Api/FortuneController.php

namespace AppBundle\Controller\Api;

use AppBundle\Service\SubmitNewFortune;
use AppBundle\Service\SubmitNewFortuneHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FortuneController
{
    private $submitNewFortuneHandler;

    public function __construct(SubmitNewFortuneHandler $submitNewFortuneHandler)
    {
        $this->submitNewFortuneHandler = $submitNewFortuneHandler;
    }

    public function submit(Request $request)
    {
        $submitNewFortune = new SubmitNewFortune(
            $request->request->get('content')
        );
        $this->submitNewFortuneHandler->handle($submitNewFortune);

        return new Response('', 201);
    }
}
