<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\InstallerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AdminUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('lastname', 'text', array(
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('email', 'text', array(
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('username', 'text', array(
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'required' => true,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FOS\UserBundle\Model\UserInterface'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'admin_user';
    }
}
