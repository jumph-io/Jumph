<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', 'entity', array(
                'class' => 'JumphClientBundle:Company',
                'property' => 'name'
            ))
            ->add('employee', 'entity', array(
                'class' => 'JumphClientBundle:Employee',
                'property' => 'firstname'
            ))
            ->add('project', 'entity', array(
                'class' => 'JumphProjectBundle:Project',
                'property' => 'name'
            ))
            ->add('subject')
            ->add('body');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jumph\Bundle\EmailBundle\Entity\Email'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'email';
    }
}
