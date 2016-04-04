<?php
// src/AppBundle/Service/Bridge/DoctrineDbalFindLastFortune.php

namespace AppBundle\Service\Bridge;

use AppBundle\Service\FindLastFortune;
use Doctrine\DBAL\Driver\Connection;

class DoctrineDbalFindLastFortune implements FindLastFortune
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findLast()
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder->select('*');
        $queryBuilder->from('fortune');
        $queryBuilder->orderBy('id', 'DESC');
        $queryBuilder->setMaxResults(1);
        $sql = $queryBuilder->getSql();
        $parameters = $queryBuilder->getParameters();
        $statement = $this->connection->prepare($sql);
        $statement->execute($parameters);

        return $statement->fetch();
    }
}
