<?php

namespace App\DTO;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class NodeAddDTO
 * @package App\DTO
 */
final class NodeAddDTO implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank()
     */
    private $userName;

    /**
     * @Assert\Positive()
     */
    private $parentId;

    public function __construct(Request $request)
    {
        $this->userName = $request->get('userName');
        $this->parentId = $request->get('parentId');
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }


}