<?php

namespace App\BinaryTree\Service;

use App\Entity\BinaryNode;
use App\Repository\BinaryNodeRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use http\Exception\InvalidArgumentException;

/**
 * Class NodeCreator
 * @package App\BinaryTree\Service
 */
class NodeCreator implements CreatorInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var BinaryNodeRepositoryInterface
     */
    private $nodeRepository;


    public function __construct(
        EntityManagerInterface $em,
        BinaryNodeRepositoryInterface $nodeRepository
    )
    {
        $this->em = $em;
        $this->nodeRepository = $nodeRepository;
    }

    /**
     * @param array $arguments
     * @return BinaryNode
     */
    public function create(array $arguments): BinaryNode
    {
        if (!$arguments) {
            throw new \InvalidArgumentException('Should be array with two arguments [string, int or object]');
        }

        return $this->createNode($arguments[0], $arguments[1] ?? null);
    }

    /**
     * @param string $userName
     * @param null $parent
     * @return BinaryNode
     */
    private function createNode(string $userName, $parent = null): BinaryNode
    {
        $node = new BinaryNode($userName);
        if ($parent) {
            $parent = \is_numeric($parent) ? $this->nodeRepository->find($parent) : $parent;
            $node->setParent($parent);
        }
        $this->em->persist($node);
        $this->em->flush();

        return $node;
    }

}