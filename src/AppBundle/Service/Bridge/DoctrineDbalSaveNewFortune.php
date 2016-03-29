<?php
// src/AppBundle/Service/Bridge/DoctrineDbalSaveNewFortune.php

namespace AppBundle\Service\Bridge;

use AppBundle\Service\SaveNewFortune;
use Doctrine\DBAL\Driver\Connection;

class DoctrineDbalSaveNewFortune implements SaveNewFortune
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function save(array $newFortune)
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder->insert('fortune');
        $queryBuilder->setValue('content', '?');
        $queryBuilder->setParameter(0, $newFortune['content']);
        $sql = $queryBuilder->getSql();
        $parameters = $queryBuilder->getParameters();
        $statement = $this->connection->prepare($sql);
        $statement->execute($parameters);
    }
}
