<?php

namespace App\Repository;

use App\Entity\BinaryNode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;


class BinaryNodeRepository extends NestedTreeRepository
{
    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct($manager, $manager->getClassMetadata(BinaryNode::class));
        $this->repoUtils = new RepositoryUtils($this->_em, $this->getClassMetadata(), $this->listener, $this);
    }
}
