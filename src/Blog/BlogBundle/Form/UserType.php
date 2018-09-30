<?php

namespace Blog\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

            // , ChoiceType::class, array(
            //         'choices' => array(
            //             'OUI' => 'True',
            //             'Non' => 'False', ),
            //      )

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')->add('email', EmailType::class)->add('password', PasswordType::class)->add('confirm_password', PasswordType::class)->add('telephone', IntegerType::class)->add('datenaissance')->add('sexe', ChoiceType::class, array(
    'choices' => array('Feminin' => true, 'Masculin' => false),
));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Blog\BlogBundle\Entity\User',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blog_blogbundle_user';
    }
}
