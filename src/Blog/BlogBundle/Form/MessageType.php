<?php

namespace Blog\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class MessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('description')->add('auteur')->add('file')->add('dateAt')->add('file')->add('category', EntityType::class, array(
            'class' => 'Blog\BlogBundle\Entity\Category',
            'choice_label' => 'nom',
            'expanded' => false,
            'multiple' => false,
        ))->add('etat', ChoiceType::class, array(
    'choices' => array('Oui' => true, 'Non' => false),
));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Blog\BlogBundle\Entity\Message',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blog_blogbundle_message';
    }
}
