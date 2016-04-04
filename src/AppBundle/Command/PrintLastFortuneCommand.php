<?php
// src/AppBundle/Command/PrintLastFortuneCommand.php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PrintLastFortuneCommand extends Command
{
    protected function configure()
    {
        $this->setName('print-last-fortune');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
