<?php

namespace App\BinaryTree\Service;

/**
 * Interface CreatorInterface
 * @package App\BinaryTree\Service
 */
interface CreatorInterface
{
    /**
     * @param array $arguments
     * @return mixed
     */
    public function create(array $arguments);
}
