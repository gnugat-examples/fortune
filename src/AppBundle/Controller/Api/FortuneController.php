<?php
// src/AppBundle/Controller/Api/FortuneController.php

namespace AppBundle\Controller\Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FortuneController
{
    public function submit(Request $request)
    {
        return new Response('', 201);
    }
}
