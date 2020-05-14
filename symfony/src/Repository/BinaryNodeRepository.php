<?php

namespace App\Repository;

use App\Entity\BinaryNode;
use App\Repository\Utils\RepositoryUtils;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

/**
 * Class BinaryNodeRepository
 * @package App\Repository
 */
class BinaryNodeRepository extends NestedTreeRepository implements BinaryNodeRepositoryInterface
{
    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct($manager, $manager->getClassMetadata(BinaryNode::class));
        $this->repoUtils = new RepositoryUtils($this->_em, $this->getClassMetadata(), $this->listener, $this);
    }
}
