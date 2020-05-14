<?php

namespace App\DataFixtures;

use App\Entity\BinaryNode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class NodeFixtures
 * @package App\DataFixtures
 */
class NodeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $root = new BinaryNode();
        $root->setUserName('ROOT');
        $manager->persist($root);
        $manager->flush();
    }
}
