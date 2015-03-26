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

class DatabaseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('database_driver', 'choice', array(
                'choices' => array(
                    'pdo_mysql'  => 'MySQL',
                    'pdo_pgsql'  => 'PostgreSQL',
                    'pdo_sqlite' => 'SQLite',
                    'oci8'       => 'Oracle',
                    'pdo_sqlsrv' => 'Microsoft SQL Server',
                ),
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('database_host', 'text', array(
                'data'  => '127.0.0.1',
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('database_port', 'integer', array(
                'required'    => false,
                'constraints' => array(
                    new Assert\Type(array('type' => 'integer'))
                )
            ))
            ->add('database_name', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('database_user', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                )
            ))
            ->add('database_password', 'password', array(
                'required' => false,
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'database';
    }
}
