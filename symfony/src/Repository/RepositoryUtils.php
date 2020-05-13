<?php


namespace App\Repository;

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use Gedmo\Exception\InvalidArgumentException;
use Gedmo\Tree\RepositoryUtils as GedmoRepositoryUtils;


class RepositoryUtils extends GedmoRepositoryUtils
{
    /**
     * {@inheritDoc}
     */
    public function buildTree(array $nodes, array $options = array())
    {
        $meta = $this->getClassMetadata();
        $nestedTree = $this->repo->buildTreeArray($nodes);

        $default = array(
            'decorate' => false,
            'rootOpen' => '<ul>',
            'rootClose' => '</ul>',
            'childOpen' => '<li>',
            'childClose' => '</li>',
            'nodeDecorator' => function ($node) use ($meta) {
                // override and change it, guessing which field to use
                if ($meta->hasField('title')) {
                    $field = 'title';
                } elseif ($meta->hasField('name')) {
                    $field = 'name';

                } elseif ($meta->hasField('userName')) {
                    $field = 'userName';
                } else {
                    throw new InvalidArgumentException("Cannot find any representation field");
                }

                return $node[$field];
            },
        );
        $options = array_merge($default, $options);
        // If you don't want any html output it will return the nested array
        if (!$options['decorate']) {
            return $nestedTree;
        }

        if (!count($nestedTree)) {
            return '';
        }

        $childrenIndex = $this->childrenIndex;

        $build = function ($tree) use (&$build, &$options, $childrenIndex) {
            $output = is_string($options['rootOpen']) ? $options['rootOpen'] : $options['rootOpen']($tree);
            foreach ($tree as $node) {
                $output .= is_string($options['childOpen']) ? $options['childOpen'] : $options['childOpen']($node);
                $output .= $options['nodeDecorator']($node);
                if (count($node[$childrenIndex]) > 0) {
                    $output .= $build($node[$childrenIndex]);
                }
                $output .= is_string($options['childClose']) ? $options['childClose'] : $options['childClose']($node);
            }

            return $output.(is_string($options['rootClose']) ? $options['rootClose'] : $options['rootClose']($tree));
        };

        return $build($nestedTree);
    }
}