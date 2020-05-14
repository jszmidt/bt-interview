<?php

namespace App\Tests\BinaryTree\Service;

use App\BinaryTree\Service\NodeCreator;
use App\Entity\BinaryNode;
use App\Repository\BinaryNodeRepositoryInterface;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

/**
 * Class NodeCreatorTest
 * @package App\Tests\BinaryTree\Service
 */
class NodeCreatorTest extends TestCase
{
    /**
     * @var NodeCreator
     */
    protected $service;

    /**
     * @var BinaryNodeRepositoryInterface
     */
    protected $nestedTreeRepository;

    public function setUp(): void
    {

        $em = $this->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->nestedTreeRepository = $this->getMockBuilder(BinaryNodeRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->nestedTreeRepository->method('find')->willReturn(new BinaryNode());


        $this->service = new NodeCreator($em, $this->nestedTreeRepository);
    }

    public function testGenerateException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->service->create([]);
    }

    public function testGenerateWithOneArgument(): void
    {
        $node = $this->service->create(['username']);
        $this->assertIsNotObject($node->getParent());
        $this->assertEquals('username', $node->getUserName());
    }

    public function testGenerateWithTwoArgument(): void
    {
        $node = $this->service->create(['username', new BinaryNode()]);
        $this->assertIsObject($node->getParent());
    }
}