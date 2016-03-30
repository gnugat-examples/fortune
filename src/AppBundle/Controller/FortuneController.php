<?php
// src/AppBundle/Controller/FortuneController.php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FortuneController
{
    public function listAll(Request $request)
    {
        return new Response('', 200);
    }
}

