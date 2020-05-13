<?php


namespace App\BinaryTree;


class BinaryTree
{
    public $root = null;

    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }

    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    public function traverse(BinaryNode $node, int $level = 0): void
    {
        if ($node) {
            if ($node->left)
                $this->traverse($node->left, $level + 1);

            if ($node->right)
                $this->traverse($node->right, $level + 1);
        }
    }




}