<?php

namespace Badger\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BadgeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description', 'textarea')
            ->add('tags', 'entity', [
                'label' => 'Tagged in',
                'multiple' => true,
                'property' => 'name',
                'required' => false,
                'class' => 'Badger\TagBundle\Entity\Tag'
            ])
            ->add('imagePath')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Badger\GameBundle\Entity\Badge'
        ]);
    }
}