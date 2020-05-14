<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Positive;

class NodeGenerator extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nodesCount', IntegerType::class, [
                'constraints' => [new Positive()],
            ])
            ->add('direct', ChoiceType::class, [
                'choices' => ['ASC' => 'ASC', 'DESC' => 'DESC']
            ]);
    }

}
