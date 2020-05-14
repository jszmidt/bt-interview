<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Positive;

/**
 * Class NodeGenerator
 * @package App\Form
 */
class NodeGenerator extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nodesCount', IntegerType::class, [
                'constraints' => [new Positive()],
                'attr' => ['min' => 1],
            ])
            ->add('direct', ChoiceType::class, [
                'choices' => ['Left' => 'ASC', 'Right' => 'DESC']
            ]);
    }

}
