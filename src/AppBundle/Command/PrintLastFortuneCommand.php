<?php
// src/AppBundle/Command/PrintLastFortuneCommand.php

namespace AppBundle\Command;

use AppBundle\Service\PrintLastFortune;
use AppBundle\Service\PrintLastFortuneHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PrintLastFortuneCommand extends Command
{
    private $printLastFortuneHandler;

    public function __construct(PrintLastFortuneHandler $printLastFortuneHandler)
    {
        $this->printLastFortuneHandler = $printLastFortuneHandler;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('print-last-fortune');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $printLastFortune = new PrintLastFortune();

        $lastFortune = $this->printLastFortuneHandler->handle($printLastFortune);

        $output->writeln($lastFortune['content']);
    }
}
