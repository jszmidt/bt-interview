<?php

namespace App\Controller;

use App\BinaryTree\Service\CreatorInterface;
use App\BinaryTree\Service\TreeGenerator;
use App\DTO\NodeAddDTO;
use App\Entity\BinaryNode;
use App\Form\NodeGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TreeController
 * @package App\Controller
 */
class TreeController extends AbstractController
{
    /**
     * @var CreatorInterface
     */
    private $creator;

    /**
     * @var TreeGenerator
     */
    private $treeGenerator;

    public function __construct(
        TreeGenerator $treeGenerator,
        CreatorInterface $creator
    )
    {
        $this->creator = $creator;
        $this->treeGenerator = $treeGenerator;
    }

    /**
     * @Route("/", name="tree_node_index", methods={"GET","POST"})
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(NodeGenerator::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->treeGenerator->generate($data['nodesCount'], null, $data['direct']);
            return $this->redirectToRoute('tree_node_index');
        }

        return $this->render('tree/index.html.twig', [
            'htmlTree' => $em->getRepository(BinaryNode::class)->childrenHierarchy(null, false),
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/new", name="tree_node_new", methods={"POST"})
     * @param NodeAddDTO $nodeDTO
     * @return RedirectResponse
     */
    public function new(NodeAddDTO $nodeDTO): RedirectResponse
    {
        $this->creator->create([$nodeDTO->getUserName(), $nodeDTO->getParentId()]);

        return $this->redirectToRoute('tree_node_index');
    }

    /**
     * @Route("/{id}", name="tree_node_delete", methods={"DELETE"})
     * @param Request $request
     * @param BinaryNode $binaryNode
     * @return Response
     */
    public function delete(Request $request, BinaryNode $binaryNode): Response
    {
        if ($this->isCsrfTokenValid('delete' . $binaryNode->getId(), $request->request->get('_token'))) {
            if (!$binaryNode->getParent()) {
                throw new AccessDeniedException('Not allowed');
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($binaryNode);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tree_node_index');
    }

}
