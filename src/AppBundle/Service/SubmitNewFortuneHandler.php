<?php
// src/AppBundle/Service/SubmitNewFortuneHandler.php

namespace AppBundle\Service;

class SubmitNewFortuneHandler
{
    private $saveNewFortune;

    public function __construct(SaveNewFortune $saveNewFortune)
    {
        $this->saveNewFortune = $saveNewFortune;
    }

    public function handle(SubmitNewFortune $submitNewFortune)
    {
        $newFortune = array(
            'content' => $submitNewFortune->content,
        );

        $this->saveNewFortune->save($newFortune);
    }
}
