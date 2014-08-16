<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimeTrackerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project', 'entity', array(
                'class' => 'JumphProjectBundle:Project',
                'property' => 'name'
            ))
            ->add('category', 'entity', array(
                    'class' => 'JumphTimeTrackerBundle:TimeCategory',
                    'property' => 'name'
                ))
            ->add('description', 'text')
            ->add('dateAt', 'date', array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'attr' => array(
                    'data-provide' => 'datepicker'
                )
            ))
            ->add('hours');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'timeTracker';
    }
}
