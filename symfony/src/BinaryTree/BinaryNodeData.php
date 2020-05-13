<?php


namespace App\BinaryTree;


class BinaryNodeData
{
    private $leftCredits;
    private $rightCredits;
    private $userName;

    public function __construct(int $leftCredits = 0, int $rightCredits = 0, $userName = '')
    {
        $this->leftCredits = $leftCredits;
        $this->rightCredits = $rightCredits;
        $this->userName = $userName;
    }

    /**
     * @return int
     */
    public function getLeftCredits(): int
    {
        return $this->leftCredits;
    }

    /**
     * @return int
     */
    public function getRightCredits(): int
    {
        return $this->rightCredits;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }


}