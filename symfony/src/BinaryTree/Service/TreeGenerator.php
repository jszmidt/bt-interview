<?php

namespace App\BinaryTree\Service;

use App\Entity\BinaryNode;
use App\Repository\BinaryNodeRepositoryInterface;

class TreeGenerator
{
    public const ROOT_USER_NAME = 'ROOT';
    public const RANDOM_USER_NAME = 'random name';

    /**
     * @var BinaryNodeRepositoryInterface
     */
    private $nodeRepository;

    /**
     * @var BinaryNode
     */
    private $root;

    /**
     * @var CreatorInterface
     */
    private $creator;

    public function __construct(
        BinaryNodeRepositoryInterface $nodeRepository,
        CreatorInterface $creator
    )
    {
        $this->nodeRepository = $nodeRepository;
        $this->creator = $creator;
    }

    /**
     * @param int $nodesCount
     * @param BinaryNode|null $parent
     * @param string $direction
     */
    public function generate(int $nodesCount, BinaryNode $parent = null, $direction = 'asc'): void
    {
        if ($nodesCount === 0) {
            return;
        }
        if (!$parent && !$this->getRoot()) {
            $this->generate($nodesCount - 1, $this->creator->create([self::ROOT_USER_NAME]), $direction);
        }
        if (!$parent && $this->getRoot()) {
            $parent = $this->getRoot();
        }

        $children = $this->nodeRepository->children($parent, false, null, $direction);
        if (\count($children) < 2) {
            $this->creator->create([str_shuffle(self::RANDOM_USER_NAME), $parent]);
            $this->generate($nodesCount - 1, $parent, $direction);
        } else {
            $this->generate($nodesCount, $children[0], $direction);
        }
    }


    /**
     * @return BinaryNode|null
     */
    private function getRoot(): ?BinaryNode
    {
        if (!$this->root) {
            $this->root = $this->nodeRepository->findOneBy(['parent' => null]);
        }

        return $this->root;
    }

}