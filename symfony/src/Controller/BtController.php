<?php

namespace App\Controller;

use App\Entity\BinaryNode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BtController extends AbstractController
{
    private $repo;

    public function __construct(EntityManagerInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @Route("/", name="bt")
     */
    public function index()
    {
//
//        $final = new BinaryNode(new BinaryNodeData(1, 1, 'root'));
//
//        $tree = new BinaryTree($final);
//
//        $semiFinal1 = new BinaryNode(new BinaryNodeData(1, 1, 'bb'));
//        $semiFinal2 = new BinaryNode(new BinaryNodeData(1, 1, 'cc'));
//        $quarterFinal1 = new BinaryNode(new BinaryNodeData(1, 1, 'dd'));
//        $quarterFinal2 = new BinaryNode(new BinaryNodeData(1, 1, 'ee'));
//        $quarterFinal3 = new BinaryNode(new BinaryNodeData(1, 1, 'dd'));
//        $quarterFinal4 = new BinaryNode(new BinaryNodeData(1, 1, 'ff'));
//
//        $semiFinal1->addChildren($quarterFinal1, $quarterFinal2);
//        $semiFinal2->addChildren($quarterFinal3, $quarterFinal4);
//        $quarterFinal4->addChildren(new BinaryNode(new BinaryNodeData(1, 1, 'zz')));
//
//        $final->addChildren($semiFinal1, $semiFinal2);
//
//        $tree->traverse($tree->root);





        $repo = $this->repo->getRepository(BinaryNode::class);
        $htmlTree = $repo->childrenHierarchy(
            null,
            false
        );

//        print "<pre>";
//        print_r($htmlTree);
//        print "</pre>"; die();
        return $this->render('bt/index.html.twig', [
            'htmlTree' => $htmlTree
        ]);
    }
}
