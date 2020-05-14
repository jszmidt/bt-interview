<?php


namespace App\Tests\BinaryTree\Service;

use App\BinaryTree\Service\CreatorInterface;
use App\BinaryTree\Service\TreeGenerator;
use App\Entity\BinaryNode;
use App\Repository\BinaryNodeRepositoryInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class TreeGeneratorTest
 * @package App\Tests\BinaryTree\Service
 */
class TreeGeneratorTest extends TestCase
{
    /**
     * @var TreeGenerator
     */
    protected $service;

    /**
     * @var BinaryNodeRepositoryInterface
     */
    protected $nestedTreeRepository;

    public function setUp(): void
    {
        $this->nestedTreeRepository = $this->getMockBuilder(BinaryNodeRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->nestedTreeRepository->method('children')->willReturn([new BinaryNode()]);

        $creator = $this->getMockBuilder(CreatorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->service = new TreeGenerator($this->nestedTreeRepository, $creator);
    }

    public function testGenerate(): void
    {
        $this->assertNull($this->service->generate(0));
    }
}