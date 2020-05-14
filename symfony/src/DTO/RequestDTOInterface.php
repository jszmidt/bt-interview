<?php

namespace App\DTO;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface RequestDTOInterface
 * @package App\DTO
 */
interface RequestDTOInterface
{
    /**
     * RequestDTOInterface constructor.
     * @param Request $request
     */
    public function __construct(Request $request);
}