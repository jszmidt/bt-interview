<?php


namespace App\BinaryTree;


class BinaryNode
{
    public $data;
    public $left;
    public $right;

    public function __construct(BinaryNodeData $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function addChildren(BinaryNode $left = null, BinaryNode $right = null)
    {
        $this->left = $left;
        $this->right = $right;
    }

}