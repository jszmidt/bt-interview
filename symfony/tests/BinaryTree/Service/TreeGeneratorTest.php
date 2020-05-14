<?php


namespace App\Tests\BinaryTree\Service;

use App\BinaryTree\Service\CreatorInterface;
use App\BinaryTree\Service\TreeGenerator;
use App\Entity\BinaryNode;
use App\Repository\BinaryNodeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class TreeGeneratorTest extends TestCase
{
    /**
     * @var TreeGenerator
     */
    protected $service;

    public function setUp()
    {
        $nestedTreeRepository = $this->getMockBuilder(BinaryNodeRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $nestedTreeRepository->method('children')->willReturn([new BinaryNode()]);

        $creator = $this->getMockBuilder(CreatorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->service = new TreeGenerator($nestedTreeRepository, $creator);
    }


    public function testGenerate()
    {
        //$this->assertNull($this->service->generate(0));
        $this->service->generate(3);

        $this->expects($this->at(1));
    }
}