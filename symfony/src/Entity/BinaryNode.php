<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="binary_nodes")
 * @ORM\Entity(repositoryClass="App\Repository\BinaryNodeRepository")
 */
class BinaryNode
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="user_name", type="string", length=64)
     */
    private $userName;

    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    private $lft;

    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;

    /**
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    private $rgt;

    /**
     * @Gedmo\TreeRoot
     * @ORM\ManyToOne(targetEntity="BinaryNode")
     * @ORM\JoinColumn(name="tree_root", referencedColumnName="id", onDelete="CASCADE")
     */
    private $root;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="BinaryNode", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="BinaryNode", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;

    public function __construct($userName = 'node name')
    {
        $this->userName = $userName;
        $this->children = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $userName
     * @return $this
     */
    public function setUserName($userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return $this|null
     */
    public function getRoot(): ?self
    {
        return $this->root;
    }

    /**
     * @param BinaryNode|null $parent
     * @return $this
     */
    public function setParent(BinaryNode $parent = null): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return $this|null
     */
    public function getParent(): ?self
    {
        return $this->parent;
    }

    /**
     * @return int|null
     */
    public function getLft(): ?int
    {
        return $this->lft;
    }

    /**
     * @return int|null
     */
    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    /**
     * @return int|null
     */
    public function getRgt(): ?int
    {
        return $this->rgt;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->userName;
    }
}