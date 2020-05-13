<?php

namespace App\DataFixtures;

use App\Entity\BinaryNode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NodeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userName = ['admin', 'przemek', 'jarek', 'zbuku'];


        $root = new BinaryNode();
        $root->setUserName($userName[0]);


        $user1 = new BinaryNode();
        $user1->setUserName($userName[1]);
        $user1->setParent($root);

        $user5 = new BinaryNode();
        $user5->setUserName('asd');
        $user5->setParent($user1);


        $user2 = new BinaryNode();
        $user2->setUserName($userName[2]);
        $user2->setParent($root);


        $user3 = new BinaryNode();
        $user3->setUserName($userName[3]);
        $user3->setParent($user2);


        $user4 = new BinaryNode();
        $user4->setUserName($userName[3]);
        $user4->setParent($user3);

        $user6 = new BinaryNode();
        $user6->setUserName($userName[3]);
        $user6->setParent($user3);


        $manager->persist($root);
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($user6);
        $manager->flush();
    }
}
