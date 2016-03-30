<?php
// src/AppBundle/Service/Bridge/DoctrineDbalFindAllFortunes.php

namespace AppBundle\Service\Bridge;

use AppBundle\Service\FindAllFortunes;
use Doctrine\DBAL\Driver\Connection;

class DoctrineDbalFindAllFortunes implements FindAllFortunes
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder->select('*');
        $queryBuilder->from('fortune');
        $sql = $queryBuilder->getSql();
        $parameters = $queryBuilder->getParameters();
        $statement = $this->connection->prepare($sql);
        $statement->execute($parameters);

        return $statement->fetchAll();
    }
}
