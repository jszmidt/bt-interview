<?php

namespace App\DataFixtures;

use App\Entity\BinaryNode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NodeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $root = new BinaryNode();
        $root->setUserName('ROOT');
        $manager->persist($root);
        $manager->flush();
    }
}
