<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\DashboardBundle\Twig\Extension;

use Doctrine\Common\Persistence\ObjectManager;
use Jumph\Bundle\DashboardBundle\Entity\ActivityStream;

class ActivityRenderExtension extends \Twig_Extension
{
    /**
    * @var ObjectManager $objectManager
    */
    protected $objectManager;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager, \Twig_Environment $twig)
     {
         $this->objectManager = $objectManager;
         $this->twig = $twig;
    }

    /**
     * Get the available filters
     *
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('render', array($this, 'renderFilter')),
        );
    }

    /**
     * Render the activity
     *
     * @param ActivityStream $stream
     *
     * @return mixed
     */
    public function renderFilter(ActivityStream $stream)
    {
        $em = $this->objectManager->getRepository($stream->getObjectType());
        $entity = $em->find($stream->getObjectId());

        $bundleName = self::getBundleName($stream->getObjectType());

        return $this->twig->render($bundleName.":Dashboard:".$stream->getVerb().".html.twig",
            array(
                'entity' => $entity,
                'stream' => $stream
            )

        );
    }

    /**
     * Get the bundle name
     *
     * @todo: this method should be removed
     *
     * @param string $objectType
     *
     * @return string
     */
    private function getBundleName($objectType)
    {
        $chunks = explode("\\", $objectType);
        return $chunks[0] . $chunks[2];
    }

    /**
     * Get extension name
     *
     * @return string
     */
    public function getName()
    {
        return 'jumph_dashboard_activity_render';
    }
}
