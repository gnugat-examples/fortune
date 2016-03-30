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
    private $twig;

    public function __construct(
        ListAllFortunesHandler $listAllFortunesHandler,
        \Twig_Environment $twig
    ) {
        $this->listAllFortunesHandler = $listAllFortunesHandler;
        $this->twig = $twig;
    }

    public function listAll(Request $request)
    {
        $listAllFortunes = new ListAllFortunes(
        );
        $fortunes = $this->listAllFortunesHandler->handle($listAllFortunes);
        $html = $this->twig->render('::list-all-fortunes.html.twig', array(
            'fortunes' => $fortunes,
        ));

        return new Response($html, 200);
    }
}
