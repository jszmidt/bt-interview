<?php

namespace App\Repository;

use Doctrine\Persistence\ObjectRepository;

interface BinaryNodeRepositoryInterface extends ObjectRepository
{

    /**
     * @param null $node
     * @param bool $direct
     * @param null $sortByField
     * @param string $direction
     * @param bool $includeNode
     * @return mixed
     */
    public function children($node = null, $direct = false, $sortByField = null, $direction = 'ASC', $includeNode = false);

}